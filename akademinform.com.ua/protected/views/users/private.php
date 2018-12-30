<?php
Yii::import('application.helpers.CString');
$this->breadcrumbs=array(
	'Приватный раздел'
);
$this->pageTitle = 'Приватный раздел - '.Yii::app()->name;
?>
<div class="general-padding underlined">
	<h1><?=$user->getFullName()?></h1>
	<div id="user-cabinet">
		<ul>
			<li><a href="#photos">Мои фотографии</a></li>
			<li><a href="#ads">Мои объявления</a></li>
			<li><a href="#info">Редактировать профиль</a></li>
		</ul>
		<div id="photos">
	        <p><big><a href="<?=Yii::app()->createUrl('photos/item/create');?>">Загрузите еще фото!</a></big></p>
	        <?php $this->widget('application.widgets.contest.wall', array('photos'=>$user->photos, 'type'=>'private')); ?>
	    </div>
	    <div id="ads">
	    	<big><a href="/ads/default/create">Разместить объявление</a></big>
	        <div class="vertical-list">
	            <?php foreach($user->ads as $ad) { ?>
	                <?php $this->widget('application.widgets.ads.ad', array('type'=>'short', 'item'=>$ad, 'own' => true)) ?>
	            <?php } ?>
	        </div>
	    </div>
		<div id="info">
	        <?php Yii::app()->controller->renderPartial('_form', array('model'=>$user)); ?>
	    </div>
	</div>
</div>
<div id="dialog-remove-photo" title="Вы уверены?" class="hide">
    <p>Вы уверены, что хотите удалить это фото?</p>
</div>
<script>
    app.loaded(function(){
        app.tools.loadModule('ads');
        app.tools.loadModule('photo');
        app.tools.loadCss('modules/contest');
        app.tools.loadCss('modules/scrollerbox');
        app.tools.loadCss('modules/contentslider');
        $("#user-cabinet").tabs();
    });
</script>