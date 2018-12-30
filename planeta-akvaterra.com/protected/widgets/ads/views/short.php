<div class="html-box list-item reklitem">
	<span class="secondary-info gray-font">
		<?=CString::readableDate($this->item->publishing_date, 'd M Y')?> - <?=CString::readableDate($this->item->end_publishing_date, 'd M Y')?>,
		№<?=$this->item->ad_id?>,
		<?=$this->item->adType[$this->item->ad_type]?>
	</span>
	<br />
	<a class="to-left" href="<?=Yii::app()->createUrl('ads/default/view', array('id'=>$this->item->ad_id))?>">
		<?php echo CHtml::image($this->item->getImageWebPath('small'), $this->item->title, array(
			'title'=>$this->item->title, 'width'=>'70', 'height'=>'70', 'class'=>'shadowed-thumb list-item-icon', 'style'=>'margin-right:10px;'
		)); ?>
	</a>
	<a href="<?php echo Yii::app()->createUrl('ads/default/view', array('id'=>$this->item->ad_id))?>">
		<?php echo mb_strlen($this->item->title)>40 ? CString::mysubstr($this->item->title, 0, 40).'...' : $this->item->title; ?>
	</a>
	<br />
	<?php if($this->own) { ?>
		Продлить на:
		<a href="/ads/default/actualize/id/<?=$this->item->ad_id?>/term/1">1 месяц</a>,
		<a href="/ads/default/actualize/id/<?=$this->item->ad_id?>/term/2">2 месяца</a>,
		<a href="/ads/default/actualize/id/<?=$this->item->ad_id?>/term/4">4 месяца</a>,
		<a href="/ads/default/actualize/id/<?=$this->item->ad_id?>/term/6">6 месяцев</a>,
		<a href="/ads/default/actualize/id/<?=$this->item->ad_id?>/term/12">12 месяцев</a>.
		<br /><a href="/ads/default/update/id/<?=$this->item->ad_id?>">Редактировать</a>
	<?php } ?>
	<br />
	<span class="secondary-info gray-font">
		<?php if(strlen(trim($this->item->breed))) { ?>
			Покатегория: <?php echo $this->item->breed; ?><br />
		<?php } ?>
		<?php if($this->item->city || $this->item->suburb) { ?>
			<?php echo $this->item->city;?><?php echo $this->item->suburb?', '.$this->item->suburb:''?>
		<?php } ?>
	</span>
</div>