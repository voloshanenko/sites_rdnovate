<?php
$this->breadcrumbs=array(
	'Категории'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Просмотртеть', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

<h1>Обновить категорию "<?php echo $model->title; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>