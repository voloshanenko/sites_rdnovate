<?php
$this->breadcrumbs=array(
	'Фотоконкурсы'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
    array('label'=>'Вывести списком', 'url'=>array('index')),
    array('label'=>'Добавить конкурс', 'url'=>array('create')),
    array('label'=>'Просмотреть', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

<h1>Редактирование конкурса "<?php echo $model->title; ?>"</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>