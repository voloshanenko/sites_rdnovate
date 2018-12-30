<?php
$this->breadcrumbs=array(
	'Фотоконкурсы',
);

$this->menu=array(
    array('label'=>'Добавить', 'url'=>array('create')),
    array('label'=>'Менеджмент', 'url'=>array('admin')),
);
?>
<h1>Конкурсы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>