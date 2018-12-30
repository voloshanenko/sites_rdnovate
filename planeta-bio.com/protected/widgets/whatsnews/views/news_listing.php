<?php if($this->columns && $this->counter>1) { ?>
	<div class="news-item-wrapper to-left has-margin">
<?php } else { ?>
	<div class="news-item-wrapper to-left">
<?php } ?>
	<small><?=CString::readableDate($this->data->publishing_date)?></small>
	<div class="news-item-image-wrapper">
		<a href="/whatsnews/news/view/id/<?=$this->data->id?>">
			<img src="<?=$this->data->getImageWebPath('small')?>" alt="<?=$this->data->title?>" title="<?=$this->data->title?>" width="" height="" />
		</a>
		<div class="news-item-title-bg html-box"></div>
		<div class="news-item-title html-box">
			<a href="/whatsnews/news/view/id/<?=$this->data->id?>">
				<?=$this->data->title?>
			</a>
		</div>
	</div>
	
	<div class="news-item-info html-box">
		<?=$this->data->intro?>
	</div>
	
</div>