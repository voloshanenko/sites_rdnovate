<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('admin'),
	$model->user_id=>array('view','id'=>$model->user_id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
	array('label'=>'Создать пользователя', 'url'=>array('create')),
	array('label'=>'Просмотреть', 'url'=>array('view', 'id'=>$model->user_id)),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

    <h1>Изменить пользователя <?php echo $model->login; ?></h1>
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>