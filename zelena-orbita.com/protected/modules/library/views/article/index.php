<?php
$this->pageTitle='Библиотека на сайте '.Yii::app()->name;
$this->metaKeywords = 'kw';
$this->metaDescription = 'descr';
Yii::import('application.helpers.CString');

$this->breadcrumbs=array(
	'Библиотека',
);

$this->menu=array(
	array('label'=>'Создать статью', 'url'=>array('create')),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
$i=0;
$c=0;

$archiveWord = $thisIsArchive ? 'Выйти из архива' : 'В архив';

$divClass = (count($articles)<=3) ? '' : 'third-width-column';
$itemsPerColumns = (count($articles)<=3) ? 3 : round(count($articles)/3, 0);
?>

<h1 class="text-to-center">
	<?php echo($thisIsArchive)?'Архивы нашей библиотеки':'Наша библиотека'; ?>
</h1>

<!-- Tags -->
<?php if(isset($tag)) { ?>
	<h3 class="text-to-center">Поиск по тэгу "<?=$tag?>"</h3>
<?php } ?>

<!-- Categories -->
<div class="general-padding underlined">
	<h2>Категории:</h2>
	<?php foreach ($sections as $section) { ?>
		<?php if($section['id']==$currentCategory) {?>
			<strong><?=$section['title']?></strong>, 
		<?php } else { ?>
			<?php
				$categoryLink = ($currentCategory!==false) ?
					($thisIsArchive ? 'category/id/'.$section['id'] : 'category/id/'.$section['id']) :
					($thisIsArchive ? 'archive/category/id/'.$section['id'] : 'category/id/'.$section['id']);
			?>
			<a href="/library/article/<?php echo $categoryLink; ?>"><?=$section['title']?></a>, 
		<?php } ?>
	<?php } ?>
	<a href="/library/article">Все</a>
</div>

<!-- Articles listing -->
<div class="general-padding underlined">
	<?php if($articles) { ?>
		<?php foreach ($articles as $one) { $i++; $c++; ?>
			<?php if($i==1) { echo '<div class="'.$divClass.' to-left">'; } ?>
			<?php $this->widget('application.widgets.library.libArticle', array('canAdmin'=>$this->canAdminAction(), 'content'=>$one)); ?>
			<?php if($i==$itemsPerColumns || $c==count($articles)) { echo'</div>'; $i=0; } ?>
		<?php } ?>
	<?php } else { ?>
		<div class="notes">
			Увы, но здесь пока ничего нет.
		</div>	
	<?php } ?>
	
	<div class="general-padding upperlined pagination">
	<?php $this->widget('CLinkPager', array(
		'nextPageLabel' => 'Далее',
		'prevPageLabel' => 'Назад',
		'header' => 'Перейти: ',
	    'pages' => $pages,
	)) ?>
	</div>
	
	<?php
		if($currentCategory!==false) {
			$categoryLink = $thisIsArchive ? 'category/id/'.$currentCategory : 'archive/category/'.$currentCategory;
		?>
		<div class="upperlined html-box text-to-center">
			<a href="/library/article/<?php echo $categoryLink; ?>"><?php echo $archiveWord ?></a>
		</div>
	<?php } ?>
</div>

<?php
$kind = ($currentCategory) ? $currentCategory : false;
$position = ($currentCategory)?'p4':'p2';
if(Yii::app()->BannerShow->bannersPlacedTo($kind, $position)) {		
?>
<div class="general-padding text-to-center underlined">
	<?php Yii::app()->BannerShow->showBanners($kind, $position); ?>
</div>
<?php } ?>

<div class="general-padding underlined">
<?php Yii::app()->Tags->show($currentCategory, $thisIsArchive); ?>
</div>

<script>
    app.loaded(function(){
        app.tools.loadCss('modules/library');
    });
</script>