<?php
Yii::import('application.helpers.CString');
$this->pageTitle = $question->subject.' - вопросы на '.Yii::app()->name;
$this->breadcrumbs=array(
	'Вопросы'=>array('/qa/question'),
	$question->subject,
); ?>
<link rel="stylesheet" href="/css/modules/qa.css" />
<div class="general-padding underlined">
	<div class="to-left page-content">
		<div id="question-body">
			<span class="gray-font">
				<?=CString::readableDate($question->published_date, 'd.m.Y')?>. Спрашивает <?=$question->author->getFullName()?>:
			</span>
			<a class="button green small to-right" href="<?=Yii::app()->controller->createUrl('ask')?>">
				Задайте свой вопрос
			</a>
			<h1 class="to-left"><?=$question->subject?></h1>
			<?php if($this->canAdminAction()) { ?>
				<div class="admin-bar">
					<a href="<?=$this->createUrl('delete', array('id'=>$question->id))?>" onclick="return confirm('Вы уверены?')">Удалить</a>,
					<a href="<?=$this->createUrl('update', array('id'=>$question->id))?>">Изменить</a>
				</div>
			<?php } ?>
			<br clear="both" />
			<big><?=nl2br($question->body)?></big>
		</div>
	
		<h3 class="text-to-center">Ответы <span class="gray-font">(<span id="answers-count"><?=$question->answersCount?></span>)</span></h3>
		<div id="answers-wall">
			<?php if($question->answers) { ?>
				<?php foreach($question->answers as $ans) { ?>
					<?php $this->widget('application.widgets.qa.answerWidget', array('item'=>$ans)); ?>
				<?php } ?>
			<?php } else { ?>
				<span class="gray-font" id="no-answers">Ответов на вопрос пока нет.</span>
			<?php } ?>
		</div>
		
		<?php if(!Yii::app()->user->isGuest && $question->closed==0) { ?>
		<div id="answer-form">
			<h3>Ваш ответ:</h3>
			<form action="/qa/answer/" method="post" id="question-answer-form">
				<input type="hidden" name="question_id" value="<?=$question->id?>" />
				<div class="row">
					<textarea name="text" cols="40" rows="5"></textarea>
					<div class="flash-error hidden">Ответ на вопрос не может быть пустым.</div>
				</div>
				<div class="row buttons">
					<input type="submit" value="Ответить" />
				</div>
			</form>
		</div>
		<?php } else { ?>
			<?php Yii::app()->user->returnUrl='/qa/question/view/id/'.$question->id; ?>
			<a class="button green small to-left" href="/site/login/">
				Ответить на вопрос
			</a>
		<?php } ?>
		<!-- Answer form -->
		
		<!-- Ads Block: Position: P3 -->
		<?php if(Yii::app()->BannerShow->bannersPlacedTo($question->section_id, 'p3')) { ?>
		<div class="html-box text-to-center">
			<?php Yii::app()->BannerShow->showBanners($question->section_id, 'p3'); ?>
		</div>
		<?php } ?>
	</div><!-- Page content -->
	<div class="sidebar-box">
		<?php Yii::app()->Connection->setSectionId($question->section_id); ?>
		<?php Yii::app()->Connection->showPhotos(); ?>
		<?php Yii::app()->Connection->showContests(); ?>
		<?php Yii::app()->Connection->showAds(); ?>
		<?php Yii::app()->Connection->showNews(); ?>
		<?php Yii::app()->Connection->showEvents(); ?>
		<?php Yii::app()->Connection->showArticles(); ?>
	</div>
</div>

<script>
    app.loaded(function(){
    	app.tools.loadModule('qa', function(){
    		app.modules.qa.init();
    	});
    });
</script>