<?php
$this->breadcrumbs=array(
	'Информ. страницы'=>array('admin'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

<h1>Создать страницу</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>