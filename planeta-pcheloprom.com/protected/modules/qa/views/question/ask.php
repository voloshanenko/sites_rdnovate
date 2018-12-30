<?php
$this->pageTitle = 'Задать вопрос на сайте '.Yii::app()->name;
$this->breadcrumbs=array(
	'Вопросы'=>array('/qa/question'),
	'Задать вопрос',
);?>
<div class="general-padding" id="current-contests">
    <div class="html-box">
        <h1>Задать вопрос</h1>
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>