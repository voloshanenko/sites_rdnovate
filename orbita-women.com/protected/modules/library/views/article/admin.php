<?php
$this->breadcrumbs=array(
	'Библиотека'=>array('index'),
	'Менеджмент',
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
	array('label'=>'Создать статью', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('article-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление статьями</h1>

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

<div class="html-box">
	<a href="/library/article/export">Экспортировать в Excel</a>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'pager' => array(
		'pageSize'=>Yii::app()->params['adminItemsPerPage']
	),
	'columns'=>array(
		'id',
		array(
            'name'=>'section_id',
            'type'=>'raw',
            'filter'=>CHtml::listData(Section::model()->findAll(array('order'=>'title ASC')),'id','title'),
            'value'=>'CHtml::link($data->section->title, Yii::app()->getController()->createUrl("/section/view/",array("id"=>$data->section_id)), array("target"=>"_blank"))',
        ),
		'url',
		'title',
        array(
            'name'=>'published',
            'value'=>'$data->published==0?\'Скрыто\':\'Опубликовано\'',
            'filter'=>array(1=>'Опубликовано', 0=>'Скрыто'),
        ),
        array(
            'name'=>'archived',
            'value'=>'$data->archived==0?\'Актуальное\':\'Архив\'',
            'filter'=>array(1=>'Архивировано', 0=>'Актуальное'),
        ),
        array(
            'name'=>'show_on_main',
            'value'=>'$data->show_on_main==0?\'Нет\':\'Да\'',
            'filter'=>array(1=>'Показывать', 0=>'Не показывать'),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
