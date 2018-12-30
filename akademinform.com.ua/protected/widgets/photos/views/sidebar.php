<?php if ($this->list) { ?>
	<h3>Фотографии</h3>
	<?php foreach ($this->list as $photo) { ?>
		<?=CHtml::link(
			CHtml::image($photo->getWebPath('small'), $photo->name, array('title'=>$photo->name)),
			'/photos/item/view/id/'.$photo->id,
			array('title'=>$photo->name, 'class'=>'side-bar-photo'))?>
	<?php } ?>
<?php } ?>