<?php
	$font_face				= $this->params->get("font_face","Arial");
	$links_color				= $this->params->get("links_color","#0000FF");
	$links_color_hover			= $this->params->get("links_color_hover","#0000FF");
	$h1_color				= $this->params->get("h1_color","#000000");
	$h2_color				= $this->params->get("h2_color","#000000");
	$h3_color				= $this->params->get("h3_color","#000000");
	$decor_color				= $this->params->get("decor_color","#F6F7F8");
	
	$module_title_color			= $this->params->get("module_title_color","#000000");
	$module_title_font_size			= $this->params->get("module_title_font_size","1.3em");
	
	$main_menu_font_face			= $this->params->get("main_menu_font_face","Arial");
	$main_menu_font_size			= $this->params->get("main_menu_font_size","1.1em");
	$main_menu_font_bold			= $this->params->get("main_menu_font_bold","0");
	$main_menu_font_italic			= $this->params->get("main_menu_font_italic","0");
	$main_menu_links_color			= $this->params->get("main_menu_links_color","#FFFFFF");
	$main_menu_links_color_hover= $this->params->get("main_menu_links_color_hover","#FFFFFF");
	$main_menu_links_padding	= $this->params->get("main_menu_links_padding","2px 20px");
	
	$sides_background_color		= $this->params->get("sides_background_color","#cccccc");
	$background_color			= $this->params->get("background_color","Arial");
	$catalogue_links_color		= $this->params->get("catalogue_links_color","#0000FF");
	$catalogue_links_zebra_color= $this->params->get("catalogue_links_zebra_color","#FAFAFA");
	$catalogue_links_font_size	= $this->params->get("catalogue_links_font_size","1em");
	
	$currenturl = JURI::current();
	$qstring = $_SERVER['QUERY_STRING'];
	//echo $qstring;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<jdoc:include type="head" />
	<link rel="stylesheet" href="/templates/<?php echo $this->template ?>/css/template.css" />
	<?php require ("template_adjustments.php"); ?>
	<script src="http://code.jquery.com/jquery-1.4.4.js"></script>
	<script>
	$.noConflict();
	jQuery(document).ready(function($){
		jQuery(".sobi-menu li a").click(function(e){
			if( jQuery(this).parent().find('ul').length > 0 ) {
				e.preventDefault();
			}
			if( jQuery(this).parent().hasClass('hover-item') ) {
				jQuery(this).parent().removeClass('hover-item').find("ul:first").slideUp(333);
			} else { 
				jQuery(this).parent().addClass('hover-item').find("ul:first").slideDown(333);
			}
		});
	});
	</script>
</head>
<body>
	<div id="wrapp">
    	<div id="header">
			<a href="/">
				<img src="/templates/<?php echo $this->template ?>/images/header.jpg" border="0" alt="" title=""  />
        	</a>
        </div>
        <div id="menu"><jdoc:include type="modules" name="top" style="xhtml" /></div>
        <div id="content">
			
				<?php if ($this->countModules( 'left' ) && !$this->countModules( 'right' )) { ?>
				
					<div id="left-col"><jdoc:include type="modules" name="left" style="normal" /></div>
					<div id="main-col-wide">
						<div id="pathway"><jdoc:include type="modules" name="pathway" style="raw" /></div>
<? if($this->countModules( 'user1' )) {?>
<div class="search-box"><jdoc:include type="modules" name="user1" style="raw" /></div> <?php } ?><div class="box sysmessage"><jdoc:include type="message" /></div>
						<div class="content-box"><jdoc:include type="component" /></div>
<? if($this->countModules( 'user6' )) {?>
<jdoc:include type="modules" name="user6" style="raw" /><?php } ?>
					</div>
					
				<?php } elseif ($this->countModules( 'right' ) && !$this->countModules( 'left' )) { ?>
				
					<div id="main-col-wide">
						<div id="pathway"><jdoc:include type="modules" name="pathway" style="raw" /></div>
<? if($this->countModules( 'user1' )) {?>
<div class="search-box"><jdoc:include type="modules" name="user1" style="raw" /></div> <?php } ?><div class="box sysmessage"><jdoc:include type="message" /></div>
						<div class="content-box"><jdoc:include type="component" /></div>
<? if($this->countModules( 'user6' )) {?>
<jdoc:include type="modules" name="user6" style="raw" /><?php } ?>
					</div>
					<div id="right-col"><jdoc:include type="modules" name="right" style="normal" /></div>
					
				<?php } elseif ( !$this->countModules( 'right' ) && !$this->countModules( 'left' )) { ?>
				
					<div id="main-col-full-wide">
						<div id="pathway"><jdoc:include type="modules" name="pathway" style="raw" /></div>
<? if($this->countModules( 'user1' )) {?>
<div class="search-box"><jdoc:include type="modules" name="user1" style="raw" /></div> <?php } ?><div class="box sysmessage"><jdoc:include type="message" /></div>
						<div class="content-box"><jdoc:include type="component" /></div>
<? if($this->countModules( 'user6' )) {?>
<jdoc:include type="modules" name="user6" style="raw" /><?php } ?>
					</div>
					
				<?php } elseif ( $this->countModules( 'right' ) && $this->countModules( 'left' )) { ?>
				
					<div id="left-col"><jdoc:include type="modules" name="left" style="normal" /></div>
					<div id="main-col">
						<div id="pathway"><jdoc:include type="modules" name="pathway" style="raw" /></div>
<? if($this->countModules( 'user1' )) {?>
<div class="search-box"><jdoc:include type="modules" name="user1" style="raw" /></div> <?php } ?><div class="box sysmessage"><jdoc:include type="message" /></div>
						<div class="content-box"><jdoc:include type="component" /></div>
<? if($this->countModules( 'user6' )) {?>
<jdoc:include type="modules" name="user6" style="raw" /><?php } ?>
					</div>
					<div id="right-col"><jdoc:include type="modules" name="right" style="normal" /></div>
					
				<?php } ?>
        </div>
        <div id="footer">
        	<div id="copyright"><jdoc:include type="modules" name="copyrights" style="xhtml" /></div>
            <div id="studio-link">
				<jdoc:include type="modules" name="user3" style="xhtml" />
			</div>
			<div id="counters"><jdoc:include type="modules" name="counters" style="xhtml" /></div>
        </div>
    </div>
</body>
</html>