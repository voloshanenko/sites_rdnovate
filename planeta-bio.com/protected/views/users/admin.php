<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Администрирование',
);

$this->menu=array(
	array('label'=>'Показать списком', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('users-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1>Управление пользователями</h1>
    <p>
        Вы можете воспользоваться операторами сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
        или <b>=</b>) в начале каждого поискового параметра.
    </p>
    <?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
	<br />
	<?php echo CHtml::link('Экспорт в CSV',array('export')); ?>
    <div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
        'model'=>$model,
    )); ?>
    </div><!-- search-form -->

    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'users-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
		'pager' => array(
			'pageSize'=>Yii::app()->params['adminItemsPerPage']
		),
        'columns'=>array(
            'user_id',
            'last_name',
            'first_name',
            'middle_name',
            'address',
            'email',
            array(
                'class'=>'CButtonColumn',
            ),
        ),
    )); ?>