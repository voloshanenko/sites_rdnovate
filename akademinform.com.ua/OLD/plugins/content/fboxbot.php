<?php

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe->registerEvent('onPrepareContent', 'plgFbox');

//--- got some help from emailcloak.php
function plgFbox(&$row, &$params, $page=0) {
    if (!is_object($row)) return true;
    if (!isset($row->text)) return true;
    
    $FBT= new fboxTools;
    
    $joom_abs_path = strtr( JPATH_BASE , '\\', '/');  // don't want to be bothered by this DIRECTORY_SEPARATOR thing
    $joom_abs_path = rtrim($joom_abs_path, '/ ');
    $joom_live_site= rtrim(JURI::base(), '/ ');
    $joomUser=& JFactory::getUser();
    $joomConf=& JFactory::getConfig();
    //-----------------------
    $fboxbot_folder = $joom_abs_path . "/plugins/content/fboxbot";
    $fboxbot_url =  $joom_live_site . "/plugins/content/fboxbot";
    //----------------------
    $joom_slash_path=$FBT->getSlashPath($joom_live_site). '/';
    //-------------------------------------------------------------------
    if ( !function_exists( 'getimagesize')) {//why would this function not exist ?????????
        //------- append error message to text
        $row->text .= "\n<hr noshade=\"noshade\"/>\n<b>Error:</b> Your php install does not support <i>getimagesize</i> function </br>
                      This is a requirement for FBoxBot";
        return true;
    }//end if why would this function not exist
    
    if ( !function_exists('imagecreatefromjpeg') ) {
        //------- append error message to text
        $row->text .= "\n<hr noshade=\"noshade\"/>\n<b>Error:</b> Your php install does not support GD.  <br />
                      This is a requirement for FBoxBot";
        return true;
    }
    
    if ( !is_dir($fboxbot_folder . '/thumbs/') ) {
        //------- append error message to text
        $row->text .= "\n<hr noshade=\"noshade\"/>\n<b>Error:</b> Cannot find thumbs folder used by FBoxBot";
        return true;
    }
    //-------------------------------------------------------------------
    //--- warning we'll re-use imgRegex later, that's why we give the special name: imgRegex
    //--- while regex is considered as temporary
    //--- silly bug with attribute:  /="/"
    $imgRegex='#<img((?:\s+[a-zA-Z0-9:\-_/]+(?:\s*=(?:\s*"[^"]*")?)?)+)\s*/?\s*>#i';
    preg_match_all($imgRegex,$row->text,$imgs,PREG_SET_ORDER);
    $ni= count($imgs);
    if ($ni==0) return true; //no images
    
    //---we define a regex for images that use an url instead of a relative path --
    //--- only images from the joomla domain are accepted -------------------------
    //--- an exception: if joomla is configured to work at www.mysite.com ---------
    //--- then images are accepted from mysite.com . The reverse doesn't harm -----
    
    if (preg_match('#^([^:/]*://)(?:www\.)?(.*)$#i',$joom_live_site,$matches)) {
        $websiteRegex= preg_quote($matches[1],'#') . '(?:www\.)?' . preg_quote($matches[2],'#');
    } else {
        $websiteRegex= preg_quote($joom_live_site,'#');
    }
    $websiteRegex= '#^' . $websiteRegex . '((?:/.*)?)$#i';
    
    
    $joomUsertype= $joomUser->get('usertype');
    //----- are we allowed to rebuild thumbnails ?
    $thumbs_rebuild_allowed = $joomUsertype == "Super Administrator" || $joomUsertype == "Administrator";
    //  hmmm , seems there's no more caching issues, ok allowed even with caching enabled
    //  $row->text= time(); //testing cach
    $thumbs_rebuild_allowed = $thumbs_rebuild_allowed  && function_exists('gzcompress');
    
    //---------------------
    $addWarnings = '';
    
    //------------------------------------------------------------------
    if ( !defined('_FBOXBOT_INIT') )  { //bot initialisations
        $joomDoc=& JFactory::getDocument();
        
        $joomDoc->addStyleSheet('plugins/content/fboxbot/frontbox/fbox.css');
        $joomDoc->addScript('plugins/content/fboxbot/frontbox/fbox_conf.js');
        $joomDoc->addScript('plugins/content/fboxbot/frontbox/fbox_engine-min.js');
        
        $fbox_please=(JRequest::getVar('fboxbot_please_rebuild_thumbs', 0, 'post', 'int' ))==1;
        $thumbs_rebuild_requested = $thumbs_rebuild_allowed && $fbox_please;
        $thumbs_rebuild_requested = $thumbs_rebuild_requested && isset($_POST['fboxbot_thumbs_list']);
        
        $fboxbot_thumbs_list=array();
        if ($thumbs_rebuild_requested) { //more checkings
            $fboxbot_thumbs_list=JRequest::getVar('fboxbot_thumbs_list','','post','string');
            $fboxbot_thumbs_list= @unserialize(gzuncompress(base64_decode($fboxbot_thumbs_list)));
            if (!is_array($fboxbot_thumbs_list) || count($fboxbot_thumbs_list)==0) $thumbs_rebuild_requested= false;
            else  foreach($fboxbot_thumbs_list as $key=> $val ) {
                if ( $val!=1 || !preg_match('#^[a-fA-F0-9]{32}$#',$key)) {  //maybe I exagerate...
                    $thumbs_rebuild_requested=false;
                    break;
                }
            }
        }//end if more checkings
        
        //---- ok after all these excessive checkings, let's delete our thumbnails
        if ($thumbs_rebuild_requested) {
            $rep=opendir($fboxbot_folder . '/thumbs/');
            $regex='#^[a-zA-Z0-9\-]{1,64}_[0-9]+x[0-9]+_([a-fA-F0-9]{32})\.jpg$#';
            while ($file = readdir($rep)) {
                if (is_dir($file) || $file=='' ) continue;
                if (preg_match($regex,$file,$matches) && isset($fboxbot_thumbs_list[$matches[1]])) {
                    if (! @unlink($fboxbot_folder . '/thumbs/' . $file)) {
                        $addWarnings .= "<b/>Warning!:</b> Unable to delete file:\"$file\"  <br />\n";
                        break;
                    }
                }
            }//end while file
            closedir($rep);
            clearstatcache();
            if (!$addWarnings) define('_FBOXBOT_REFRESH_ID',uniqid(""));
        }//end if $thumbs_rebuild_requested
        
        define('_FBOXBOT_INIT',1);
    }//end if bot initialisations
    
    $fboxbot_thumbs_list= array(); //recreate again the list
    
    $joomPlug = & JPluginHelper::getPlugin('content', 'fboxbot');
    $botParams = new JParameter($joomPlug->params);
    //---------------------
    $botParams->def('resize_method','gd2');
    $botParams->def('jpg_qual',80);
    $botParams->def('rebuild_button',0);
    $botParams->def('auto_next_prev',1);
    $botParams->def('force_caption',0);
    $botParams->def('fb_threshold_percent', 20);
    $botParams->def('watermark','magnify.png');
    $botParams->def('wtmk_threshold_percent',200);
    $botParams->def('wtmk_pos_x_percent',100);
    $botParams->def('wtmk_pos_y_percent',100);
    //-------------------
    if ( !function_exists('imagecreatetruecolor') )  $botParams->set('resize_method','gd1'); //wtf ?
    //---------------------
    $resize_method = $botParams->get('resize_method');
    $jpg_qual = $botParams->get('jpg_qual');
    if ($jpg_qual > 100) $jpg_qual=100;
    else if ($jpg_qual < 0) $jpg_qual=0;
    $rebuild_button = $thumbs_rebuild_allowed && intval($botParams->get('rebuild_button')) == 1;
    //---------------------
    if (!isset($row->id) || !$row->id) {
        $auto_next_prev=false;
        $auto_next_prev_name = "";
    } else {
        $auto_next_prev = $botParams->get('auto_next_prev') ? true : false;
        $auto_next_prev_name = 'fbox_' . $row->id;
    }
    $force_caption = $botParams->get('force_caption') ? true : false;
    //-------------------------------------
    $ratio_inf= 1 +  $botParams->get( 'fb_threshold_percent' )/100;
    if ($ratio_inf < 1) $ratio_inf=1;
    else if ($ratio_inf > 2) $ratio_inf=2;
    
    //------------ let's prepare watermark ---------------------
    $wtmk_img= false;
    $wtmk_filename = trim($botParams->get('watermark')," /");
    $wtmkWidth=$wtmkHeight=$wtmkExtension=0;
    $wtmk_file=$fboxbot_folder . "/". $wtmk_filename;
    //---- postpone creation of watermark ressource : ----------
    $test_wtmk_ressource_prepare= true;
    //------------------------
    $wtmk_factor = 1 + $botParams->get('wtmk_threshold_percent')/100;
    if ($wtmk_factor<0) $wtmk_factor =0;
    else if ($wtmk_factor>10) $wtmk_factor =10;
    
    $wtmk_pos_x= $botParams->get('wtmk_pos_x_percent')/100;
    if ($wtmk_pos_x<0) $wtmk_pos_x=0;
    else if ($wtmk_pos_x>1) $wtmk_pos_x=1;
    $wtmk_pos_y= $botParams->get('wtmk_pos_y_percent')/100;
    if ($wtmk_pos_y<0) $wtmk_pos_y=0;
    else if ($wtmk_pos_y>1) $wtmk_pos_y=1;
    
    //-------- ok let's continue parsing -----------------------
    $antiImgs=preg_split($imgRegex,$row->text); //antiImgs and imgs are complementary
    $finalText=array_shift($antiImgs);
    
    for ($i=0; $i < $ni;$i++) {
        preg_match_all('#([a-zA-Z0-9:\-_]+)(?:\s*=(?:\s*"([^"]*)")?)?#',$imgs[$i][1],$attribs,PREG_SET_ORDER);
        //remark: if there's a duplicate attribute, the browser take in account the first one
        $attribs= array_reverse($attribs);
        $thumbAttribs= array();
        $fbAttribs=array();
        $nj=count($attribs);
        //------------------------------------------------
        for ($j=0; $j< $nj;$j++) {
            if (!isset($attribs[$j][2])) $attribs[$j][2]="";
            $attribs[$j][1] = strtolower( $attribs[$j][1] ); //convert all atrtributes in lower case
            $tmp=explode(":",$attribs[$j][1],2);
            if ($tmp[0]=="fb") {
                if (isset($tmp[1])) { //what a maniac
                    $fbAttribs[$tmp[1]]= $attribs[$j][2];
                }
            } else {
                $thumbAttribs[$attribs[$j][1]]= $attribs[$j][2];
            }
        }//end for $j
        //-------------------------------------------------
        if (isset($fbAttribs['src'])) {
            $thumbAttribs['src']= $fbAttribs['src'];
            unset($fbAttribs['src']);
        }
        
        $nofb=false;
        if (isset($thumbAttribs['nofb'])) {
            $nofb= true;
            unset($thumbAttribs['nofb']);
        }
        
        if (isset($fbAttribs['nofb'])) $nofb= true;
        //----- let's built right now fb tag ------------
        $fbTag="";
        if (!$nofb) {
            if (isset($fbAttribs['name'])) $auto_next_prev = false;
            if ($auto_next_prev) $fbAttribs['name'] = $auto_next_prev_name;
            
            if ( $force_caption && !isset($fbAttribs['title']) && !isset($thumbAttribs['title'])) {
                $fbAttribs['title'] = '.' ;
            }
            
            foreach($fbAttribs as $key => $val ) $fbTag .= ' '. $key . '="' . $val . '"';
            //must use a standard tag, or browsers are unreliable
            //span tag can be contained in a link, unlike div
            
            $fbTag = '<span class="frontbox" ' .  $fbTag . '></span>';
        }//end if(!$nofb)
        //----- unset array anyway, as we don't need it  anymore
        unset($fbAttribs);
        
        //------------------------------------------------------------------
        //--- fck editor do size with style, very boring -------------------
        
        if (isset($thumbAttribs['style'])) { //fcke fix
            $style=$thumbAttribs['style'];
            $style= ';' . $style . ';';
            $widthRegex =  '/;\s*width\s*:\s*([0-9]+)\s*px\s*;/i';
            $heightRegex = '/;\s*height\s*:\s*([0-9]+)\s*px\s*;/i';
            //------------------------------
            preg_match_all($widthRegex,$style,$matches);
            $matches=$matches[1];
            $n=count($matches);
            if ($n>0) {
                $thumbAttribs['width']=$matches[$n-1];
            }
            $style = preg_replace($widthRegex,';',$style);
            //------------------------------
            preg_match_all($heightRegex,$style,$matches);
            $matches=$matches[1];
            $n=count($matches);
            if ($n>0) {
                $thumbAttribs['height']=$matches[$n-1];
            }
            $style = preg_replace($heightRegex,';',$style);
            $style = trim($style , '; ');
            if ($style=='') {
                unset($thumbAttribs['style']);
            } else {
                $thumbAttribs['style'] = $style . ';';
            }
        }//end fcke fix
        
        $resizeDims=0;
        if (isset($thumbAttribs['width']))  $resizeDims+=1;
        if (isset($thumbAttribs['height'])) $resizeDims+=2;
        
        if ($resizeDims ==0 ) {
            $finalText .= $imgs[$i][0] . $antiImgs[$i];
            continue;
        }
        //-------------------------------------------------
        $src_file = '';
        $src_url = isset($thumbAttribs['src']) ? $thumbAttribs['src'] : '';
        $src_url = trim($src_url);
        $src_url2 = rtrim($src_url,'\.\\/'); //everything that could be a folder
        if ( strlen($src_url2) < strlen($src_url) ) $src_url = '';
        $src_url2 = '';
        
        if ($src_url) {
            if (preg_match('#^[^:/]*://#', $src_url)) { //ok there's a protocol
                if (preg_match($websiteRegex, $src_url, $matches)) { //is it the current website ?
                    $src_file = $matches[1];
                }
            }//end if  ok there's a protocol
            else {
                $src_file = $src_url;
                if ($src_file[0]=="/") { //path begin with slash
                    if (strncasecmp($src_file,$joom_slash_path,strlen($joom_slash_path))==0) {
                        $src_file=substr($src_file,strlen($joom_slash_path));
                    } else {
                        $src_file="";
                    }
                }//end if path begin with slash
            }
        }
        
        
        //In PHP4 html_entity_decode() is not working well with UTF-8
        //spitting: "Warning: cannot yet handle MBCS in html_entity_decode()!"
        //combined with rawurlencode, utf8,  the problem is awful
        //seems joomla is decoding automatically when editing anyway
        
        $test_src_file_exists = true;
        $src_file = trim(rawurldecode($src_file));
        
        //---- too much imbricated if/else
        //---- I  prefer to work with a do while loop
        //---- even if there's one iteration
        $continueTest=true;
        do {
            $test_src_file_exists = $src_file ? true : false;
            if (!$test_src_file_exists) break;
            $tmp = $FBT->appendRel($joom_abs_path , $src_file);
            if (file_exists($tmp)) {
                //-- success ----
                $src_file = $tmp;
                break;
            }
            
            $test_src_file_exists = $FBT->detectUTF8($src_file);
            if (!$test_src_file_exists) break;
            $tmp = trim(utf8_decode($src_file));
            $test_src_file_exists = utf8_encode($tmp) == $src_file;
            if (!$test_src_file_exists) break;
            $src_file = $FBT->appendRel($joom_abs_path , $tmp);
            $test_src_file_exists = file_exists($src_file);
            //------------------------
            $continueTest=false;
        } while ($continueTest);
        
        unset($tmp);
        if (!$test_src_file_exists) {
            unset($src_file);
            $finalText .= $imgs[$i][0] . $antiImgs[$i];
            continue;
        }
        
        //------------------------------------------------
        list($srcWidth,  $srcHeight, $srcExtension)= getimagesize($src_file);
        $dstWidth = $dstHeight= 1;
        $skipTest = true;
        
        if (  ($resizeDims & 1) == 1 ) {
            $thumbAttribs['width'] = max($thumbAttribs['width'],1); //wtf ?
            if ($srcWidth > $thumbAttribs['width']) {
                $skipTest = false;
                $dstWidth = $thumbAttribs['width'];
            } else $dstWidth = $srcWidth;
        }
        
        if (  ($resizeDims & 2) == 2 ) {
            $thumbAttribs['height'] = max($thumbAttribs['height'],1); //wtf ?
            if ($srcHeight > $thumbAttribs['height']) {
                $skipTest = false;
                $dstHeight = $thumbAttribs['height'];
            } else $dstHeight = $srcHeight;
        }
        
        if ( $skipTest ) { //nothing to resize
            $finalText .= $imgs[$i][0] . $antiImgs[$i];
            continue;
        }
        
        //----------------------------------------------
        switch ($resizeDims) {
        case 1: //width only
            $ratio = $srcWidth / $dstWidth;
            $dstHeight = ceil($srcHeight / $ratio);
            break;
        case 2: //height only
            $ratio = $srcHeight / $dstHeight;
            $dstWidth = ceil($srcWidth / $ratio);
            break;
        default: //case 0 eliminated, should be 3
            $ratio = sqrt( $srcWidth*$srcHeight/ ($dstWidth*$dstHeight) ); //wtf ?
        }//end switch($resizeDims)
        
        if ($ratio < $ratio_inf) $nofb=true;
        
        //--------- let's build thumbnail  name that is not too  eccentric
        //-------- all thumbnails put in a single folder, so they should all have  each an unique name
        
        //-------- the big following algorithm, ---------------------------------------
        //------- in the hope  to extract a meaningful part of the filename (for human)
        //------- but also for SEO ------------------------------------------------------
        
        $tmp=preg_replace('#^.*/(.*)$#','\1',$src_file); //remove path
        $tmp=preg_replace('#^(.*)\..*$#','\1',$tmp); //remove extension
        //---- correct characters that seems rawurlencoded multiple times
        //---- overkill  I guess
        
        //------ remove utf8 if not already done ---
        if ($FBT->detectUTF8($tmp)) {
            $tmp = utf8_decode($tmp);
        }
        //------ remove all accents ----------------
        $tmp=$FBT->transliterate($tmp);
        //---- now replace all non alpha numerics characters by minus -
        $tmp=preg_replace('#[^a-zA-Z0-9]+#','-',$tmp);
        //---- I  keep intact the first two words of less two characters -------
        //---- I  aggregate others ---------------------------------------------
        
        $strs= explode('-', $tmp);
        $tmp= '';
        $nk= count($strs); //$i already taken
        $j=0;
        $test_cur_small=$test_prev_small=false;
        for ($k=0 ; $k< $nk; $k++) {
            $str=$strs[$k];
            $l= strlen($str);
            if ($l==0) continue;
            $inter = '-';
            $test_cur_small = $l<3;
            if ($l<5 && $j>2 && ($test_prev_small || $test_cur_small) ) {
                $inter = '';
            }
            if ($test_cur_small) {
                $j++;
            }
            $test_prev_small = $test_cur_small;
            $tmp= $tmp . $inter . $str;
        }//end for k
        $tmp=trim($tmp,'-');
        $tmp=substr($tmp,0,64);
        $tmp=trim($tmp,'-');
        if (strlen($tmp)==0) $tmp='thumb';
        
        //--- build final name  ---------------------------------
        //----- $tmp for the readable part ----------------------
        //----- md5 of path to ensure unique name ---------------
        //how hard it is to make a path collision ? -------------
        //-- I really wonder ------------------------------------
        
        $md5_src_file= md5($src_file);
        if ($rebuild_button) $fboxbot_thumbs_list[$md5_src_file] = 1;
        
        $thumb_filename= $tmp . '_' . $dstWidth . "x" . $dstHeight . '_' . $md5_src_file . '.jpg';
        $dst_file= $fboxbot_folder .'/thumbs/' . $thumb_filename;
        //------------------------------
        
        if (!file_exists($dst_file)) {//should we create the thumbnail ?
            if ($test_wtmk_ressource_prepare) {
                $test_wtmk_ressource_prepare= false;
                if (strtolower(strrchr($wtmk_filename,'.')) == ".png" && file_exists($wtmk_file)) {
                    list($wtmkWidth,  $wtmkHeight, $wtmkExtension)= @getimagesize($wtmk_file);
                    if ($wtmkExtension == 3) {//png
                        $wtmk_img = imagecreatefrompng($wtmk_file);
                    }//end if png
                }
            }//end if if($test_wtmk_ressource_prepare)
            
            $applyWtmk = $wtmk_img && !$nofb; //should we apply watermark ?
            if ($applyWtmk && ($dstWidth<$wtmk_factor*$wtmkWidth || $dstHeight<$wtmk_factor*$wtmkHeight))
                $applyWtmk = false; //sorry but the thumbnail is too small in comparison to the watermark
                
            /*extension 1 = GIF, 2 = JPG, 3 = PNG */
            //-----------------------------------------------
            //studied picmgmt.inc.php from coppermine ... -------
            
            $dst_img = $src_img = false;
            switch ($resize_method) {
            case 'gd1':
                if ($srcExtension ==2 ) $src_img = imagecreatefromjpeg($src_file);
                else $src_img = imagecreatefrompng($src_file);
                if ( !$src_img ) break;
                $dst_img = imagecreate($dstWidth, $dstHeight);
                imagecopyresized($dst_img, $src_img, 0, 0, 0, 0, $dstWidth,$dstHeight, $srcWidth, $srcHeight);
                break;
            default: //gd2
                if ($srcExtension ==1 && function_exists('imagecreatefromgif')) $src_img = imagecreatefromgif($src_file);
                else if ($srcExtension ==2) $src_img = imagecreatefromjpeg($src_file);
                else $src_img = imagecreatefrompng($src_file);
                if ( !$src_img ) break;
                if ($srcExtension ==1) $dst_img = imagecreate($dstWidth, $dstHeight);
                else {
                    $dst_img = imagecreatetruecolor($dstWidth, $dstHeight);
                    if ($applyWtmk) imagealphablending($dst_img,true); //is it necessary ?
                }
                imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $dstWidth, $dstHeight, $srcWidth, $srcHeight);
            }//end switch($resize_method)
            
            if (!$src_img ) {
                $addWarnings .= '<b>Warning!</b> Invalid image: '+  $src_file + '<br />\n';
                $finalText .= $imgs[$i][0] . $antiImgs[$i];
                continue;
            }
            
            if ($applyWtmk) {
                //---- here the src image is the wtmk
                
                $dst_x= round($wtmk_pos_x*($dstWidth-$wtmkWidth));
                $dst_y= round($wtmk_pos_y*($dstHeight-$wtmkHeight));
                $src_x= $dst_x<0 ? -$dst_x : 0;
                $src_y= $dst_y<0 ? -$dst_y : 0;
                if ($dst_x<0) $dst_x=0;
                if ($dst_y<0) $dst_y=0;
                $src_w=min($wtmkWidth-$src_x,$dstWidth);
                $src_h=min($wtmkHeight-$src_y,$dstHeight);
                
                imagecopy($dst_img,$wtmk_img,$dst_x,$dst_y,$src_x,$src_y,$src_w,$src_h);
            }
            
            touch($dst_file);
            imagejpeg($dst_img, $dst_file, $jpg_qual);
            imagedestroy($src_img);
            imagedestroy($dst_img);
        }//end if should we create the thumbnail ?
        
        //ok, let's build first our image tag only,
        //then wrap it in a link if we use a frontbox
        //$fbTag
        
        $dst_url= $fboxbot_url . "/thumbs/" . $thumb_filename;
        $thumbAttribs['src']= $dst_url;
        if (defined('_FBOXBOT_REFRESH_ID')) $thumbAttribs['src'] .= '?refresh_id=' . _FBOXBOT_REFRESH_ID ; //bypass caching
        $imgTag ="";
        foreach($thumbAttribs as $key => $val ) $imgTag .= ' '. $key . '="' . $val . '"';
        $imgTag ='<img' . $imgTag . ' />';
        foreach($thumbAttribs as $key => $val ) unset($thumbAttribs[$key]);
        
        if (!$nofb)//ok let's wrap in a frontbox
            $imgTag = '<a href="' . $src_url . '" target="_blank">' . "\n" .  $fbTag . "\n" . $imgTag . "\n</a>" ;
            
        $finalText .= $imgTag . $antiImgs[$i]; //well, it was fastidious
    }//end for $i
    //-------------- let's free watermark ressource
    if ($wtmk_img) imagedestroy($wtmk_img);
    
    $row->text = $finalText;
    if ($addWarnings) $row->text .= '<hr noshade="noshade"/>' . "\n" . $addWarnings;
    
    
    if ($rebuild_button && count($fboxbot_thumbs_list)>0 ) {
        $uri  = JFactory::getURI();
        $return  = $uri->toString();
        //--------------------------------------------------------------------
        $fboxbot_thumbs_list= base64_encode(gzcompress(serialize($fboxbot_thumbs_list)));
        //------------------------------------------------------------------
        $form  = "\n<!-- fbox rebuild button begin -->\n";
        $form .='<hr noshade="noshade" />';
        $form .='<form method="post" action="' . $return . '">';
        $form .='<input type="hidden" name="fboxbot_thumbs_list" value="' . $fboxbot_thumbs_list . '" />';
        $form .='<input type="hidden" name="fboxbot_please_rebuild_thumbs" value="1" />';
        $form .='<input type="submit" name="Submit" value="Rebuild Thumbs" class="button" />';
        $form .='</form>';
        $form .="\n<!-- fbox rebuild button end -->\n";
        //--------------------------------
        $row->text .= $form;
    }//end if $rebuild_button
    
    return true;
}//end function plgFbox

class fboxTools {
    //------- path that begin with slash (ie root)
    function getSlashPath($live_url) {
        $tmp=$live_url;
        $tmp=str_replace("://","#",$tmp);
        $tmp=explode("/",$tmp);
        $tmp[0]="";
        $tmp=implode("/",$tmp);
        return($tmp);
    }//end function slashPath
    
    //if I  append a relative path to a base path,
    //what is final path ?
    //an alternative would be JURI::_cleanPath, still prefer to define my function:
    function appendRel($basepath, $relpath) {
        $basepath = strtr($basepath, '\\', '/');
        $basepath = rtrim($basepath, '/ ');
        $relpath=rtrim($relpath,'/ ');
        
        $finalpath=explode('/',$basepath);
        $relpath=explode('/',$relpath);
        $myroot= array_shift($finalpath);
        
        if (!$myroot) $myroot="";
        $n=count( $relpath);
        for ($i=0;$i<$n;$i++) {
            $tmp=array_shift( $relpath);
            if (!$tmp || $tmp==".") continue;
            if ($tmp=="..") array_pop($finalpath);
            else array_push($finalpath,$tmp);
        }//end for i
        
        array_unshift($finalpath,$myroot);
        $finalpath=implode('/',$finalpath);
        return $finalpath;
    }//end frunction appendRel
    
    //--------------------------------------------------------------------------
    //taken from comments at
    //http://php.oregonstate.edu/manual/en/function.mb-detect-encoding.php
    
    function detectUTF8($string) {
        return preg_match('%(?:
                          [\xC2-\xDF][\x80-\xBF]                 # non-overlong 2-byte
                          |\xE0[\xA0-\xBF][\x80-\xBF]            # excluding overlongs
                          |[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}     # straight 3-byte
                          |\xED[\x80-\x9F][\x80-\xBF]            # excluding surrogates
                          |\xF0[\x90-\xBF][\x80-\xBF]{2}         # planes 1-3
                          |[\xF1-\xF3][\x80-\xBF]{3}             # planes 4-15
                          |\xF4[\x80-\x8F][\x80-\xBF]{2}         # plane 16
                          )+%xs', $string);
    }//end function detectUTF8
    
    //--------------------------------------------------------------------------
    //---------- taken from libraries/joomla/language/language.php -------------
    //---------- difference is that there's no utf8_decode ---------------------
    //---------- very intersting way to get rid of accents ---------------------
    
    function transliterate($string) {
        $string = htmlentities($string);
        $string = preg_replace(
                      array('/&szlig;/','/&(..)lig;/', '/&([aouAOU])uml;/','/&(.)[^;]*;/'),
                      array('ss',"$1","$1".'e',"$1"),
                      $string);
                      
        return $string;
    }//end transliterate
    
}//end class fboxTools