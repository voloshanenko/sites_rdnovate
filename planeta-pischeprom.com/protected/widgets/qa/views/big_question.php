<span class="gray-font">
	<?=CString::readableDate($this->item->published_date)?>,
	ответов: <?=$this->item->answersCount?>
</span>
<h3>
	<?=CHtml::link($this->item->subject, Yii::app()->controller->createUrl('view', array('id'=>$this->item->id))) ?>
</h3>
<?php if($this->canAdmin) { ?>
	<div class="admin-bar">
		<a href="/qa/question/delete?id=<?=$this->item->id?>" onclick="return confirm('Вы уверены?')">Удалить</a>,
		<a href="/qa/question/update?id=<?=$this->item->id?>">Изменить</a>
	</div>
<?php } ?>