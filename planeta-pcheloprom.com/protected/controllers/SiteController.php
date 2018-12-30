<?php

class SiteController extends Controller
{
    public $metaKeywords = '';
    public $metaDescription = '';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$presentEvents = Event::model()->sorted()->briefly()->atPresent()->findAll();
		$futureEvents = Event::model()->sorted()->nearest()->limited(6-count($presentEvents))->findAll();
		
		$ads = Ads::model()->published()->recently()->findAll();
		$articles = Article::model()->published()->recently()->onMainPage()->notArchived()->findAll();
		$contests = Contest::model()->published()->onMainPage()->findAll();
		$news = News::model()->sorted()->published()->briefly()->findAll();
		$events = array_merge($presentEvents, $futureEvents);
		$questions = Question::model()->published()->recently()->findAll();
		
		$this->render('index', array(
			'ads'		=> $ads,
			'contests'	=> $contests,
			'articles'	=> $articles,
			'news'		=> $news,
			'events'	=> $events,
			'questions'	=> $questions,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm();

		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];

			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		$this->render('login', array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout(false);
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionActivation($code)
	{
		$identity = new UserActivationIdentity($code);
		$identity->authenticate();
		if($identity->errorCode == UserIdentity::ERROR_NONE)
		{
			Yii::app()->user->setFlash('success', 'Ваша учетная запись была успешно активирована!');
			Yii::app()->user->login($identity, 3600*24*30);
		}
		else if($identity->errorCode == UserIdentity::ERROR_ACTIVATION_CODE_INVALID)
		{
			Yii::app()->user->setFlash('success', 'Ошибка при активации аккаунта.');
		}						
		$this->redirect('/');
	}

	/**
	 * Registration page
	 */
	public function actionRegistration()
	{
		$model=new Users('registration');

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect('/');
		}

		$this->render('registration',array(
			'model'=>$model,
		));
	}

}