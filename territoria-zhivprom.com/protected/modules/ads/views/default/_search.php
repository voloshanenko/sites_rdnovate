<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ad_text'); ?>
		<?php echo $form->textArea($model,'ad_text',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publishing_date'); ?>
		<?php echo $form->textField($model,'publishing_date', array('class'=>'date_picker')); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'breed'); ?>
		<?php echo $form->textField($model,'breed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tags'); ?>
		<?php echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->

<script>
    app.loaded(function(){
        app.ui.calendar.init($(".date_picker"));
    });
</script>