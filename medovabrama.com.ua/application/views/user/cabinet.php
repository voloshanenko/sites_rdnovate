<?php $this->load->helper('form_helper'); ?>
<div id="content">
	<h1>{page_h1}</h1>
	<h3>Мои данные</h3>
	<form id="registration-form" action="/user/update" method="post">
		<input type="hidden" name="id" value="<?=$user['id']?>" />
		<table>
			<tr>
				<td class="user-info-caption">Логин:</td>
				<td><input type="text" name="login" value="<?=$user['login']?>" /><br /><?=form_error('login')?></td>
				<td><small>Логин может состоянить только из латинских символов, цифр, знака подчеркивания и точки и иметь длину от 4 до 15 символов</small></td>
			</tr>
			<tr>
				<td class="user-info-caption">Пароль:</td>
				<td><input type="password" name="password" value="" /><br /><?=form_error('password')?></td>
				<td><small>Парль может состоянить только из латинских символов, цифр, знака подчеркивания и точки и иметь длину от 4 до 15 символов</small></td>
			</tr>
			<tr>
				<td class="user-info-caption">E-mail:</td>
				<td><input type="text" name="email" value="<?=$user['email']?>" /><br /><?=form_error('email')?></td>
				<td><small>E-mail требуется только для того, что бы с Вами смогли связаться в дальнейшем</small></td>
			</tr>
			<tr>
				<td class="user-info-caption">Контактное лицо:</td>
				<td><input type="text" name="name" value="<?=$user['name']?>" /><br /><?=form_error('name')?></td>
				<td><small>Укажите, пожалуйста, Ваше имя, фамилию и отчество полностью</small></td>
			</tr>
			<tr>
				<td class="user-info-caption">Контактный телефон:</td>
				<td><input type="text" name="phone" value="<?=$user['phone']?>" /><br /><?=form_error('phone')?></td>
				<td><small>Укажите, пожалуйста, контактный телефон для уточнения нюансов по заказу</small></td>
			</tr>
            <tr>
                <td class="user-info-caption">Куда и чем доставлять:</td>
                <td><textarea name="delivery_addr" cols="63" rows="3"><?php echo (isset($delivery_addr)) ? $delivery_addr : '' ?></textarea></td>
                <td><small>Требуется в случае, если Вы будете заказывать доставку товара</small></td>
            </tr>
				<td colspan="3">
					<input type="submit" value="Сохранить" />
				</td>
			</tr>
		</table>
	</form>
	<?php if (isset($orders)) { ?>
	<h3>Мои заказы</h3>
	<table width="100%" border="0" id="user_orders_list">
		<tr>
			<th>Номер заказа</th>
			<th>Дата и время заказа</th>
			<th>Состав заказа</th>
			<th>Сумма</th>
			<th>Статус заказа</th>
		</tr>
		<?php foreach($orders as $item) { ?>
		<tr>
			<td><?=$item['id']?></td>
			<td><?=$item['date']?></td>
			<td><?=short_product_list($item['products'])?></td>
			<td><big><?=number_format($item['summ'], 2)?></big></td>
			<td><?=status_list($item['id'], $item['status'])?></td>
		</tr>
		<?php } ?>
	</table>
	<?php } ?>
</div>
<?php
function short_product_list($row)
{
	echo '<ul>';
	foreach ($row as $k => $v)
	{
		echo '<li><strong>' . $v['name'] . '</strong><br /><small>x ' . $v['qty'] . ' = ' . $v['subtotal'] . 'грн</small></li>';
	}
	echo '</ul>';
}
function status_list($id, $status)
{
	$status_list = array('Новый','Обрабатывается','Отгружен','Доставлен','Долг','Отменен','Успешно закрыт');
	foreach ($status_list as $k=>$v)
	{
		if ($status == $k)
		{
			echo $v;
		}
	}
}