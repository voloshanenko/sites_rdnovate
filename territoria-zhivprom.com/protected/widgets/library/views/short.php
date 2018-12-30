<div class="margin-bottom padding-bottom article-thumb">
	<small class="gray-font"><?=CString::readableDate($this->content->publishing_date)?></small>
	<h3><?=CHtml::link($this->content->title, '/library/article/'.$this->content->url)?></h3>
	<?php if( $this->content->icon ) { ?>
		<a href="/library/article/<?=$this->content->url?>">
			<img src="<?=$this->content->getIconPath('small')?>" />
		</a>
	<?php } ?>
	<div class="notes"><?=$this->content->intro?></div>
	<?php if($this->canAdmin) { ?>
		<div class="admin-bar">
			<a href="/library/article/delete?id=<?=$this->content->id?>" onclick="return confirm('Вы уверены?')">Удалить</a>,
			<a href="/library/article/update?id=<?=$this->content->id?>">Изменить</a>
		</div>
	<?php } ?>
</div>