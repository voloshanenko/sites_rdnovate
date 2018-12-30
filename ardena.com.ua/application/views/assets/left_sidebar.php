<div id="catalogue_menu_bar">
	<div class="section">
		<h3>Каталог</h3>
		<div class="section-content">
			<?php echo $catalogue_menu; ?>
		</div>
	</div>
	<div class="section" id="news">
		<h3>Новости</h3>
		<div class="section-content">
			<?php echo $news_box; ?>
		</div>
	</div>
	<div class="section">
		<h3>Это интересно</h3>
		<div class="section-content">
			<?php echo $shout; ?>
		</div>
	</div>
	<?php $cont = file_get_contents(getcwd().'/textblocks/ads_left.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>
</div>