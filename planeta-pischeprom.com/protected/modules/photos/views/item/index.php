<?php
    Yii::import('application.helpers.CString');
    $this->breadcrumbs=array('Фотоконкурсы');
    $this->pageTitle='Фотоконкурсы';
?>
<!-- Current -->
<div class="general-padding" id="current-contests">
	<h1 class="page-title">Текущие фотоконкурсы</h1>
	<?php if($presentContests) { ?>
	    <div class="html-box">
	        <?php foreach($presentContests as $cont) { ?>
	        	<?php $this->widget('application.widgets.contest.contestWidget', array('contest'=>$cont)); ?>
	        <?php } ?>
	    </div>
    <?php } else { ?>
		<p class="text-to-center">
			Увы, в данный момент конкурсы не проводятся.
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