<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photos-form',
	'enableAjaxValidation'=>false,
	'stateful'=>true,
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
    'focus'=>array($model,'section_id'),
)); ?>

	<p class="note">Поля, обозначенные <span class="required">*</span>, - обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
        <?php echo $form->labelEx($model,'section_id'); ?>
        <?php echo $form->dropDownList($model,'section_id', array(''=>'Не указана') + CHtml::listData(Section::model()->findAll(), 'id', 'title')); ?>
        <?php echo $form->error($model,'section_id'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'intro'); ?>
		<br clear="all" />
		<?php echo $form->textArea($model,'intro',array('class'=>'editor','rows'=>6, 'cols'=>80)); ?>
		<?php echo $form->error($model,'intro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<br clear="all" />
		<?php echo $form->textArea($model,'body',array('class'=>'editor','rows'=>6, 'cols'=>80)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<h3 class="underlined">Дополнительно</h3>

	<div class="row">
		<?php echo $form->labelEx($model,'publishing_date'); ?>
		<?php echo $form->textField($model,'publishing_date',array('class'=>'date_picker')); ?>
		<?php echo $form->error($model,'publishing_date'); ?>
	</div>

	<?php if( ! $model->isNewRecord) { ?>
	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->checkBox($model,'published'); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>	
	<?php } ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'archived'); ?>
		<?php echo $form->checkBox($model,'archived'); ?>
		<?php echo $form->error($model,'archived'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'show_on_main'); ?>
		<?php echo $form->checkBox($model,'show_on_main'); ?>
		<?php echo $form->error($model,'show_on_main'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'icon'); ?>
		<?php echo $form->fileField($model,'icon'); ?>
        <?php if(!$model->isNewRecord) {
            echo $form->hiddenField($model,'icon');
            echo "<br />".CHtml::image($model->getIconPath('small'), $model->title);
        } ?>
		<?php echo $form->error($model,'icon'); ?>
	</div>
	
	<h3 class="underlined">Мета-данные</h3>
	
	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textArea($model,'tags',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tags'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    app.loaded(function(){
        app.ui.calendar.init(".date_picker");
        app.ui.editor.show('.editor');
    });
</script>