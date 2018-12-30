<?php

class AnswerController extends Controller
{
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
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('best'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array('admin', 'manager'), // allow admin user
			),
			array('deny',  // deny all users
				'users'=>array('?'),
			),
		);
	}
	
	public function actionIndex()
	{
		if($_POST) {
			$model=new Answer;
			$model->scenario='postAnswer';
			$model->attributes=$_POST;
			$question = Question::model()->findByPk((int)$_POST['question_id']);
			$user = Users::model()->findByPk((int)$question['user_id']);
			if($model->save()) {
				Yii::import('application.helpers.CString');
				
				Yii::import('application.helpers.CWebTools');
				CWebTools::sendEmailAsSiteRobot($user->email, $user->getFullName(), 'Новый ответ', 'new_answer', array(
					'%QSUBJ%' => $question->subject,
					'%ANS%' => $_POST['text'],
					'%LINK%' => 'http://'.$_SERVER['SERVER_NAME'].'/qa/question/view/id/'.$question->id
				));

				$formedAnswer = $this->widget('application.widgets.qa.answerWidget', array('item'=>$model), true);
				echo json_encode(array('answer'=>$formedAnswer));
			}
		}
	}
	
	public function actionAdmin()
	{
		$this->redirect('/qa/question');
	}
	
	public function actionBest($id)
	{
		$answer=Answer::model()->findByPk($id);
		$answer->setAsTheBest();
		
		$question=Question::model()->findByPk($answer->question_id);
		$question->close();
	}
	
	public function actionDelete($id)
	{
		$model = Answer::model()->findByPk($id);
		$qid = $model->question_id;
		$model->delete();
		$this->redirect('/qa/question/view/id/'.$qid);
	}
	
	public function actionList()
	{
		
	}
}