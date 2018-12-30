<?php
$this->breadcrumbs=array(
	$own ? 'Ваши объявления' : 'Объявления',
);
Yii::import('application.helpers.CString');

$this->pageTitle = ($model->meta_title ? $model->meta_title : Yii::app()->params['defaultMetaKeywords']).' - объявления на сайте '.Yii::app()->name;
$this->metaKeywords = $model->meta_keywords ? $model->meta_keywords : Yii::app()->params['defaultMetaKeywords'];
$this->metaDescription = $model->meta_description ? $model->meta_description : Yii::app()->params['defaultMetaDescription'];

?>
<!-- Ads Filter -->
<div class="general-padding underlined">
	
	<!-- Header -->
	<h1 class="to-left">Объявления</h1>
	<div class="half-width to-right">
		<a class="button green small to-right" href="<?=Yii::app()->controller->createUrl('/ads/default/create/')?>">
			Добавить объявление
		</a>
	</div>
	
	<!-- filter -->
	<div class="html-box" id="ads-filter" style="opacity: 0">
		<?php $this->renderPartial('_filter',array('model'=>$dataProvider->model)); ?>
	</div>
</div>

<!-- Ads Listing -->
<div class="general-padding underlined">
	<div class="vertical-list">
		<?php foreach($dataProvider->getData() as $ad) { ?>
			<?php $this->widget('application.widgets.ads.ad', array('canAdmin'=>$this->canAdminAction(), 'type'=>'listing', 'item'=>$ad, 'own' => $own)) ?>
		<?php } ?>
	</div>
</div>

<!-- Ads Block: Position: P2 -->
<?php
$kind = ($currentSection) ? $currentSection : false;
$position = ($currentSection)?'p4':'p2';
if(Yii::app()->BannerShow->bannersPlacedTo($kind, $position)) {		
?>
<div class="general-padding text-to-center underlined">
	<?php Yii::app()->BannerShow->showBanners($kind, $position); ?>
</div>
<?php } ?>

<!-- Ads Pagination -->
<div class="general-padding underlined pagination">
	<?php $this->widget('CLinkPager', array(
	    'pages' => $dataProvider->pagination,
	    'header'=>'Перейти: ',
	    'nextPageLabel'=>'Далее',
	    'prevPageLabel'=>'Назад'
	)) ?>
</div>
<script>
    app.loaded(function(){
    	app.tools.loadModule('ad', function(){
    		app.modules.ad.initializeFilter();
    		app.modules.ad.initializeAdsList();
    	});
    	app.tools.loadCss('modules/shadowbox');
      app.tools.loadCss('modules/reklitem');
    });
</script>