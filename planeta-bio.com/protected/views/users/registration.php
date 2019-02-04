<?php
header('Location: /', true, 301);
die();
header('Location: /', true, 301);
die();
$this->breadcrumbs=array(
	'Регистрация',
);
?>

<div class="general-padding underlined">
    <h1>Регистрация</h1>
    <?php echo $this->renderPartial('_form', array('model'=>$model, 'type'=>$type)); ?>
</div>