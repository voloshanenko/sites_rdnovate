<?php
$this->breadcrumbs=array(
	'Объявления'=>array('index'),
	'Результаты поиска',
);
Yii::import('application.helpers.CString');

$this->pageTitle = 'Поиск по объявлениям на сайте '.Yii::app()->name;
$this->metaKeywords = Yii::app()->params['defaultMetaKeywords'];
$this->metaDescription = Yii::app()->params['defaultMetaDescription'];

?>
<div class="general-padding underlined">
	<h1 class="to-left">Результаты поиска</h1>
	<div class="half-width to-right">
		<a class="button green to-right" href="<?=Yii::app()->controller->createUrl('/ads/default/create/')?>">
			<big>Добавить объявление</big>
		</a>
	</div>
	<div class="html-box" id="ads-filter" style="opacity: 0">
		<?php $this->renderPartial('_filter',array('model'=>$model)); ?>
	</div>
</div>

<div class="general-padding underlined">
	<?php if($data) { ?>
	<div class="vertical-list">
		<?php foreach($data as $ad) { ?>
			<?php $this->widget('application.widgets.ads.ad', array('canAdmin'=>$this->canAdminAction(), 'type'=>'listing', 'item'=>$ad, 'own' => $own)) ?>
		<?php } ?>
	</div>
	<?php } else { ?>
		<span class="notes">Увы, но по Вашему запросу объявлений не найдено.</span>
	<?php } ?>
</div>

<div class="general-padding underlined pagination">
	<?php $this->widget('CLinkPager', array(
	    'pages' => $dataProvider->pagination,
	    'header'=>'Перейти: ',
	    'nextPageLabel'=>'Далее',
	    'prevPageLabel'=>'Назад'
	)) ?>
</div>

<?php
$kind = ($currentSection) ? $currentSection : false;
$position = ($currentSection)?'p4':'p2';
if(Yii::app()->BannerShow->bannersPlacedTo($kind, $position)) {		
?>
<div class="general-padding text-to-center underlined">
	<?php Yii::app()->BannerShow->showBanners($kind, $position); ?>
</div>
<?php } ?>

<script>
    app.loaded(function(){
    	app.tools.loadModule('ad', function(){
    		app.modules.ad.initializeFilter();
    	});
        app.tools.loadCss('modules/reklitem');
    });
</script>