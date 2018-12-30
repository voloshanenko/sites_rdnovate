<?php

class SearchController extends Controller
{
	public $layout='//layouts/column1';

    public $metaKeywords = '';
    public $metaDescription = '';
	
	function actionIndex()
	{
		if(isset($_POST['term']) && isset($_POST['section'])) {
			$map = array(
				'article'=>array('path'=>'/library/article/', 'key'=>'url', 'link_text'=>'title', 'intro'=>'intro'),
				'photos'=>array('path'=>'/photos/item/view/id/', 'key'=>'id', 'link_text'=>'name', 'intro'=>'comments'),
				'event'=>array('path'=>'/whatsnews/event/view/id/', 'key'=>'id', 'link_text'=>'title', 'intro'=>'short_description'),
				'news'=>array('path'=>'/whatsnews/news/view/id/', 'key'=>'id', 'link_text'=>'title', 'intro'=>'intro'),
				'question'=>array('path'=>'/qa/question/view/id/', 'key'=>'id', 'link_text'=>'subject', 'intro'=>'body'),
			);
			$crtiteria = new CDbCriteria();
			$model = null;
			switch ($_POST['section']) {
				case 'article':
					$model = Article::model()->forSearch($_POST['term'])->notArchived()->findAll($crtiteria);
					break;
				case 'photos':
					$crtiteria->addSearchCondition('name', $_POST['term'], true, 'OR');
					$crtiteria->addSearchCondition('comments', $_POST['term'], true, 'OR');
					$data = $model = Photos::model()->findAll($crtiteria);
					break;
				case 'event':
					$crtiteria->addSearchCondition('title', $_POST['term'], true, 'OR');
					$crtiteria->addSearchCondition('short_description', $_POST['term'], true, 'OR');
					$model = Event::model()->findAll($crtiteria);
					break;
				case 'news':
					$model = News::model()->forSearch($_POST['term'])->findAll($crtiteria);
					break;
				case 'question':
					$crtiteria->addSearchCondition('subject', $_POST['term'], true, 'OR');
					$crtiteria->addSearchCondition('body', $_POST['term'], true, 'OR');
					$model = Question::model()->findAll($crtiteria);
					break;
			}
			$this->renderPartial('results', array(
				'section'=>$_POST['section'],
				'map'=>$map,
				'search_results'=>$model
			));
		}
	}
}