<?php if($this->items) { ?>
	<h3>Статьи</h3>
	<div class="html-box">
	<?php foreach($this->items as $article) { ?>
		<div class="general-block to-left">
			<?php if( $article->icon ) { ?>
			<a href="/library/article/view/id/<?=$article->id?>">
				<img src="<?=$article->getIconPath('small')?>" />
			</a>
			<?php } ?>
			<small class="gray-font"><?=CString::readableDate($article->publishing_date)?></small><br />
			<?=CHtml::link($article->title, '/library/article/'.$article->url)?>
		</div>
	<?php } ?>
	</div>
<?php } ?>