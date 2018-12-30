<div class="form">
	
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contest-form',
	'enableAjaxValidation'=>false,
	'stateful'=>true,
	//'htmlOptions'=>array('enctype' => 'multipart/form-data')
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textArea($model,'subject',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>
	
	<div class="row">
        <?php echo $form->labelEx($model,'section_id'); ?>
        <?php echo $form->dropDownList($model,'section_id', CHtml::listData(Section::model()->findAll(array('order'=>'title asc')), 'id', 'title'), array('empty'=>'- Выберите -')); ?>
        <?php echo $form->error($model,'section_id'); ?>
    </div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('cols'=>4,'rows'=>12)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Задать вопрос' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->