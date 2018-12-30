<?php
$this->pageTitle='Регистрация - '.Yii::app()->name;
$this->breadcrumbs=array(
	'Регистрация',
);

?>

<div class="general-padding underlined">
    <h1>Регистрация</h1>
    <div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'users-form',
        'enableAjaxValidation'=>false,
    )); ?>

        <p class="note">Поля обозначенные <span class="required">*</span> обязательны для заполнения.</p>

        <?php echo $form->errorSummary($model); ?>
        <h3 class="underlined">Основное</h3>
        
        <div class="row">
            <?php echo $form->labelEx($model,'last_name'); ?>
            <?php echo $form->textField($model,'last_name',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'last_name'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'first_name'); ?>
            <?php echo $form->textField($model,'first_name',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'first_name'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'middle_name'); ?>
            <?php echo $form->textField($model,'middle_name',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'middle_name'); ?>
        </div>

        <h3 class="underlined">Данные для авторизации</h3>

        <div class="row">
            <?php echo $form->labelEx($model,'login'); ?>
            <?php echo $form->textField($model,'login',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'login'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'password'); ?>
            <?php echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'password_repeat'); ?>
            <?php echo $form->passwordField($model,'password_repeat',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($model,'password_repeat'); ?>
        </div>
        
        <br /><h3>Контактные данные</h3>
        
	    <div class="row">
	        <?php echo $form->labelEx($model,'email'); ?>
	        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>60)); ?>
	        <?php echo $form->error($model,'email'); ?>
	    </div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'web'); ?>
			<?php echo $form->textField($model,'web'); ?>
			<?php echo $form->error($model,'web'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'phone1'); ?>
			<?php echo $form->textField($model,'phone1'); ?>
			<?php echo $form->error($model,'phone1'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'phone2'); ?>
			<?php echo $form->textField($model,'phone2'); ?>
			<?php echo $form->error($model,'phone2'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'contacts'); ?>
			<?php echo $form->textArea($model,'contacts'); ?>
			<?php echo $form->error($model,'contacts'); ?>
		</div>

        <h3 class="underlined">Дополнительно</h3>

        <div class="row">
            <?php echo $form->labelEx($model,'address'); ?>
            <?php echo $form->textField($model,'address',array('size'=>30,'maxlength'=>30)); ?>
            <?php echo $form->error($model,'address'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'occupation'); ?>
            <?php echo $form->textField($model,'occupation',array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model,'occupation'); ?>
        </div>

        <div class="row">
        <?php if(extension_loaded('gd')) { ?>
            <?php echo CHtml::activeLabelEx($model, 'verifyCode'); ?>
            <div id="verify-code">
            <?php $this->widget('CCaptcha'); ?>
            <?php echo CHtml::activeTextField($model, 'verifyCode'); ?>
            </div>
        <?php } ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Регистрация'); ?>
        </div>

    <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>

<script>
	app.loaded(function(){
		$("#Users_phone1").mask("+38 (999) 999-99-99");
		$("#Users_phone2").mask("+38 (999) 999-99-99");
	});
</script>