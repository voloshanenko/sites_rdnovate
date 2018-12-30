<div class="container">
	<h1>{page_h1}</h1>
	<div style="text-align: right"><a href="/" target="_blank">Перейти на сайт</a></div>
	<div class="tools-bar">
		<a href="/admin/">Главная страница "админки"</a>
		<?php
			$superadmin = $this->session->userdata('r') == 'superadmin';
			$admin = $this->session->userdata('r') == 'admin';

			$this->load->config('acl');

			$acl = $this->config->item( 'acl_' . $this->session->userdata('r') );
			$acl_arr = explode(',', $acl);
			
			$pages = $this->config->item('acl_pages');
			$pgs_arr = explode(',', $pages);
			
			foreach($acl_arr as $possible)
			{
				if( in_array($possible, $pgs_arr) )
				{
					$label = $this->config->item( 'mt_' . $possible );
					echo ' | <a href="/admin/items/' . $possible . '/0/">' . $label . '</a>';
				}
			}
		?>
	</div>
	<div class="tools-bar">
		<div class="tools-button" id="back">
			<a href="/admin">На главную</a>
		</div>
	</div>
	<div id="admin_table">
		<table width="100%" border="0">
			<tr>
				<th>№</th>
				<th>Дата и время заказа</th>
				<th>Заказчик</th>
				<th>Состав заказа</th>
				<th>Сумма</th>
				<th>Доставка / оплата</th>
				<th>Комментарий</th>
				<th>Статус заказа</th>
				<?php if($superadmin OR $admin) { ?>
					<th>Удалить</th>
				<?php } ?>
			</tr>
			<tr>
				<td colspan="10">
					<?=$pagination_links?>
				</td>
			</tr>
			<?php foreach($orders as $item) { ?>
			<tr>
				<td><?=$item['id']?></td>
				<td><?=$item['date']?></td>
				<td>
					<?=isset($item['user']['name'])?$item['user']['name']:'Имя не известно.'?>
					<br />
					<small>
						<?=isset($item['user']['phone'])?$item['user']['phone']:'Телефон не указан'?>
						<br />
						<?php if(isset($item['user']['email'])) { ?>
						<a href="mailto:<?=$item['user']['email']?>"><?=$item['user']['email']?></a>
						<?php } ?>
					</small>
				</td>
				<td><?=short_product_list($item['products'])?></td>
				<td><big><?=number_format($item['summ'], 2)?></big></td>
				<td>
					Доставка: <?=$item['delivery']?><br />
					Адрес доставки: <?=isset($item['user']['delivery_addr'])?$item['user']['delivery_addr']:'не указан'?><br />
					Оплата: <?=$item['payment']?>
				</td>
				<td><?=$item['comments']?></td>
				<td><?=status_list($item['id'], $item['status'])?></td>
				<?php if($superadmin OR $admin) { ?>
					<td style="text-align: center"><a href="/orders/del/<?=$item['id']?>"><img src="/images/design/delete.gif" /></a></td>
				<?php } ?>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="10">
					<?=$pagination_links?>
				</td>
			</tr>
		</table>
	</div>
<?php
function short_product_list($row)
{
	echo '<ul>';
	foreach ($row as $k => $v)
	{
		echo '<li>'.((isset($v['code'])) ? '[Код: '.$v['code']."]" : '').'<strong>' . $v['name'] . '</strong><br /><small>x ' . $v['qty'] . ' = ' . $v['subtotal'] . 'грн</small></li>';
	}
	echo '</ul>';
}
function status_list($id, $status)
{
	$status_list = array('Новый','Обрабатывается','Отгружен','Доставлен','Долг','Закрыт');
	echo '<select size="1" id="'.$id.'" class="order_status_list">';
	foreach ($status_list as $k=>$v)
	{
		echo '<option value="'.$k.'"';
		echo ($status == $k) ? ' selected="selected"' : '';
		echo '>'.$v.'</option>';
	}
	echo '</select>';
}