<?php

class EventController extends Controller
{
  public $metaKeywords;
  public $metaDescription;

  public $layout='//layouts/column2';

  public function filters()
  {
    return array(
      'accessControl', // perform access control for CRUD operations
    );
  }

  public function accessRules()
  {
    return array(
      array('allow',  // allow all users to perform 'index' and 'view' actions
        'actions'=>array('index','view','category','archive'),
        'users'=>array('*'),
      ),
      array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array(),
        'users'=>array('@'),
      ),
      array('allow', // allow admin user to perform 'admin' and 'delete' actions
        'actions'=>array('admin','create','update','delete'),
        'roles'=>array('admin', 'manager'), // allow admin user
      ),
      array('deny',  // deny all users
        'users'=>array('*'),
      ),
    );
  }

  public function actionView($id)
  {
    $this->layout = '//layouts/column1';
    
    $this->render('view',array(
      'model'=>$this->loadModel($id),
    ));
  }

  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
  public function actionCreate()
  {
    $model=new Event;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['Event']))
    {
      $model->attributes=$_POST['Event'];
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

    if(isset($_POST['Event']))
    {
      $model->attributes=$_POST['Event'];
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
    $this->layout = '//layouts/column1';
    
    $sections = Section::model()->findAll(array('order'=>'title asc'));
    
    $todaysEvents = Event::model()->limited(Yii::app()->params['itemsPerPage'])->sorted()->atPresent()->findAll();
    
    $nearestEvents = Event::model()->limited(Yii::app()->params['itemsPerPage'])->atPage($page)->sorted()->nearest()->findAll();
    $nearestEventsCount = Event::model()->nearest()->count();
    
    $nearestEventsPages = new CPagination($nearestEventsCount);
    $nearestEventsPages->route = '/whatsnews/event/';
    $nearestEventsPages->pageSize = Yii::app()->params['itemsPerPage'];
    
    $this->render('index',array(
      'sections'=>$sections,
      'currentSection'=>false,
      'isMainPage'=>true,
      'todays'=>$todaysEvents,
      'nearestEventsPages' => $nearestEventsPages,
      'nearest'=>$nearestEvents,
    ));
  }
  
  public function actionCategory($id)
  {
    $this->layout = '//layouts/column1';
    
    $sections = Section::model()->findAll(array('order'=>'title asc'));
    
    $todaysEvents = Event::model()->sorted()->inSection($id)->atPresent()->findAll();
    $nearestEvents = Event::model()->sorted()->inSection($id)->nearest()->findAll();
    
    $this->render('index',array(
      'sections'=>$sections,
      'currentSection'=>$id,
      'todays'=>$todaysEvents,
      'nearest'=>$nearestEvents,
      'isMainPage'=>false,
    ));
  }
  
  public function actionArchive($category, $page=1)
  {
    $this->layout = '//layouts/column1';
    
    $count = Event::model()->inSection($category)->past()->count();
    $model = Event::model()->reversedSorted()->inSection($category)->past()->atPage($page)->findAll();
    $sections = Section::model()->findAll(array('order'=>'title asc'));
    
    $pages = new CPagination($count);
    $pages->route = '/whatsnews/event/archive/';
    $pages->pageSize = Yii::app()->params['itemsPerPage'];
    
    $this->render('index',array(
      'sections'=>$sections,
      'currentSection'=>$category,
      'items'=>$model,
      'archive'=>true,
      'pages' => $pages,
      'isMainPage'=>false,
    ));
  }

  /**
   * Manages all models.
   */
  public function actionAdmin()
  {
    $model=new Event('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['Event']))
      $model->attributes=$_GET['Event'];

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
    $model=Event::model()->findByPk($id);
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
    if(isset($_POST['ajax']) && $_POST['ajax']==='event-form')
    {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
}
