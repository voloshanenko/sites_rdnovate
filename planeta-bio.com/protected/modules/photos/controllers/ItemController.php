<?php

class ItemController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2',
	 * meaning
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
		return array('accessControl',  // perform access control for CRUD operations
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
				array('allow', // allow all users to perform 'index' and 'view' actions
						'actions' => array('index','view','vote','all','getinfo','category','lookup','past','future'),
						'users' => array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions' => array('create', 'update', 'delete'),
						'users' => array('@'),
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions' => array('admin', 'delete', 'deletePrizes', 'update', 'create', 'view', 'vote'),
						'users' => array('admin','rdadmin'),
				),
				array('deny', // deny all users
						'users' => array('?'),
				),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        if(Yii::app()->request->getIsAjaxRequest())
        {
            echo $this->getInfo($id);
            Yii::app()->end();
        }
        else
        {
            $this->render('view', array('model' => $this->loadModel($id)));
        }
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Photos;
        $model->scenario = 'create';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Photos']))
		{
			$model->attributes=$_POST['Photos'];
			if ($model->save())
				$this->redirect(array(
						'view',
						'id' => $model->id
				));
		}

		$this->render('create', array('model' => $model, ));
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

		if (isset($_POST['Photos']))
		{
			$model->attributes=$_POST['Photos'];
			if ($model->save())
				$this->redirect(array(
						'view',
						'id' => $model->id
				));
		}

		$this->render('update', array('model' => $model, ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        $model = $this->loadModel($id);
		if ($model->isOwner(Yii::app()->user->id) || $this->canAdminAction())
		{
			$model->deleteFiles();
            $model->delete();
			$this->redirect(Yii::app()->user->returnUrl);
		}
		else
			throw new CHttpException(400, 'Извините, удалять можно только свои фото.');
	}
	
	public function actionDeletePrizes($id)
	{
		$attr = array();
		$model = Contest::model()->findByPk($id);
		if($model->prize1) {
			if(file_exists($_SERVER['DOCUMENT_ROOT'].$model->prize1)) {
				unlink($_SERVER['DOCUMENT_ROOT'].$model->prize1);
			}
			$attr['prize1'] = '';
			$attr['prize1_url'] = '';
		}
		if($model->prize2) {
			if(file_exists($_SERVER['DOCUMENT_ROOT'].$model->prize2)) {
				unlink($_SERVER['DOCUMENT_ROOT'].$model->prize2);
			}
			$attr['prize2'] = '';
			$attr['prize2_url'] = '';
		}
		if($model->prize3) {
			if(file_exists($_SERVER['DOCUMENT_ROOT'].$model->prize3)) {
				unlink($_SERVER['DOCUMENT_ROOT'].$model->prize3);
			}
			$attr['prize3'] = '';
			$attr['prize3_url'] = '';
		}
		$model->saveAttributes($attr);
		$this->redirect('/photos/item/');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$contests = Contest::model()->published()->currently()->findAll();
		$this->render('index', array('presentContests'=>$contests));
	}
	
	public function actionFuture()
	{
		$contests = Contest::model()->published()->planned()->findAll();
		$this->render('future', array('futureContests'=>$contests));
	}
	
	public function actionPast($page=1)
	{
		$count 		= Contest::model()->published()->past()->count();
		$contests	= Contest::model()->published()->past()->atPage($page)->findAll();
		
		$pages = new CPagination($count);
		$pages->pageSize = Yii::app()->params['contestsPerPage'];

		$this->render('past', array(
			'pastContests'=>$contests,
			'pages'=>$pages,
		));
	}
	
    /**
     * Page with all photos
     */
    public function actionAll($page=1)
    {
    	$count = Photos::model()->published()->notDiscarded()->count();
        $model = Photos::model()->published()->notDiscarded()->atPage($page)->findAll();
		
		$pages = new CPagination($count);
		$pages->pageSize = Yii::app()->params['photosPerPage'];
		
		$sectionModel = Section::model()->findAll(array('order'=>'title asc'));
		
        $this->render('all', array(
        	'model'=>$model,
        	'sections' => $sectionModel,
        	'pages'=>$pages,
		));
    }
	
	/**
	 * List models from Category
	 */
	public function actionCategory($id, $breed='', $page=1)
	{
		if($breed == '')
		{
			$count = Photos::model()->published()->inCategory($id)->notDiscarded()->count();
	        $model = Photos::model()->published()->inCategory($id)->notDiscarded()->atPage($page)->findAll();
		}
		else
		{
			$count = Photos::model()->published()->inCategory($id)->hasBreed($breed)->notDiscarded()->count();
	        $model = Photos::model()->published()->inCategory($id)->hasBreed($breed)->notDiscarded()->atPage($page)->findAll();
		}
		// Pager
		$pages = new CPagination($count);
		$pages->pageSize = Yii::app()->params['photosPerPage'];
		
		// Getting list of breeds
		$breedCriteria = new CDbCriteria();
		$breedCriteria->select = 'breed';
		$breedCriteria->distinct = true;
		$breedCriteria->condition = 'section_id='.$id;
		$breedCriteria->order = 'breed ASC';
		$breedList = Photos::model()->findAll($breedCriteria);
		
		// Getting list of categories
		$sectionModel = Section::model()->findAll(array('order'=>'title asc'));
		
        $this->render('all', array(
        	'model'=>$model,
        	'breedList'=>$breedList,
        	'currentCategory'=>$id,
        	'currentBreed'=>$breed,
        	'sections'=>$sectionModel,
        	'pages'=>$pages,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $criteria = new CDbCriteria(array(
            'limit'=>50,
            'order'=>'created_at asc'
        ));
		$model=new Photos('search');
        $model->setDbCriteria($criteria);
        $model->unsetAttributes();

		if (isset($_GET['Photos']))
			$model->attributes=$_GET['Photos'];

		$this->render('admin', array('model' => $model, ));
	}

	/**
	 * Vote up action
	 */
	public function actionVote()
	{
		if(isset($_POST['id']))
		{
			$id = $_POST['id'];
			Yii::import('application.helpers.CWebTools');
			$ip=CWebTools::getUsersIp();
			if ( ! PhotosVotes::model()->countByAttributes(array('photo_id'=>$id, 'ip'=>$ip)))
			{
				$photo=Photos::model()->findByPk($id);
				$photo->vote($id, $ip);
				echo json_encode(array(
					'type'=>'success', 'msg'=>'Спасибо за ваш голос!', 'newRating' => $photo->rating
				));
			}
			else
			{
				echo json_encode(array(
					'type'=>'error', 'msg'=>'Извините, но Вы уже голосовали за это фото.',
				));
			}
		}
		else
		{
			throw new CHttpException(500, 'Photo id is not defined');
		}
	}

	public function actionLookup()
	{
		$key = array_keys($_POST);
		$val = array_values($_POST);
		$criteria = new CDbCriteria();
		$criteria->distinct = true;
		$criteria->group = $key[0];
		$criteria->compare($key[0], $val[0], true);
		$data = Photos::model()->findAll($criteria);
		echo CJSON::encode($data);
	}

    /*
     * Get full info about image
     */
    private function getInfo($id)
    {
        $photo = $this->loadModel($id);
        $photo->incViews();
        $photo->with(array(
            'owner'=>array('select'=>'user_id,address,email,first_name,last_name,login,occupation'),
            'contest'
        ))->findByPk((int)$id);
        $data = array(
            'voteable'=>$photo->isVoteable(),
            'photo' => $photo,
            'contest' => $photo->contest,
            'owner' => $photo->owner,
            'contestSponsor' => $photo->contest->sponsor,
            'contestPartner' => $photo->contest->partner,
            'ads_bottom' => Yii::app()->BannerShow->renderBanners((int)$photo->section_id, 'p5'),
            'ads_left' => Yii::app()->BannerShow->renderBanners((int)$photo->section_id, 'p6'),
            'ads_right' => Yii::app()->BannerShow->renderBanners((int)$photo->section_id, 'p7')
        );
        return CJSON::encode($data);
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Photos::model()->findByPk($id);
		if ($model===null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='contest-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
