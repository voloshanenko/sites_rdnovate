<?php
Yii::import('application.helpers.CString');
$this->pageTitle = 'События: администрирование - '.Yii::app()->name;
$this->metaKeywords = '';
$this->metaDescription = '';

$this->breadcrumbs=array(
	'События'=>array('index'),
	'Администрирование',
);

$this->menu=array(
	array('label'=>'Списком', 'url'=>array('index')),
	array('label'=>'Добавить', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('partners-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>События: администрирование</h1>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'event-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'pager' => array(
		'pageSize'=>Yii::app()->params['adminItemsPerPage']
	),
	'rowCssClassExpression'=>'$data->cssColoring',
	'columns'=>array(
		'id',
		'title',
		array(
			'name'=>'date_start',
			'filter'=>'',
			'value'=>'CString::readableDate($data->date_start, "D d.m.Y")'
		),
		array(
			'name'=>'date_end',
			'filter'=>'',
			'value'=>'CString::readableDate($data->date_end, "D d.m.Y")'
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
