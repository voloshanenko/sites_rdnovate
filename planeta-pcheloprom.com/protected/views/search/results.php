<h3 class="underlined">Результаты поиска</h3>
<ul class="text-to-left">
<?php foreach($search_results as $row) { ?>
	<li>
		<strong><a href="<?=$map[$section]['path'].$row[$map[$section]['key']]?>" target="_blank">
			<?=$row[$map[$section]['link_text']] ?>
		</a></strong>
		<?php if(isset($map[$section]['intro'])) { ?>
			<br />
			<span class="gray-font"><?=$row[$map[$section]['intro']]?></small>
		<?php }?>
	</li>
<?php } ?>
</ul>