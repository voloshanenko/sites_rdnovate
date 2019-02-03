<?php $this->load->helper('tools'); ?>
<?php
$this->load->config('site'); 
$allow_comments = ($this->config->item('allow_comments') == 1) ? true : $this->session->userdata('id');
?>
<div id="content">
	<div>
		<a href="/">Главная</a> / Каталог /
		<?php foreach($content['path'] as $a) { ?>
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

	<h1><?=$content['item']['title']?></h1>

	<div id="item-image">
		<div class="product-image">
			<a href="<?=$content['item']['image']?>">
				<img src="<?=_gen_thumb_img_name($content['item']['image'])?>" alt="<?=$content['item']['title']?>" title="<?=$content['item']['title']?>" />
			</a>
		</div>
	</div>

	<div id="item-descpirtion">

		<p>Код товара: <i><?=$content['item']['id']?></i>, производитель: <i><?=$content['item']['brand_name']?></i></p>
        <p><big><i><?=$content['item']['short_description']?></i></big></p>

		<div id="descr-item-price"><?=product_price($content['item']);?></div>
		<?php if($content['item']['exists']) { ?>
			<div id="item-to-cart">
				<strong>Заказать <?=$content['item']['title']?></strong><br />
				<div id="qty">
					Количество:&nbsp;&nbsp;&nbsp;
					<img src="/images/design/increase.gif" class="incr" /><span></span><input type="text" class="qty_<?=$content['item']['url']?>" value="1" /><span></span><img src="/images/design/decrease.gif" class="decr" />
					&nbsp;&nbsp;&nbsp;
					<a href="" onclick="order('qty_<?=$content['item']['url']?>');return false;">
						<img src="/images/design/add-to-cart.gif" alt="В корзину" />
					</a>
				</div>
			</div>
		<?php } else { ?>
			<div id="item-to-cart">На данный момент товара нет в наличии. Уточните дату поставки товара на склад у менеджера интернет-магазина.</div>
		<?php } ?>

	</div>

	<?php if ($content['item']['is_quest'] == 1) {?>
		<div id="item_is_quest">
			По данному товару проводятся маркетинговые исследования. Пожалуйста, оставьте Ваш отзыв. Нам очень важно Ваше мнение о товаре, о его востребованости и перспективах на рынке. Возможно, у Вас уже есть какие то объективные данные по работе с этим товаром или Вы можете сравнить его с другими альтернативными товарами (если таковые имеются) и т.д. -напишите нам об этом. Внесите свой вклад в цивилизованное развитие рынка. Спасибо!
		</div>
	<?php } ?>

	<div id="tabs">
			<ul>
				<li><a href="#tab1">О препарате</a></li>
				<li><a href="#tab2">Отзывы</a></li>
			</ul>
			<div id="tab1"><?=$content['item']['description']?></div>
			<div id="tab2">
				<h3>Отзывы</h3>
				<?php if( $allow_comments ) { ?>
					<form action="/catalogue/leavecomment" id="goods-сomments-form">
						<input type="hidden" name="user_id" value="<?=$this->session->userdata('id') ? $this->session->userdata('id') : ''?>" />
						<input type="hidden" name="good_id" value="<?=$content['item']['id']?>" />
						<p>
							<?php if($this->session->userdata('real_name')) { ?>
								Вы: <?=$this->session->userdata('real_name')?>
							<?php } else { ?>
								<table width="100%" border="0">
									<tr>
										<td width="50%">Ваше Ф. И. О.: <br /><input type="text" style="width: 276px" name="author_name" maxlength="60" /></td>
										<td>Ваш e-mail: <br /><input type="text" style="width: 276px" name="author_email" maxlength="100" /></td>
									</tr>
									<tr>
										<td colspan="2">Пару слов о себе (например, место жительства, возраст, род занятий или профессия, возможно другая интересная для читателей информация): <br /><input type="text" style="width: 563px" name="author_about" maxlength="100" /></td>
									</tr>
								</table>
							<?php } ?>
							<br /><textarea name="text" style="width: 562px; height: 70px"></textarea><br />
							<input type="submit" value="Отправить" />
						</p>
					</form>
				<?php } else {?>
					<p>Извините, но комментарии могут оставлять только авторизированные пользователи.</p>	
				<?php } ?>
				<hr />
				<?php if( !empty($feedbacks) ) { ?>
					<?php foreach($feedbacks as $f) { ?>
						<div class="feedback">
							<div class="feedback-sign">
								Отзыв от:
								<?php
								if($f['user_name']) { 
									echo $f['user_name'].'<br />('.$f['user_line'].', '.$f['user_from'].')'; 
								} else {
									echo $f['author_name'];
									if($f['author_about']) {
										echo "<br />($f[author_about])";
									} 
								}
								?>
							</div>
							<em><?=$f['text']?></em><br />
						</div>
					<?php } ?>
				<?php } else { ?>
					<p>Отзывов о препарате пока нет.</p>
				<?php } ?>
			</div>
	</div>

	<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="link" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,friendfeed"></div>
	

	<?php if($content['same'] !== NULL) { ?>
		<div id="related-items">
			<h3>Также в этой категории:</h3>
			<?php foreach ($content['same'] as $row) { ?>
			<div class="item-box">
				<strong><a href="/<?=$row['gcurl']?>/prod/<?=$row['url']?>"><?=$row['title']?></a></strong>
				<div class="top-item-img">
					<a href="/<?=$row['gcurl']?>/prod/<?=$row['url']?>">
						<img src="<?=_gen_thumb_img_name($row['image'])?>" border="0" alt="<?=$row['title']?>" title="<?=$row['title']?>" />
					</a>
				</div>
				<div class="top-item-price"><?=$row['price']?> грн</div>
			</div>
			<?php } ?>
		</div>
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