<?php
$this->breadcrumbs=array(
	'Разделы информ. страниц'=>array('admin'),
	$model->title,
	'Изменить',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Разделы информ. страниц', 'url'=>array('admin')),
);
?>

<h1>Изменить раздел "<?=$model->title;?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>