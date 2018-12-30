<div class="view">

	<?php if($data->icon && $data->iconExists()) { ?>
		<div class="view-icon">
			<?=CHtml::image(CHtml::encode($data->icon), CHtml::encode($data->title)); ?>
		</div>
	<?php } ?>
	<h2><?=CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?></h2>
	<div class="gray-font"><?=CString::readableDate($data->publishing_date)?></div>
	<?php echo CHtml::encode($data->intro); ?>

</div>