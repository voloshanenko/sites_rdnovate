<?php
$this->breadcrumbs=array(
	'Вопросы'=>array('index'),
	$model->subject=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
	array('label'=>'Просмотреть', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

<div class="general-padding">
	<h1>Изменить вопрос "<?php echo $model->subject; ?>"</h1>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>