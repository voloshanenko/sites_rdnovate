<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pages-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span> - обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'section_id'); ?>
        <?php echo $form->dropDownList($model,'section_id', array('null'=>'Не указана')+CHtml::listData(PagesSections::model()->findAll(array('order'=>'title asc')), 'id', 'title'), array('empty'=>'- Выберите -')); ?>
        <?php echo $form->error($model,'section_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering',array('size'=>60,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'ordering'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<br clear="all" />
		<?php echo $form->textArea($model,'body',array('class'=>'editor','rows'=>6, 'cols'=>80)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    app.loaded(function(){
        app.ui.editor.show('.editor');
    });
</script>