<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banner-form',
	'enableAjaxValidation'=>false,
	'stateful'=>true,
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
    'focus'=>array($model,'title'),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image'); ?>
        <?php if( ! $model->isNewRecord) {
            echo $form->hiddenField($model,'image');
            echo '<br />'.Chtml::image($model->image, '');
        } ?>
		<?php echo $form->error($model,'image'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'controller_id'); ?>
		<?php echo $form->dropDownList($model,'controller_id', $model->controllers); ?>
		<?php echo $form->error($model,'controller_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'section_id'); ?>
		<?php echo $form->dropDownList($model,'section_id',CHtml::listData(Section::model()->findAll(array('order'=>'title asc')), 'id', 'title')); ?>
		<?php echo $form->error($model,'section_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->dropDownList($model,'position', $model->positions); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'owner_contacts'); ?>
		<?php echo $form->textArea($model,'owner_contacts',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'owner_contacts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->checkBox($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'validTo'); ?>
		<?php echo $form->textField($model,'validTo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'validTo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    app.loaded(function(){
		var date = $("#Banner_validTo").val();
        app.ui.calendar.init($("#Banner_validTo"));
        app.ui.calendar.setDate($("#Banner_validTo"), date);
    });
</script>