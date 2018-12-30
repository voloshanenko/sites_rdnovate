<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ads-form',
	'enableAjaxValidation'=>false,
	'stateful'=>true,
	'htmlOptions'=>array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note">
		Поля, обозначенные <span class="required">*</span> - обязательны для заполнения.
		<br />
		Поля "Порода", "Город" и "Район" будут подсказывать Вам при вводе. Если в подсказке будет подходящий вариант, просто выберите его.
	</p>

	<?php echo $form->errorSummary($model); ?>
	
	<h3 class="underlined">Основная информация</h3>
	
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'section_id'); ?>
		<?php echo $form->dropDownList($model, 'section_id', CHtml::listData(Section::model()->findAll(array('order'=>'title asc')), 'id', 'title')); ?>
		<?php echo $form->error($model,'section_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_type'); ?>
		<?php //asort($model->adType); ?>
		<?php echo $form->dropDownList($model, 'ad_type', $model->adType); ?>
		<?php echo $form->error($model,'ad_type'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'breed'); ?>
		<?php echo $form->textField($model, 'breed', array('size'=>'30','data-attrib'=>'breed','class'=>'autocomplete')); ?>
		<?php echo $form->error($model,'breed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'main_image'); ?>
		<?php echo $form->fileField($model, 'main_image'); ?>
		<?php if(!$model->isNewRecord) {
            echo $form->hiddenField($model,'main_image');
            echo "<br />".CHtml::image($model->getImageWebPath('small'), $model->title);
        } ?>
		<?php echo $form->error($model, 'main_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ad_text'); ?>
		<br clear="all" />
		<?php echo $form->textArea($model,'ad_text',array('cols'=>60,'rows'=>20)); ?>
		<?php echo $form->error($model,'ad_text'); ?>
	</div>
	
	<h3 class="underlined">Контактная информация и адрес</h3>
	
	<div class="row">
		<?php echo $form->labelEx($model,'contact_person'); ?>
		<?php echo $form->textField($model,'contact_person',array('value'=>($model->isNewRecord)?$user->getFullName():$model->contact_person)); ?>
		<?php echo $form->error($model,'contact_person'); ?>
	</div>
	<?php
		$_contacts = ($user->phone1 ? $user->phone1 : '').($user->phone2 ? "\n".$user->phone2 : '').($user->email ? "\n".$user->email : '').($user->web ? "\n".$user->web : '').($user->contacts ? "\n".$user->contacts : '');
		$model->contacts = $model->isNewRecord ? $_contacts : $model->contacts;
	?>
	<div class="row">
		<?=$form->labelEx($model,'contacts'); ?>
		<?=$form->textArea($model,'contacts', array('rows'=>5)); ?>
		<?=$form->error($model,'contacts'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city', array('size'=>'30','data-attrib'=>'city','class'=>'autocomplete')); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'suburb'); ?>
		<?php echo $form->textField($model,'suburb', array('size'=>'30','data-attrib'=>'suburb','class'=>'autocomplete')); ?>
		<?php echo $form->error($model,'suburb'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo $form->textField($model,'street'); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'placement_period'); ?>
		<?php echo $form->dropDownList($model, 'placement_period', $model->placement_period_var); ?>
		<?php echo $form->error($model,'placement_period'); ?>
	</div>

	<?php if(!Yii::app()->user->isGuest && (Yii::app()->user->role=='admin' || Yii::app()->user->role=='manager')) { ?>
		<h3 class="underlined">Валидация</h3>
		<div class="row">
			<?php echo $form->labelEx($model,'discarded'); ?>
			<?php echo $form->checkBox($model,'discarded'); ?>
			<?php echo $form->error($model,'discarded'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'discarded_reason'); ?>
			<?php echo $form->textArea($model,'discarded_reason',array('rows'=>3, 'cols'=>50)); ?>
			<?php echo $form->error($model,'discarded_reason'); ?>
		</div>

		<h3 class="underlined">Прочее</h3>
		<div class="row">
			<?php echo $form->labelEx($model,'publishing_date'); ?>
			<?php echo $form->textField($model,'publishing_date'); ?>
			<?php echo $form->error($model,'publishing_date'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'end_publishing_date'); ?>
			<?php echo $form->textField($model,'end_publishing_date'); ?>
			<?php echo $form->error($model,'end_publishing_date'); ?>
		</div>

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
	<?php } ?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Опубликовать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->