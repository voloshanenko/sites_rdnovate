<?php
$this->pageTitle = 'Новости - '.Yii::app()->name;
$this->metaKeywords = '';
$this->metaDescription = '';

$this->breadcrumbs=array(
	'Новости',
);

$thisIsArchive = (isset($archive) && $archive==true);
$thisIsCategory = $currentSection;
$isEmpty = (empty($todays) && empty($nearest));
Yii::import('application.helpers.CString');
?>

<h1 class="text-to-center">Новости</h1>

<div class="general-padding underlined">
<?php foreach($sections as $section) { ?>
	<?php if($section['id']==$currentSection) { ?>
		<strong><?=$section['title']?></strong>,
	<?php } else { ?>
		<?php if($thisIsArchive) { ?>
			<a href="/whatsnews/news/archive/category/<?=$section['id']?>"><?=$section['title']?></a>,
		<?php } else { ?>
			<a href="/whatsnews/news/category/id/<?=$section['id']?>"><?=$section['title']?></a>,
		<?php } ?>
	<?php } ?>
<?php } ?>
	<a href="/whatsnews/news">Все</a>
</div>

<div class="general-padding underlined">
	<div id="news-listing">
	<?php foreach($newsList as $news) { $i++; ?>
		<?php $this->widget('application.widgets.whatsnews.news_widget', array('canAdmin'=>$this->canAdminAction(), 'data'=>$news, 'type'=>'listing', 'counter'=>$i)); ?>
		<?php if($i==3) { echo '<br clear="all" />'; $i=0; }?>
	<?php } ?>
	</div>
</div>

<div class="html-box text-to-center">
	<?php if($thisIsCategory && !$thisIsArchive) { ?>
		<a href="/whatsnews/news/archive/category/<?=$currentSection?>">Архив</a>
	<?php } else if($thisIsCategory && $thisIsArchive) { ?>
		<a href="/whatsnews/news/category/id/<?=$currentSection?>">Выйти из архива</a>
	<?php } ?>
</div>

<?php if($thisIsArchive) { ?>
	<div class="general-padding upperlined pagination">
	<?php $this->widget('CLinkPager', array(
		'nextPageLabel' => 'Далее',
		'prevPageLabel' => 'Назад',
		'header' => 'Перейти: ',
	    'pages' => $pages,
	)) ?>
	</div>
<?php } ?>

<?php
$kind = ($currentSection) ? $currentSection : false;
$position = ($currentSection)?'p4':'p2';
if(Yii::app()->BannerShow->bannersPlacedTo($kind, $position)) {		
?>
<div class="general-padding text-to-center underlined">
	<?php Yii::app()->BannerShow->showBanners($kind, $position); ?>
</div>
<?php } ?>

<script>
    app.loaded(function(){
        app.tools.loadCss('modules/news');
    });
</script>