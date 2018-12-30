<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property string $id
 * @property string $title
 * @property string $controller_id
 * @property string $section_id
 * @property string $position
 * @property string $owner_contacts
 * @property integer $active
 * @property string $image
 * @property datetime $validTo
 * @property string $url
 *
 * The followings are the available model relations:
 * @property Section $section
 */
class Banner extends CActiveRecord
{
	
	public $positions = array(
		'p1' => 'Сквозная под шапкой (Ш: 960)',
		'p2' => 'Под листингом - вид (Ш: 960)',
		'p4' => 'Под листингом + вид (Ш: 960)',
		'p3' => 'Контент страницы (Ш: 740)',
		'p5' => 'Всплывающее фото, внизу (Ш: 640)',
		'p6' => 'Всплывающее фото, слева (Ш: 170, В: ~670)',
		'p7' => 'Всплывающее фото, справа (Ш: 170, В: ~670)',
	);
	public $controllers = array(
		'site' => 'Главная, авторизация, регистрация',
		'default' => 'Объявления',
		'news' => 'Новости',
		'event' => 'События',
		'item' => 'Фото и Фотоконкурсы',
		'partners' => 'Партнеры',
		'sponsor' => 'Спонсоры',
		'article' => 'Библиотека',
		'pages' => 'Информационные страницы',
		'question' => 'Вопросы и ответы',
	);
	/**
	 * Returns the static model of the specified AR class.
	 * @return Banner the static model class
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
		return 'banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('active', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('controller_id, owner_contacts, validTo, url', 'length', 'max'=>255),
			array('section_id', 'length', 'max'=>11),
			array('position', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, controller_id, section_id, position, owner_contacts, active', 'safe', 'on'=>'search'),
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
			'section' => array(self::BELONGS_TO, 'Section', 'section_id'),
		);
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'image' => 'Файл (.jpg, .png, .gif)',
			'url' => 'Ссылка',
			'title' => 'Название',
			'controller_id' => 'Раздел сайта',
			'section_id' => 'Категория',
			'position' => 'Позиция',
			'owner_contacts' => 'Контакты владельца',
			'validTo' => 'Виден до',
			'active' => 'Активный',
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

		$criteria->compare('owner_contacts',$this->owner_contacts,true);
		$criteria->compare('title',$this->title,true);
		if($this->id)
			$criteria->addCondition('id="'.$this->id.'"');
		if($this->controller_id)
			$criteria->addCondition('controller_id=\''.$this->controller_id.'\'');
		if($this->section_id)
			$criteria->addCondition('section_id=\''.$this->section_id.'\'');
		if($this->position)
			$criteria->addCondition('position=\''.$this->position.'\'');
		if($this->active)
			$criteria->addCondition('active=\''.$this->active.'\'');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
                'pageSize'=>Yii::app()->params['adminItemsPerPage'],
            ),
		));
	}
}