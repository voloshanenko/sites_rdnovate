<?php
$this->pageTitle = ($model->meta_title ? $model->meta_title : $model->name).' - фото на  '.Yii::app()->name;
$this->metaKeywords = $model->meta_keywords ? $model->meta_keywords : Yii::app()->params['defaultMetaKeywords'];
$this->metaDescription = $model->meta_description ? $model->meta_description : Yii::app()->params['defaultMetaDescription'];

$this->breadcrumbs=array(
	'Фотографии'=>array('index'),
	$model->name,
);

Yii::import('application.helpers.CString');
?>

<div class="general-padding underlined">
    <div class="to-left page-content">
    	<div class="text-to-center">
    		<!-- Header -->
    		<h1 class="page-title"><?=$model->name; ?></h1>
    		<?php if($this->canAdminAction()) { ?>
				<div class="admin-bar">
					<a href="<?=$this->createUrl('delete', array('id'=>$model->id))?>" onclick="return confirm('Вы уверены?')">Удалить</a>,
					<a href="<?=$this->createUrl('update', array('id'=>$model->id))?>">Изменить</a>
				</div>
			<?php } ?>
	        <?php if($model->contest) { ?>
	        <table style="width: 640px; margin: 0 auto">
	            <tr>
	                <td width="33%" style="vertical-align: top;">
	                    Учавствует в фотоконкурсе<br />"<strong><?=$model->contest->title; ?></strong>".
	                </td>
	                <td width="33%" style="vertical-align: top;" class="text-to-right">
	                    <?php if($model->contest->partner) { ?>
	                    Партнер<br />
	                    <big>"<a href="/photos/partners/view/id/<?=$model->contest->partner->id ?>" target="_blank"><?=$model->contest->partner->name ?></a>"</big>.<br />
	                    <?=$model->contest->partner->slogan ?>
	                    <?php } ?>
	                </td>
	                <td width="33%" style="vertical-align: top;" class="text-to-right">
	                    <?php if($model->contest->sponsor) { ?>
	                    Спонсор<br />
	                    <big>"<a href="/photos/sponsor/view/id/<?=$model->contest->sponsor->id ?>" target="_blank"><?=$model->contest->sponsor->name ?></a>"</big>.<br />
	                    <?=$model->contest->sponsor->slogan ?>
	                    <?php } ?>
	                </td>
	            </tr>
	        </table>
	        <?php } ?>
	        
	        <!-- Well, image itself -->
	        <img src="<?=$model->getWebPath('orig'); ?>" alt="<?=$model->name ?>" width="640" height="480" />
	        <p class="notes"><?=$model->comments ?></p>
	        
	        <!-- Footer -->
	        <table style="width: 640px; margin: 0 auto">
	            <tr>
	                <td id="photo-vote-box" width="50%" style="vertical-align:top; text-align:center;">
	                    <?php if($model->contest) { ?>
	                    <span class="has-icon black-star">
							Рейтинг:
							<span id="rating-counter" class="photo-item-votes-counter">
								<?=$model->rating?>
							</span>
						</span>&nbsp;&nbsp;&nbsp;
						<?php } ?>
						<span class="has-icon black-lupa">
							Просмотров:
							<span id="views-counter" class="photo-item-votes-counter">
								<?=$model->views?>
							</span>
						</span>
						<?php if($model->contest) { ?>
							<br />
							<?php if($model->isVoteable()) { ?>
								<?php $ds = strtotime($model->contest->date_start); ?>
								<?php $de = strtotime($model->contest->date_end); ?>
								<?php if($ds >= time()) { ?>
									Голосование еще не началось.
								<?php } else if($de < time()) {?>
									Голосование уже закрыто, фотоконкурс закончился.
								<?php } else if(($ds <= time()) && ($de > time())) { ?>
									<a id="vote-button" class="has-icon white-thumbs-up" href="#">Голосую!</a>
								<?php } ?>
							<?php } ?>
						<?php } ?> 
	                </td>
	                <td style="vertical-align:top;" class="text-to-right">
	                    <div class="photo-item-owner">
						Фото загрузил(а):
						<strong><?=$model->owner->getFullName()?></strong>
						<br>
						Kiev
						</div>
	                </td>
	            </tr>
	        </table>
	        <p><a href="<?=Yii::app()->createUrl('photos/item/create'); ?>">Загрузите фото!</a></p>
	        
	        <!-- Ads Block: Position: P2 -->
			<?php if(Yii::app()->BannerShow->bannersPlacedTo($model->section_id, 'p5')) { ?>
			<div class="general-block text-to-center upperlined">
				<?php Yii::app()->BannerShow->showBanners($model->section_id, 'p5'); ?>
			</div>
			<?php } ?>
	    </div>
		
	</div>
	<div class="sidebar-box">
			<?php Yii::app()->Connection->setSectionId($model->section_id); ?>
			<?php Yii::app()->Connection->showContests(); ?>
			<?php Yii::app()->Connection->showNews(); ?>
			<?php Yii::app()->Connection->showEvents(); ?>
			<?php Yii::app()->Connection->showQuestions(); ?>
			<?php Yii::app()->Connection->showAds(); ?>
			<?php Yii::app()->Connection->showArticles(); ?>
		</div>
</div>
<script>
    app.loaded(function(){
    	app.tools.loadModule('photowall', function(){
    		var photo = new Photo(null, null, null);
    		$("#vote-button").click(function(evt){
    			evt.preventDefault();
	    		photo.voteFromPage(<?=$model->id?>);
	    	});
    	});
    });
</script>