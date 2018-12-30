<?php
$this->breadcrumbs=array(
	'Группы пользователей',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
);
?>

<h1>Группы пользователей</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-group-grid',
	'dataProvider'=>$model->search(),
	'pager' => array(
		'pageSize'=>Yii::app()->params['adminItemsPerPage']
	),
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
