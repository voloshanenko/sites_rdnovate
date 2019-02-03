<?php
$this->load->helper('tools');
$filter_vendor = ($this->session->userdata('fv'))?$this->session->userdata('fv'):-1;
?>
<div id="content">
	<div>
		<a href="/">Главная</a> / Каталог /
		<?php array_pop($path); foreach($path as $a) { ?>
			<?php echo $a['title']." / " ?>
		<?php } ?>
	</div>
	
	<?php $cont = file_get_contents(getcwd().'/textblocks/utabs.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>
	
	<h1><?=$content['category']['title']?></h1>
	
	<div id="category-descript">
		<?=$content['category']['cat_description']?>
		<div id="descr-shadow"></div>
	</div>
	
	<a href="#" id="show-hide-cat-description" class="open">развернуть</a>
	
	<?php if($content['items'] !== NULL) { ?>
	<div id="sort-box">
		Сортировать:
		<a href="/catalogue/sort/price/asc/<?=$content['category']['id']?>">Цена возрастает</a>,
		<a href="/catalogue/sort/price/desc/<?=$content['category']['id']?>">Цена убывает</a>,
		<a href="/catalogue/sort/title/asc/<?=$content['category']['id']?>">Имя А-Я</a>,
		<a href="/catalogue/sort/title/desc/<?=$content['category']['id']?>">Имя Я-А</a>
	</div>
		<?php if( (count($vendors)>0) AND ($vendors[0]['id']) ) {  ?>
		<div id="filter-box">
			<div class="filter-vendor">Производитель:</div>
			<?php foreach ($vendors as $vnd) { ?>
				<div class="filter-vendor">
				<a href="/catalogue/filter/<?=$vnd['id']?>/<?=$content['category']['id']?>" class="vendor_name"<?php echo($vnd['id']==$filter_vendor)?' style="font-weight:bold;"':'' ?>><?=$vnd['title']?></a>,
				<div class="vendor_info"><?=($vnd['description'])?$vnd['description']:'<p>Информации о производителе пока нет.</p>'?></div>
				</div>
			<?php } ?>
			<div class="filter-vendor">
				<a href="/catalogue/filter/-1/<?=$content['category']['id']?>">Все производители</a>
			</div>
		</div>
		<?php } ?>
	<?php } ?>
	<?php if($content['items'] === NULL) { ?>
		<div class="empty-cat"><i>Категория пуста</i></div>
	<?php } else { ?>
	
	<?php $this->load->helper('tools'); ?>
		<table cellpadding="0" cellspacing="0" id="goods-table">
		<?php foreach ($content['items'] as $row) { ?>
			<tr>
				<td width="60px" height="60px" class="product-image">
					<a href="<?=$row['image']?>">
						<img src="<?=_gen_thumb_img_name($row['image'])?>" border="0" alt="<?=$row['title']?>" title="<?=$row['title']?>" />
					</a>
				</td>
				<td>
					<big><strong><a href="/<?=$content['category']['url']?>/prod/<?=$row['url']?>"><?=$row['title']?></a></strong></big><br />
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
		<tr>
			<td colspan="8">
				<?php if($pagination_links) { ?>
					<div id="pagination">
						Страницы: <?php echo $pagination_links; ?>
					</div>
				<?php } ?>
			</td>
		</tr>
		<tr>
			<td colspan="8"> 
			<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="link" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,friendfeed"></div>
			</td>
		</tr>
		</table>
	<?php } ?>
	<?php $pwd = getcwd(); ?>
	<?php $cont = file_get_contents($pwd.'/textblocks/btabs.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>
	
	<?php $cont = file_get_contents($pwd.'/textblocks/ads_bottom.php'); ?>
	<?php if( $cont ) { ?>
		<div class="section">
			<div class="section-content">
				<?=$cont?>
			</div>
		</div>
	<?php } ?>
</div>