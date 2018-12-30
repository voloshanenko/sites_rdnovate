<!-- <div class="margin-bottom padding-bottom article-thumb"> -->
<div class="html-box general-block">
	<?php if( $this->content->icon ) { ?>
	<a href="/library/article/view/id/<?=$this->content->id?>">
		<img src="<?=$this->content->getIconPath('small')?>" class="shadowed-thumb img-margin to-left" alt="<?=$this->content->title?>" title="<?=$this->content->title?>" />
	</a>
	<?php } ?>
	<small class="gray-font"><?=CString::readableDate($this->content->publishing_date)?></small><br />
	<?=CHtml::link($this->content->title, '/library/article/'.$this->content->url)?>
</div>