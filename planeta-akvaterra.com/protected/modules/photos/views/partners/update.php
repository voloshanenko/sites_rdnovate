<?php
$this->breadcrumbs=array(
	'Партнеры'=>array('index'),
	$model->name=>array('view','id'=>$model->name),
	'Изменение',
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

<h1>Изменение партнера "<?php echo $model->name; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>