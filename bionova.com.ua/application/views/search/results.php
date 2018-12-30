<div id="content">
	
	<?php $cont = file_get_contents(getcwd().'/textblocks/utabs.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>
	
<?php if( ! $content ) { ?>
	<?php if ( ! $searchword ) { ?>
		<p>Уточните, пожалуйста, поисковый запрос.</p>
	<?php } else { ?>
		<p>Извините, по вашему запросу ничего не найдено</p>
	<?php } ?>
<?php } else { ?>
<?php $this->load->helper('tools'); ?>

	<h3>Результаты поиска</h3>
	<?php if($searchword) { ?>Вы искали: <strong><?=$searchword?></strong><?php } ?>
	<table cellpadding="0" cellspacing="0" id="goods-table">
	<?php foreach ($content as $row) { ?>
		<tr>
			<td width="60px" height="60px" class="product-image">
				<a href="<?=$row['image']?>">
					<img src="<?=_gen_thumb_img_name($row['image'])?>" border="0" alt="<?=$row['title']?>" title="<?=$row['title']?>" />
				</a>
			</td>
			<td>
				<big><strong><a href="/<?=$row['gcurl']?>/prod/<?=$row['url']?>"><?=$row['title']?></a></strong></big><br />
				<small class="is_gray">Код товара: <?=$row['id']?></small><br />
				<small class="is_gray"><?=$row['brand_name']?'Производитель: <strong>'.$row['brand_name'].'</strong>':'<i>Производитель не указан</i>';?></small>
				<?php if($row['is_quest']==1) { ?><br /><small class="is_orange">Проводятся маркетинговые исследования</small><?php } ?>
			</td>
			<td class="exists-column"><?php echo ($row["exists"])?'<img src="/images/design/exists.gif" alt="Есть в наличии" title="Есть в наличии" />':'<img src="/images/design/delete.gif" alt="Нет в наличии" title="Нет в наличии" />'?></td>
			<td class="price-column"><?=product_price($row);?></td>
			<?php if($row["exists"]) { ?>
			<td class="qty_column">
				<img src="/images/design/increase.gif" class="incr" /><br />
				<input type="text" class="qty_<?=$row['url']?>" style="width: 20px" value="1" /><br />
				<img src="/images/design/decrease.gif" class="decr" />
			</td>
			<td class="add_to_cart_column"><a href="" onclick="order('qty_<?=$row['url']?>');return false;"><img src="/images/design/add-to-cart.gif" alt="В корзину" /></a></td>
			<?php } else { ?>
			<td colspan="2" style="text-align: right"></td>
			<?php } ?>
		</tr>
		<tr>
			<td colspan="8" class="item-short-description">
			<?php if($row['short_description']) { ?>
				<div class="items-notes"><?=strip_tags($row['short_description'])?></div>
			<?php } ?>
			<?php if($row['tags']) { ?>
				<div>
					<?php $ts = explode(',', $row['tags']); foreach($ts as $t) { ?>
						<a class="items-tag" href="/search/tag/<?=$t?>"><?=$t?></a>
					<?php } ?>
				</div>
			<?php } ?>
			</td>
		</tr>
	<?php } ?>
	</table>
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
	<?php if( trim(strip_tags($cont))) { ?>
		<div class="section">
			<h3>Реклама</h3>
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>
</div>