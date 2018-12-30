<div class="html-box">
	<h3>Фотоконкурсы</h3>
	<?php if($this->currentContests) { ?>
		<strong>Текущие фотоконкурсы:</strong><br />
		<?php foreach ($this->currentContests as $contest) { ?>
			<div class="general-block html-box underlined">
				<a href="/photos/item#contest<?=$contest->id?>"><?=$contest->title?></a><br />
				<small class="gray-font">Окончится: <?=CString::readableDate($contest->date_end, 'd M Y')?></small><br />
				<div class="to-left text-to-center">
					<small>Спонсор:</small><br />
					<a href="/photos/sponsor/<?=$contest->sponsor->url?>">
						<?=CHtml::image($contest->sponsor->icon, $contest->sponsor->name, array('title'=>$contest->sponsor->name))?>
					</a>
				</div>
				<div class="to-right text-to-center">
					<small>Партнер:</small><br />
					<a href="/photos/partner/<?=$contest->partner->url?>">
						<?=CHtml::image($contest->partner->icon, $contest->partner->name, array('title'=>$contest->partner->name))?>
					</a>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
	
	<?php if($this->plannedContests) { ?>
		<br /><strong>Будущие фотоконкурсы</strong><br />
		<?php foreach ($this->plannedContests as $contest) { ?>
			<div class="general-block html-box underlined">
				<a href="/photos/item#contest<?=$contest->id?>"><?=$contest->title?></a><br />
				<small class="gray-font">Начнётся: <?=CString::readableDate($contest->date_start, 'd M Y')?></small><br />
				<div class="to-left text-to-center">
					<small>Спонсор:</small><br />
					<a href="/photos/sponsor/<?=$contest->sponsor->url?>">
						<?=CHtml::image($contest->sponsor->icon, $contest->sponsor->name, array('title'=>$contest->sponsor->name))?>
					</a>
				</div>
				<div class="to-right text-to-center">
					<small>Партнер:</small><br />
					<a href="/photos/partner/<?=$contest->partner->url?>">
						<?=CHtml::image($contest->partner->icon, $contest->partner->name, array('title'=>$contest->partner->name))?>
					</a>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
</div>