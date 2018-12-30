<div id="mainmenu">
	<ul>
		<li><a href="/"><span>Главная</span></a></li>
		<?php foreach ($arr as $item) { ?>
		<li><a href="/<?php echo $item['category_id'] > 0 ? 'pages/'.$item['category_id'] : 'page/'.$item['page_url'] ;?>"><span><?=$item['title']?></span></a></li>
		<?php } ?>
	</ul>
</div>