<?php
$this->breadcrumbs=array(
	'Категории',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>
    <h1>Категории</h1>

    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    )); ?>