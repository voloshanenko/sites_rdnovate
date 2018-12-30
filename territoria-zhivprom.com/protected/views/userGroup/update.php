<?php
$this->breadcrumbs=array(
	'Группы пользователей'=>array('admin'),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Группы пользователей', 'url'=>array('admin')),
);
?>

<h1>Изменить группу пользователей <?=$model->name?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>