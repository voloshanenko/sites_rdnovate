<div class="view">

    <big><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?></big>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
    <?php echo CHtml::encode($data->comment); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('appeal')); ?>:</b>
    <?php echo CHtml::encode($data->appeal); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sponsor_id')); ?>:</b>
	<a href="/photos/sponsor/view/id/<?=$data->sponsor_id?>"><?php echo CHtml::encode($data->sponsor->name); ?></a>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_start')); ?>:</b>
	<?php echo CHtml::encode($data->date_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_end')); ?>:</b>
	<?php echo CHtml::encode($data->date_end); ?>
	<br />

    <small>
        <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
        <?php echo CHtml::encode($data->id); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('show_on_main')); ?>:</b>
        <?php echo CHtml::encode($data->show_on_main?'Да':'Нет'); ?>
        <br />
    </small>

</div>