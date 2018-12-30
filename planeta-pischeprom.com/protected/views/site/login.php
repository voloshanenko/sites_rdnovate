	<?php
$this->pageTitle='Авторизация - '.Yii::app()->name;
$this->breadcrumbs=array(
	'Авторизация',
);
?>

<div class="general-padding underlined">
    <h1>Авторизация</h1>
    <p>Пожалуйста, введите Ваши логин и пароль:</p>
    <div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        //'enableClientValidation'=>true,
        //'clientOptions'=>array(
        //	'validateOnSubmit'=>true,
        //),
    )); ?>

        <p class="note">Поля, обозначенные <span class="required">*</span> - обязательны для заполнения.</p>

        <?=$form->error($model, 'msg'); ?>

        <div class="row">
            <?=$form->labelEx($model,'login')?>
            <?=$form->textField($model,'login')?>
            <?=$form->error($model,'login')?>
        </div>

        <div class="row">
            <?=$form->labelEx($model,'password')?>
            <?=$form->passwordField($model,'password')?>
            <?=$form->error($model,'password')?>
        </div>

        <div class="row rememberMe">
            <?=$form->checkBox($model,'rememberMe')?>
            <?=$form->label($model,'rememberMe')?>
            <?=$form->error($model,'rememberMe')?>
        </div>
        
        <div>
        	Если вы забыли пароль, вы можете <a href="/users/recovery/">восстановить</a> его.
        </div>

        <div class="row buttons">
            <?=CHtml::submitButton('Войти')?>
        </div>

    <?php $this->endWidget(); ?>
    </div><!-- form -->
</div>