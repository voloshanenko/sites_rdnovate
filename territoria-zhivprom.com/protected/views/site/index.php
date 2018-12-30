<?php
$this->pageTitle = Yii::app()->params['defaultMetaTitle'];
$this->metaKeywords = Yii::app()->params['defaultMetaKeywords'];
$this->metaDescription = Yii::app()->params['defaultMetaDescription'];
Yii::import('application.helpers.CString');
?>
<!-- Фотоконкурс
------------------------------------------------------------ -->
<div class="general-padding underlined" id="contests">
	<div class="html-box" id="contests-wrapper">
		<?php foreach($contests as $cont) { ?>
	    	<?php $this->widget('application.widgets.contest.contestWidget', array('contest'=>$cont, 'onMainPage'=>true)); ?>
	    <?php } ?>
	</div>
</div>

<!-- UsnaSuperBio Export -->
<div class="general-padding underlined">
<div id="usnasuperbio_placeholder">Загрузка...</div>
<script>
window.onload=function(){setTimeout(function(){$.getScript('http://usnasuperbio.com.ua/js/export.js');},1000)}</script>
</div>

<div class="general-padding underlined" id="qa">
<!-- Новости
------------------------------------------------------------ -->
	<div class="half-width-column to-left">
		<h2><a href="/whatsnews/news">Новости</a></h2>
		<?php if($news) { ?>
			<?php foreach ($news as $item) { ?>
				<?php $this->widget('application.widgets.whatsnews.news_widget', array('data'=>$item)); ?>
			<?php } ?>
		<?php } else { ?>
			<p class="gray-font">Новостей пока нет.</p>
		<?php } ?>
	</div>
<!-- События
------------------------------------------------------------ -->
	<div class="half-width-column to-right">
		<h2><a href="/whatsnews/event">События</a></h2>
		<?php if($events) { ?>
			<?php foreach ($events as $one) { ?>
				<?php $this->widget('application.widgets.whatsnews.event_widget', array('type'=>'tiny','data'=>$one)); ?>
			<?php } ?>
		<?php } else { ?>
			<p class="gray-font">Событий пока нет.</p>
		<?php } ?>
	</div>
</div>

<!-- Banners -->
<?php if(Yii::app()->BannerShow->bannersPlacedTo(false, 'p2')) { ?>
<div class="general-padding text-to-center underlined">
	<?php Yii::app()->BannerShow->showBanners(null, 'p2'); ?>
</div>
<?php } ?>
<div class="general-padding underlined">
<!-- Вопросы
------------------------------------------------------------ -->
	<div class="half-width-column to-left">
		<h2 class="to-left"><a href="/qa/question">Вопросы и ответы</a></h2>
		<a class="button green small to-right" href="/qa/question/ask">
			Задайте свой вопрос
		</a>
		<br clear="all" />
		<?php foreach ($questions as $qstn) { ?>
			<?php $this->widget('application.widgets.qa.questionWidget', array('item'=>$qstn, 'viewType'=>'briefly')); ?>
		<?php } ?>
	</div>
<!-- Объявления
------------------------------------------------------------ -->
	<div class="half-width-column to-right">
		<h2><a href="/library/article">Библиотека</a></h2>
		<?php foreach ($articles as $one) { ?>
			<?php $this->widget('application.widgets.library.libArticle', array('type'=>'tiny','content'=>$one)); ?>
		<?php } ?>
	</div>
</div>

<script>
    app.loaded(function(){
        app.tools.loadModule('ad');
        app.tools.loadModule('photowall');
        app.tools.loadCss('modules/contest');
        app.tools.loadCss('modules/scrollerbox');
        app.tools.loadCss('modules/library');
        app.tools.loadCss('modules/reklitem');
    });
</script>
