<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $login;
	public $password;
	public $rememberMe;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('login, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Запомнить меня',
			'login'=>'Логин',
			'password'=>'Пароль',
		);
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->login, $this->password);
			$this->_identity->authenticate();
		}
		
		switch ($this->_identity->errorCode) {
			case UserIdentity::ERROR_USERNAME_INVALID:
				$this->addError('login', 'Логин указан не верно.');
				return false;
				break;
			case UserIdentity::ERROR_PASSWORD_INVALID:
				$this->addError('password', 'Пароль указан не верно.');
				return false;
				break;
			case UserIdentity::ERROR_UNACTIVATED:
				$this->addError('msg', 'Учетная запись не активирована. Ссылка на активацию доступна в письме, высланном после регистрации.');
				return false;
				break;
			case UserIdentity::ERROR_NONE:
				$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
				Yii::app()->user->login($this->_identity, $duration);
				return true;
				break;
		}
	}
}
