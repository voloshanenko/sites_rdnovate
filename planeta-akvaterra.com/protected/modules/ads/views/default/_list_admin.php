<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ad_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ad_id), array('view', 'id'=>$data->ad_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('section_id')); ?>:</b>
	<?php echo CHtml::encode($data->section_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('short_text')); ?>:</b>
	<?php echo CHtml::encode($data->short_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publishing_date')); ?>:</b>
	<?php echo CHtml::encode($data->publishing_date); ?>
	<br />

</div>