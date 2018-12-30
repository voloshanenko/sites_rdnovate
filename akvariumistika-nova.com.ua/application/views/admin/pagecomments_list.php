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
		<div id="filters">
			<form action="/admin/autocomplete" method="post">
				Введите часть заголовка:
				<input type="text" class="autocomplete" name="param" value="" />
				<input type="hidden" name="where" value="pages" />
				<input type="hidden" name="column" value="title" />

				<input type="hidden" id="c" value="pagecomments" />
				<input type="hidden" id="m" value="grid" />
				<input type="hidden" id="p" value="page_id" />
			</form>
		</div>
	</div>
	<div id="admin_table">
		<table width="100%" border="0">
			<tr>
				<th width="80px">Дата отызва</th>
				<th width="180px">Автор</th>
				<th width="180px">Статья/новость</th>
				<th>Текст</th>
				<th width="120px" colspan="4">Действия</th>
			</tr>
			<?php foreach($feedbacks as $feedback) { ?>
			<tr>
				<td><?=$feedback['date']?></td>
				<td><?php
				if($feedback['user_name']) { 
					echo "<big>$feedback[user_name]</big><br /><small>($feedback[user_line], $feedback[user_from])</small>"; 
				} else {
					echo '<big>'.$feedback['author_name'].'</big>';
					if($feedback['author_about']) {
						echo "<br /><small>$feedback[author_about]</small>";
					}
					if($feedback['author_email']) {
						echo "<br /><small><a href=\"mailto:$feedback[author_email])\">$feedback[author_email]</a></small>";
					}
				}
				?></td>
				<td><?=$feedback['title']?></td>
				<td>
					<textarea name="text" style="width: 100%; height: 50px"><?=$feedback['text']?></textarea>
				</td>
				<td>
					<a href="/admin/savecomment/<?=$feedback['id']?>" class="update-item-comment">Сохранить</a>
				</td>
				<td>
					<?=($feedback['approved']=="0")
						?'<a class="approve_pagecomments" id="'.$feedback['id'].'" href="/admin/items/pagecomments/approve/'.$feedback['id'].'" >Показать</a>'
						:'<a class="disapprove_pagecomments" id="'.$feedback['id'].'" href="/admin/items/pagecomments/disapprove/'.$feedback['id'].'" >Скрыть</a>'?>
				</td>
				<td>
					<?=($feedback['show']=="0")
						?'<a class="show_pagecomments" id="'.$feedback['id'].'" href="/admin/items/pagecomments/show_on_main/'.$feedback['id'].'" >Показать на главной</a>'
						:'<a class="hide_pagecomments" id="'.$feedback['id'].'" href="/admin/items/pagecomments/hide_on_main/'.$feedback['id'].'" >Убрать с главной</a>'?>
				</td>
				<td><a class="del_link" href="/admin/items/pagecomments/delete/<?=$feedback['id']?>">Удалить</a></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="8">
					<?=$pagination_links?>
				</td>
			</tr>
		</table>
	</div>
