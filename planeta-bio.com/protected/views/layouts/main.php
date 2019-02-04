<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <script>var TS = '<?=date('y_m_d')?>';</script>
	<script src="/js/script.js?<?=date('y_m_d')?>"></script>
	<script type="text/javascript">
		app.loaded(function(){
			app.tools.loadCss('modules/shadowbox');
			app.tools.loadModule('search', function(){
				app.modules.search.init();
			});
		});
	</script>
    <title><?=CHtml::encode($this->pageTitle); ?></title>
    <meta name="keywords" content="<?=CHtml::encode($this->metaKeywords)?>" />
    <meta name="description" content="<?=CHtml::encode($this->metaDescription)?>" />

    <link rel="stylesheet" type="text/css" href="/css/screen.css?<?=time()?>" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="/css/print.css" media="print" />

    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="/css/main.css?<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="/css/form.css?<?=time()?>" />
    <link rel="stylesheet" type="text/css" href="/css/ui-theme/jquery-ui-1.8.16.custom.css?<?=time()?>" />
</head>

<body>

<div id="header" class="container">
	<a id="logo" href="/"><?php echo CHtml::image('/images/Design/logo.png', CHtml::encode(Yii::app()->name)); ?></a>
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>'http://planeta-bio.com/'),
				array('label'=>'Вопросы и ответы', 'url'=>array('/qa/question'), 'items'=>array(
					array('label'=>'Задать вопрос', 'url'=>array('/qa/question/ask')),
				)),
				array('label'=>'Новости', 'url'=>array('/whatsnews/news')),
				array('label'=>'События', 'url'=>array('/whatsnews/event')),
				array('label'=>'Фотоконкурсы', 'url'=>array('/photos/item/'), 'items'=>array(
					array('label'=>'Будущие фотоконкурсы', 'url'=>array('/photos/item/future')),
					array('label'=>'Окончившиеся фотоконкурсы', 'url'=>array('/photos/item/past')),
                    array('label'=>'Спонсоры', 'url'=>array('/photos/sponsor/')),
                    array('label'=>'Партнеры', 'url'=>array('/photos/partners/')),
				)),
                array('label'=>'Фотографии', 'url'=>array('/photos/item/all'), 'items'=>array(
					array('label'=>'Загрузить фото', 'url'=>array('/photos/item/create')),
				)),
				array('label'=>'Вопрос-ответ', 'url'=>array('/'),'visible'=>false),
				array('label'=>'Библиотека', 'url'=>array('/library/article')),
			),
		)); ?>
	</div><!-- mainmenu -->
	<div id="user-menu">
		<?php if( Yii::app()->user->isGuest ) { ?>
			<a href="/site/login">Вход</a> 
		<?php } else { ?>
			<div id="user">
				<?=Yii::app()->user->name?>
				<ul>
					<li><a href="/users/private">Мой аккаунт</a></li>
					<li><a href="/site/logout">Выйти</a></li>
				</ul>
			</div>
		<?php } ?>
	</div><!-- user-menu -->
	<div id="search">
	    <?php if(!Yii::app()->user->isGuest) { ?>
	    	<?php if(Yii::app()->user->role=='admin' || Yii::app()->user->role=='manager'){ ?>
		        <div class="to-left" id="administrator-menu">
		            <ul>
		                <li id="admin-menu-root">
		                    <span>Администрирование (<?=Yii::app()->user->role?>)</span>
		                    <ul>
		                        <?php foreach($this->adminMenu as $key=>$val) { ?>
		                        	<li><a href="/<?=$key?>/admin"><?=$val?></a></li>	
		                       	<?php } ?>
		                    </ul>
		                </li>
		            </ul>
		        </div>
        	<?php } ?>
        <?php } ?>
		<input class="to-right" type="text" id="search-box-placeholder" placeholder="Поиск" />
		<div id="search-box" class="hidden">
			<form action="/search/" method="post" id="search-form">
			<dl>
				<dt>Что искать</dt>
				<dd><input id="search-term" type="text" name="term" autocomplete="off" /></dd>

				<dt>Где искать</dt>
				<dd>
					<input checked="checked" type="radio" name="section" id="articles" value="article" />
					<label for="articles">Библиотека</label>
					<input type="radio" name="section" id="photos" value="photos" />
					<label for="photos">Фотографии</label>
					<input type="radio" name="section" id="events" value="event" />
					<label for="events">События</label>
					<input type="radio" name="section" id="news" value="news" />
					<label for="news">Новости</label>
					<input type="radio" name="section" id="qa" value="question" />
					<label for="qa">Вопросы</label>
				</dd>
			</dl>
			<div class="text-to-center"><input type="submit" value="Найти" id="find-button" class="button" /></div>
			</form>
		</div>
	</div><!-- search -->
</div><!-- header -->

<div class="container" id="page">
	<!-- Flash messages -->
	<?php
		$flashMessages = Yii::app()->user->getFlashes();
		if ($flashMessages) {
		    echo '<div class="html-box" id="flashes">';
		    foreach($flashMessages as $key => $message) {
		        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
		    }
		    echo '</div>';
		}
	?>
	
	<!-- Banners -->
	<?php if(Yii::app()->BannerShow->bannersPlacedTo(false, 'p1')) { ?>
	<div class="general-padding text-to-center underlined">
		<?=Yii::app()->BannerShow->showBanners(false, 'p1')?>
	</div>
	<?php } ?>
	
	<!-- breadcrumbs -->
	<div class="html-box" id="breadcrumbs">
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?>
	</div>
	
	<!-- Content -->
	<?php echo $content; ?>
	
	<!-- Export -->
	<?php $cont = Yii::app()->getController(); ?>
	<?php $hide = (!in_array($cont->action->id, array('create','update','admin'))) && ($cont->id != 'site');?>
	<?php if($hide) { ?>
	<div class="general-padding underlined">
		<div id="usnasuperbio_placeholder">Загрузка...</div>
		<script>
		window.onload=function(){setTimeout(function(){$.getScript('http://usnasuperbio.com.ua/js/export.js');},1000)}</script>
	</div>
	<?php } ?>
	
	<!-- Footer -->
	<div class="general-padding footer">
		
		<!-- info links -->
		<div id="infoLinks" class="general-block to-left html-box">
			<?php $this->getInfoPages(); ?>
			<?php foreach ($this->infoPages as $section) { ?>
				<div class="footer-section">
				<strong><?=$section['title']?></strong>
				<?php foreach($section['pages'] as $page) { ?>
					<a href="/pages/<?=$page['id']?>"><?=$page['title']?></a>
				<?php } ?>
				</div>
			<?php } ?>
		</div> 
		
		<!-- copyright -->
		<div id="footer" class="upperlined html-box">
			<div class="html-box">
			<?php require(dirname(__FILE__) . Yii::app()->params['countersFile'] . '.php') ?>
			</div>
			<p>Планета-Био © 2012.<br />
			Все права защищены.<br />
			При копировании материалов, активная ссылка на источник (<a href="http://planeta-bio.com">planeta-bio.com</a>) - обязательна!</p>
		</div>
	
	</div><!-- /Footer -->

</div><!-- page -->
<div class="loading-spinner">Загрузка...</div>
</body>
</html>
