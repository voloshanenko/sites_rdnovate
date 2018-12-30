<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, обозначенные <span class="required">*</span> обязательны для заполения.</p>

	<?php echo $form->errorSummary($model); ?>

    <h3>Персональная информация</h3>

    <div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'middle_name'); ?>
		<?php echo $form->textField($model,'middle_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'middle_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textArea($model,'address',array('cols'=>60,'rows'=>2)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'occupation'); ?>
		<?php echo $form->textArea($model,'occupation',array('cols'=>60,'rows'=>2)); ?>
		<?php echo $form->error($model,'occupation'); ?>
	</div>
	
    <br /><h3>Авторизационные данные</h3>

    <div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>20,'value'=>'')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_repeat'); ?>
		<?php echo $form->passwordField($model,'password_repeat',array('size'=>20,'maxlength'=>20,'value'=>'')); ?>
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
	
	<?php if(!Yii::app()->user->isGuest && Yii::app()->user->role=='admin') { ?>
		<div class="row">
			<?php echo $form->labelEx($model,'role'); ?>
			<?php echo $form->dropDownList($model,'role', array('admin'=>'Супер Администратор', 'manager'=>'Менеджер', 'user'=>'Пользователь')); ?>
	        <?php echo $form->error($model,'role'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'group_id'); ?>
			<?php echo $form->dropDownList($model,'group_id', array('null'=>'Без группы')+CHtml::listData(UserGroup::model()->findAll(array('order'=>'name asc')), 'id', 'name'), array('empty'=>'- Выберите -')); ?>
	        <?php echo $form->error($model,'group_id'); ?>
		</div>
		
		<div class="row">
			<?php echo $form->labelEx($model,'is_activated'); ?>
			<?php echo $form->checkBox($model,'is_activated'); ?>
	        <?php echo $form->error($model,'is_activated'); ?>
		</div>
	<?php } ?>

	<?php if($type == 'admin') { ?>
		<div class="row">
			<?php echo $form->labelEx($model,'is_activated'); ?>
			<?php echo $form->checkBox($model,'is_activated'); ?>
			<?php echo $form->error($model,'is_activated'); ?>
		</div>
	<?php } ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
	app.loaded(function(){
		$("#Users_phone1").mask("+38 (999) 999-99-99");
		$("#Users_phone2").mask("+38 (999) 999-99-99");
	});
</script>