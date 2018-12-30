<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'date_start'); ?>
		<?php echo $form->textField($model,'date_start',array('class'=>'date_picker', 'size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_end'); ?>
		<?php echo $form->textField($model,'date_end',array('class'=>'date_picker', 'size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'short_description'); ?>
		<?php echo $form->textField($model,'short_description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'full_description'); ?>
		<?php echo $form->textField($model,'full_description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tags'); ?>
		<?php echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

<script>
    app.loaded(function(){
		var ds = $("#Event_date_start").val();
		var de = $("#Event_date_end").val();
        app.ui.calendar.init($(".date_picker")).connect("#Event_date_start", "#Event_date_end");
        app.ui.calendar.setDate($("#Event_date_start"), ds);
        app.ui.calendar.setDate($("#Event_date_end"), de);
    });
</script>

</div><!-- search-form -->