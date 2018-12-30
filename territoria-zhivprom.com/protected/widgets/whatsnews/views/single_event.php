<?php if($this->two_columns && $this->counter>1) { ?>
	<div class="event-item-wrapper to-left at-right">
<?php } else { ?>
	<div class="event-item-wrapper to-left">
<?php } ?>

	<div class="event-item-image-wrapper">
		<a href="/whatsnews/event/view/id/<?=$this->data->id?>">
			<img src="<?=$this->data->getImageWebPath('small')?>" alt="<?=$this->data->title?>" title="<?=$this->data->title?>" width="" height="" />
		</a>
		<div class="event-item-title-bg html-box"></div>
		<div class="event-item-title html-box">
			<a href="/whatsnews/event/view/id/<?=$this->data->id?>">
				<?=$this->data->title?>
			</a>
		</div>
	</div>
	
	<div class="event-item-dates">
		Начало: <?=CString::readableDate($this->data->date_start)?>, окончание: <?=CString::readableDate($this->data->date_end)?>
	</div>
	
	<div class="event-item-info html-box">
		<?=$this->data->short_description?>
	</div>
	
</div>