<div class="list-item">
	<small class="gray-font">
		<?=CString::readableDate($this->item->published_date)?>,
	ответов: <?=$this->item->answersCount?>
	</small><br />
	<?=CHtml::link($this->item->subject, Yii::app()->controller->createUrl('qa/question/view', array('id'=>$this->item->id))) ?>
</div>