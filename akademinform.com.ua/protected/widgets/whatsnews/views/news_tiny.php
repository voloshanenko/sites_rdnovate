<div class="html-box general-block">
	<img src="<?=$this->data->getImageWebPath('thumb')?>" class="shadowed-thumb img-margin to-left" width="70" height="70" alt="<?=$this->data->title?>" title="<?=$this->data->title?>" />
	<?=CString::readableDate($this->data->publishing_date)?>:<br />
	<a href="/whatsnews/news/view/id/<?=$this->data->id?>">
		<?=$this->data->title?>
	</a>
</div>
