<?php
$this->breadcrumbs=array(
	'Фотографии'=>array('index'),
	'Все фото',
);
$this->pageTitle = 'Все фото животных на сайте '.Yii::app()->name;
$this->metaKeywords = Yii::app()->params['defaultMetaKeywords'];
$this->metaDescription = Yii::app()->params['defaultMetaDescription'];
?>
<div class="general-padding">
    <h1 class="page-title">Все фотографии</h1>
	<p>
    <div class="general-block upperlined<?php echo (!$breedList)?' underlined':'' ?>">
    	<strong>Категории:</strong>
		<?php foreach ($sections as $section) { ?>
			<?php if($section['id']==$currentCategory) {?>
				<strong><?php echo $section['title']?></strong>,
			<?php } else { ?>
				<a href="/photos/item/category/id/<?php echo $section['id']; ?>"><?php echo $section['title']; ?></a>,
			<?php } ?>
		<?php } ?>
		<a href="/photos/item/all">Все</a>
    </div>
	<?php if($breedList) { ?>
		<div class="general-block underlined">
	    	<strong>Сорты:</strong>
			<?php foreach ($breedList as $brd) { ?>
				<?php if( strlen($brd['breed']) ) { ?>
					<?php if($brd==$currentBreed) {?>
						<strong><?php echo $brd['breed']; ?></strong>,
					<?php } else { ?>
						<a href="/photos/item/category/id/<?php echo $currentCategory; ?>/breed/<?php echo $brd['breed']; ?>"><?php echo $brd['breed']; ?></a>,
					<?php } ?>
				<?php } ?>
			<?php } ?>
			<a href="/photos/item/category/id/<?php echo $currentCategory; ?>">Все</a>
	    </div>
	<?php } ?>
	</p>
    <div class="image-collection">
    	<?php if(!empty($model)) { ?>
	        <?php foreach($model as $photo) {
	            $voteable = $photo->isVoteable();
	            $pictureUrl = $photo->getWebPath('small'); ?>
	            <div class="contest-image">
	                <div class="photo-item">
	                	<a href="/photos/item/view/id/<?=$photo->id?>">
	                    <?php echo trim(CHtml::image($pictureUrl, $photo->name, array(
	                    'width'=>70,
	                    'height'=>70,
	                    'title'=>$photo->name,
	                    'id'=>$photo->id,
	                    'voteable'=>$voteable?'true':'false',
	                    'rating' => $photo->rating,
	                    'trueimage'=>$photo->getWebPath('orig')
	                ))); ?>
	                	</a>
	                    <div class="photo-item-votes">
	                        <?php if($voteable) { ?>
	                            <a href="#" onclick="app.modules.photoWall.vote(this, <?php echo $photo->id ?>)" class="photo-item-votes-up ui-icon ui-icon-heart" title="Мне нравится это фото!"></a>
	                        <?php } ?>
	                        <span class="photo-item-votes-counter"><?php echo $photo->rating ?></span>
	                    </div>
	                </div>
	            </div>
	        <?php } ?>
        <?php } else {?>
        	<span class="notes">Увы, ничего не найдено.</span>
        <?php } ?>
    </div>
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

<div class="general-padding upperlined pagination">
<?php $this->widget('CLinkPager', array(
	'nextPageLabel' => 'Далее',
	'prevPageLabel' => 'Назад',
	'header' => 'Перейти: ',
    'pages' => $pages,
)) ?>
</div>
<script>
    app.loaded(function(){
        app.tools.loadModule('photowall');
        app.tools.loadCss('modules/shadowbox');
        app.tools.loadCss('modules/contest');
    });
</script>