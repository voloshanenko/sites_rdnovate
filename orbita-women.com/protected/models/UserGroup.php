<?php

/**
 * This is the model class for table "user_group".
 *
 * The followings are the available columns in table 'user_group':
 * @property string $id
 * @property string $name
 * @property string $params
 */
class UserGroup extends CActiveRecord
{
	
	public $sectionsList = array(
		'banner' => 'Баннеры',
		'section' => 'Категории',
		'photos/contest' => 'Конкурсы',
		'photos/item' => 'Фото',
		'photos/partners' => 'Партнеры',
		'photos/sponsor' => 'Спонсоры',
		'ads/default' => 'Объявления',
		'qa/question' => 'Вопросы',
		'qa/answer' => 'Ответы',
		'library/article' => 'Статьи (библиотека)',
		'whatsnews/event' => 'События',
		'whatsnews/news' => 'Новости',
		'pages' => 'Информ. страницы',
		'pagesSections' => 'Разделы информ. страниц',
		'users' => 'Пользователи',
		'userGroup' => 'Группы пользователей',
		);
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserGroup the static model class
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
		return 'user_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>60),
			array('params', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, params', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}
	
	public function beforeValidate()
	{
		$this->params = serialize($_POST['sections']);
		return parent::beforeValidate();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'params' => 'Параметры доступа',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('params',$this->params,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
                'pageSize'=>Yii::app()->params['adminItemsPerPage'],
            ),
		));
	}
}