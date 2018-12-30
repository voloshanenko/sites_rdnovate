<?php
$this->breadcrumbs=array(
	'Партнеры'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Списком', 'url'=>array('index')),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

<h1>Создание Партнера</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>