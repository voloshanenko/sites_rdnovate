<?php

class UserIdentity extends CUserIdentity
{
	private $_id;
	
	public function authenticate()
	{
		$user = Users::model()->findByAttributes(array('login' => $this->username));
		if($user === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if($user->password !== md5($this->password))
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else if($user->is_activated == 0)
			$this->errorCode = self::ERROR_UNACTIVATED;
		else
		{
			Yii::import('application.helpers.CWebTools');
			$this->_id = $user->user_id;
			$this->username = $user->login;
			$this->setState('name', $user->first_name.' '.$user->last_name);
			$this->setState('email', $user->email);
			$this->setState('role', $user->role);
			if($user->group_id>0 && $user->role=='manager') {
				$this->setState('group', $user->group->params);
			}
			$this->setState('ip', CWebTools::getUsersIp());
			$this->errorCode = self::ERROR_NONE;
		}

		return !$this->errorCode;
	}

	public function getId()
    {
        return $this->_id;
    }
}