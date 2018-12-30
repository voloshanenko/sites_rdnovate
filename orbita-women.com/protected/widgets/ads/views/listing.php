<?php
	$image_url = $this->item->getImageWebPath('small');
	$mig_image_url = $this->item->getImageWebPath('orig');
	$photoLink = ($image_url=='/images/Ads/no-photo.jpg')?Yii::app()->createUrl('ads/default/view', array('id'=>$this->item->ad_id)):$mig_image_url;
?>
<div class="html-box list-item reklitem">
	<a class="to-left<?php echo ($image_url=='/images/Ads/no-photo.jpg')?'':' rekl-img-container'; ?>" href="<?php echo $photoLink; ?>">
		<?php echo CHtml::image($image_url, $this->item->title, array(
			'title'=>$this->item->title, 'width'=>'70', 'height'=>'70', 'class'=>'list-item-icon'
		)); ?>
	</a>
	<span class="gray-font">№<?=$this->item->ad_id?>:</span>
	<?php echo $this->item->adType[$this->item->ad_type]; ?>:
	<a href="<?=Yii::app()->createUrl('ads/default/view', array('id'=>$this->item->ad_id))?>"><?=$this->item->title?></a>
	<div class="reklitem-listing-text to-left">
		<div class="third-width-column to-left secondary-info gray-font">
			<?php if(strlen(trim($this->item->breed))) { ?>
				Подкатегория: <?=$this->item->breed?><br />
			<?php } ?>
			<?php if($this->item->gender) { ?>
				Пол: <?=$this->item->genderList[$this->item->gender]?><br />
			<?php } ?>
		</div>
		<div class="third-width-column to-left secondary-info gray-font">
			<?php if($this->item->contact_person) { ?>
				<strong><?=$this->item->contact_person?></strong><br />
			<?php } ?>
			<?php if($this->item->city || $this->item->suburb) { ?>
				<?=$this->item->city?><?=$this->item->suburb?', '.$this->item->suburb:''?><br />
			<?php } ?>
			<?php if($this->item->contact_person) { ?>
				<?=nl2br($this->item->contacts)?>
			<?php } ?>
		</div>
		<div class="third-width-column to-left secondary-info gray-font">
			Опубликовано: <?php echo CString::readableDate($this->item->publishing_date, 'd.m.y'); ?>;<br />
			Просмотров: <?php echo (int)$this->item->views; ?>;<br />
		</div>
	</div>
	<?php if($this->canAdmin) { ?>
		<div class="admin-bar">
			<a href="/ads/default/delete/id/<?=$this->item->ad_id?>" onclick="return confirm('Вы уверены?')">Удалить</a>,
			<a href="/ads/default/update/id/<?=$this->item->ad_id?>">Изменить</a>
		</div>
	<?php } ?>
</div>