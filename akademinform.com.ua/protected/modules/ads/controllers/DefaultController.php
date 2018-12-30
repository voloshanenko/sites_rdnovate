<?php

class DefaultController extends Controller
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
			array('allow',
				'actions'=>array('index','view','category','filter','lookup'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('create','update','own','delete'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('admin'),
				'roles'=>array('admin', 'manager'),
			),
			array('deny',
				'users'=>array('?'), // deny all users
			),
		);
	}
	/*
	 * Show models with acceptable parameters
	 * POST method is only eligible
	 */
	public function actionFilter()
	{
		if( empty($_POST) )
		{
			Yii::app()->user->setFlash('error', 'Ошибка при фильтрации объявлений');
			$this->redirect('/ads');
		}
		$input = $_POST['Ads'];

		$criteria = new CDbCriteria();
		$criteria->condition = 'discarded=0 AND end_publishing_date>=NOW()';
		$criteria->order = 'publishing_date DESC';
		if(trim($input['title'])) {
			$criteria->addSearchCondition('title', $input['title'], true, 'AND', 'LIKE');
		}
		if(trim($input['section_id']))
			$criteria->addCondition('section_id='.$input['section_id']);

		if(trim($input['ad_type']))
			$criteria->addCondition('ad_type=\''.$input['ad_type'].'\'');

		if(trim($input['gender']))
			$criteria->addCondition('gender=\''.$input['gender'].'\'');
		
		if(trim($input['city']))
			$criteria->addSearchCondition('city', $input['city'], true, 'AND', 'LIKE');
		
		if(trim($input['breed']))
			$criteria->addSearchCondition('breed', $input['breed'], true, 'AND', 'LIKE');
		
		if(trim($input['suburb']))
			$criteria->addSearchCondition('suburb', $input['suburb'], true, 'AND', 'LIKE');

		$model = Ads::model();
		$model->attributes = $input;
		$count = $model->count($criteria);
		$data = $model->findAll($criteria);
		
		$pages = new CPagination($count);
		$pages->pageSize = Yii::app()->params['adsPerPage'];
		$this->render('search_results', array(
			'model'=>$model,
			'data'=>$data,
			'currentSection' => (trim($input['section_id'])) ? trim($input['section_id']) : false,
			'pages'=>$pages,
		));
	}

	public function actionOwn()
	{
		$dataProvider=new CActiveDataProvider('Ads', array(
			'criteria'=>array(
				'condition'=>'owner_id='.Yii::app()->user->id,
				'order'=>'publishing_date DESC',
				'with'=> array('author','section')
			),
		));
		$this->render('index', array(
			'own'=>TRUE,
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$model->scenario = 'view';
		$model->incViews();
		$this->render('view',array(
			'model' => $model
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ads('create');
		$user=Users::model()->findByPk(Yii::app()->user->id);

		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Ads']))
		{
			$model->attributes=$_POST['Ads'];
			if($model->save()) {
				$this->redirect(array('view','id'=>$model->ad_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'user'=>$user
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
		if(!$this->canEditAds($model->owner_id)) {
			Yii::app()->user->setFlash('error', 'Вы не можете редактировать чужие объявления.');
			$this->redirect('/ads');
		}
		$model->scenario = 'update';
		$user=Users::model()->findByPk(Yii::app()->user->id);

		// $this->performAjaxValidation($model);

		if(isset($_POST['Ads']))
		{
			$model->attributes=$_POST['Ads'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ad_id));
		}

		$this->render('update',array(
			'model'=>$model,
			'user'=>$user
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
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Ads', array(
			'criteria'=>array(
				'condition'=>($category>0)?'section_id='.$category.' AND ':'discarded=0 AND end_publishing_date>=NOW()',
				'order'=>'publishing_date DESC',
				'with'=> array('author', 'section')
			),
			'pagination' => array(
				'pageSize' => Yii::app()->params['adsPerPage'],
			)
		));
		
		$sectionModel = Section::model()->findAll(array('order'=>'title asc'));
		
		$this->render('index', array(
			'own' => false,
			'currentSection' => false,
			'sections' => $sectionModel,
			'dataProvider'=>$dataProvider,
		));
	}
	
	/**
	 * List models from Category
	 */
	public function actionCategory($id)
	{
		$dataProvider = new CActiveDataProvider('Ads', array(
			'criteria'=>array(
				'condition'=>'section_id='.$id.' AND discarded=0 AND end_publishing_date>=NOW()',
				'order'=>'publishing_date DESC',
				'with'=> array('author', 'section')
			),
			'pagination' => array(
				'pageSize' => Yii::app()->params['adsPerPage'],
			)
		));
		
		$sectionModel = Section::model()->findAll(array('order'=>'title asc'));
		
		$this->render('index', array(
			'own'=>FALSE,
			'currSection'=>$id,
			'sections' => $sectionModel,
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionExport()
	{
		if(!$this->canAdminAds()) {
			$this->redirect('/ads');
		}
		$fp = fopen('php://temp', 'w');
 
	    $headers = array(
	        'ad_id',
	        'title',
	        'contact_person',
	        'contacts',
	        'city',
	    );
	    $row = array();
	    foreach($headers as $header) {
	        $row[] = Ads::model()->getAttributeLabel($header);
		}
	    fputcsv($fp, $row, "~;");

	    $model=new Ads();
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
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if(!$this->canAdminAds()) {
			$this->redirect('/ads');
		}
		$this->layout = '//layouts/column2';

		$model=new Ads('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ads']))
			$model->attributes=$_GET['Ads'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionLookup()
	{
		$key = array_keys($_POST);
		$val = array_values($_POST);
		$criteria = new CDbCriteria();
		$criteria->distinct = true;
		$criteria->group = $key[0];
		$criteria->compare($key[0], $val[0], true);
		$data = Ads::model()->findAll($criteria);
		echo CJSON::encode($data);
	}
	
	public function actionActualize($id, $term)
	{
		$model = $this->loadModel($id);
		$model->actualize((int)$term);
		$this->redirect('/ads/default/view/id/'.$id);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Ads::model()->findByPk($id);
		if($model===null) {
			Yii::app()->user->setFlash('error', 'Объявление не найдено.');
			$this->redirect('/ads');
		}
			//throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ads-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	private function canEditAds($owner_id) 
	{
		$user = Yii::app()->user;
		$params = $this->getActionParams();
		return !$user->isGuest && ($user->role=='user' && $user->id==$owner_id) ||
				($user->role=='admin' || ($user->role=='manager' && in_array($this->uniqueId, unserialize($user->group))));
	}
	
	private function canAdminAds()
	{
		$user = Yii::app()->user;
		$params = $this->getActionParams();
		return !$user->isGuest && ($user->role=='admin' || ($user->role=='manager' && in_array($this->uniqueId, unserialize($user->group))));
	}
}
