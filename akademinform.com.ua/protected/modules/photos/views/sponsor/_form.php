<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sponsor-form',
	'enableAjaxValidation'=>false,
	'stateful'=>true,
	'htmlOptions'=>array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note">Поля, обозначенные <span class="required">*</span>, - обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row">
        <?php echo $form->labelEx($model,'url'); ?>
        <?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'url'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'icon'); ?>
		<?php echo $form->fileField($model,'icon',array('size'=>28,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'icon'); ?>
        <?php if(!$model->isNewRecord) { echo $form->hiddenField($model, 'icon'); echo CHtml::image($model->icon); } ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'icon_url'); ?>
        <?php echo $form->textField($model,'icon_url',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'icon_url'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'slogan'); ?>
        <?php echo $form->textField($model,'slogan',array('size'=>60,'maxlength'=>200)); ?>
        <?php echo $form->error($model,'slogan'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'short_info'); ?>
        <br clear="all" />
        <?php echo $form->textArea($model,'short_info',array('class'=>'editor','rows'=>16, 'cols'=>50)); ?>
        <?php echo $form->error($model,'short_info'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'info'); ?>
        <br clear="all" />
		<?php echo $form->textArea($model,'info',array('class'=>'editor','rows'=>16, 'cols'=>50)); ?>
		<?php echo $form->error($model,'info'); ?>
	</div>

    <h3 class="underlined">МЕТА-информация</h3>

    <div class="row">
        <?php echo $form->labelEx($model,'meta_title'); ?>
        <?php echo $form->textField($model,'meta_title',array('maxlength'=>255)); ?>
        <?php echo $form->error($model,'meta_title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'meta_keywords'); ?>
        <?php echo $form->textField($model,'meta_keywords',array('maxlength'=>255)); ?>
        <?php echo $form->error($model,'meta_keywords'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'meta_description'); ?>
        <?php echo $form->textArea($model,'meta_description',array('cols'=>60,'rows'=>2)); ?>
        <?php echo $form->error($model,'meta_description'); ?>
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