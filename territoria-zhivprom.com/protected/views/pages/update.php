<?php
$this->breadcrumbs=array(
	'Информ. страницы'=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>
<div class="general-padding">
<h1>Изменить страницу "<?=$model->title?>"</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>