<h2>Результаты поиска</h2>
<small>Статьи открываются в новых окнах.</small>
<hr />
<?php if( !empty($results) ) { ?>

	<?php foreach($results as $page) { ?>
		<h3><a href="/page/<?php echo $page['url'] ?>" target="_blank"><?php echo $page['title'] ?></a></h3>
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

	<p>К сожалению, ничего не найдено</p>
	
<?php } ?>