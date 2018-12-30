<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );
define( 'YOURBASEPATH', dirname(__FILE__) );
require( YOURBASEPATH.DS."styles.php");
require( YOURBASEPATH.DS."rt_styleswitcher.php");
JHTML::_( 'behavior.mootools' );
global $template_real_width, $leftcolumn_width, $rightcolumn_width, $tstyle, $body_style;
global $js_compatibility, $menu_rows_per_column, $menu_columns, $menu_multicollevel;

$live_site        		= $mainframe->getCfg('live_site');
$template_path 			= $this->baseurl . '/templates/' .  $this->template;
$preset_style 			= $this->params->get("presetStyle", "dark-red");
$frontpage_component    	= $this->params->get("enableFrontpage", "show");
$enable_ie6warn         	= ($this->params->get("enableIe6warn", 0)  == 0)?"false":"true";
$font_family            	= $this->params->get("fontFamily", "mynxx");
$leftcolumn_width		= $this->params->get("leftcolumnWidth", "210");
$rightcolumn_width		= $this->params->get("rightcolumnWidth", "210");
$leftinset_width		= $this->params->get("leftinsetWidth", "180");
$rightinset_width		= $this->params->get("rightinsetWidth", "180");
$splitmenu_col			= $this->params->get("splitmenuCol", "rightcol");
$footer_bg_color		= $this->params->get("footer_bg_color", "#cccccc");
$border_color			= $this->params->get("border_color", "#cccccc");
$basket	 			= $this->params->get("basket", 1);
$menu_name 			= $this->params->get("menuName", "mainmenu");
$menu_type 			= $this->params->get("menuType", "moomenu");
$menu_rows_per_column   	= $this->params->get("menuRowsPerColumn");
$menu_columns          		= $this->params->get("menuColumns");
$menu_multicollevel     	= $this->params->get("menuMultiColLevel", 1);
$default_font 			= $this->params->get("defaultFont", "default");
$show_logo		 		= ($this->params->get("showLogo", 1)  == 0)?"false":"true";
$show_bottomlogo		= ($this->params->get("showBottomlogo", 1)  == 0)?"false":"true";
$show_homebutton		= ($this->params->get("showHomebutton", 1)  == 0)?"false":"true";
$show_textsizer		 	= ($this->params->get("showTextsizer", 1)  == 0)?"false":"true";
$show_cart		 		= ($this->params->get("showCart", 1)  == 0)?"false":"true";
$show_fontchanger		= ($this->params->get("showFontchanger", 1)  == 0)?"false":"true";
$show_copyright 		= ($this->params->get("showCopyright", 1)  == 0)?"false":"true";
$js_compatibility	 	= ($this->params->get("jsCompatibility", 0)  == 0)?"false":"true";



// moomenu options
$moo_bgiframe     		= ($this->params->get("moo_bgiframe'","0") == 0)?"false":"true";
$moo_delay       		= $this->params->get("moo_delay", "500");
$moo_duration    		= $this->params->get("moo_duration", "600");
$moo_fps          		= $this->params->get("moo_fps", "200");
$moo_transition   		= $this->params->get("moo_transition", "Sine.easeOut");

$moo_bg_enabled			= ($this->params->get("moo_bg_enabled","1") == 0)?"false":"true";
$moo_bg_over_duration		= $this->params->get("moo_bg_over_duration", "500");
$moo_bg_over_transition		= $this->params->get("moo_bg_over_transition", "Expo.easeOut");
$moo_bg_out_duration		= $this->params->get("moo_bg_out_duration", "600");
$moo_bg_out_transition		= $this->params->get("moo_bg_out_transition", "Sine.easeOut");

$moo_sub_enabled		= ($this->params->get("moo_sub_enabled","1") == 0)?"false":"true";
$moo_sub_opacity		= $this->params->get("moo_sub_opacity","0.95");
$moo_sub_over_duration		= $this->params->get("moo_sub_over_duration", "50");
$moo_sub_over_transition	= $this->params->get("moo_sub_over_transition", "Expo.easeOut");
$moo_sub_out_duration		= $this->params->get("moo_sub_out_duration", "600");
$moo_sub_out_transition		= $this->params->get("moo_sub_out_transition", "Sine.easeIn");
$moo_sub_offsets_top		= $this->params->get("moo_sub_offsets_top", "0");
$moo_sub_offsets_right		= $this->params->get("moo_sub_offsets_right", "1");
$moo_sub_offsets_bottom		= $this->params->get("moo_sub_offsets_bottom", "0");
$moo_sub_offsets_left		= $this->params->get("moo_sub_offsets_left", "1");

$main_menu_background_hover	= $this->params->get("main_menu_background_hover","#286794");
$main_menu_font_color_hover	= $this->params->get("main_menu_font_color_hover","#286794");
$main_menu_background_current	= $this->params->get("main_menu_background_current","#286794");
$main_menu_font_color_current	= $this->params->get("main_menu_font_color_current","#286794");
$main_menu_font			= $this->params->get("main_menu_font","Arial");
$main_menu_font_color		= $this->params->get("main_menu_font_color","#286794");
$main_menu_font_size		= $this->params->get("main_menu_font_size","12");
$main_menu_alignment		= $this->params->get("main_menu_alignment","left");
$main_menu_item_padding		= $this->params->get("main_menu_item_padding","30");

$module_header_font		= $this->params->get("module_header_font","Arial");
$module_header_font_color		= $this->params->get("module_header_font_color","#286794");
$module_header_font_size		= $this->params->get("module_header_font_size","12");
$module_header_background_color		= $this->params->get("module_header_background_color","#286794");
$left_module_header_alignment		= $this->params->get("left_module_header_alignment","right");
$right_module_header_alignment		= $this->params->get("right_module_header_alignment","left");
$left_module_header_padding_left	= $this->params->get("left_module_header_padding_left","12");
$left_module_header_padding_right	= $this->params->get("left_module_header_padding_right","12");
$right_module_header_padding_left	= $this->params->get("right_module_header_padding_left","12");
$right_module_header_padding_right	= $this->params->get("right_module_header_padding_right","12");

$catalog_menu_background		= $this->params->get("catalog_menu_background","#286794");
$catalog_menu_background_hover		= $this->params->get("catalog_menu_background_hover","#286794");
$catalog_menu_background_current		= $this->params->get("catalog_menu_background_current","#286794");
$catalog_menu_font			= $this->params->get("catalog_menu_font","Arial");
$catalog_menu_font_color		= $this->params->get("catalog_menu_font_color","#286794");
$catalog_menu_font_size		= $this->params->get("catalog_menu_font_size","12");
$catalog_menu_font_color_hover	= $this->params->get("catalog_menu_font_color_hover","#286794");
$catalog_menu_font_color_current= $this->params->get("catalog_menu_font_color_current","#286794");

$submit_button_background		= $this->params->get("submit_button_background","#286794");
$submit_button_background_hover		= $this->params->get("submit_button_background_hover","#286794");
$submit_button_background_current		= $this->params->get("submit_button_background_current","#286794");
$submit_button_font			= $this->params->get("submit_button_font","Arial");
$submit_button_font_color		= $this->params->get("submit_button_font_color","#286794");
$submit_button_font_size		= $this->params->get("submit_button_font_size","12");

$content_font			= $this->params->get("content_font","Arial");
$content_font_color		= $this->params->get("content_font_color","#286794");
$content_font_size		= $this->params->get("content_font_size","12");
$content_header_alignment		= $this->params->get("content_header_alignment","left");
$content_background		= $this->params->get("content_background","#28679");

$main_body_bg		= $this->params->get("main_body_bg","#FFFFFF");
$background		= $this->params->get("background","#286794");
$background_type	= $this->params->get("background_type","1");

$module_enabled_poll		= $this->params->get("module_enabled_poll","1");
$module_enabled_search		= $this->params->get("module_enabled_search","1");
$module_enabled_latest_news	= $this->params->get("module_enabled_latest_news","1");
$module_enabled_banner		= $this->params->get("module_enabled_banner","1");
$module_enabled_left_advert	= $this->params->get("module_enabled_left_advert","1");
$module_enabled_right_advert	= $this->params->get("module_enabled_right_advert","1");
$module_enabled_random_product	= $this->params->get("module_enabled_random_product","1");
$module_enabled_footer		= $this->params->get("module_enabled_footer","1");
$module_enabled_top		= $this->params->get("module_enabled_top","1");

$authorization_background	= $this->params->get("authorization_background","#286794");
$authorization_text_color	= $this->params->get("authorization_text_color","#286794");
$authorization_text_font	= $this->params->get("authorization_text_font","Arial");
$authorization_text_size	= $this->params->get("authorization_text_size","12");
$authorization_link_color	= $this->params->get("authorization_link_color","#286794");
$authorization_link_font	= $this->params->get("authorization_link_font","Arial");
$authorization_link_size	= $this->params->get("authorization_link_size","12");
	
$content_header_color	= $this->params->get("content_header_color","#286794");
$content_header_font	= $this->params->get("content_header_font","Arial");
$content_header_size	= $this->params->get("content_header_size","12");

$content_details_alignment	= $this->params->get("content_details_alignment","left");
$content_details_color		= $this->params->get("content_details_color","#286794");
$content_details_font		= $this->params->get("content_details_font","Arial");
$content_details_size		= $this->params->get("content_details_size","12");

$subcategories_color		= $this->params->get("subcategories_color","#B90D04");
$subcategories_font		= $this->params->get("subcategories_font","Arial");
$subcategories_size		= $this->params->get("subcategories_size","12");
					
require(YOURBASEPATH . "/rt_styleloader.php");
$multi = file_exists(YOURBASEPATH.'/images/menu_left.jpg') || file_exists(YOURBASEPATH.'/images/menu_right.jpg');
$decor = file_exists(YOURBASEPATH.'/images/content-decor-top.jpg') && file_exists(YOURBASEPATH.'/images/content-decor-bottom.jpg');
if ( !$this->countModules('left') && !$this->countModules('right') ) $cols = 0;
if ( $this->countModules('left') || $this->countModules('right') ) $cols = 1;
if ( $this->countModules('left') && $this->countModules('right') ) $cols = 2;
$cwidth = "1000px";
if($decor) {
	switch($cols) {
		case 0: $cwidth = "931px"; break;
		case 1: $cwidth = "742px"; break;
		case 2: $cwidth = "554px"; break;
	}
} else {
	switch($cols) {
		case 0: $cwidth = "990px"; break;
		case 1: $cwidth = "790px"; break;
		case 2: $cwidth = "590px"; break;
	}
}
// these must come below because the styles can be overloaded
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
	<head>
		<jdoc:include type="head" />
		<?php
			require (YOURBASEPATH . DS . "rt_utils.php");
			require (YOURBASEPATH . DS . "rt_head_includes.php");
		?>
	</head>
	<body id="page-bg" class="<?php echo $fontstyle; ?> <?php echo $tstyle; ?> <?php echo $body_style; ?> iehandle">

    <div id="wrapper">
        <div id="main-body">
           <table border="0" class="main-tbl" cellpadding="0" cellspacing="0">
                <tr>
                    <td id="header" colspan="3"><a href="/"><img src="<?php echo $template_path ?>/images/header.jpg" alt="" /></a></td>
                </tr>
				<tr>
					<td colspan="3">
						<table border="0" cellpadding="0" cellspacing="0" id="round-corner-tbl" width="1000px">
							<tr>
							<?php
							if($this->countModules('newsflash')) {
								if($multi)
									echo '<td align="right" width="30px"><img src="'.$template_path.'/images/menu_left.jpg" alt=""></td>';
							?>
							<td width="auto" id="main-menu"<? echo($multi)? '' : 'colspan="3"'?>><jdoc:include type="modules" name="newsflash" style="none" /></td>
							<?php
								if($multi)
									echo '<td align="left" width="30px"><img src="'.$template_path.'/images/menu_right.jpg" alt=""></td>';
							}
							?>
							</tr>
						</table>
					</td>
				</tr>
				<tr><td colspan="3"><div id="flags-div"><jdoc:include type="modules" name="user5" style="raw" /></div></td></tr>
				
				<tr> 
                    <?php if($this->countModules('left') || $this->countModules('random_prod ')) { ?>
                    <td id="left-col" width="190px"><jdoc:include type="modules" name="left" style="webstar" /><jdoc:include type="modules" name="random_prod" style="webstar" /></td>
                    <?php } ?>
                    
					<?php if($this->countModules('left') && $this->countModules('right') ) { ?>
                    <td id="main-col" width="620px">
					<?php } elseif ($this->countModules('left') || $this->countModules('right') ) {?>
					<td id="main-col" width="808px">
					<?php } elseif ( !$this->countModules('left') && !$this->countModules('right')) { ?>
					<td id="main-col" width="1000px">
					<?php } ?>
                        <?php if($this->countModules('breadcrumb')) { ?>
                        <div id="banner"><jdoc:include type="modules" name="breadcrumb" style="xhtml" /></div>
                        <?php } ?>
                        <div id="content">
                            <div id="content-wrapper">
								<jdoc:include type="component" />
							</div>
                        </div>
                    </td>
                    <?php if($this->countModules('right') || $this->countModules('random_prod ')) { ?>
                    <td id="right-col" width="190px"><jdoc:include type="modules" name="right" style="webstar" /><jdoc:include type="modules" name="random_prod" style="webstar" />
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td id="footer" colspan="3">
						<table border="0" cellpadding="0" cellspacing="0" id="round-corner-tbl">
							<tr>
<?php
$multi = file_exists(YOURBASEPATH.'/images/foot_left.jpg');
if($multi) {
	echo '<td align="right" width="20px" id="footer-left-bg"><img src="'.$template_path.'/images/foot_left.jpg" alt=""></td>';
}
?>
								<td id="footer-bg">
									<?php if($this->countModules('bottom') || $this->countModules('bottom2')) { ?>
									<div id="footer-left">
										<jdoc:include type="modules" name="bottom2" style="xhtml" />
										<jdoc:include type="modules" name="bottom" style="xhtml" />
									</div>
									<?php } ?>
									<div id="footer-right">
										Розробка та дизайн: <img src="/images/stories/ws_banner.png" alt="" align="middle" />
									</div>
								</td>
<?php
$multi = file_exists(YOURBASEPATH.'/images/foot_right.jpg');
if($multi) {
	echo '<td align="left" width="20px" id="footer-right-bg"><img src="'.$template_path.'/images/foot_right.jpg" alt=""></td>';
}
?>
							</tr>
						</table>
                    </td>
                </tr>  
            </table>
        </div>
    </div>
<jdoc:include type="modules" name="analytics" style="none" />
</body>
</html>