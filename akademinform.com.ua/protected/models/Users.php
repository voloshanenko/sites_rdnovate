<?php
/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $address
 * @property string $occupation
 * @property string $login
 * @property string $password
 * @property integer $is_activated
 * @property string $email
 * @property string $activation_code
 * @property string $role
 * @property string $group_id
 * @property string $web
 * @property string $phone1
 * @property string $phone2
 */
class Users extends CActiveRecord
{
	public $password_repeat;
	public $verifyCode;

	/**
	 * Returns the static model of the specified AR class.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	protected function beforeValidate()
	{
		if( ! $this->isNewRecord)
		{
			if( ! $this->password )
			{
				unset($this->password);
				unset($this->password_repeat);
			}
		}
		return parent::beforeValidate();
	}

	protected function beforeSave()
	{
		if($this->isNewRecord)
		{
			$this->is_activated = 0;
			Yii::import('application.helpers.CString');
			$this->activation_code = CString::randomString(15);
			if(!$this->role)
				$this->role = 'user';
			
			if($this->role=='user')
				$this->group_id = null;
		}
		
		if($this->password) {
			$this->password = md5($this->password);
		} else {
			unset($this->password);
			unset($this->password_repeat);
		}
		
		return parent::beforeSave();
	}

	protected function afterSave()
	{
		if($this->isNewRecord && $this->scenario=='registration')
		{
			$this->sendActivationLetter();
			Yii::app()->user->setFlash('success', 'Регистрация прошла успешно. Письмо активации аккаунта мы отправили на указанный e-mail: '.$this->email);
		}
		return parent::afterSave();
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_activated, group_id', 'numerical', 'integerOnly' => true),
			array('first_name, login, password, password_repeat, email', 'required', 'on'=>'registration'),
			array('login, email', 'unique', 'on'=>'registration'),
			array('verifyCode', 'captcha', 'allowEmpty'=>$this->getScenario()!='registration'),
			array('first_name, last_name, middle_name, login', 'length', 'max' => 40, 'min'=> 2 ),
            array('first_name, last_name, login, email', 'required', 'on'=>'update' ),
			array('address, web, phone1, phone2', 'length', 'max' => 255),
			array('occupation', 'length', 'max' => 100),
			array('password', 'length', 'min' => 4),
			array('password', 'length', 'max' => 20),
			array('password', 'compare', 'compareAttribute'=>'password_repeat', 'on'=>'registration'),
			array('email', 'email'),
			array('contacts, role','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, first_name, last_name, middle_name, address, occupation, login, password, is_activated, email', 'safe', 'on' => 'search'), );
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		Yii::app()->getModule('ads');
		Yii::app()->getModule('photos');
		return array(
			'ads' => array(self::HAS_MANY, 'Ads', 'owner_id'),
			'countAds'=>array(self::STAT, 'Ads', 'owner_id'),
			'photos' => array(self::HAS_MANY, 'Photos', 'user_id'),
			'group'=>array(self::BELONGS_TO, 'UserGroup','group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => '#',
			'first_name' => 'Имя',
			'last_name' => 'Фамилия',
			'middle_name' => 'Отчество',
			'address' => 'Адрес',
			'occupation' => 'Пару слов о себе, род деятельности',
			'login' => 'Логин',
			'password' => 'Пароль',
			'role' => 'Роль',
			'group_id' => 'Группа',
			'password_repeat' => 'Подтверждение пароля',
			'is_activated' => 'Пользователь активирован?',
			'verifyCode'=>'Проверочный код',
			'email' => 'E-mail',
			'web'=>'Web-сайт',
			'phone1'=>'Телефон 1',
			'phone2'=>'Телефон 2',
			'contacts' => 'Дополнительные контакты',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based
	 * on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		if($this->user_id)
			$criteria->addCondition('user_id="'.$this->user_id.'"');
			
		$criteria->compare('first_name', $this->first_name, true);
		$criteria->compare('last_name', $this->last_name, true);
		$criteria->compare('middle_name', $this->middle_name, true);
		$criteria->compare('address', $this->address, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('login', $this->login, true);
		
		if($this->is_activated)
			$criteria->compare('is_activated="'.$this->is_activated.'"');
		
		$criteria->compare('email', $this->email, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
                'pageSize'=>Yii::app()->params['adminItemsPerPage'],
            ),
		));
	}

	private function generateActivationLink()
	{
		return 'http://'.$_SERVER['SERVER_NAME'].'/site/activation/code/'.$this->activation_code;
	}

	/**
	 * Returns First name + Last Name
	 */
	public function getFullName()
	{
		return $this->first_name.' '.$this->last_name;
    }
	
	/**
	 * Returns Last name + First name
	 */
	public function getAdminFullName()
	{
		return $this->last_name.' '.$this->first_name;
    }

	public function sendActivationLetter()
	{
		Yii::import('application.helpers.CString');
		Yii::import('application.extensions.phpmailer.JPhpMailer');
		$mail = new JPhpMailer;
		$mail->IsMail();
		$mail->CharSet = "UTF-8";
		$mail->SetFrom(Yii::app()->params['spam']['fromEmail'], Yii::app()->params['spam']['fromName']);
		$mail->Subject = 'Успешная регистрация на Планете Био!';
		$mail->AltBody = CString::getFormedEmailText('registration_success_alt.txt', array('%LINK%'=>$this->generateActivationLink()));
		$mail->MsgHTML(CString::getFormedEmailText('registration_success.txt', array('%LINK%'=>$this->generateActivationLink())));
		$mail->AddAddress($this->email, $this->first_name.' '.$this->last_name);
		$mail->Send();
	}

	public function activate()
	{
		$this->saveAttributes(array('is_activated'=>1));
	}

}
