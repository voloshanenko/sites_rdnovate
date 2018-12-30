<?php
    Yii::import('application.helpers.CString');
    $this->breadcrumbs=array(
    	'Фотоконкурсы'=>array('/photos/item'),
		'Окончившиеся фотоконкурсы'
	);
    $this->pageTitle='Окончившиеся фотоконкурсы';
?>
<!-- Past contests -->
<div class="general-padding" id="passed-contests">
	<h1 class="page-title">Окончившиеся фотоконкурсы</h1>
	<?php if($pastContests) { ?>
		<div class="html-box">
	    <?php foreach($pastContests as $cont) { ?>
	    	<?php $this->widget('application.widgets.contest.contestWidget', array('contest'=>$cont)); ?>
	    <?php } ?>
	    </html>
	<?php } else { ?>
		<p class="text-to-center">
			Окончившихся конкурсов не зарегистрированно.
		</p>
	<?php } ?>
</div>

<!-- Banners position: P2 -->
<?php if(Yii::app()->BannerShow->bannersPlacedTo(false, 'p2')) { ?>
<div class="general-padding text-to-center underlined">
	<?php Yii::app()->BannerShow->showBanners(false, 'p2'); ?>
</div>
<?php } ?>

<div class="general-padding upperlined pagination">
<?php $this->widget('CLinkPager', array(
	'nextPageLabel' => 'Далее',
	'prevPageLabel' => 'Назад',
	'header' => 'Перейти: ',
    'pages' => $pages,
)) ?>

<script>
    app.loaded(function(){
        app.tools.loadModule('photowall');
        app.tools.loadCss('modules/shadowbox');
        app.tools.loadCss('modules/contest');
        app.tools.loadCss('modules/scrollerbox');
    });
</script>