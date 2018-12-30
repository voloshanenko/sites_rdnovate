<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

    <h1>Создать пользователя</h1>
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>