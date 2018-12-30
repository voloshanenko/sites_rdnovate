<!DOCTYPE PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<style>
			body { font-faily: Arial; }
			th { border-bottom: solid 1px #aaa; white-space: nowrap; padding: 4px; text-align: left; background: #DDDDDD; }
			td { border-bottom: solid 1px #aaa; padding: 4px; }
		</style>
	</head>
	<body>
		<h1>Заказ #<?=$id?> от <?=date('d.m.Y')?></h1>
		<p style="text-align: right">
		<?=file_get_contents(getcwd().'/textblocks/legal.php')?>
		</p>
		<hr>
		<h3>Состав заказа</h3>
		<table border="0" width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<th>Код товара</th>
				<th>Наименование</th>
				<th>Количество</th>
				<th style="text-align:right">Цена</th>
				<th style="text-align:right">Сумма</th>
			</tr>
			<?php foreach ($items as $itm) : ?>
			<tr>
				<td><?=$itm['code']?></td>
				<td><?=$itm['name']?></td>
				<td width="50px"><?=$itm['qty']?></td>
				<td style="text-align:right;"><?=$itm['price']?></td>
				<td style="text-align:right;"><?=$itm['subtotal']?> грн</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<h4>Общая стоимость: <?=$total?> грн.</h4>
		<hr>
			<h3>Доставка и оплата</h3>
			Способ доставки: <strong><?=$delivery?></strong><br>
			Способ оплаты: <strong><?=$payment?></strong>
		<hr>
		<h3>Информация о заказчике</h3>
		<table width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="300">Контактное лицо</td>
				<td><?=(isset($user) AND $user['name'])?$user['name']:''?></td>
			</tr>
			<tr>
				<td>Телефон</td>
				<td><?=(isset($user) AND $user['phone'])?$user['phone']:''?></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><?=(isset($user) AND $user['email'])?$user['email']:''?></td>
			</tr>
			<tr>
				<td>Адрес доставки (кроме самовывоза)</td>
				<td><?=(isset($user) AND $user['delivery_addr']) ? $user['delivery_index'].', '.$user['delivery_addr'] : ''?></td>
			</tr>
		</table>
		<hr>
		<h3>Коментарии к заказу</h3>
		<big><?=$comments?></big>
		<hr>
		<?=file_get_contents(getcwd().'/textblocks/order_text.php')?>
	</body>
</html>