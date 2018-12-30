<?php
Yii::import('application.helpers.CString');
$this->pageTitle = 'Общайтесь, задавайте вопросы и получайте ответы на сайте '.Yii::app()->name;
$this->breadcrumbs=array('Вопросы');
?>

<div class="general-padding underlined">
    <!-- Header -->
    <div class="html-box underlined">
      <div class="half-width to-left">
          <h1>Вопросы и ответы</h1>
      </div>
      <div class="half-width to-right">
          <a class="button green to-right" href="<?=Yii::app()->controller->createUrl('ask')?>">
        <big>Задайте свой вопрос</big>
      </a>
      </div>
      <!-- Categories -->
    <div id="quesions-filter">
      Разделы: 
      <?php foreach ($sections as $section) { ?>
        <?php if($section['id']==$currentCategory) {?>
          <strong><?=$section['title']?></strong>, 
        <?php } else { ?>
          <?php
            $categoryLink = 'category/id/'.$section['id'];
          ?>
          <a href="/qa/question/<?php echo $categoryLink; ?>"><?=$section['title']?></a>, 
        <?php } ?>
      <?php } ?>
      <a href="/qa/question">Все</a>
    </div>
  </div>
  
  <!-- Questions list -->
  <div class="general-block full-width to-left">
    <?php if($questions) { ?>
      <?php foreach($questions as $question) { ?>
        <?php $this->widget('application.widgets.qa.questionWidget', array('canAdmin'=>$this->canAdminAction(), 'item'=>$question)); ?>
      <?php } } else { ?>
      <p><i class="gray-font">Вопросов здесь пока никто не задавал.</i></p>
    <?php } ?>
  </div>
  
  <div class="general-padding upperlined pagination">
    <?php $this->widget('CLinkPager', array(
      'nextPageLabel' => 'Далее',
      'prevPageLabel' => 'Назад',
      'header' => 'Перейти: ',
      'pages' => $pages,
    )) ?>
  </div>
</div>
<script>
    app.loaded(function(){
        app.tools.loadCss('modules/qa');
    });
</script>