<?php
$this->pageTitle = 'Новости: ' . $model->title . ' - '.Yii::app()->name;
$this->metaKeywords = '';
$this->metaDescription = '';

$this->breadcrumbs=array(
	'Новости'=>array('index'),
	$model->title,
);
Yii::import('application.helpers.CString');
?>
<div class="general-padding underlined">
	<?php if( !Yii::app()->user->isGuest AND Yii::app()->user->role=='admin' ) { ?>
		<small>[<a href="/whatsnews/news/update/id/<?=$model->id?>">Редактировать</a>]</small>
	<?php } ?>
	<div class="to-left page-content">	
		<h1 class="text-to-center"><?=$model->title?></h1>
		<?php if($this->canAdminAction()) { ?>
			<div class="admin-bar">
				<a href="<?=$this->createUrl('delete', array('id'=>$model->id))?>" onclick="return confirm('Вы уверены?')">Удалить</a>,
				<a href="<?=$this->createUrl('update', array('id'=>$model->id))?>">Изменить</a>
			</div>
		<?php } ?>
		<span class="gray-font">Опубиковано: <?=CString::readableDate($model->publishing_date)?></span>
		<div class="notes text-to-center"><p>
			<a class="to-left" id="event-image" href="<?=$model->getImageWebPath('orig')?>">
				<img src="<?=$model->getImageWebPath('small')?>" alt="<?=$model->title?>" title="<?=$model->title?>" width="300" height="140" />
			</a>
			<big><?=$model->intro?></big></p>
		</div>
		<div class="html-box">
			<?=$model->full_text?>
		</div>
		
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
		<?php Yii::app()->Connection->showEvents(); ?>
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