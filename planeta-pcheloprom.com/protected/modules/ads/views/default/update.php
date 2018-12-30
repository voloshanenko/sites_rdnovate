<?php
$this->breadcrumbs=array(
	'Объявления'=>array('index'),
	$model->title=>array('view','id'=>$model->ad_id),
	'Редактирование',
);

$this->pageTitle = ($model->meta_title ? $model->meta_title : Yii::app()->params['defaultMetaKeywords']).' - объявления на сайте '.Yii::app()->name;
$this->metaKeywords = $model->meta_keywords ? $model->meta_keywords : Yii::app()->params['defaultMetaKeywords'];
$this->metaDescription = $model->meta_description ? $model->meta_description : Yii::app()->params['defaultMetaDescription'];

$this->menu=array(
	array('label'=>'List Ads', 'url'=>array('index')),
	array('label'=>'Create Ads', 'url'=>array('create')),
	array('label'=>'View Ads', 'url'=>array('view', 'id'=>$model->ad_id)),
	array('label'=>'Manage Ads', 'url'=>array('admin')),
);
?>

<div class="general-padding underlined">
	<h1>Изменение объявления №<?=$model->ad_id?> "<?=$model->title?>"</h1>
	<?php echo $this->renderPartial('_form', array(
		'model'=>$model,
		'user'=>$user
	)); ?>
</div>

<script>
    app.loaded(function(){
    	app.tools.loadModule('ad', function(){
    		app.modules.ad.initializePostPage();
    	});
    });
</script>