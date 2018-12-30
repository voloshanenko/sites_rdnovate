<?php

// This information has been pulled out of index.php to make the template more readible.
//
// This data goes between the <head></head> tags of the template
// 
// 

?>

<link rel="shortcut icon" href="<?php echo $this->baseurl; ?>/images/favicon.ico" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/light.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/typography.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->baseurl ?>/templates/system/css/system.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->baseurl ?>/templates/system/css/general.css" rel="stylesheet" type="text/css" />
<?php if($mtype=="moomenu" or $mtype=="suckerfish") :?>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/rokmoomenu.css" rel="stylesheet" type="text/css" />
<?php endif; ?>

	<script type="text/javascript">window.templatePath = '<?php echo JURI::base(); ?>';</script>
	<link href="<?php echo $this->baseurl; ?>/components/com_virtuemart/themes/vm_mynxx/theme.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo $this->baseurl; ?>/components/com_virtuemart/themes/vm_mynxx/theme.js"></script> 	

<style type="text/css">
	div.wrapper,#main-body-bg { <?php echo $template_width; ?>padding:0;}
	#main-body {
		background: <?php echo $main_body_bg; ?>;
	}
	#inset-block-left { width:<?php echo $leftinset_width; ?>px;padding:0;}
	#inset-block-right { width:<?php echo $rightinset_width; ?>px;padding:0;}
	#maincontent-block { margin-right:<?php echo $rightinset_width; ?>px;margin-left:<?php echo $leftinset_width; ?>px;}
	a, legend, #main-body ul.menu li a:hover, #main-body ul.menu li.parent li a:hover, #main-body ul.menu li.parent ul li.parent ul li a:hover, #main-body ul.menu li.active a, #main-body ul.menu li.parent li.active a, #main-body ul.menu li.parent li.parent li.active a, #main-body ul.menu li.cat-open a, #main-body ul.menu li.parent li.cat-open a, #main-body ul.menu li.parent li.parent li.cat-open a, .roktabs-wrapper .roktabs-links ul li.active span, .color h3 span, #vmMainPage span.catbar-text h3, div.pathway a {color: <?php echo $this->params->get( 'primaryColor' ); ?>;}
	.roktabs-wrapper .roktabs-links ul li.active span {border-top: 3px solid <?php echo $this->params->get( 'primaryColor' ); ?>;}
	.tabs-bottom .roktabs-links ul li.active span {border-bottom: 3px solid <?php echo $this->params->get( 'primaryColor' ); ?>;border-top: 0;}

	#page-bg {background: <?php echo $background;?> <?php if ($background_type): ?> url(<?php echo $this->baseurl;?>/templates/<?php echo $this->template?>/images/fon.gif)<?php endif; ?>; }

	/* styles for top menu*/
	#main-body #topbar {background: <?php echo $main_menu_base_background; ?>;}
	
	.sf-menu {
		margin: 0;
		float:none;
	}
	
	#topbar {
		background: <?php echo $main_menu_base_background; ?>;; 
		text-align: <?php echo $main_menu_alignment ?>;
	}
	
	.sf-menu a, .sf-menu a:visited  { /* visited pseudo selector so IE6 applies text colour*/
		color:			<?php echo $main_menu_font_color; ?>;
		font-family: 		<?php echo $main_menu_font; ?>;
		font-size: 		<?php echo $main_menu_font_size;?>px;
		padding-left:		<?php echo $main_menu_item_padding ?>px;
		padding-right:		<?php echo $main_menu_item_padding ?>px;
	}
	
	.sf-menu li {
		background:		<?php echo $main_menu_background; ?>;
	}
	.sf-menu li li {
		background:		<?php echo $main_menu_background; ?>;
	}
	.sf-menu li li li {
		background:		<?php echo $main_menu_background; ?>;
	}

	#round-corner-tbl  {
		background:		<?php echo $main_menu_background; ?>;
	}

	.sf-menu li:hover, .sf-menu a:hover {
		background:		<?php echo $main_menu_background_hover; ?>;
		outline:		0;
		text-decoration:	none;
	}
	
	.sf-menu li.first-child:hover a:hover {
		background:		<?php echo $main_menu_background_hover; ?> !important;
		outline:		0;
		text-decoration:	none;
	}
	
	.sf-menu li:hover > a:hover {
		color:			<?php echo $main_menu_font_color_hover; ?> !important;
	}
	
	.sf-menu #current > a, .sf-menu .active > a {
		background: <?php echo $main_menu_background_current; ?>;
		color: <?php echo $main_menu_font_color_current; ?>;
	}
	
	.side-mod h3.module-title div {
		font-family: <?php echo $module_header_font; ?>;
		color: <?php echo $module_header_font_color; ?> !important;
		font-size: <?php echo $module_header_font_size;?>px !important;
	}
	
	#right-col .side-mod h3.module-title {
		background-color: <?php echo $module_header_background_color ?>;
	}

	#left-col .side-mod h3.module-title {
		background-color: <?php echo $module_header_background_color ?>;
	}
	
	#left-col .side-mod h3.module-title div {
		line-height:18px;
		margin:2px <?php echo $left_module_header_padding_right ?>px 2px <?php echo $left_module_header_padding_left ?>px;
		text-align: <?php echo $left_module_header_alignment ?>;
	}
	
	#right-col .side-mod h3.module-title div  {
		line-height:18px;
		margin:2px <?php echo $right_module_header_padding_right ?>px 2px <?php echo $right_module_header_padding_left ?>px;
		text-align: <?php echo $right_module_header_alignment ?>;
	}
	
	#main-body ul.rokvm_categories li a {
		font-family: <?php echo $catalog_menu_font; ?>; 
		color: <?php echo $catalog_menu_font_color; ?> !important; 
		font-size: <?php echo $catalog_menu_font_size;?>px !important;
		cursor: pointer;
	}
	#main-body ul.menu li:hover > a, #main-body ul.menu li.active > .separator {
		background: <?php echo $catalog_menu_background_hover; ?> !important;
		color: <?php echo $catalog_menu_font_color_hover; ?> !important;
	}
	#main-body ul.menu li.active > a, #main-body ul.menu li.active > a {
		background: <?php echo $catalog_menu_background_current; ?> !important;
		color: <?php echo $catalog_menu_font_color_current; ?> !important;
	}

	.vmLinkMenu li a {
		font-family: <?php echo $catalog_menu_font; ?>; 
		color: <?php echo $catalog_menu_font_color; ?> !important; 
		font-size: <?php echo $catalog_menu_font_size;?>px !important;
		cursor: pointer;	
		text-decoration: none;	
	}

	.vmLinkMenu li:hover > a {
		color: <?php echo $catalog_menu_font_color_hover; ?> !important;		
	}

	.vmLinkMenu li.active > a {
		color: <?php echo $catalog_menu_font_color_current; ?> !important;	
	}

	.category-child-item a {
		font-weight:bold;
		font-family: <?php echo $subcategories_font; ?>; 
		color: <?php echo $subcategories_color; ?> !important; 
		font-size: <?php echo $subcategories_size;?>px !important;
		cursor: pointer;
	}

	.category-manufacturer-item {
		float: left;
		padding-right: 10px;
	}

	.category-manufacturer-item a {
		font-weight:bold;
		font-family: <?php echo $subcategories_font; ?>; 
		color: <?php echo $subcategories_color; ?> !important; 
		font-size: <?php echo $subcategories_size;?>px !important;
		cursor: pointer;
	}

	#main-body ul.rokvm_categories li a {background: <?php echo $catalog_menu_background; ?> url(<?php echo $template_path ?>/images/arrow.png) 5px 11px no-repeat; padding: 4px 0;}
	.ThemeOfficeMainItemHover,.ThemeOfficeMainItemActive {background: <?php echo $catalog_menu_background_hover; ?>;}
	#main-body ul.rokvm_categories li.active .separator {background: <?php echo $catalog_menu_background_current; ?>;}
	#main-body ul.rokvm_categories li.cat-open a {background: <?php echo $catalog_menu_background_current; ?>;}
	 div.poll, #leftcol div.poll {<?php echo $module_enabled_poll?'':'display: none !important;'; ?>}	
	 div.cart, #leftcol div.cart {<?php echo $module_enabled_cart?'':'display: none !important;'; ?>}	
	 div.search, #leftcol div.search {<?php echo $module_enabled_search?'':'display: none !important;'; ?>}	
	 div.latest_news {<?php echo $module_enabled_latest_news?'':'display: none !important;'; ?>}	
	 div.currency {<?php echo $module_enabled_currency?'':'display: none !important;'; ?>}	
	 div#banner {<?php echo $module_enabled_banner?'':'display: none !important;'; ?>}	
	 div.left_advert {<?php echo $module_enabled_left_advert?'':'display: none !important;'; ?>}	
	 div.right_advert {<?php echo $module_enabled_right_advert?'':'display: none !important;'; ?>}	
	 div.random_product {<?php echo $module_enabled_random_product?'':'display: none !important;'; ?>}	
	 div.top-3 {<?php echo $module_enabled_top?'':'display: none !important;'; ?>}	
	 div.mod_footer {<?php echo $module_enabled_footer?'':'display: none !important;'; ?>}	
	#mainmodules4.spacer.w49 .block {<?php echo $module_enabled_footer?'':'width: 98.6% !important'; ?>}
	.authorization .module-title, .authorization, .search .side-mod{ background: <?php echo $authorization_background; ?> !important; }
	div.authorization a {color: <?php echo $authorization_link_color; ?> !important; font-size: <?php echo $authorization_link_size;?>px !important; font-family: <?php echo $authorization_link_font; ?> !important;}
	div.authorization {color: <?php echo $authorization_text_color; ?> !important; font-size: <?php echo $authorization_text_size;?>px !important; font-family: <?php echo $authorization_text_font; ?> !important;}
	#main-content {background: <?php echo $content_background;?>;}
	.leftmenu {background: <?php echo $content_background;?>;}
	
	#left-col {
		border-right:2px solid <?php echo $border_color ?>;
	}

	#right-col {
		border-left:2px solid <?php echo $border_color ?>;
	}
	
	#right-col, #left-col, #main-col {
		border-top:2px solid <?php echo $border_color ?>;
	}
	<?php if($basket == 1) : ?>
		.vmCartModule .show-cart-button a {
			background:transparent url(<?php echo $template_path ?>/images/cart.png) no-repeat scroll 0 0;
			display:block;
			height:51px;
			margin:0 auto;
			width:51px;
		}
		.vmCartModule .show-cart-button a span {
			left:-5000px;
			position:absolute;
		}
	<?php endif ?>
	
	body {
		font-family:<?php echo $content_font;?>;
		color: <?php echo $content_font_color;?>;
		font-size:<?php echo $content_font_size.'px';?>;
	}

	.contentheading, a.contentpagetitle{
		text-align:<?php echo $content_header_alignment;?>;
		color: <?php echo $content_header_color;?>;
		font-size: <?php echo $content_header_size;?>px;
		font-family: <?php echo $content_header_font;?> !important;
	}
	
	a.contentpagetitle { text-decoration: none;}
	
	span.breadcrumbs a, span.breadcrumbs a:hover {
		color: <?php echo $content_header_color;?>;
	}

	a.readon {
		display:inline-block;
		width: 100%;
		text-align:<?php echo $content_details_alignment;?>;
		color: <?php echo $content_details_color;?>;
		font-size: <?php echo $content_details_size;?>px;
		font-family: <?php echo $content_details_font;?> !important;
	}

	a.thumbsup-title {
		color: <?php echo $content_header_color;?>;
		font-weight: bold;
	}

	.browse-page-block-inner >a, a.thumbsup-readmore {
		color: <?php echo $content_details_color;?>;
	}
	
	#footer-bg, #footer-right-bg, #footer-left-bg {
		background-color: <?php echo $footer_bg_color;?>;
	}
	
	#ct-ml, #ct-mm, #ct-mr {
		background-color: <?php echo $content_background;?>;
	}
</style>
<?php if (rok_isIe()) :?>
<!--[if IE 7]>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie7.css" rel="stylesheet" type="text/css" />	
<![endif]-->	
<?php endif; ?>
<?php if (rok_isIe(6)) :?>
<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/template_ie6.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/DD_belatedPNG.js"></script>
<script>
    DD_belatedPNG.fix('.png');
</script>
<![endif]-->
<?php endif; ?>
<?php if(rok_isIe(6) and $enable_ie6warn=="true" and $js_compatibility=="false") : ?> 
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/rokie6warn.js"></script> 
<?php endif; ?>

<?php if($mtype=="moomenu" and $js_compatibility=="false") :?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/rokmoomenu.js"></script>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/mootools.bgiframe.js"></script>
<script type="text/javascript">
window.onload = function () {
	jQuery("ul.sf-menu > li > a:first").css({'background-image': 'none'});
}
</script>
<?php endif; ?>
<?php if((rok_isIe(6) or rok_isIe(7)) and ($mtype=="suckerfish" or $mtype=="splitmenu")) :
  echo "<script type=\"text/javascript\" src=\"" . $this->baseurl . "/templates/" . $this->template . "/js/ie_suckerfish.js\"></script>\n";
endif; ?>
<!-- +++++++++++++++ frontbox head begin+++++++++++++++  -->
<link  href="/plugins/content/fboxbot/frontbox/fbox.css"  rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="/plugins/content/fboxbot/frontbox/fbox_conf.js"></script>
<script type="text/javascript" src="/plugins/content/fboxbot/frontbox/fbox_engine-min.js"></script>
<!-- +++++++++++++++ frontbox head end+++++++++++++++++  -->