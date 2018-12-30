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
		</table>