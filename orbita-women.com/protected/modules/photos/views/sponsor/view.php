<?php
$this->pageTitle = ($model->meta_title ? $model->meta_title : Yii::app()->params['defaultMetaKeywords']).' - '.Yii::app()->name;
$this->metaKeywords = $model->meta_keywords ? $model->meta_keywords : Yii::app()->params['defaultMetaKeywords'];
$this->metaDescription = $model->meta_description ? $model->meta_description : Yii::app()->params['defaultMetaDescription'];

$this->breadcrumbs=array(
	'Спонсоры'=>array('index'),
	$model->name,
);
if(!Yii::app()->user->isGuest && Yii::app()->user->role=='admin') {
    $this->menu=array(
        array('label'=>'Вывести списком', 'url'=>array('index')),
        array('label'=>'Добавить', 'url'=>array('create')),
        array('label'=>'Изменить', 'url'=>array('update', 'id'=>$model->id)),
        array('label'=>'Удалить текущий', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить спонсора?')),
        array('label'=>'Менеджмент', 'url'=>array('admin')),
    );
}
?>

<h1 class="page-title"><?php echo $model->name; ?></h1>
<div class="text-to-center">
    <strong><?=$model->slogan ?></strong>
    <br />
    <?php
    if($model->icon_url) {
        echo CHtml::link(CHtml::image($model->icon, $model->name), $model->icon_url);
    } else {
        echo CHtml::image($model->icon, $model->name);
    } ?>
    <br />
    <span class="notes"><?=$model->short_info ?></span>
</div>
<br clear="all" />
<?php if($model->info) { ?>
    <h3>Подробнее о <?php echo $model->name; ?></h3>
    <?php echo $model->info; ?>
<?php } ?>