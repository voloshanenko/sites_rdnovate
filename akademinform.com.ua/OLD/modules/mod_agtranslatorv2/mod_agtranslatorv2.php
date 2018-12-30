<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 

$mosConfig_live_site=JURI::base();
$GLOBALS['mosConfig_live_site_site']=$mosConfig_live_site;

?>
<!-- Automatic Google Translator V2.3 by http://www.m-artini.co.cc. Visit site for more!!!-->


<?php

$bodytopmargin= $params->def('bodytopmargin');
$bodyleftmargin= $params->def('bodyleftmargin');
$bodyrightmargin= $params->def('bodyrightmargin');

$iefix= $params->def('iefix', '0');
$topframe= $params->def('topframe', '1');
$suggest= $params->def('suggest', '0');

$position = $params->def('position', 'normal');

$language = $params->def('language', 'tr');
$flag_tr = $params->def('flag_tr', 1);
$flag_en = $params->def('flag_en', 1);
$flag_ar = $params->def('flag_ar', 1);
$flag_bg = $params->def('flag_bg', 1);
$flag_zhCN = $params->def('flag_zhCN', 1);
$flag_zhTW = $params->def('flag_zhTW', 1);
$flag_hr = $params->def('flag_hr', 1);
$flag_cs = $params->def('flag_cs', 1);
$flag_da = $params->def('flag_da', 1);
$flag_nl = $params->def('flag_nl', 1);
$flag_fi = $params->def('flag_fi', 1);
$flag_fr = $params->def('flag_fr', 1);
$flag_tl = $params->def('flag_tl', 1);
$flag_de = $params->def('flag_de', 1);
$flag_el = $params->def('flag_el', 1);
$flag_iw = $params->def('flag_iw', 1);
$flag_hi = $params->def('flag_hi', 1);
$flag_id = $params->def('flag_id', 1);
$flag_it = $params->def('flag_it', 1);
$flag_ja = $params->def('flag_ja', 1);
$flag_ko = $params->def('flag_ko', 1);
$flag_lv = $params->def('flag_lv', 1);
$flag_lt = $params->def('flag_lt', 1);
$flag_no = $params->def('flag_no', 1);
$flag_pl = $params->def('flag_pl', 1);
$flag_pt = $params->def('flag_pt', 1);
$flag_ro = $params->def('flag_ro', 1);
$flag_ru = $params->def('flag_ru', 1);
$flag_sr = $params->def('flag_sr', 1);
$flag_sl = $params->def('flag_sl', 1);
$flag_es = $params->def('flag_es', 1);
$flag_sv = $params->def('flag_sv', 1);
$flag_uk = $params->def('flag_uk', 1);
$flag_vi = $params->def('flag_vi', 1);

$main_url = $_SERVER['HTTP_HOST'];
?>

<style type="text/css">

Body{
margin-top:<?php echo $bodytopmargin ?>px;
}

Body{
margin-left:<?php echo $bodyleftmargin ?>px;
}

Body{
margin-right:<?php echo $bodyrightmargin ?>px;
}
</style>


<?php if($iefix): ?>							<!-- other images will not be affected-->
<style type="text/css">
#agtalignnormal input{ behavior: url(<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/iepngfix.htc)
}
#agtaligntop input{ behavior: url(<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/iepngfix.htc)
}                 
#agtalignleft input{ behavior: url(<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/iepngfix.htc) } 
#agtalignright input{ behavior: url(<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/iepngfix.htc) } 
</style>
<?php endif; ?>

<?php if($topframe): ?>							
<script type="text/javascript">if (top.location != self.location)
{
	top.location.replace(self.location)
}
</script>
<?php endif; ?>


<?php if($suggest): ?>	
<style type="text/css">
div#google-infowindow{
visibility:hidden ;
}

.gmnoprint{
visibility:hidden;
}

div.SPRITE_close{
visibility:hidden !important;
}

span:hover{
background:none !important;
}

</style>
<?php endif; ?>



<script type="text/javascript">

function Translate(selectedlang) {
        if (location.hostname == '<?php echo $main_url; ?>' && selectedlang.value == '<?php echo $language; ?>|<?php echo $language; ?>')
                return;
        else if(location.hostname != '<?php echo $main_url; ?>' && selectedlang.value == '<?php echo $language; ?>|<?php echo $language; ?>')
                location.href = done('u');
        else if(location.hostname == '<?php echo $main_url; ?>' && selectedlang.value != '<?php echo $language; ?>|<?php echo $language; ?>')
                location.href = 'http://translate.google.com/translate_p?client=tmpg&hl=tr&langpair=' + selectedlang.value + '&u=' + location.href;
        else
                location.href = 'http://translate.google.com/translate_p?client=tmpg&hl=tr&langpair=' + selectedlang.value + '&u=' + done('u');
}


function done(name) {
        name = name.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]");

        var origURL = "[\?&]"+name+"=([^&#]*)";
        var orig = new RegExp(origURL);
        var results = orig.exec(location.href);

        if(results == null)
                return '';
        else
                return results[1];
}
</script>





<?php if($position==normal): ?>
<div align="center" id="agtalignnormal" >


<?php if($flag_en): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/english.png" value="<?php echo $language; ?>|en" OnClick="javascript:Translate(this);" title="English">
<?php endif; ?>

<?php if($flag_ar): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/arabic.png" value="<?php echo $language; ?>|ar" OnClick="javascript:Translate(this);" title="Arabic">
<?php endif; ?>
 
<?php if($flag_bg): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/bulgarian.png" value="<?php echo $language; ?>|bg" OnClick="javascript:Translate(this);" title="Bulgarian">
<?php endif; ?>

<?php if($flag_zhCN): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/chinese.png" value="<?php echo $language; ?>|zh-CN" OnClick="javascript:Translate(this);" title="Chinese Simplified">
<?php endif; ?>

<?php if($flag_zhTW): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/chinese.png" value="<?php echo $language; ?>|zh-TW" OnClick="javascript:Translate(this);" title="Chinese Traditional">
<?php endif; ?>

<?php if($flag_hr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/croatian.png" value="<?php echo $language; ?>|hr" OnClick="javascript:Translate(this);" title="Croatian">
<?php endif; ?>

<?php if($flag_cs): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/czech.png" value="<?php echo $language; ?>|cs" OnClick="javascript:Translate(this);" title="Czech">
<?php endif; ?>

<?php if($flag_da): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/danish.png" value="<?php echo $language; ?>|da" OnClick="javascript:Translate(this);" title="Danish">
<?php endif; ?>

<?php if($flag_nl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/dutch.png" value="<?php echo $language; ?>|nl" OnClick="javascript:Translate(this);" title="Dutch">
<?php endif; ?>

<?php if($flag_fi): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/finnish.png" value="<?php echo $language; ?>|fi" OnClick="javascript:Translate(this);" title="Finnish">
<?php endif; ?>

<?php if($flag_fr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/french.png" value="<?php echo $language; ?>|fr" OnClick="javascript:Translate(this);" title="French">
<?php endif; ?>

<?php if($flag_tl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/filipino.png" value="<?php echo $language; ?>|tl" OnClick="javascript:Translate(this);" title="Filipino">
<?php endif; ?>

<?php if($flag_de): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/german.png" value="<?php echo $language; ?>|de" OnClick="javascript:Translate(this);" title="German">
<?php endif; ?>

<?php if($flag_el): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/greek.png" value="<?php echo $language; ?>|el" OnClick="javascript:Translate(this);" title="Greek">
<?php endif; ?>

<?php if($flag_hi): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/hindi.png" value="<?php echo $language; ?>|hi" OnClick="javascript:Translate(this);" title="Hindi">
<?php endif; ?>

<?php if($flag_iw): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/hebrew.png" value="<?php echo $language; ?>|iw" OnClick="javascript:Translate(this);" title="Hebrew">
<?php endif; ?>

<?php if($flag_it): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/italian.png" value="<?php echo $language; ?>|it" OnClick="javascript:Translate(this);" title="Italian">
<?php endif; ?>

<?php if($flag_id): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/indonesian.png" value="<?php echo $language; ?>|id" OnClick="javascript:Translate(this);" title="Indonesian">
<?php endif; ?>

<?php if($flag_ja): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/japanese.png" value="<?php echo $language; ?>|ja" OnClick="javascript:Translate(this);" title="Japanese">
<?php endif; ?>

<?php if($flag_ko): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/korean.png" value="<?php echo $language; ?>|ko" OnClick="javascript:Translate(this);" title="Korean">
<?php endif; ?>

<?php if($flag_lv): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/latvian.png" value="<?php echo $language; ?>|lv" OnClick="javascript:Translate(this);" title="Latvian">
<?php endif; ?>

<?php if($flag_lt): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/lithuanian.png" value="<?php echo $language; ?>|lt" OnClick="javascript:Translate(this);" title="Lithuanian">
<?php endif; ?>

<?php if($flag_no): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/norwegian.png" value="<?php echo $language; ?>|no" OnClick="javascript:Translate(this);" title="Norwegian">
<?php endif; ?>

<?php if($flag_pl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/polish.png" value="<?php echo $language; ?>|pl" OnClick="javascript:Translate(this);" title="Polish">
<?php endif; ?>

<?php if($flag_pt): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/portuguese.png" value="<?php echo $language; ?>|pt" OnClick="javascript:Translate(this);" title="Portuguese">
<?php endif; ?>

<?php if($flag_ro): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/romanian.png" value="<?php echo $language; ?>|ro" OnClick="javascript:Translate(this);" title="Romanian">
<?php endif; ?>

<?php if($flag_ru): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/russian.png" value="<?php echo $language; ?>|ru" OnClick="javascript:Translate(this);" title="Russian">
<?php endif; ?>

<?php if($flag_es): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/spanish.png" value="<?php echo $language; ?>|es" OnClick="javascript:Translate(this);" title="Spanish">
<?php endif; ?>

<?php if($flag_sv): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/swedish.png" value="<?php echo $language; ?>|sv" OnClick="javascript:Translate(this);" title="Swedish">
<?php endif; ?>
     
<?php if($flag_sr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/serbian.png" value="<?php echo $language; ?>|sr" OnClick="javascript:Translate(this);" title="Serbian">
<?php endif; ?>

<?php if($flag_sl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/slovakian.png" value="<?php echo $language; ?>|sl" OnClick="javascript:Translate(this);" title="Slovakian">
<?php endif; ?>
     
<?php if($flag_uk): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/ukrainian.png" value="<?php echo $language; ?>|uk" OnClick="javascript:Translate(this);" title="Ukrainian">
<?php endif; ?>

<?php if($flag_vi): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/vietnamese.png" value="<?php echo $language; ?>|vi" OnClick="javascript:Translate(this);" title="Vietnamese">
<?php endif; ?>

</div>

<?php endif ?>


<?php if($position==top): ?>


<div align="center" style="width:100%; position:absolute; top:5px; left:0;" >
<div align="center" style=" width:970px; margin-left:20px;  ">
<div align="center" id="agtaligntop" >    

<?php if($flag_tr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/turkish.png" value="<?php echo $language; ?>|tr" OnClick="javascript:Translate(this);" title="Turkish">
<?php endif; ?>

<?php if($flag_en): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/english.png" value="<?php echo $language; ?>|en" OnClick="javascript:Translate(this);" title="English" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_ar): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/arabic.png" value="<?php echo $language; ?>|ar" OnClick="javascript:Translate(this);" title="Arabic" style="padding-right:2px;">
<?php endif; ?>
 
<?php if($flag_bg): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/bulgarian.png" value="<?php echo $language; ?>|bg" OnClick="javascript:Translate(this);" title="Bulgarian" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_zhCN): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/chinese.png" value="<?php echo $language; ?>|zh-CN" OnClick="javascript:Translate(this);" title="Chinese Simplified" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_zhTW): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/chinese.png" value="<?php echo $language; ?>|zh-TW" OnClick="javascript:Translate(this);" title="Chinese Traditional" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_hr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/croatian.png" value="<?php echo $language; ?>|hr" OnClick="javascript:Translate(this);" title="Croatian" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_cs): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/czech.png" value="<?php echo $language; ?>|cs" OnClick="javascript:Translate(this);" title="Czech" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_da): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/danish.png" value="<?php echo $language; ?>|da" OnClick="javascript:Translate(this);" title="Danish" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_nl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/dutch.png" value="<?php echo $language; ?>|nl" OnClick="javascript:Translate(this);" title="Dutch" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_fi): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/finnish.png" value="<?php echo $language; ?>|fi" OnClick="javascript:Translate(this);" title="Finnish" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_fr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/french.png" value="<?php echo $language; ?>|fr" OnClick="javascript:Translate(this);" title="French" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_tl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/filipino.png" value="<?php echo $language; ?>|tl" OnClick="javascript:Translate(this);" title="Filipino" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_de): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/german.png" value="<?php echo $language; ?>|de" OnClick="javascript:Translate(this);" title="German" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_el): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/greek.png" value="<?php echo $language; ?>|el" OnClick="javascript:Translate(this);" title="Greek" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_hi): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/hindi.png" value="<?php echo $language; ?>|hi" OnClick="javascript:Translate(this);" title="Hindi" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_iw): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/hebrew.png" value="<?php echo $language; ?>|iw" OnClick="javascript:Translate(this);" title="Hebrew" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_it): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/italian.png" value="<?php echo $language; ?>|it" OnClick="javascript:Translate(this);" title="Italian" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_id): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/indonesian.png" value="<?php echo $language; ?>|id" OnClick="javascript:Translate(this);" title="Indonesian" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_ja): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/japanese.png" value="<?php echo $language; ?>|ja" OnClick="javascript:Translate(this);" title="Japanese" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_ko): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/korean.png" value="<?php echo $language; ?>|ko" OnClick="javascript:Translate(this);" title="Korean" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_lv): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/latvian.png" value="<?php echo $language; ?>|lv" OnClick="javascript:Translate(this);" title="Latvian" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_lt): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/lithuanian.png" value="<?php echo $language; ?>|lt" OnClick="javascript:Translate(this);" title="Lithuanian" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_no): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/norwegian.png" value="<?php echo $language; ?>|no" OnClick="javascript:Translate(this);" title="Norwegian" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_pl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/polish.png" value="<?php echo $language; ?>|pl" OnClick="javascript:Translate(this);" title="Polish" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_pt): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/portuguese.png" value="<?php echo $language; ?>|pt" OnClick="javascript:Translate(this);" title="Portuguese" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_ro): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/romanian.png" value="<?php echo $language; ?>|ro" OnClick="javascript:Translate(this);" title="Romanian" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_ru): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/russian.png" value="<?php echo $language; ?>|ru" OnClick="javascript:Translate(this);" title="Russian" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_es): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/spanish.png" value="<?php echo $language; ?>|es" OnClick="javascript:Translate(this);" title="Spanish" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_sv): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/swedish.png" value="<?php echo $language; ?>|sv" OnClick="javascript:Translate(this);" title="Swedish" style="padding-right:2px;">
<?php endif; ?>
     
<?php if($flag_sr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/serbian.png" value="<?php echo $language; ?>|sr" OnClick="javascript:Translate(this);" title="Serbian" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_sl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/slovakian.png" value="<?php echo $language; ?>|sl" OnClick="javascript:Translate(this);" title="Slovakian" style="padding-right:2px;">
<?php endif; ?>
     
<?php if($flag_uk): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/ukrainian.png" value="<?php echo $language; ?>|uk" OnClick="javascript:Translate(this);" title="Ukrainian" style="padding-right:2px;">
<?php endif; ?>

<?php if($flag_vi): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/vietnamese.png" value="<?php echo $language; ?>|vi" OnClick="javascript:Translate(this);" title="Vietnamese" style="padding-right:2px;">
<?php endif; ?>
     

</div></div></div>
<?php endif; ?>

  

<?php if($position==left): ?>

<link rel="stylesheet" href="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/agtleft.css" type="text/css" media="screen" />
<div id="agtalignleft" >  

<?php if($flag_tr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/turkish.png" value="<?php echo $language; ?>|tr" OnClick="javascript:Translate(this);" title="Turkish">
<?php endif; ?>

<?php if($flag_en): ?>
<input type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/english.png" value="<?php echo $language; ?>|en" OnClick="javascript:Translate(this);" title="English">
<?php endif; ?>

<?php if($flag_ar): ?>
<input type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/arabic.png" value="<?php echo $language; ?>|ar" OnClick="javascript:Translate(this);" title="Arabic">
<?php endif; ?>
 
<?php if($flag_bg): ?>
<input type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/bulgarian.png" value="<?php echo $language; ?>|bg" OnClick="javascript:Translate(this);" title="Bulgarian">
<?php endif; ?>

<?php if($flag_zhCN): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/chinese.png" value="<?php echo $language; ?>|zh-CN" OnClick="javascript:Translate(this);" title="Chinese Simplified">
<?php endif; ?>

<?php if($flag_zhTW): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/chinese.png" value="<?php echo $language; ?>|zh-TW" OnClick="javascript:Translate(this);" title="Chinese Traditional">
<?php endif; ?>

<?php if($flag_hr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/croatian.png" value="<?php echo $language; ?>|hr" OnClick="javascript:Translate(this);" title="Croatian">
<?php endif; ?>

<?php if($flag_cs): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/czech.png" value="<?php echo $language; ?>|cs" OnClick="javascript:Translate(this);" title="Czech">
<?php endif; ?>

<?php if($flag_da): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/danish.png" value="<?php echo $language; ?>|da" OnClick="javascript:Translate(this);" title="Danish">
<?php endif; ?>

<?php if($flag_nl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/dutch.png" value="<?php echo $language; ?>|nl" OnClick="javascript:Translate(this);" title="Dutch">
<?php endif; ?>

<?php if($flag_fi): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/finnish.png" value="<?php echo $language; ?>|fi" OnClick="javascript:Translate(this);" title="Finnish">
<?php endif; ?>

<?php if($flag_fr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/french.png" value="<?php echo $language; ?>|fr" OnClick="javascript:Translate(this);" title="French">
<?php endif; ?>

<?php if($flag_tl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/filipino.png" value="<?php echo $language; ?>|tl" OnClick="javascript:Translate(this);" title="Filipino">
<?php endif; ?>

<?php if($flag_de): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/german.png" value="<?php echo $language; ?>|de" OnClick="javascript:Translate(this);" title="German">
<?php endif; ?>

<?php if($flag_el): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/greek.png" value="<?php echo $language; ?>|el" OnClick="javascript:Translate(this);" title="Greek">
<?php endif; ?>

<?php if($flag_hi): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/hindi.png" value="<?php echo $language; ?>|hi" OnClick="javascript:Translate(this);" title="Hindi">
<?php endif; ?>

<?php if($flag_iw): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/hebrew.png" value="<?php echo $language; ?>|iw" OnClick="javascript:Translate(this);" title="Hebrew">
<?php endif; ?>

<?php if($flag_it): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/italian.png" value="<?php echo $language; ?>|it" OnClick="javascript:Translate(this);" title="Italian">
<?php endif; ?>

<?php if($flag_id): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/indonesian.png" value="<?php echo $language; ?>|id" OnClick="javascript:Translate(this);" title="Indonesian">
<?php endif; ?>

<?php if($flag_ja): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/japanese.png" value="<?php echo $language; ?>|ja" OnClick="javascript:Translate(this);" title="Japanese">
<?php endif; ?>

<?php if($flag_ko): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/korean.png" value="<?php echo $language; ?>|ko" OnClick="javascript:Translate(this);" title="Korean">
<?php endif; ?>

<?php if($flag_lv): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/latvian.png" value="<?php echo $language; ?>|lv" OnClick="javascript:Translate(this);" title="Latvian">
<?php endif; ?>

<?php if($flag_lt): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/lithuanian.png" value="<?php echo $language; ?>|lt" OnClick="javascript:Translate(this);" title="Lithuanian">
<?php endif; ?>

<?php if($flag_no): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/norwegian.png" value="<?php echo $language; ?>|no" OnClick="javascript:Translate(this);" title="Norwegian">
<?php endif; ?>

<?php if($flag_pl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/polish.png" value="<?php echo $language; ?>|pl" OnClick="javascript:Translate(this);" title="Polish">
<?php endif; ?>

<?php if($flag_pt): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/portuguese.png" value="<?php echo $language; ?>|pt" OnClick="javascript:Translate(this);" title="Portuguese">
<?php endif; ?>

<?php if($flag_ro): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/romanian.png" value="<?php echo $language; ?>|ro" OnClick="javascript:Translate(this);" title="Romanian">
<?php endif; ?>

<?php if($flag_ru): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/russian.png" value="<?php echo $language; ?>|ru" OnClick="javascript:Translate(this);" title="Russian">
<?php endif; ?>

<?php if($flag_es): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/spanish.png" value="<?php echo $language; ?>|es" OnClick="javascript:Translate(this);" title="Spanish">
<?php endif; ?>

<?php if($flag_sv): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/swedish.png" value="<?php echo $language; ?>|sv" OnClick="javascript:Translate(this);" title="Swedish">
<?php endif; ?>
     
<?php if($flag_sr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/serbian.png" value="<?php echo $language; ?>|sr" OnClick="javascript:Translate(this);" title="Serbian">
<?php endif; ?>

<?php if($flag_sl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/slovakian.png" value="<?php echo $language; ?>|sl" OnClick="javascript:Translate(this);" title="Slovakian">
<?php endif; ?>
     
<?php if($flag_uk): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/ukrainian.png" value="<?php echo $language; ?>|uk" OnClick="javascript:Translate(this);" title="Ukrainian">
<?php endif; ?>

<?php if($flag_vi): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/vietnamese.png" value="<?php echo $language; ?>|vi" OnClick="javascript:Translate(this);" title="Vietnamese">
<?php endif; ?>
     </div>
<?php endif; ?>



<?php if($position==right): ?>

<link rel="stylesheet" href="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/agtright.css" type="text/css" media="screen" />
<div id="agtalignright" >  

<?php if($flag_tr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/turkish.png" value="<?php echo $language; ?>|tr" OnClick="javascript:Translate(this);" title="Turkish">
<?php endif; ?>

<?php if($flag_en): ?>
<input type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/english.png" value="<?php echo $language; ?>|en" OnClick="javascript:Translate(this);" title="English">
<?php endif; ?>

<?php if($flag_ar): ?>
<input type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/arabic.png" value="<?php echo $language; ?>|ar" OnClick="javascript:Translate(this);" title="Arabic">
<?php endif; ?>
 
<?php if($flag_bg): ?>
<input type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/bulgarian.png" value="<?php echo $language; ?>|bg" OnClick="javascript:Translate(this);" title="Bulgarian">
<?php endif; ?>

<?php if($flag_zhCN): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/chinese.png" value="<?php echo $language; ?>|zh-CN" OnClick="javascript:Translate(this);" title="Chinese Simplified">
<?php endif; ?>

<?php if($flag_zhTW): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/chinese.png" value="<?php echo $language; ?>|zh-TW" OnClick="javascript:Translate(this);" title="Chinese Traditional">
<?php endif; ?>

<?php if($flag_hr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/croatian.png" value="<?php echo $language; ?>|hr" OnClick="javascript:Translate(this);" title="Croatian">
<?php endif; ?>

<?php if($flag_cs): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/czech.png" value="<?php echo $language; ?>|cs" OnClick="javascript:Translate(this);" title="Czech">
<?php endif; ?>

<?php if($flag_da): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/danish.png" value="<?php echo $language; ?>|da" OnClick="javascript:Translate(this);" title="Danish">
<?php endif; ?>

<?php if($flag_nl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/dutch.png" value="<?php echo $language; ?>|nl" OnClick="javascript:Translate(this);" title="Dutch">
<?php endif; ?>

<?php if($flag_fi): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/finnish.png" value="<?php echo $language; ?>|fi" OnClick="javascript:Translate(this);" title="Finnish">
<?php endif; ?>

<?php if($flag_fr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/french.png" value="<?php echo $language; ?>|fr" OnClick="javascript:Translate(this);" title="French">
<?php endif; ?>

<?php if($flag_tl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/filipino.png" value="<?php echo $language; ?>|tl" OnClick="javascript:Translate(this);" title="Filipino">
<?php endif; ?>

<?php if($flag_de): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/german.png" value="<?php echo $language; ?>|de" OnClick="javascript:Translate(this);" title="German">
<?php endif; ?>

<?php if($flag_el): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/greek.png" value="<?php echo $language; ?>|el" OnClick="javascript:Translate(this);" title="Greek">
<?php endif; ?>

<?php if($flag_hi): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/hindi.png" value="<?php echo $language; ?>|hi" OnClick="javascript:Translate(this);" title="Hindi">
<?php endif; ?>

<?php if($flag_iw): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/hebrew.png" value="<?php echo $language; ?>|iw" OnClick="javascript:Translate(this);" title="Hebrew">
<?php endif; ?>

<?php if($flag_it): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/italian.png" value="<?php echo $language; ?>|it" OnClick="javascript:Translate(this);" title="Italian">
<?php endif; ?>

<?php if($flag_id): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/indonesian.png" value="<?php echo $language; ?>|id" OnClick="javascript:Translate(this);" title="Indonesian">
<?php endif; ?>

<?php if($flag_ja): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/japanese.png" value="<?php echo $language; ?>|ja" OnClick="javascript:Translate(this);" title="Japanese">
<?php endif; ?>

<?php if($flag_ko): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/korean.png" value="<?php echo $language; ?>|ko" OnClick="javascript:Translate(this);" title="Korean">
<?php endif; ?>

<?php if($flag_lv): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/latvian.png" value="<?php echo $language; ?>|lv" OnClick="javascript:Translate(this);" title="Latvian">
<?php endif; ?>

<?php if($flag_lt): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/lithuanian.png" value="<?php echo $language; ?>|lt" OnClick="javascript:Translate(this);" title="Lithuanian">
<?php endif; ?>

<?php if($flag_no): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/norwegian.png" value="<?php echo $language; ?>|no" OnClick="javascript:Translate(this);" title="Norwegian">
<?php endif; ?>

<?php if($flag_pl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/polish.png" value="<?php echo $language; ?>|pl" OnClick="javascript:Translate(this);" title="Polish">
<?php endif; ?>

<?php if($flag_pt): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/portuguese.png" value="<?php echo $language; ?>|pt" OnClick="javascript:Translate(this);" title="Portuguese">
<?php endif; ?>

<?php if($flag_ro): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/romanian.png" value="<?php echo $language; ?>|ro" OnClick="javascript:Translate(this);" title="Romanian">
<?php endif; ?>

<?php if($flag_ru): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/russian.png" value="<?php echo $language; ?>|ru" OnClick="javascript:Translate(this);" title="Russian">
<?php endif; ?>

<?php if($flag_es): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/spanish.png" value="<?php echo $language; ?>|es" OnClick="javascript:Translate(this);" title="Spanish">
<?php endif; ?>

<?php if($flag_sv): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/swedish.png" value="<?php echo $language; ?>|sv" OnClick="javascript:Translate(this);" title="Swedish">
<?php endif; ?>
     
<?php if($flag_sr): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/serbian.png" value="<?php echo $language; ?>|sr" OnClick="javascript:Translate(this);" title="Serbian">
<?php endif; ?>

<?php if($flag_sl): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/slovakian.png" value="<?php echo $language; ?>|sl" OnClick="javascript:Translate(this);" title="Slovakian">
<?php endif; ?>
     
<?php if($flag_uk): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/ukrainian.png" value="<?php echo $language; ?>|uk" OnClick="javascript:Translate(this);" title="Ukrainian">
<?php endif; ?>

<?php if($flag_vi): ?>
<input  type="image" src="<?php echo $mosConfig_live_site; ?>/modules/mod_agtranslatorv2/agtranslatorv2/vietnamese.png" value="<?php echo $language; ?>|vi" OnClick="javascript:Translate(this);" title="Vietnamese">
<?php endif; ?>

    </div> 
<?php endif; ?>