<?php
$this->breadcrumbs=array(
	'Информация',
	$model->title,
);
$this->pageTitle = $model->title.' - ' . Yii::app()->name;
?>
<div class="general-padding underlined">
	<h1><?=$model->title;?></h1>
	<?=$model->body?>

	<!-- Ads Block: Position: P3 -->
	<?php if(Yii::app()->BannerShow->bannersPlacedTo(null, 'p3')) { ?>
	<div class="general-block text-to-center upperlined">
		<?php Yii::app()->BannerShow->showBanners(null, 'p3'); ?>
	</div>
</div>
<?php } ?>