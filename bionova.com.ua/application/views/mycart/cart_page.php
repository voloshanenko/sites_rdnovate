<?php
	$this->load->helper('form');
	$this->load->helper('tools');
	$MyCart = $this->cart->contents();
	$this->config->load('site');
	$min_summ = $this->config->item('minimum_order_summ');
	$deliverys = explode(';', $this->config->item('delivery_variants'));
	$payments =  explode(';', $this->config->item('payments_variants'));
?>
<div id="content">
<h1>{page_h1}</h1>
<?php if($MyCart) { ?>
<h3>1. Состав Вашего заказа</h3>
<form action="/mycart/update" method="post" id="cart-form">
<!-- Таблица с заказанными товарами -->
<table class="full-cart" border="0">
	<tr>
		<th>Кол-во</th>
		<th colspan="2">Наименование</th>
		<th style="text-align:right">Цена</th>
		<th style="text-align:right">Итог</th>
		<th style="text-align:right">&nbsp;</th>
	</tr>
<?php $i = 1; ?>

<?php foreach ($MyCart as $items): ?>
	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
	<tr>
		<td class="qty_column">
			<img src="/images/design/increase.gif" class="incr" /><br />
			<?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '3')); ?><br />
			<img src="/images/design/decrease.gif" class="decr" />
		</td>
		<td width="50px">
			<img src="<?=_gen_thumb_img_name($items['pic'])?>" alt="" align="left" />
		</td>
		<td>
		<?php echo $items['name']; ?>
			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				</p>
			<?php endif; ?>
		</td>
		<td style="text-align:right;width:80px;"><?php echo $this->cart->format_number($items['price']); ?></td>
		<td style="text-align:right;width:80px;"><?php echo $this->cart->format_number($items['subtotal']); ?> грн</td>
		<td style="text-align:right;width:20px;">
			<a href="/mycart/rem/<?=$items['rowid']?>">
				<img src="/images/design/delete.gif" alt="Удалить" title="Удалить товар из корзины" />
			</a>
		</td>
	</tr>
<?php $i++; ?>
<?php endforeach; ?>
	<tr>
		<th colspan="3" class=""></th>
		<th style="text-align:right"><big><strong>Всего</strong></big></th>
		<th colspan="2" style="text-align:right"><big><?php echo $this->cart->format_number($this->cart->total()); ?> грн</big></th>
	</tr>
</table>

<button id="recalc-order" onclick="submitOrderForm();return false;">Пересчитать заказ</button>
<input type="hidden" id="goods_total" value="<?php echo $this->cart->format_number($this->cart->total()); ?>" />

<hr />

<?php if( $this->cart->total() > $min_summ ) { ?>
<h3>Выберите подходящий вариант доставки:</h3>
<?php if($deliverys) { ?>
	<ul class="clean">
	<?php foreach($deliverys as $k=>$v) { ?>
		<?php $a = explode('=', $v); ?>
		<li>
		    <input type="radio" name="delivery" id="deliv<?=$k?>" value="<?=$k?>" <?=($k==0)?'checked="checked"':''?> />
		    <label for="deliv<?=$k?>"><?=$a[0]?> <?=( $a[1]=='0' ) ? '' : '('.$a[1].' грн)'?></label>
		</li>
	<?php } ?>
	</ul>
<?php } ?>

<h3>Выберите подходящий вариант оплаты:</h3>
<?php if($payments) { ?>
	<ul class="clean">
	<?php foreach($payments as $k=>$v) { ?>
		<?php $a = explode('=', $v); ?>
		<li>
		    <input type="radio" name="payment" id="pay<?=$k?>" value="<?=$k?>" <?=($k==0)?'checked="checked"':''?> />
		    <label for="pay<?=$k?>"><?=$a[0]?> <?=( $a[1]=='0' ) ? '' : '('.$a[1].' грн)'?></label>
	    </li>
	<?php } ?>
	</ul>
<?php } ?>

<div class="info-msg"><strong>Примечание</strong>: все цены на товар на сайте указаны на условиях самовывоза. В общую стоимость заказанного Вами товара не включены 
затраты на доставку товара. Стоимость доставки клиент оплачивает самостоятельно. Информацию об условиях доставки смотрите на 
сайте во вкладке: "Условия: Способы доставки"</div>

<!-- / таблица с заказанными товарами -->
<?php } ?>
<?php if( $this->cart->total() < $min_summ ) {
	echo "<div class=\"big-error-msg\">Извините, но покупка не возможна,<br />так как минимальная сумма заказа составляет $min_summ грн.</div>";
} ?>

</form>

<br />
<?php if( ! $auth ) { ?>
	<div class="info-msg">
	    <big>Для завершения заказа, пожалуйста, <strong><a id="open-register" href="">зарегистрируйтесь</a></strong> или авторизируйтесь.</big>
	    <br /><br />
        Это нужно для того, что бы мы смогли связаться с Вами после того, как заказ 
        поступит к нам и что бы Вы могли отслеживать состояние Ваших заказов. 
        Регистрация не сложная и занимаем всего 30 секунд.
	</div>
<?php } else { ?>

<h3>2. Ваши контактные данные</h3>

<div id="registration-form">
	<table>
		<tr>
			<td class="user-info-caption">Логин:</td>
			<td><?=$user['login']?></td>
		</tr>
		<tr>
			<td class="user-info-caption">E-mail:</td>
			<td><?=$user['email']?></td>
		</tr>
		<tr>
			<td class="user-info-caption">Контактное лицо:</td>
			<td><?=$user['name']?></td>
		</tr>
		<tr>
			<td class="user-info-caption">Контактный телефон:</td>
			<td><?=$user['phone']?></td>
		</tr>
		<tr>
			<td class="user-info-caption">Адрес доставки (кроме самовывоза):</td>
			<td>
			    <?=$user['delivery_index'] ? $user['delivery_index'].', ' : ''?>
			    <?=$user['delivery_addr']?>
			</td>
		</tr>
	</table>
	Нашли неточность? <a href="/user/cabinet">Изменить</a>.
</div>
<br />
<?php if( $this->cart->total() > $min_summ ) { ?>
	<h3>3. Комментарии к заказу</h3>
	<textarea name="comments" id="comments-box" style="width: 100%; height: 50px"></textarea>
	<div id="complete-order-wrapp">
		<a href="" id="complete-order">Совершить заказ</a>
	</div>
<?php } ?>
<?php } ?>
<?php } else { ?>
	<p>Ваша корзина пуста.</p>
<?php } ?>
</div>