<?php
$this->breadcrumbs=array(
	'Фотографии'=>array('index'),
	'Загрузить',
);

$this->menu=array(
	array('label'=>'List Photos', 'url'=>array('index')),
	array('label'=>'Manage Photos', 'url'=>array('admin')),
);
?>
<div class="general-padding underlined">
    <h1>Загрузка фотографии</h1>
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>

<script>
    app.loaded(function(){
		var aca = new Array();
		var ac = new app.ui.autocomplete( $('#Photos_breed') ).init('/photos/item/lookup');
		aca.push(ac);
    });
</script>