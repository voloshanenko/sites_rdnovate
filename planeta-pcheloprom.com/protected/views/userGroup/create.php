<?php
$this->breadcrumbs=array(
	'Группы пользователей'=>array('admin'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Группы пользователей', 'url'=>array('admin')),
);
?>

<h1>Создать группу пользователей</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>