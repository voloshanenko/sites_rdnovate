<?php
$this->breadcrumbs=array(
	'Категории'=>array('index'),
	'Администрирование',
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
);
?>

<h1>Менеджмент категориями</h1>

<p>
    Вы можете воспользоваться операторами сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    или <b>=</b>) в начале каждого поискового параметра.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'section-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'pager' => array(
		'pageSize'=>Yii::app()->params['adminItemsPerPage']
	),
	'columns'=>array(
		'id',
		'title',
		'description',
		'meta_title',
		'meta_keywords',
		'meta_description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
