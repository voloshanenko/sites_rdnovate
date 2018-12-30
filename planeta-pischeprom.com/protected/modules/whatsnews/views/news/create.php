<?php
$this->pageTitle = 'Новости: добавить - '.Yii::app()->name;
$this->metaKeywords = '';
$this->metaDescription = '';

$this->breadcrumbs=array(
	'Новости'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Списком', 'url'=>array('index')),
	array('label'=>'Администрирование', 'url'=>array('admin')),
);
?>

<h1>Добавить новость</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>