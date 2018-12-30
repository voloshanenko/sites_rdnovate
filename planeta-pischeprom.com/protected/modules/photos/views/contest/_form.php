<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contest-form',
	'enableAjaxValidation'=>false,
	'stateful'=>true,
	'htmlOptions'=>array('enctype' => 'multipart/form-data')
)); ?>

    <p class="note">Поля, обозначенные <span class="required">*</span>, - обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_start'); ?>
		<?php echo $form->textField($model,'date_start',array('class'=>'date_picker')); ?>
		<?php echo $form->error($model,'date_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_end'); ?>
		<?php echo $form->textField($model,'date_end',array('class'=>'date_picker')); ?>
		<?php echo $form->error($model,'date_end'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'section_id'); ?>
        <?php echo $form->dropDownList($model,'section_id', array(''=>'Не указана') + CHtml::listData(Section::model()->findAll(array('order'=>'title asc')), 'id', 'title')); ?>
        <?php echo $form->error($model,'section_id'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'appeal'); ?>
        <?php echo $form->textArea($model,'appeal',array('rows'=>3, 'cols'=>50)); ?>
        <?php echo $form->error($model,'appeal'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'awarding_info'); ?><br clear="all" />
        <?php echo $form->textArea($model,'awarding_info',array('class'=>'editor','cols'=>60,'rows'=>10)); ?>
        <?php echo $form->error($model,'awarding_info'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'show_on_main'); ?>
        <?php echo $form->checkBox($model,'show_on_main'); ?>
        <?php echo $form->error($model,'show_on_main'); ?>
    </div>

    <h3 class="underlined">Спонсор и партнер</h3>

    <div class="row">
        <?php echo $form->labelEx($model,'sponsor_id'); ?>
        <?php echo $form->dropDownList($model,'sponsor_id', array(''=>'Не указан') + CHtml::listData(Sponsor::model()->findAll(), 'id', 'name')); ?>
        <?php echo $form->error($model,'sponsor_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'partner_id'); ?>
        <?php echo $form->dropDownList($model,'partner_id', array(''=>'Не указан') + CHtml::listData(Partners::model()->findAll(), 'id', 'name')); ?>
        <?php echo $form->error($model,'partner_id'); ?>
    </div>

    <h3 class="underlined">Призы</h3>

    <div class="row">
        <?php echo $form->labelEx($model,'prize1'); ?>
        <?php echo $form->fileField($model,'prize1'); ?>
        <?php echo $form->error($model,'prize1'); ?>
        <?php if(!$model->isNewRecord) { echo $form->hiddenField($model, 'prize1'); echo CHtml::image($model->prize1); } ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'prize1_url'); ?>
        <?php echo $form->textField($model,'prize1_url'); ?>
        <?php echo $form->error($model,'prize1_url'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'prize2'); ?>
        <?php echo $form->fileField($model,'prize2'); ?>
        <?php echo $form->error($model,'prize2'); ?>
        <?php if(!$model->isNewRecord) { echo $form->hiddenField($model, 'prize2'); echo CHtml::image($model->prize2); } ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'prize2_url'); ?>
        <?php echo $form->textField($model,'prize2_url'); ?>
        <?php echo $form->error($model,'prize2_url'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'prize3'); ?>
        <?php echo $form->fileField($model,'prize3'); ?>
        <?php echo $form->error($model,'prize3'); ?>
        <?php if(!$model->isNewRecord) { echo $form->hiddenField($model, 'prize3'); echo CHtml::image($model->prize3); } ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'prize3_url'); ?>
        <?php echo $form->textField($model,'prize3_url'); ?>
        <?php echo $form->error($model,'prize3_url'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'prize_comments'); ?>
        <br clear="all" />
        <?php echo $form->textArea($model,'prize_comments',array('class'=>'editor','cols'=>60,'rows'=>'4')); ?>
        <?php echo $form->error($model,'prize_comments'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
    app.loaded(function(){
		var ds = $("#Contest_date_start").val();
		var de = $("#Contest_date_end").val();
        app.ui.calendar.init(".date_picker").connect("#Contest_date_start", "#Contest_date_end");
        app.ui.calendar.setDate($("#Contest_date_start"), ds);
        app.ui.calendar.setDate($("#Contest_date_end"), de);
        app.ui.editor.show('.editor');
    });
</script>