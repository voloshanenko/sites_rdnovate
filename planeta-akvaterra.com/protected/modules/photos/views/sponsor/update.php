<?php
$this->breadcrumbs=array(
	'Спонсоры'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
	array('label'=>'Добавить спонсора', 'url'=>array('create')),
	array('label'=>'Просмотреть', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

<h1>Изменение спонсора "<?php echo $model->name; ?>"</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>