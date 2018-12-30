<?php
$this->breadcrumbs=array(
	'Баннеры'=>array('admin'),
	$model->title,
	'Обновить',
);

$this->menu=array(
	array('label'=>'Добавить', 'url'=>array('create')),
	array('label'=>'Администрирование', 'url'=>array('admin')),
);

$this->pageTitle = 'Обновить Баннер';
?>

<h1>Изменить баннер "<?php echo $model->title; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>