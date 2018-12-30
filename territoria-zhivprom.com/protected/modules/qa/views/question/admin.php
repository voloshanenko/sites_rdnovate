<?php
$this->pageTitle = 'Управление вопросами - '.Yii::app()->params['defaultMetaTitle'];

$this->breadcrumbs=array(
	'Вопросы'=>array('index'),
	'Менеджмент',
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
);

?>

<h1>Управление вопросами</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'pager' => array(
		'pageSize'=>Yii::app()->params['adminItemsPerPage']
	),
	'columns'=>array(
		'id',
		'subject',
		array(
                'name'=>'section_id',
                'type'=>'raw',
                'filter'=>CHtml::listData(Section::model()->findAll(array('order'=>'title ASC')),'id','title'),
                'value'=>'CHtml::link($data->section->title, Yii::app()->getController()->createUrl("/section/view/",array("id"=>$data->section_id)), array("target"=>"_blank"))',
            ),
        array(
            'name'=>'discarded',
            'value'=>'$data->discarded==0?\'Скрыто\':\'Опубликовано\'',
            'filter'=>array(1=>'Опубликовано', 0=>'Скрыто'),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
