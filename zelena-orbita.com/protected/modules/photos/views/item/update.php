<?php
$this->breadcrumbs=array(
	'Фотографии'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'List Photos', 'url'=>array('index')),
	array('label'=>'Create Photos', 'url'=>array('create')),
	array('label'=>'View Photos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Photos', 'url'=>array('admin')),
);
?>
<div class="general-padding underlined">
    <h1>Редактирование фото "<?php echo $model->name; ?>"</h1>
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>