<?php
$this->breadcrumbs=array(
	'Разделы информ. страниц'=>array('admin'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Разделы информ. страниц', 'url'=>array('admin')),
);
?>

<h1>Создать</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>