<?php
$this->breadcrumbs=array(
	'Баннеры'=>array('admin'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Добавить баннер</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>