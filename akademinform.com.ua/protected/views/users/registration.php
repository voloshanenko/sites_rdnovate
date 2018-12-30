<?php
$this->breadcrumbs=array(
	'Регистрация',
);
?>

<div class="general-padding underlined">
    <h1>Регистрация</h1>
    <?php echo $this->renderPartial('_form', array('model'=>$model, 'type'=>$type)); ?>
</div>