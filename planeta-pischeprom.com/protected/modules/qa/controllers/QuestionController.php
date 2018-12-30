<?php

class QuestionController extends Controller
{
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
				'actions'=>array('view','index','category'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('ask'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','update','delete'),
				'roles'=>array('admin', 'manager'), // allow admin user
			),
			array('deny',  // deny all users
				'users'=>array('?'),
			),
		);
	}
	
	public function actionAdmin()
	{
		$this->layout = '//layouts/column2';
		
		$model=new Question('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Question']))
			$model->attributes=$_GET['Question'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionAsk()
	{
		$model = new Question;
		$model->scenario = 'ask';
		
		if(isset($_POST['Question']))
		{
			$model->attributes=$_POST['Question'];
			if($model->save())
				$this->redirect('/qa/question');
		}
		
		$this->render('ask', array(
			'model' => $model
		));
	}
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		
		if(isset($_POST['Question']))
		{
			$model->attributes=$_POST['Question'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		$this->render('update', array(
			'model'=>$model,
		));
	}

	public function actionView($id)
	{
		$question = Question::model()->findByPk($id);
		$answerModel = new Answer;
		
		$this->render('view', array(
			'answerModel'=>$answerModel,
			'question'=>$question
		));
	}

	public function actionIndex($page=1)
	{
		$count = Question::model()->published()->count();
		$model = Question::model()->published()->atPage($page)->findAll();
		
		$pages = new CPagination($count);
		$pages->pageSize = Yii::app()->params['questionsPerPage'];
		
		$this->render('index', array(
			'questions' => $model,
			'sections' => Section::model()->findAll(array('order'=>'title asc')),
			'currentCategory'=>false,
			'pages' => $pages,
		));
	}
	
	public function actionCategory($id, $page=1)
	{
		$count = Question::model()->published()->inCategory($id)->count();
		$model = Question::model()->published()->inCategory($id)->atPage($page)->findAll();

		$pages = new CPagination($count);
		$pages->route = '/qa/question/category';
		$pages->pageSize = Yii::app()->params['questionsPerPage'];
		
		$this->render('index', array(
			'questions' => $model,
			'sections' => Section::model()->findAll(array('order'=>'title asc')),
			'currentCategory'=>$id,
			'pages' => $pages,
		));
	}
	
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
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}
	
	public function loadModel($id)
	{
		$model=Question::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}