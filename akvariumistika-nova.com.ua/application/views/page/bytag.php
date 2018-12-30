<div id="content">
	
	<?php $cont = file_get_contents(getcwd().'/textblocks/utabs.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>
	
	<?php if( ! empty($content['pages']) ) { ?>
		<h3>По ключевому слову "<?=$tag?>" найдено:</h3>
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
	<?php } else { ?>
		<p>Увы, ничего не найдено...</p>
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