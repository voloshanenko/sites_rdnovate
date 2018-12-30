<?php
    Yii::import('application.helpers.CString');
    $this->breadcrumbs=array(
    	'Фотоконкурсы'=>array('/photos/item'),
		'Будущие фотоконкурсы'
	);
    $this->pageTitle='Будущие фотоконкурсы';
?>
<div class="general-padding" id="future-contests">
	<h1 class="page-title">Будущие фотоконкурсы</h1>
	<!-- Future contests -->
	<?php if($futureContests) { ?>
		<div class="html-box">
		    <?php foreach($futureContests as $cont) { ?>
		    	<?php $this->widget('application.widgets.contest.contestWidget', array('contest'=>$cont)); ?>
		    <?php } ?>
	    </html>
	<?php } else { ?>
		<p class="text-to-center">
			Увы, конкурсы не планируются.
		</p>
	<?php } ?>
</div>

<!-- Banners position: P2 -->
<?php if(Yii::app()->BannerShow->bannersPlacedTo(false, 'p2')) { ?>
<div class="general-padding text-to-center underlined">
	<?php Yii::app()->BannerShow->showBanners(false, 'p2'); ?>
</div>
<?php } ?>

<script>
    app.loaded(function(){
        app.tools.loadModule('photowall');
        app.tools.loadCss('modules/shadowbox');
        app.tools.loadCss('modules/contest');
        app.tools.loadCss('modules/scrollerbox');
    });
</script>