<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-form',
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
		<?php echo $form->labelEx($model,'date_start'); ?>
		<?php echo $form->textField($model,'date_start', array('class'=>'date_picker')); ?>
		<?php echo $form->error($model,'date_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_end'); ?>
		<?php echo $form->textField($model,'date_end', array('class'=>'date_picker')); ?>
		<?php echo $form->error($model,'date_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'short_description'); ?>
		<?php echo $form->textArea($model,'short_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'short_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'full_description'); ?>
		<br clear="all" />
		<?php echo $form->textArea($model,'full_description',array('rows'=>6, 'cols'=>50, 'class'=>'editor')); ?>
		<?php echo $form->error($model,'full_description'); ?>
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
		var ds = $("#Event_date_start").val();
		var de = $("#Event_date_end").val();
        app.ui.calendar.init($(".date_picker")).connect("#Event_date_start", "#Event_date_end");
        app.ui.calendar.setDate($("#Event_date_start"), ds);
        app.ui.calendar.setDate($("#Event_date_end"), de);
        app.ui.editor.show('.editor');
    });
</script>