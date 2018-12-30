<?php if(!empty($data)) { foreach ($data as $f) { ?>
	<?php if($f['c_type'] == 'fb') { ?>
	<div class="feedback">
		Отзыв о "<strong><a href="/<?=$f['gcurl']?>/prod/<?=$f['url']?>"><?=$f['title']?></a></strong>"<br />
		<em><?=$f['text']?></em><br />
		<div class="feedback-sign">
			<?php if( $f['author_name'] ) { ?>
				<?=$f['author_name']?><br /><?=$f['author_about']?>
			<?php } else if ($f['user_name']) { ?>
				<?=$f['user_name']?><br />
				<?=$f['user_line']?>, <?=$f['user_from']?>
			<?php } else { ?>
				Автор не известен.
			<?php } ?>
		</div>
	</div>
	<?php } ?>
	<?php if($f['c_type'] == 'cm') { ?>
	<div class="feedback">
		<strong style="color: #555">Комментарий к "<a href="/page/<?=$f['page_url']?>"><?=$f['title']?></a>"</strong>
		<div class="feedback-sign">
			от
			<?php if( $f['author_name'] ) { ?>
				:<?=$f['author_name']?><br /><?=$f['author_about']?>
			<?php } else if ($f['user_name']) { ?>
				:<?=$f['user_name']?><br /><?=$f['user_line']?><br /><?=$f['user_from']?>
			<?php } else { ?>
				анонима
			<?php } ?>
			<em><?=$f['text']?></em>
	</div>
	<?php } ?>
<?php } } else { ?>
	Отзывов, пока никто не оставлял.
<?php } ?>