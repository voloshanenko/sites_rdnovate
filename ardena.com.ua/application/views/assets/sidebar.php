		<div id="sidebar">
			<div class="section">
				<h3>Авторизация</h3>
				<div class="section" id="section-login">
					<?php if ( ! $this->session->userdata('id')) { ?>
					<form method="post" action="/user/login">
						<table>
							<tr>
								<td width="70px">Логин:</td>
								<td><input type="text" name="login" style="width: 120px" /></td>
							</tr>
							<tr>
								<td>Пароль:</td>
								<td><input type="password" name="password" style="width: 120px" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><input type="submit" value="Войти" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>
									<a id="open-register" href="">Регистрация</a>
									<br />
									<a href="/user/remind">Забыли пароль?</a>
								</td>
							</tr>
						</table>
					</form>
					<?php } else { ?>
						Здравствуйте, <?=$this->session->userdata('real_name')?>
						<?php if( $this->session->userdata('real_name') == 'Администратор' ) { ?>
							<br /><a href="/admin">Администрация</a>
						<?php } else { ?>
							<br /><a href="/user/cabinet">Личный кабинет</a>
						<?php } ?>
						<br />
						<a href="/user/logout">Выйти</a>
					<?php } ?>
				</div>
			</div>
			<div class="section">
				<h3>Корзина</h3>
				<div class="section-content" id="small-cart">
					<?php $mycart = $this->cart->contents(); ?>
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
								<td colspan="3" style="text-align: right"><big>Итого: <strong><?=number_format($this->cart->total())?></strong> грн</big></td>
							</tr>
						</table>
						<a href="/mycart"><strong>Оформить заказ</strong></a>
						<?php } else { ?>
							<p>Ваша корзина пуста.</p>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="section">
				<h3>Есть вопросы?</h3>
				<div class="section-content">
					<a href="" onclick="open_ask_window();return false;">Задайте их нашим специалистам!</a>
					<?=file_get_contents(getcwd().'/textblocks/consultant.php')?>
				</div>
			</div>
			<div class="section">
				<h3>Звоните нам</h3>
				<div class="section-content">
				<?=file_get_contents(getcwd().'/textblocks/partners.php')?>
				</div>
			</div>
			<?php if( isset($scroll_ads) AND !empty($scroll_ads) ) { ?>
				<div class="section">
					<h3>Скидки и Акции</h3>
					<marquee direction="up" behavior="scroll" truespeed="truespeed" scrolldelay="50" scrollamount="1" style="width:100%;height:160px;border-bottom:solid 1px #ccc;" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 1, 0);">
					<?php foreach ($scroll_ads as $ad) { ?>
						<strong><a href="/page/<?=$ad['url'] ?>/"><?=$ad['title'] ?></a></strong><br />
						<?=$ad['intro'] ?>
						<hr />
					<?php } ?>
					</marquee>
				</div>
			<?php } ?>
			<?php if(isset($scroll_feedbacks) AND !empty($scroll_feedbacks)) { ?>
				<div class="section">
					<h3>Отзывы и комментарии</h3>
					<marquee direction="up" behavior="scroll" truespeed="truespeed" scrolldelay="50" scrollamount="1" style="width:100%;height:160px;border-bottom:solid 1px #ccc;" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 1, 0);">
					<?php foreach ($scroll_feedbacks as $f) { ?>
						<?php if($f['c_type'] == 'fb') { ?>
						<p>
							Отзыв о "<strong><a href="/<?=$f['gcurl']?>/prod/<?=$f['url']?>"><?=$f['title']?></a></strong>"<br />
							<em><?=$f['text']?></em><br />
							<small style="color: #777">
								<?php if( $f['author_name'] ) { ?>
									<?=$f['author_name']?><br /><?=$f['author_about']?>
								<?php } else if ($f['user_name']) { ?>
									<?=$f['user_name']?><br />
									<?=$f['user_line']?>, <?=$f['user_from']?>
								<?php } else { ?>
									Автор не известен.
								<?php } ?>
							</small>
						</p>
						<?php } ?>
						<?php if($f['c_type'] == 'cm') { ?>
						<p>
							<strong style="color: #555">Комментарий к "<a href="/page/<?=$f['page_url']?>"><?=$f['title']?></a>"</strong><br />
							<em><?=$f['text']?></em><br />
							<small style="color: #777">
								от
								<?php if( $f['author_name'] ) { ?>
									:<?=$f['author_name']?><br /><?=$f['author_about']?>
								<?php } else if ($f['user_name']) { ?>
									:<?=$f['user_name']?><br /><?=$f['user_line']?><br /><?=$f['user_from']?>
								<?php } else { ?>
									анонима
								<?php } ?>
							</small>
						</p>
						<?php } ?>
						<hr /> 
					<?php } ?>
					</marquee>
				</div>
			<?php } ?>
			<?php $cont = file_get_contents(getcwd().'/textblocks/ads_right.php'); ?>
			<?php if($cont) { ?>
				<div class="section">
					<div class="section-content">
						<?=$cont?>
					</div>
				</div>
			<?php } ?>
		</div>
