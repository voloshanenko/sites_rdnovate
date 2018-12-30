<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
	'stateful'=>true,
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
    'focus'=>array($model,'title'),
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span> обязательный для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'section_id'); ?>
		<?php echo $form->dropDownList($model,'section_id',CHtml::listData(Section::model()->findAll(array('order'=>'title asc')), 'id', 'title')); ?>
		<?php echo $form->error($model,'section_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'intro'); ?>
		<?php echo $form->textArea($model,'intro',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'intro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'full_text'); ?>
		<br clear="all" />
		<?php echo $form->textArea($model,'full_text',array('rows'=>6, 'cols'=>50, 'class'=>'editor')); ?>
		<?php echo $form->error($model,'full_text'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'image'); ?>
		<?php echo $form->fileField($model, 'image'); ?>
		<?php if(!$model->isNewRecord) {
            echo $form->hiddenField($model,'image');
            echo "<br />".CHtml::image($model->getImageWebPath('thumb'), $model->title);
        } ?>
		<?php echo $form->error($model, 'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'publishing_date'); ?>
		<?php echo $form->textField($model,'publishing_date',array('class'=>'date_picker')); ?>
		<?php echo $form->error($model,'publishing_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_title'); ?>
		<?php echo $form->textArea($model,'meta_title',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_keywords'); ?>
		<?php echo $form->textArea($model,'meta_keywords',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_description'); ?>
		<?php echo $form->textArea($model,'meta_description',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textArea($model,'tags',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    app.loaded(function(){
        app.ui.calendar.init(".date_picker");
        app.ui.editor.show('.editor');
    });
</script>