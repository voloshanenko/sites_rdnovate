<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photos-form',
	'enableAjaxValidation'=>false,
	'stateful'=>true,
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
    'focus'=>array($model,'url'),
)); ?>

    <p class="note">Поля, обозначенные <span class="required">*</span>, - обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row html-box">
        Голосов: <strong><?=$model->rating?></strong>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->fileField($model,'url'); ?>
        <?php if( ! $model->isNewRecord) {
            echo $form->hiddenField($model,'url');
            Chtml::image($model->url, '');
        } ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textArea($model,'name',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>
	
<?php if($model->isNewRecord) { ?>
    <div class="row">
        <?php echo $form->labelEx($model,'contest_id'); ?>
        <?php echo $form->dropDownList($model,'contest_id', array('null'=>'Не учавствует')+CHtml::listData(Contest::model()->findAll(array('condition'=>'date_end>now()','order'=>'date_end desc')), 'id', 'title'), array('empty'=>'- Выберите -')); ?>
        <?php echo $form->error($model,'contest_id'); ?>
    </div>
<?php } ?>

    <div class="row">
        <?php echo $form->labelEx($model,'section_id'); ?>
        <?php echo $form->dropDownList($model,'section_id', CHtml::listData(Section::model()->findAll(array('order'=>'title asc')), 'id', 'title'), array('empty'=>'- Выберите -')); ?>
        <?php echo $form->error($model,'section_id'); ?>
    </div>

    <div class="row">
		<?php echo $form->labelEx($model,'breed'); ?>
		<?php echo $form->textField($model,'breed',array('size'=>60, 'maxlength'=>100, 'class'=>'autocomplete', 'data-attrib'=>'breed')); ?>
		<?php echo $form->error($model,'breed'); ?>
	</div>

	<?php if( ! $model->isNewRecord) { ?>
		<div class="row">
			<?php echo $form->labelEx($model,'created_at'); ?>
			<?php echo $form->textField($model,'created_at'); ?>
			<?php echo $form->error($model,'created_at'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'published'); ?>
            <div class="values-group">
			    <?php echo $form->radioButtonList($model,'published',array(1=>'Показывать',0=>'Скрыть')); ?>
            </div>
            <?php echo $form->error($model,'published'); ?>
		</div>
	<?php } ?>

    <?php if(!Yii::app()->user->isGuest && Yii::app()->user->role=='admin') { ?>

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

        <h3 class="underlined">МЕТА-информация</h3>

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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Загрузить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->