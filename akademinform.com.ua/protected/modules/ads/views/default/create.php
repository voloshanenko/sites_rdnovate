<?php
$this->breadcrumbs=array(
	'Объявления'=>array('index'),
	'Публикация',
);

$this->pageTitle = 'Добавление объяления на сайте '.Yii::app()->name;
$this->metaKeywords = Yii::app()->params['defaultMetaKeywords'];
$this->metaDescription = Yii::app()->params['defaultMetaDescription'];

$this->menu=array(
	array('label'=>'List Ads', 'url'=>array('index')),
	array('label'=>'Manage Ads', 'url'=>array('admin')),
);
?>
<div class="general-padding underlined">
	<h1>Добавить объявление</h1>
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