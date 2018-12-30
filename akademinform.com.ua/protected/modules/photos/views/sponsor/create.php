<?php
$this->breadcrumbs=array(
	'Спонсоры'=>array('index'),
	'Добавление',
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

<h1>Добавление спонсора</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>