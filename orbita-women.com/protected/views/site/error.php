<?php
$this->pageTitle='Ой, ошибка - ' . Yii::app()->name;
$this->breadcrumbs=array(
	'Ошибка',
);
?>

<div class="general-padding">
	<h2>Ой, ошибка!</h2>
	<p>Код ошибки: <?php echo $code; ?>.</p>
	<div class="notes">
		<?php echo CHtml::encode($message); ?>
	</div>
</div>