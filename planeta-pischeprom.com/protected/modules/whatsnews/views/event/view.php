<?php
$this->pageTitle = 'События: ' . $model->title . ' - '.Yii::app()->name;
$this->metaKeywords = '';
$this->metaDescription = '';

$isPast = (strtotime($model->date_end)<time());

$this->breadcrumbs=array(
	'События'=>array('index'),
	$model->section->title=>array('event/category/id/'.$model->section->id),
	$model->title,
); 
Yii::import('application.helpers.CString');
?>
<div class="general-padding underlined">
	<?php if( !Yii::app()->user->isGuest AND Yii::app()->user->role=='admin' ) { ?>
		<small>[<a href="/whatsnews/event/update/id/<?=$model->id?>">Редактировать</a>]</small>
	<?php } ?>
	<div class="to-left page-content">
		<h3 class="text-to-center">
			Начало: <?=CString::readableDate($model->date_start, 'd.m.Y')?>, окончание: <?=CString::readableDate($model->date_end, 'd.m.Y')?>
		</h3>
		<h1 class="text-to-center"><?=$model->title?></h1>
		<?php if($isPast) { ?>
			<div class="flash-notice">
				Данное событие уже прошло, перейдите в <strong><a href="/whatsnews/event" target="_blank">актуальную базу</a></strong>.
			</div>
		<?php } ?>
		<div class="notes text-to-center">
			<p><big><?=$model->short_description?></big></p>
		</div>
		<div class="text-to-center">
		<a id="event-image" href="<?=$model->getImageWebPath('orig')?>">
			<img src="<?=$model->getImageWebPath('small')?>" alt="<?=$model->title?>" title="<?=$model->title?>" width="470" height="140" />
		</a>
		</div>
		<?=$model->full_description?>
		
		<!-- Banners -->
		<?php if(Yii::app()->BannerShow->bannersPlacedTo($model->section_id, 'p3')) { ?>
		<div class="general-block text-to-center upperlined html-box">
			<?php Yii::app()->BannerShow->showBanners($model->section_id, 'p3'); ?>
		</div>
		<?php } ?>
		
	</div>
	<div class="sidebar-box">
		<?php Yii::app()->Connection->setSectionId($model->section_id); ?>
		<?php Yii::app()->Connection->showPhotos(); ?>
		<?php Yii::app()->Connection->showContests(); ?>
		<?php Yii::app()->Connection->showQuestions(); ?>
		<?php Yii::app()->Connection->showAds(); ?>
		<?php Yii::app()->Connection->showNews(); ?>
		<?php Yii::app()->Connection->showArticles(); ?>
	</div>
</div>
<img id="event-orig-img" class="hide" src="<?=$model->getImageWebPath('orig')?>" alt="" />
<script>
    app.loaded(function(){
    	$("#event-image").click(function(e){
    		e.preventDefault();
			app.ui.shadowBox.init('640px').appendElement($("#event-orig-img").clone()).show();
			$(".shadowbox-box img").removeClass('hide');
    	});
        app.tools.loadCss('modules/shadowbox');
    });
</script>