<?php
$this->breadcrumbs=array(
	'Библиотека'=>array('index'),
	'Создать статью',
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

<div class="general-padding">
	<h1>Создать статью</h1>
	<?=$this->renderPartial('_form', array('model'=>$model)); ?>
</div>