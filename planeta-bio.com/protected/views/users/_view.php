<div class="view">

	<big><?php echo CHtml::link("#".CHtml::encode($data->user_id).": ".CHtml::encode($data->getFullName().' '.CHtml::encode($data->middle_name)), array('view', 'id'=>$data->user_id)); ?></big>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
    <?php echo CHtml::encode($data->login); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('occupation')); ?>:</b>
	<?php echo CHtml::encode($data->occupation); ?>
	<br />

</div>