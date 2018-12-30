<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comments'); ?>
		<?php echo $form->textField($model,'comments',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'published'); ?>
		<?php echo $form->textField($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discarded'); ?>
		<?php echo $form->textField($model,'discarded'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discarded_reason'); ?>
		<?php echo $form->textField($model,'discarded_reason',array('size'=>60,'maxlength'=>120)); ?>
	</div>
	
	<div class="row">
    <?php echo $form->labelEx($model,'section_id'); ?><br />
    <?php echo $form->dropDownList($model, 'section_id', array(''=>'Не важно')+CHtml::listData(Section::model()->findAll(array('order'=>'title asc')), 'id', 'title'), array('template'=>'{label}{input}', 'separator'=>'')); ?>
  </div>
	
	<div class="row">
    <?php echo $form->label($model,'breed'); ?>
    <?php echo $form->textField($model, 'breed', array('size'=>60, 'maxlength'=>100, 'class'=>'autocomplete', 'data-attrib'=>'breed')); ?>
  </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Найти'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->