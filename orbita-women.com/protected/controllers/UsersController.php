<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    public $metaKeywords = '';
    public $metaDescription = '';

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}

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
				'actions'=>array('recovery'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('admin', 'index', 'create', 'delete'),
				'roles'=>array('admin', 'manager'),
			),
			array('allow',
				'actions'=>array('update', 'private'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('?'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
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
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->user_id));
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

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->user_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionRecovery()
	{
		if($_POST)
		{
			$email = $_POST['email'];
			$user = Users::model()->findByAttributes(array('email'=>$email));
			if($user!==null) {
				Yii::import('application.helpers.CString');
				$newPwd = CString::randomString(8);
				$user->password = $newPwd;
				if($user->save()) {
					Yii::import('application.helpers.CWebTools');
					CWebTools::sendEmailAsSiteRobot($email, $user->getFullName(), 'Восстановление пароля', 'pwd_recovered', array(
						'%NP%' => $newPwd,
					));
					Yii::app()->user->setFlash('success', 'Письмо с новым паролем отправлено на e-mail '.$email);
					$this->redirect('/site/login');
				}
			} else {
				Yii::app()->user->setFlash('error', $email.': аккаунт не найден. Возможно была допущена ошибка при вводе e-mail.');
				$this->redirect(array('recovery'));
			}
		}
		else
		{
			$this->render('recovery'); // render Password recovery template
		}
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionPrivate()
	{
        $this->layout='//layouts/column1';
        if( Yii::app()->user->isGuest )
        {
            Yii::app()->user->setFlash('error', 'Для входа в приватный раздел - требуется авторизация.');
            $this->redirect('/site/login');
        }
        else
        {
            $userModel = $this->loadModel(Yii::app()->user->id);

            if(isset($_POST['Users']))
            {
                $userModel->attributes=$_POST['Users'];
                if($userModel->save())
                {
                    Yii::app()->user->setState('name', $userModel->getFullName());
                    Yii::app()->user->setState('email', $userModel->email);
                    Yii::app()->user->setFlash('success', 'Ваши данные были успешно обновлены!');
                    $this->redirect('/users/private');
                }
            }

            $this->render('private', array(
                'user' => $userModel->with(array(
                    'ads'=>array(
                        'order'=>'publishing_date DESC',
                    ),
                    'photos'=>array(
                        'order'=>'rating DESC, created_at ASC',
                    )))
            ));
        }
	}

	public function actionRegistration()
	{
        $this->layout='//layouts/column1';

		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->password = md5($model->password);
			$model->is_activated = 1;
			if($model->save())
				$this->redirect('/');
		}

		$this->render('registration',array(
			'type' => 'registration',
			'model' => $model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Export Users main information into CSV
	 */
	public function actionExport()
	{
		$fp = fopen('php://temp', 'w');
 
	    $headers = array(
	        'user_id',
			'last_name',
	        'first_name',
			'middle_name',
	        'email',
			'web',
			'phone1',
			'phone2',
			'address',
	    );
	    $row = array();
	    foreach($headers as $header) {
	        $row[] = Users::model()->getAttributeLabel($header);
		}
	    fputcsv($fp, $row, "~;");

	    $model=new Users();
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
		Yii::app()->request->sendFile('export_users.csv', $text);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
