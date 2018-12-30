<?php
$this->breadcrumbs=array(
	'Партнеры',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);

$this->pageTitle = 'Партнеры - '.Yii::app()->name;
?>

<h1>Партнеры</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<!-- Banners position: P2 -->
<?php if(Yii::app()->BannerShow->bannersPlacedTo(false, 'p2')) { ?>
<div class="general-padding text-to-center underlined">
	<?php Yii::app()->BannerShow->showBanners(false, 'p2'); ?>
</div>
<?php } ?>