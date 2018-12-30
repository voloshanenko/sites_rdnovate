<?php
Yii::import('application.helpers.CString');

$this->pageTitle = ($model->meta_title ? $model->meta_title : Yii::app()->params['defaultMetaKeywords']).' - статья из библиотеки на сайте '.Yii::app()->name;
$this->metaKeywords = $model->meta_keywords ? $model->meta_keywords : Yii::app()->params['defaultMetaKeywords'];
$this->metaDescription = $model->meta_description ? $model->meta_description : Yii::app()->params['defaultMetaDescription'];

$this->breadcrumbs=array(
	'Библиотека'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Вывести списком', 'url'=>array('index')),
	array('label'=>'Создать статью', 'url'=>array('create')),
	array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить эту статью?')),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>
<div class="general-padding underlined">
	<div id="article-body">
		<div class="to-left page-content">
			<small class="gray-font" id="article-publishing-date"><?=CString::readableDate($model->publishing_date)?></small>
			<div class="text-to-center">
				<?php if($model->archived) { ?><small>Из архива</small><?php } ?>
				<h1 class="article-title"><?=$model->title?></h1>
				<?php if($this->canAdminAction()) { ?>
					<div class="admin-bar">
						<a href="<?=$this->createUrl('delete', array('id'=>$model->id))?>" onclick="return confirm('Вы уверены?')">Удалить</a>,
						<a href="<?=$this->createUrl('update', array('id'=>$model->id))?>">Изменить</a>
					</div>
				<?php } ?>
			</div>
			<div id="article-intro">
				<?php if($model->iconExists('middle')) { echo CHtml::image($model->getIconPath('middle'), $model->title, array(
					'width'=>Yii::app()->controller->module->mediumIconWidth,
					'height'=>Yii::app()->controller->module->mediumIconHeight,
					)); }
				?>
				<?=$model->intro?>
			</div>
			<?=$model->body?>
			
			<!-- Banners -->
			<?php if(Yii::app()->BannerShow->bannersPlacedTo($model->section->id, 'p3')) { ?>
			<div class="general-block upperlined text-to-center html-box">
				<?php Yii::app()->BannerShow->showBanners($model->section->id, 'p3'); ?>
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
			<?php Yii::app()->Connection->showAds(); ?>
		</div>
	</div>
</div>

<?php if($model->tags) { ?>
<div class="general-padding underlined">
	<?php foreach($model->splitTags() as $tag) { ?>
		<a href="/library/article/tag/word/<?=$tag?>"><?=$tag?></a>
	<?php } ?>
</div>
<?php } ?>

<?php if($more) { ?>
<div class="general-padding underlined">
	А также:
	<ul>
	<?php foreach ($more as $art) { ?>
		<li><a href="/library/article/<?=$art->url?>"><?=$art->title?></a></li>
	<?php } ?>
	</ul>
</div>
<?php } ?>

<script>
    app.loaded(function(){
        app.tools.loadCss('modules/library');
    });
</script>