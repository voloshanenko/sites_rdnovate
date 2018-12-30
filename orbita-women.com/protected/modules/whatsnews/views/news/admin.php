<?php
Yii::import('application.helpers.CString');
$this->pageTitle = 'Новости: администрирование - '.Yii::app()->name;
$this->metaKeywords = '';
$this->metaDescription = '';

$this->breadcrumbs=array(
	'Новости'=>array('index'),
	'Администрирование',
);

$this->menu=array(
	array('label'=>'Списком', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
);
?>

<h1>Новости: администрирование</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'pager' => array(
		'pageSize'=>Yii::app()->params['adminItemsPerPage']
	),
	'columns'=>array(
		'id',
		'title',
		array(
			'name'=>'publishing_date',
			'value'=>'CString::readableDate($data->publishing_date, "D d.m.Y")'
		),
		array(
                'name'=>'section_id',
                'type'=>'raw',
                'filter'=>CHtml::listData(Section::model()->findAll(array('order'=>'title asc')),'id','title'),
                'value'=>'CHtml::link($data->section->title, Yii::app()->getController()->createUrl("/section/view/",array("id"=>$data->section_id)), array("target"=>"_blank"))',
            ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
