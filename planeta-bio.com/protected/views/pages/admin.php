<?php
$this->breadcrumbs=array(
	'Информ. страницы'=>array('admin'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
);

?>

<h1>Управление информ. страницами.</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pages-grid',
	'dataProvider'=>$model->search(),
	'pager' => array(
		'pageSize'=>Yii::app()->params['adminItemsPerPage']
	),
	'columns'=>array(
		'id',
		'title',
		array(
            'name'=>'section_id',
            'type'=>'raw',
            'value'=>'CHtml::link($data->section->title, Yii::app()->getController()->createUrl("/pagesSections/update/",array("id"=>$data->section_id)), array("target"=>"_blank"))',
        ),
		'ordering',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
