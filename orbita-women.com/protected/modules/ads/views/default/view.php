<?php
$this->breadcrumbs=array(
	'Объявления'=>array('index'),
	$model->title,
);

$isPast = (strtotime($model->end_publishing_date)<time());

$this->pageTitle = ($model->meta_title ? $model->meta_title : Yii::app()->params['defaultMetaKeywords']).' - объявление на сайте '.Yii::app()->name;
$this->metaKeywords = $model->meta_keywords ? $model->meta_keywords : Yii::app()->params['defaultMetaKeywords'];
$this->metaDescription = $model->meta_description ? $model->meta_description : Yii::app()->params['defaultMetaDescription'];

$this->menu=array(
	array('label'=>'Разместить еще объявление', 'url'=>array('create')),
	array('label'=>'Изменить текущее', 'url'=>array('update', 'id'=>$model->ad_id)),
	array('label'=>'Удалить текущее', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ad_id),'confirm'=>'Вы уверены, что хотите удалить это объявление?')),
);
Yii::import('application.helpers.CString');
?>

<div class="general-padding underlined">
	<div class="html-box">
		<div class="to-left page-content">
			<!-- Ads header -->
			<strong><?=$model->adType[$model->ad_type]?></strong>
			<h1><span class="gray-font">#<?=$model->ad_id?></span>: <?=$model->title?></h1>
			<?php if($this->canAdminAction()) { ?>
				<div class="admin-bar">
					<a href="<?=$this->createUrl('delete', array('id'=>$model->ad_id))?>" onclick="return confirm('Вы уверены?')">Удалить</a>,
					<a href="<?=$this->createUrl('update', array('id'=>$model->ad_id))?>">Изменить</a>
				</div>
			<?php } ?>
			<p class="gray-font">
				Размещено: <?=CString::readableDate($model->publishing_date)?>
				в разделе <a href="/ads/default/category/id/<?=$model->section->id?>"><?=$model->section->title?></a>,
				просмотров: <?php echo $model->views; ?>.
			</p>
			
			<?php if($isPast) { ?>
				<div class="flash-notice">
					Это объявление не актуально, перейдите в <strong><a href="/ads" target="_blank">актуальную базу</a></strong>.
				</div>
			<?php } ?>
			
			<!-- Ads body -->
			<big>
				<div class="to-left">
					<a title="Увеличить фото" class="rekl-img-container" target="_blank" href="<?=$model->getImageWebPath('orig')?>">
						<?=CHtml::image($model->getImageWebPath('small'), $model->title, array('class'=>'reklimg'))?>
					</a>
				</div>
				<span><?php echo nl2br($model->ad_text)?></span>
			</big>
			
			<!-- Constacts and some info -->
			<div class="html-box rekl-box-intro">
				<div class="to-left half-width">
					<h3 class="gray-font">Контакты:</h3>
					<p>
						<strong><?=$model->contact_person?></strong><br />
						<?=nl2br($model->contacts)?><br />
						<?=$model->city?>, <?=$model->suburb?><br /><?=$model->street?>
					</p>
				</div>
				<div class="to-right half-width">
					<h3 class="gray-font">Инфо:</h3>
					<p>
						Подкатегория: <?=$model->breed?>
					</p>
				</div>
			</div>
			
			<!-- Ads Block: Position: P3 -->
			<?php if(Yii::app()->BannerShow->bannersPlacedTo($model->section_id, 'p3')) { ?>
			<div class="html-box text-to-center">
				<?php Yii::app()->BannerShow->showBanners($model->section_id, 'p3'); ?>
			</div>
			<?php } ?>

		</div>
		<div class="sidebar-box">
			<?php Yii::app()->Connection->setSectionId($model->section_id); ?>
			<?php Yii::app()->Connection->showPhotos(); ?>
			<?php Yii::app()->Connection->showContests(); ?>
			<?php Yii::app()->Connection->showQuestions(); ?>
			<?php Yii::app()->Connection->showNews(); ?>
			<?php Yii::app()->Connection->showEvents(); ?>
			<?php Yii::app()->Connection->showArticles(); ?>
		</div>
	</div>
</div>
<div class="general-padding underlined">
	<?php if($model->owner_id == Yii::app()->user->id) { ?>
		<h3>Владельцу объявления</h3>
		<?php $this->widget('zii.widgets.CMenu', array('items'=>$this->menu)); ?>
	<?php } ?>
</div>
<script>
    app.loaded(function(){
        app.tools.loadModule('ad', function(){
        	app.modules.ad.initAdPage();
        });
        app.tools.loadCss('modules/shadowbox');
        app.tools.loadCss('modules/reklitem');
    });
</script>