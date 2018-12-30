<?php

class BannerController extends Controller
{
	public $metaKeywords = '';
    public $metaDescription = '';
	
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view'),
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
				'users'=>array('?'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Banner;
		$model->scenario = 'create';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Banner']))
		{
			$model->attributes=$_POST['Banner'];
			if($model->save()) {
				if($_FILES['Banner']['name']['image'] != '') {
					if ((($_FILES['Banner']['type']['image'] == "image/gif")
					|| ($_FILES['Banner']['type']['image'] == "image/jpeg")
					|| ($_FILES['Banner']['type']['image'] == "image/png"))
					&& ($_FILES['Banner']['type']['image'] < 20000)) {
			  			if ($_FILES['Banner']['error']['image'] > 0) {
			  				Yii::app()->user->setFlash('Error', 'Ошибка при загрузке изображения: '.$_FILES['Banner']['error']['image']);
						} else {
						    if (file_exists($_SERVER['DOCUMENT_ROOT'].'/images/Banner/'.$model->id.'/'.$fileName)) {
						      unlink('images/Banner/'.$model->id.'/'.$fileName);
							} else {
								Yii::import('application.helpers.CString');
								$tempFileName = $_FILES['Banner']['name']['image'];
								$fileName = CString::randomString(15).'.'.CString::getFileExtension($tempFileName);
								if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/images/Banner/'.$model->id)) {
									mkdir($_SERVER['DOCUMENT_ROOT'].'/images/Banner/'.$model->id);
								}
								move_uploaded_file($_FILES['Banner']['tmp_name']['image'], $_SERVER['DOCUMENT_ROOT'].'/images/Banner/'.$model->id.'/'.$fileName);
								$model->saveAttributes(array('image'=>'/images/Banner/'.$model->id.'/'.$fileName));
		      				}
						}
					}
				}

				$this->redirect(array('admin'));
			}
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
		$model->scenario = 'update';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Banner']))
		{
			$model->attributes=$_POST['Banner'];
			if($model->save()) {
			
				if($_FILES['Banner']['name']['image'] != '') {
					if ((($_FILES['Banner']['type']['image'] == "image/gif")
					|| ($_FILES['Banner']['type']['image'] == "image/jpeg")
					|| ($_FILES['Banner']['type']['image'] == "image/png"))
					&& ($_FILES['Banner']['type']['image'] < 20000)) {
			  			if ($_FILES['Banner']['error']['image'] > 0) {
			  				Yii::app()->user->setFlash('Error', 'Ошибка при загрузке изображения: '.$_FILES['Banner']['error']['image']);
						} else {
							if($model->image && file_exists($_SERVER['DOCUMENT_ROOT'].$model->image)) {
								unlink($_SERVER['DOCUMENT_ROOT'].$model->image);
							}
							Yii::import('application.helpers.CString');
							$tempFileName = $_FILES['Banner']['name']['image'];
							$fileName = CString::randomString(15).'.'.CString::getFileExtension($tempFileName);
							if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/images/Banner/'.$model->id)) {
								mkdir($_SERVER['DOCUMENT_ROOT'].'/images/Banner/'.$model->id, '777');
							}
							move_uploaded_file($_FILES['Banner']['tmp_name']['image'], $_SERVER['DOCUMENT_ROOT'].'/images/Banner/'.$model->id.'/'.$fileName);
							$model->saveAttributes(array('image'=>'/images/Banner/'.$model->id.'/'.$fileName));
						}
					}
				}
			
				$this->redirect(array('admin'));
			}
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
		if(Yii::app()->request->isPostRequest)
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
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Banner('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Banner']))
			$model->attributes=$_GET['Banner'];

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
		$model=Banner::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='banner-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
