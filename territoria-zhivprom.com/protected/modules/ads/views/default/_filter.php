<div class="ads-filtering-form">
	<?php
		$form=$this->beginWidget('CActiveForm', array(
			'action'=>'/ads/default/filter',
			'method'=>'post',
			'enableAjaxValidation'=>false,
	)); ?>
	<div class="general-block full-width text-to-center to-left keyword-div">
		<label for="Ads_title">Часть заголовка или текста</label>
		<?php echo $form->textField($model,'title',array('size' => 28, 'maxlength' => 100)); ?>
	</div>
	<div class="general-block full-width to-left">
		<div class="third-width-column text-to-center to-left">
			<?php echo $form->labelEx($model,'ad_type'); ?><br />
			<?php echo $form->dropDownList($model, 'ad_type', array(''=>'Не важно')+$model->adType, array('template'=>'{label}{input}', 'separator'=>'')); ?>
		</div>
		<div class="third-width-column text-to-center to-left">
			<?php echo $form->labelEx($model,'section_id'); ?><br />
			<?php echo $form->dropDownList($model, 'section_id', array(''=>'Не важно')+CHtml::listData(Section::model()->findAll(array('order'=>'title asc')), 'id', 'title'), array('template'=>'{label}{input}', 'separator'=>'')); ?>
		</div>
		<div class="third-width-column text-to-center to-left">
			<?php echo $form->labelEx($model,'breed'); ?><br />
			<?php echo $form->textField($model, 'breed', array('size'=>'30','data-attrib'=>'breed','class'=>'autocomplete')); ?>
		</div>
	</div>
	<div class="general-block full-width to-left">
		<div class="third-width-column text-to-center to-left">
			<?php echo $form->labelEx($model,'suburb'); ?><br />
			<?php echo $form->textField($model, 'suburb', array('size'=>'30','data-attrib'=>'suburb','class'=>'autocomplete')); ?>
		</div>
		<div class="third-width-column text-to-center to-left">
			<?php echo $form->labelEx($model,'city'); ?><br />
			<?php echo $form->textField($model, 'city', array('size'=>'30','data-attrib'=>'city','class'=>'autocomplete')); ?>
		</div>
		<?php
			$asd = new CDbCriteria;
			$asd->addInCondition('user_id', CHtml::listData(Ads::model()->findAll(array('select'=>'owner_id')),'owner_id','owner_id'));
			$asd->order = 'last_name asc, first_name asc';
			$users = Users::model()->findAll($asd);
		?>
		<?php if(!Yii::app()->user->isGuest && (Yii::app()->user->role=='admin' || Yii::app()->user->role=='manager')) { ?>
			<div class="third-width-column text-to-center to-left">
				<?php echo $form->labelEx($model,'owner_id'); ?><br />
				<?php echo $form->dropDownList($model, 'owner_id', array('null'=>'- Выберите -')+CHtml::listData($users, 'user_id', 'adminFullName')); ?>
			</div>
		<?php }?>
	</div>
	<div class="general-block to-left full-width text-to-center upperlined">
		<?php echo CHtml::submitButton('Поиск'); ?>
		&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/ads">Очистить форму</a>
	</div>
	<?php $this->endWidget(); ?>
</div>