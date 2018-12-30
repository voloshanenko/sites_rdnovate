	<style>
		body,h1,h2,h3,h4,h5,h6,p,ul,ol,dl,input,textarea { font-family: <?php echo $font_face; ?>; }
		h1 { color: <?php echo $h1_color; ?>; }
		h2 { color: <?php echo $h2_color; ?>; }
		h3 { color: <?php echo $h3_color; ?>; }
		body { background-color: <?php echo $sides_background_color; ?>; }
		#wrapp { background: <?php echo $background_color; ?>; }
		a { color: <?php echo $links_color; ?>; }
		a:hover { color: <?php echo $links_color_hover; ?>; }
		#menu a, .menu-vertical a { color: <?php echo $main_menu_links_color; ?>;<?php echo($main_menu_font_italic==1)?' font-style: italic;':''?><?php echo($main_menu_font_bold==1)?' font-weight: bold;':''?> font-size: <?php echo $main_menu_font_size; ?>; font-family: <?php echo $main_menu_font_face; ?>; }
		#menu a:hover, .menu-vertical a:hover { color: <?=$main_menu_links_color_hover?>; }
		#left-col .accordion a, dl.accordion dt { color: <?=$catalogue_links_color?>; }
		#left-col dt.acc_zebra { background: <?=$catalogue_links_zebra_color?>; }
		dl.accordion a, dl.accordion dt { font-size: <?=$catalogue_links_font_size?>; }
		.browseProductContainer, .vmCartContainer, .product-review-form, .category-order-form { background: <?=$decor_color?>; }
		.module h3 span { font-size:<?=$module_title_font_size?>; color:<?=$module_title_color?>; }
	</style>