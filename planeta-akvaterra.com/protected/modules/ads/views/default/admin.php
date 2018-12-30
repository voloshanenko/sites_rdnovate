<?php
$this->breadcrumbs=array(
  'Объявления'=>array('index'),
  'Управление',
);

$this->menu=array(
  array('label'=>'Вывести списком', 'url'=>array('index')),
  array('label'=>'Опубликовать', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
});
$('.search-form form').submit(function(){
  $.fn.yiiGridView.update('ads-grid', {
    data: $(this).serialize()
  });
  return false;
});
");
?>

<h1>Администрирование объявлений</h1>

<p>
    Вы можете воспользоваться операторами сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    или <b>=</b>) в начале каждого поискового параметра.
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<br />
<a href="/ads/default/export">Экспортировать в CSV</a>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
  'model'=>$model->with('author','section'),
)); ?>

</div><!-- search-form -->

<?php
  $asd = new CDbCriteria;
  $asd->addInCondition('user_id', CHtml::listData(Ads::model()->findAll(array('select'=>'owner_id')), 'owner_id', 'owner_id'));
  $asd->order = 'last_name asc, first_name asc';
  $users = Users::model()->findAll($asd);
  Yii::import('application.helpers.CString');
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
  'id'=>'ads-grid',
  'dataProvider'=>$model->search(),
  'filter'=>$model,
  'pager' => array(
    'pageSize'=>Yii::app()->params['adminItemsPerPage'],
  ),
  'rowCssClassExpression'=>'$data->cssColoring',
  'columns'=>array(
    'ad_id',
    array(
            'name'=>'main_image',
            'type'=>'html',
            'filter'=>'',
            'value'=>'Chtml::image($data->getImageWebPath("small"))',
        ),
    'title',
    array(
            'name'=>'owner_id',
            'type'=>'raw',
            'filter'=>CHtml::listData($users, 'user_id', 'AdminFullName'),
            'value'=>'!isset($data->author) ? "" : CHtml::link($data->author->getAdminFullName(), Yii::app()->getController()->createUrl("/users/view",array("id"=>$data->owner_id)), array("target"=>"_blank"))',
        ),
    array(
            'name'=>'section_id',
            'type'=>'raw',
            'filter'=>CHtml::listData(Section::model()->findAll(),'id','title'),
            'value'=>'CHtml::link($data->section->title, Yii::app()->getController()->createUrl("/section/view/",array("id"=>$data->section_id)), array("target"=>"_blank"))',
        ),
        array(
      'name'=>'end_publishing_date',
      'filter'=>'',
      'value'=>'CString::readableDate($data->end_publishing_date, "D d.m.Y")'
    ),
        'city',
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