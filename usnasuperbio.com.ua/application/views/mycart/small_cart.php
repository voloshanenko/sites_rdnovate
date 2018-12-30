<div id="small-cart-wrap">
	<?php if(isset($mycart) AND !empty($mycart)) { $i = 1; ?>
	<table border="0" width="100%" class="minicart">
		<?php foreach ($mycart as $items) { $i++; ?>
		<tr class="mini-cart-row-<?=($i%2)?>">
			<td><?=$items['qty']?> x [<?=$items['code']?>] <strong><?=$items['name']?></strong></td>
			<td class="mini-cart-subtotal"><?=$items['subtotal']?> грн</td>
			<td class="mini-cart-del"><a href="" onclick="remove_from_cart('<?=$items['rowid']?>'); return false;"><img src="/images/design/delete-small.gif" alt="[x]" title="Удалить из корзины" /></a></td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="3" style="text-align: right"><big>Итого: <strong><?=number_format($this->cart->total(),2)?></strong> грн</big></td>
		</tr>
	</table>
	<a href="/mycart"><strong>Оформить заказ</strong></a>
	<?php } else { ?>
		<p>Ваша корзина пуста.</p>
	<?php } ?>
</div>