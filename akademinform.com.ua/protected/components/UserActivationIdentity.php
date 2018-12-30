<?php

class UserActivationIdentity extends CUserIdentity
{
	private $_id;
	private $_user;
	
	public function __construct($code)
	{
		$this->_user=Users::model()->findByAttributes(array('activation_code' => $code));
	}
	
	public function authenticate()
	{
		if($this->_user === null)
		{
			$this->errorCode = self::ERROR_ACTIVATION_CODE_INVALID;
		}
		else
		{
			Yii::import('application.helpers.CWebTools');

			$this->_id = $this->_user->user_id;
			$this->username = $this->_user->login;
			$this->setState('name', $this->_user->getFullName());
			$this->setState('email', $this->_user->email);
			$this->setState('role', $this->_user->role);
			$this->setState('ip', CWebTools::getUsersIp());
			$this->errorCode = self::ERROR_NONE;
			$this->_user->activate();
		}
		return !$this->errorCode;
	}

	public function getId()
    {
        return $this->_id;
    }
}