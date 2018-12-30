<?php
$this->breadcrumbs=array(
	'Разделы информ. страниц',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
);

?>

<h1>Разделы информ. страниц</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pages-sections-grid',
	'dataProvider'=>$model->search(),
	'pager' => array(
		'pageSize'=>Yii::app()->params['adminItemsPerPage']
	),
	'columns'=>array(
		'id',
		'title',
		'ordering',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
