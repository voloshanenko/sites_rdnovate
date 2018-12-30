<div class="container">
	<h1>{page_h1}<a href="/" target="_blank">Перейти на сайт</a></h1>
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
	<?php if($superadmin OR $admin) { ?>
		<hr />
		<h2>Экспорт / импорт</h2>
		<table border="0" width="100%">
			<tr>
				<td width="50%">
					<a href="/admin/get_csv/goods">Экспортировать товары в Excel</a><br />
					<a href="/admin/get_csv/orders">Экспортировать заказы в Excel</a><br />
                    <a href="/admin/get_csv/comments">Экспортировать отзывы</a><br />
                    <a href="/admin/get_csv/feedbacks">Экспортировать комментарии</a><br />
                    <a href="/admin/get_csv/pages">Экспортировать страницы</a><br />
				</td>
				<?php if($superadmin) { ?>
				<td>
					<form action="/admin/uploadcsv" enctype="multipart/form-data" method="post">
						Выберите файл для импорта:
						<input type="file" size="40" name="userfile" />
						<input type="submit" value="Загрузить" />
					</form>
				</td>
				<?php } ?>
			</tr>
		</table>
	<?php } ?>
	<?php if($superadmin OR $admin) { ?>
		<hr />
		<h2>Реестр настроек</h2>
		<small><i>При вставке и загрузке изображений, старайтесь не использовать в названии картинки или папки, в которой она находится, такие слова или части слов как "ads", "reklama", "banner". Иначе, могут возникнуть проблемы из-за работы анти-спама и фильтров реакламы.</i></small>
		<div id="tabs">
			<ul>
				<li><a href="#tab1">Общие настройки</a></li>
				<li><a href="#tab2">Юр. инфо-я</a></li>
				<li><a href="#tab3">Письмо заказа</a></li>
				<li><a href="#tab4">Блок контактов</a></li>
				<li><a href="#tab5">Копирайты</a></li>
				<li><a href="#tab6">Реклама (слева)</a></li>
				<li><a href="#tab7">Реклама (справа)</a></li>
				<li><a href="#tab8">Реклама (снизу)</a></li>
				<li><a href="#tab9">Реклама (над спец.пред.)</a></li>
				<li><a href="#tab10">Реклама (под спец.пред.)</a></li>
				<li><a href="#tab11">Кто консультирует</a></li>
			</ul>
			<div id="tab1">
				<form action="" method="post">
					<?php include getcwd().'/application/config/site.php'; ?>
					<table border="0" width="600px" id="global_config_table">
						<tr>
							<th>Параметр</th>
							<th>Значение</th>
						</tr>
						<?php foreach ($config as $k=>$v) { ?>
						<tr>
							<td width="130px" style="text-align: right"><?=$k?></td>
							<td><input type="text" style="width: 97%" value="<?=$v?>" name="<?=$k?>" /></td>
						</tr>
						<?php } ?>
					</table>
					<input type="submit" value="Сохранить" />
				</form>
			</div>
			<div id="tab2">
				<p>Отображается в письме с заказом</p>
				<textarea id="legal" name="legal" class="ckeditor" style="width: 100%; height: 330px"><?=get_contents('legal')?></textarea>
				<button onclick="save_file('legal');return false;">Сохранить</button>
			</div>
			<div id="tab3">
				<textarea id="order_text" name="order_text" class="ckeditor" style="width: 100%; height: 330px"><?=get_contents('order_text')?></textarea>
				<button onclick="save_file('order_text');return false;">Сохранить</button>
			</div>
			<div id="tab4">
				<textarea id="partners" name="partners" class="ckeditor" style="width: 100%; height: 330px"><?=get_contents('partners')?></textarea>
				<button onclick="save_file('partners');return false;">Сохранить</button>
			</div>
			<div id="tab5">
				<textarea id="copyrights" name="copyrights" class="ckeditor" style="width: 100%; height: 330px"><?=get_contents('copyrights')?></textarea>
				<button onclick="save_file('copyrights');return false;">Сохранить</button>
			</div>
			<div id="tab6">
				<textarea id="ads_left" name="ads_left" class="ckeditor" style="width: 100%; height: 330px"><?=get_contents('ads_left')?></textarea>
				<button onclick="save_file('ads_left');return false;">Сохранить</button>
			</div>
			<div id="tab7">
				<textarea id="ads_right" name="ads_right" class="ckeditor" style="width: 100%; height: 330px"><?=get_contents('ads_right')?></textarea>
				<button onclick="save_file('ads_right');return false;">Сохранить</button>
			</div>
			<div id="tab8">
				<textarea id="ads_bottom" name="ads_bottom" class="ckeditor" style="width: 100%; height: 330px"><?=get_contents('ads_bottom')?></textarea>
				<button onclick="save_file('ads_bottom');return false;">Сохранить</button>
			</div>
			<div id="tab9">
				<textarea id="utabs" name="utabs" class="ckeditor" style="width: 100%; height: 330px"><?=get_contents('utabs')?></textarea>
				<button onclick="save_file('utabs');return false;">Сохранить</button>
			</div>
			<div id="tab10">
				<textarea id="btabs" name="btabs" class="ckeditor" style="width: 100%; height: 330px"><?=get_contents('btabs')?></textarea>
				<button onclick="save_file('btabs');return false;">Сохранить</button>
			</div>
			<div id="tab11">
				<textarea id="consultant" name="consultant" class="ckeditor" style="width: 100%; height: 330px"><?=get_contents('consultant')?></textarea>
				<button onclick="save_file('consultant');return false;">Сохранить</button>
			</div>
		</div>
	<?php } ?>
</div>
<?php
function get_contents($file)
{
	$filename = getcwd().'/textblocks/'.$file.'.php';
	return file_get_contents($filename);
}
?>