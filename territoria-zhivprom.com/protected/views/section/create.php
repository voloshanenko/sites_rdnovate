<?php
$this->breadcrumbs=array(
	'Категории'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Вывести списокм', 'url'=>array('index')),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

<h1>Создать категорию</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>