<div id="content">
	
	<?php $cont = file_get_contents(getcwd().'/textblocks/utabs.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?> 
	
	<div style="float: right; font-size: .9em;">
		Поиск:<br />
		<form id="search-pages-form" action="/page/make_search">
			<input type="text" id="word" name="word" value="" />
			<input type="submit" value="Искать" />
		</form>
	</div>
	<h1><?php echo $content['category']['caption']; ?></h1>
	
	<?php foreach($content['pages'] as $page) { ?>
		<h3><a href="/page/<?php echo $page['url'] ?>"><?php echo $page['title'] ?></a></h3>
		<div class="page-intro"><?=$page['intro']?></div>
		<?php if($page['tags']) { ?>
			<div class="page-tags">
				<?php $ts = explode(',', $page['tags']); foreach($ts as $t) { ?>
						<a class="items-tag" href="/pages/bytag/<?=$t?>"><?=$t?></a>
				<?php } ?>
			</div>
		<?php } ?>
	<?php } ?>
	
	<?php if($pagination_links) { ?>
		<div id="pagination">
			Страницы: <?php echo $pagination_links; ?>
		</div>
	<?php } ?>
	
	<?php $cont = file_get_contents(getcwd().'/textblocks/btabs.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>
	
	<?php $cont = file_get_contents(getcwd().'/textblocks/ads_bottom.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>
</div>