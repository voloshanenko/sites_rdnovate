<?php
$this->pageTitle = ($model->meta_title ? $model->meta_title : Yii::app()->params['defaultMetaKeywords']).' - '.Yii::app()->name;
$this->metaKeywords = $model->meta_keywords ? $model->meta_keywords : Yii::app()->params['defaultMetaKeywords'];
$this->metaDescription = $model->meta_description ? $model->meta_description : Yii::app()->params['defaultMetaDescription'];

$this->breadcrumbs=array(
	'Фотоконкурсы'=>array('index'),
	$model->title,
);

$this->menu=array(
    array('label'=>'Вывести списком', 'url'=>array('index')),
    array('label'=>'Добавить', 'url'=>array('create')),
    array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Удалить текущий', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить конкурс из БД?')),
    array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>

<h1>Фотоконкурс "<?php echo $model->title; ?>"</h1>

<?php
Yii::import('application.helpers.CString');
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
        array(
            'label' => 'Дата старта',
            'type' => 'raw',
            'value'=>CString::readableDate($model->date_start)
        ),
        array(
            'label' => 'Дата окончания',
            'type' => 'raw',
            'value'=>CString::readableDate($model->date_end)
        ),
        array(
            'label' => 'Категория',
            'type' => 'raw',
            'value'=>$model->section->title
        ),
        array(
            'label' => 'Спонсор',
            'type' => 'raw',
            'value'=>CHtml::link($model->sponsor->name, '/photos/sponsor/view/id/'.$model->sponsor->id)
        ),
        array(
            'label' => 'Партнер',
            'type' => 'raw',
            'value'=>CHtml::link($model->partner->name, '/photos/partners/view/id/'.$model->partner->id)
        ),
		'comment',
        'appeal',
        'show_on_main',
        array(
            'label' => 'Приз за первое место',
            'type' => 'raw',
            'value'=>CHtml::image($model->prize1, '')
        ),
        array(
            'label' => 'Приз за второе место',
            'type' => 'raw',
            'value'=>CHtml::image($model->prize2, '')
        ),
        array(
            'label' => 'Приз за третье место',
            'type' => 'raw',
            'value'=>CHtml::image($model->prize3, '')
        ),
	),
)); ?>
