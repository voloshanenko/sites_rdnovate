<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->getFullName(),
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->user_id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

<h1>Пользователь <?=$model->getFullName()?> (#<?=$model->user_id?>)</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_id',
		'first_name',
		'last_name',
		'middle_name',
		'address',
		'occupation',
		'login',
		'password',
		'is_activated',
		'email',
	),
)); ?>
