<?php 

if(!empty($this->list))
{
	echo '<h3>Объявления</h3>';
	foreach($this->list as $ad)
	{
?>

<div class="html-box list-item reklitem">
	<span class="secondary-info gray-font">
		<?php echo CString::readableDate($ad->publishing_date, 'd.m.y'); ?>,
		№<?php echo $ad->ad_id; ?>,
		<?php echo $ad->adType[$ad->ad_type]; ?>
	</span>
	<br />
	<a class="to-left" href="<?=Yii::app()->createUrl('ads/default/view', array('id'=>$ad->ad_id))?>">
		<?php echo CHtml::image($ad->getImageWebPath('small'), $ad->title, array(
			'title'=>$ad->title, 'width'=>'70', 'height'=>'70', 'class'=>'list-item-icon', 'style'=>'margin-right:10px;'
		)); ?>
	</a>
	<a href="<?php echo Yii::app()->createUrl('ads/default/view', array('id'=>$ad->ad_id))?>">
		<?php echo mb_strlen($ad->title)>40 ? CString::mysubstr($ad->title, 0, 40).'...' : $ad->title; ?>
	</a>
	<br />
	<span class="secondary-info gray-font">
		<?php if($ad->city || $ad->suburb) { ?>
			<?php echo $ad->city;?><?php echo $ad->suburb?', '.$ad->suburb:''?>
		<?php } ?>
	</span>
</div>

<?php
	}
}
?>