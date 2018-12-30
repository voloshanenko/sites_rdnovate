<div class="public-list-item max-width">
	<h3><?=CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->ad_id))?></h3>
	<big class="italic"><?=CHtml::encode($data->short_text)?></big><br />
	<small class="gray-text italic">Опубликовано: <?=CHtml::encode($data->publishing_date);?></small><br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->author->first_name.' '.$data->author->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('section_id')); ?>:</b>
	<?php echo CHtml::encode($data->section->title); ?>
	<br />
</div>