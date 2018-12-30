<?php

class ArticleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
    public $metaKeywords = '';
    public $metaDescription = '';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','category','archive','tag'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','create','update','delete','export'),
				'roles'=>array('admin', 'manager'), // allow admin user
			),
			array('deny',  // deny all users
				'users'=>array('?'),
			),
		);
	}
	
	public function missingAction($action)
	{
		$this->actionView($action);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if( is_numeric($id) ) {
			$article = $this->loadModel($id);
			$this->redirect('/library/article/'.$article->url);
		}
		$article = Article::model()->findByAttributes(array('url'=>$id));
		
		if( ! $article ) {
			$this->redirect('/library/article/');
		}
		
		$moreArticles = array();
		if($article->section_id) {
			$criteria = new CDbCriteria();
			$criteria->limit = 5;
			$criteria->order = 'publishing_date DESC';
			$criteria->condition = 'section_id='.$article->section_id.' AND id != '.$article->id;
			$moreArticles = Article::model()->findAll($criteria);
		}
		
		$this->render('view',array(
			'model'=>$article,
			'more'=>$moreArticles
		));
	}
	
	public function actionExport()
	{
		$fp = fopen('php://temp', 'w');
 
	    $headers = array(
	        'id',
	        'title',
	        'section.title',
	        'meta_title',
	        'meta_keywords',
	        'meta_description',
	    );
	    $row = array();
	    foreach($headers as $header) {
	        $row[] = Article::model()->getAttributeLabel($header);
		}
	    fputcsv($fp, $row, "~;");

	    $model=new Article();
	    $dp = $model->findAll();
	 
        foreach($dp as $line) {
            $row = array();
            foreach($headers as $head) {
                $row[] = CHtml::value($line, $head);
            }
            fputcsv($fp, $row, "~");
        }
	 
	    rewind($fp);
		$text = stream_get_contents($fp);
		fclose($fp);
		$text = iconv( "UTF-8", "CP1251", $text );
		Yii::app()->request->sendFile('export.csv', $text);
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Article;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if($this->canAdminAction())
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($page=1)
	{
		$count = Article::model()->published()->notArchived()->count();
		$model = Article::model()->published()->notArchived()->atPage($page)->findAll();
		
		$pages = new CPagination($count);
		$pages->pageSize = Yii::app()->params['itemsPerPage'];
		
		$this->render('index', array(
			'articles' => $model,
			'sections' => Section::model()->findAll(array('order'=>'title asc')),
			'currentCategory'=>false,
			'thisIsArchive'=>false,
			// Pagincation
			'pages' => $pages,
		));
	}
	
	/**
	 * Sort articles by filter and display them
	 */
	public function actionCategory($id, $page=1)
	{
		$count = Article::model()->published()->inCategory($id)->notArchived()->count();
		$model = Article::model()->published()->inCategory($id)->notArchived()->atPage($page)->findAll();
		
		$pages = new CPagination($count);
		$pages->route = '/library/article/category';
		$pages->pageSize = Yii::app()->params['itemsPerPage'];
		
		$this->render('index', array(
			'articles' => $model,
			'sections' => Section::model()->findAll(array('order'=>'title asc')),
			'thisIsArchive'=>false,
			'currentCategory'=>$id,
			// Pagincation
			'pages' => $pages,
		));
	}
	
	/**
	 * Lists all models which have `archived` attribute=1.
	 */
	public function actionArchive($category, $page=1)
	{
		$count = Article::model()->published()->inCategory($category)->archived()->count();
		$model = Article::model()->published()->inCategory($category)->archived()->atPage($page)->findAll();
		
		$pages = new CPagination($count);
		$pages->route = '/library/article/archive/';
		$pages->pageSize = Yii::app()->params['itemsPerPage'];
		
		$this->render('index',array(
			'articles' => $model,
			'sections' => Section::model()->findAll(array('order'=>'title asc')),
			'thisIsArchive'=>true,
			'currentCategory'=>$category,
			// Pagincation
			'pages' => $pages,
		));
	}
	
	public function actionTag($word, $page=1)
	{
		$count = Article::model()->published()->hasTag($word)->notArchived()->count();
		$model = Article::model()->published()->hasTag($word)->notArchived()->atPage($page)->findAll();
		
		$pages = new CPagination($count);
		$pages->pageSize = Yii::app()->params['itemPerPage'];

		$this->render('index',array(
			'articles' => $model,
			'sections' => Section::model()->findAll(array('order'=>'title asc')),
			'tag'=>$word,
			'currentCategory'=>false,
			// Pagincation
			'pages' => $pages,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->layout = '//layouts/column2';
		
		$model=new Article('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Article']))
			$model->attributes=$_GET['Article'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Article::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='article-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
