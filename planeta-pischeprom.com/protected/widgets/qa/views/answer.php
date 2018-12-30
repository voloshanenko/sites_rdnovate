<?php
	$user = Yii::app()->user;
	$is_owner = ($this->item->question->user_id==$user->id) && !$user->isGuest;
	$can_delete = !$user->isGuest && (($user->role=='manager' && in_array('qa/question', unserialize($user->group))) || $user->role=='admin');
?>
<div class="underlined answer<?php if($this->item->is_thebest) echo" the-best-answer"?>">
	<div class="gray-font to-left">
		<?=CString::readableDate($this->item->published_date)?>, <?=$this->item->author->getFullName()?>:
	</div>
	<?php if(false && $is_owner && $this->item->question->closed==0) { ?>
		<div class="to-right is-the-best">
			<a href="/qa/answer/best/id/<?=$this->item->id?>">Это лучший ответ</a>
		</div>
	<?php } ?>
	<br />
	<?=$this->item->text?>
	<?php if($can_delete) { ?>
		<br />
		<a href="/qa/answer/delete/id/<?=$this->item->id?>" onclick="return confirm('Вы уверены?');" class="to-right answer-is-invalid">
			Удалить ответ
		</a>
	<?php } ?>
</div>