<?php
$this->breadcrumbs=array(
  'События',
);

$this->pageTitle = 'События - '.Yii::app()->name;
$this->metaKeywords = '';
$this->metaDescription = '';

$this->menu=array(
  array('label'=>'Добавить', 'url'=>array('create')),
  array('label'=>'Администрирование', 'url'=>array('admin')),
);

$thisIsArchive = (isset($archive) && $archive==true);
$thisIsCategory = ($currentSection >= 0);
$isEmpty = (empty($todays) && empty($nearest));
Yii::import('application.helpers.CString');
?>

<div class="general-padding underlined">
<?php foreach($sections as $section) { ?>
  <?php if($section['id']==$currentSection) { ?>
    <strong><?=$section['title']?></strong>,
  <?php } else { ?>
    <?php if($thisIsArchive) { ?>
      <a href="/whatsnews/event/archive/category/<?=$section['id']?>"><?=$section['title']?></a>,
    <?php } else { ?>
      <a href="/whatsnews/event/category/id/<?=$section['id']?>"><?=$section['title']?></a>,
    <?php } ?>
  <?php } ?>
<?php } ?>
  <a href="/whatsnews/event">Все</a>
</div>

<div class="general-padding underlined">
  <?php if($thisIsCategory && !$thisIsArchive) { ?>
    
      <?php if($isEmpty) { ?>
        Увы, в нашей базе событий в выбранной категории нет.
      <?php } else { ?>
        <?php $i=0; if($todays) { ?>
          <div class="html-box">
            <h1 class="text-to-center underlined">Текущие события</h1>
            <div id="events-listing">
            <?php foreach($todays as $event) { $i++; ?>
              <?php $this->widget('application.widgets.whatsnews.event_widget', array('canAdmin'=>$this->canAdminAction(), 'data'=>$event, 'counter'=>$i)); ?>
              <?php if($i==3) { echo '<br clear="all" />'; $i=0; }?>
            <?php } ?>
            </div>
          </div>
        <?php } ?>
        <?php $i=0; if($nearest) { ?>
          <div class="html-box">
            <h1 class="text-to-center underlined">Будущие события</h1>
            <div id="events-listing">
            <?php foreach($nearest as $event) { $i++; ?>
              <?php $this->widget('application.widgets.whatsnews.event_widget', array('canAdmin'=>$this->canAdminAction(), 'data'=>$event, 'counter'=>$i)); ?>
              <?php if($i==3) { echo '<br clear="all" />'; $i=0; }?>
            <?php } ?>
            </div>
          </div>
          
          <div class="general-padding upperlined pagination">
          <?php $this->widget('CLinkPager', array(
            'nextPageLabel' => 'Далее',
            'prevPageLabel' => 'Назад',
            'header' => 'Перейти: ',
              'pages' => $nearestEventsPages,
          )) ?>
          </div>
          
        <?php } ?>
      <?php }?>
      
  <?php } else if($thisIsArchive) { ?>
    
      <?php $i=0; if($items) { ?>
        <div class="html-box">
          <h1 class="text-to-center underlined">Архивные события</h1>
          <div id="events-listing">
          <?php foreach($items as $event) { $i++; ?>
            <?php $this->widget('application.widgets.whatsnews.event_widget', array('canAdmin'=>$this->canAdminAction(), 'data'=>$event, 'counter'=>$i)); ?>
            <?php if($i==3) { echo '<br clear="all" />'; $i=0; }?>
          <?php } ?>
          </div>
        </div>
      <?php } else { ?>
        <p>Архив пуст.</p>
      <?php } ?>
      
  <?php } ?>
</div>
<?php if(!$isMainPage) { ?>
  <div class="html-box text-to-center">
    <?php if($thisIsCategory && !$thisIsArchive) { ?>
      <a href="/whatsnews/event/archive/category/<?=$currentSection?>">Архив</a>
    <?php } else if($thisIsCategory && $thisIsArchive) { ?>
      <a href="/whatsnews/event/category/id/<?=$currentSection?>">Выйти из архива</a>
    <?php } ?>
  </div>
<?php } ?>

<?php if($thisIsArchive) { ?>
  <div class="general-padding upperlined pagination">
  <?php $this->widget('CLinkPager', array(
    'nextPageLabel' => 'Далее',
    'prevPageLabel' => 'Назад',
    'header' => 'Перейти: ',
      'pages' => $pages,
  )) ?>
  </div>
<?php } ?>

<?php
$kind = ($currentSection) ? $currentSection : false;
$position = ($currentSection)?'p4':'p2';
if(Yii::app()->BannerShow->bannersPlacedTo($kind, $position)) {   
?>
<div class="general-padding text-to-center underlined">
  <?php Yii::app()->BannerShow->showBanners($kind, $position); ?>
</div>
<?php } ?>

<script>
    app.loaded(function(){
        app.tools.loadCss('modules/events');
    });
</script>