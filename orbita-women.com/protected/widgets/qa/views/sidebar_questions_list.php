<?php if($this->items) { ?>
	<h3>Вопросы пользователей</h3>
	<div class="html-box">
	<?php foreach($this->items as $question) { ?>
		<div class="list-item">
			<small class="gray-font"><?=CString::readableDate($question->published_date)?></small><br />
			<?=CHtml::link($question->subject, '/qa/question/view/id/'.$question->id)?><br />
			<small class="gray-font">Ответов: <?=$question->answersCount?></small>
		</div>
	<?php } ?>
	</div>
<?php } ?>