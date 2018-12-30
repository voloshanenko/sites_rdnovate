<?php
$this->breadcrumbs=array(
	'Библиотека'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
	array('label'=>'Создать статью', 'url'=>array('create')),
	array('label'=>'Просмотреть', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

<div class="general-padding">
	<h1>Изменить статью "<?php echo $model->title; ?>"</h1>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>