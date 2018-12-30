<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comments-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'comment_text'); ?>
		<?php echo $form->textArea($model,'comment_text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_id'); ?>
		<?php echo $form->textField($model,'ad_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'ad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'object'); ?>
		<?php echo $form->textField($model,'object',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'object'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->