<?php
$this->breadcrumbs=array(
	'Фотографии'=>array('index'),
	'Администрирование',
);

$this->menu=array(
	array('label'=>'Списком', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('photos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="general-padding underlined">
    <h1>Администрирование фото</h1>
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
        'id'=>'photos-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
		'pager' => array(
			'pageSize'=>Yii::app()->params['adminItemsPerPage']
		),
        'columns'=>array(
            'id',
            array(
                'name'=>'url',
                'type'=>'html',
                'value'=>'Chtml::image(\'/images/Photos/\'.$data->id.\'/small_\'.$data->url)',
            ),
            'name',
            array(
                'name'=>'user_id',
                'type'=>'raw',
                'filter'=>CHtml::listData(Users::model()->findAll(array('order'=>'first_name ASC, last_name ASC')),'user_id','fullName'),
                'value'=>'CHtml::link($data->owner->getFullName(), Yii::app()->getController()->createUrl("/users/view",array("id"=>$data->user_id)), array("target"=>"_blank"))',
            ),
            array(
                'name'=>'contest_id',
                'type'=>'raw',
                'value'=>'CHtml::link($data->contest->title, Yii::app()->getController()->createUrl("/photos/contest/view",array("id"=>$data->contest->id)), array("target"=>"_blank"))',
                'filter'=>CHtml::listData(Contest::model()->findAll(array('order'=>'title ASC')), 'id', 'title'),
            ),
            array(
                'name'=>'section_id',
                'type'=>'raw',
                'value'=>'CHtml::link($data->section->title, Yii::app()->getController()->createUrl("/section/view",array("id"=>$data->section->id)), array("target"=>"_blank"))',
                'filter'=>CHtml::listData(Section::model()->findAll(array('order'=>'title ASC')), 'id', 'title'),
            ),
            array(
                'name'=>'published',
                'value'=>'$data->discarded==0?\'Показывается\':\'Скрыто\'',
                'filter'=>array(1=>'Скрыто', 0=>'Показывается'),
            ),
            array(
                'name'=>'discarded',
                'value'=>'$data->discarded==0?\'Принято\':\'Не принято\'',
                'filter'=>array(1=>'Не принято', 0=>'Принято'),
            ),
            array(
                'class'=>'CButtonColumn',
            ),
        ),
    )); ?>
</div>