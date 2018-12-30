<?php
$this->breadcrumbs=array(
	'Фотоконкурсы'=>array('index'),
	'Менеджмент',
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('contest-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
Yii::import('application.helpers.CString');
?>

<h1>Управление конкурсами</h1>

<p>
    Вы можете воспользоваться операторами сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    или <b>=</b>) в начале каждого поискового параметра.
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contest-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'pager' => array(
		'pageSize'=>Yii::app()->params['adminItemsPerPage']
	),
	'columns'=>array(
		'id',
		'title',
        array(
            'name'=>'sponsor_id',
            'type'=>'raw',
            'filter'=>CHtml::listData(Sponsor::model()->findAll(array('order'=>'name asc')),'id','name'),
            'value'=>'CHtml::link($data->sponsor->name, Yii::app()->getController()->createUrl("/photos/sponsor/".$data->sponsor->url), array("target"=>"_blank"))',
        ),
        array(
            'name'=>'date_start',
            'value'=>$model->date_start,
        ),
        array(
            'name'=>'date_end',
            'value'=>$model->date_end,
        ),
		'comment',
        'appeal',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
