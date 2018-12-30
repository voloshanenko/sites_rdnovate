<?php
$this->breadcrumbs=array(
	'Баннеры'=>array('admin'),
	'Администрирование',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
);

$this->pageTitle = 'Управление баннерами';

?>

<h1>Управление баннерами</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'banner-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'pager' => array(
		'pageSize'=>Yii::app()->params['adminItemsPerPage']
	),
	'columns'=>array(
		'id',
		array(
            'name'=>'image',
            'type'=>'html',
            'value'=>'Chtml::image($data->image, "", array(\'width\'=>50))',
        ),
        array(
            'name'=>'validTo',
            'type'=>'html',
            'value'=>'date("d.m.Y", strtotime($data->validTo))',
        ),
		'title',
		array(
            'name'=>'position',
            'type'=>'raw',
            'value'=>'$data->positions[$data->position]',
            'filter'=>$model->positions,
        ),
		array(
            'name'=>'section_id',
            'type'=>'raw',
            'value'=>'CHtml::link($data->section->title, Yii::app()->getController()->createUrl("/section/view",array("id"=>$data->section->id)), array("target"=>"_blank"))',
            'filter'=>CHtml::listData(Section::model()->findAll(array('order'=>'title ASC')), 'id', 'title'),
        ),
		array(
            'name'=>'controller_id',
            'type'=>'raw',
            'value'=>'$data->controllers[$data->controller_id]',
            'filter'=>$model->controllers,
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
