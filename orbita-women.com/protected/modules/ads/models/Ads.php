<?php

/**
 * This is the model class for table "ads".
 *
 * The followings are the available columns in table 'ads':
 * @property integer $ad_id
 * @property integer $owner_id
 * @property integer $section_id
 * @property string $ad_type
 * @property string $title
 * @property string $ad_text
 * @property string $contact_person
 * @property string $contacts
 * @property string $city
 * @property string $suburb
 * @property string $street
 * @property string $gender
 * @property string $breed
 * @property string $publishing_date
 * @property string $end_publishing_date
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $tags
 * @property string $discarded
 * @property string $discarded_reason
 * @property string $main_image
 * @property integer $views
 * @property integer $placement_period
 */
class Ads extends CActiveRecord
{
	public $adType = array(
		'take' => 'Возьму',
		'other' => 'Разное',
		'buy' => 'Куплю',
		'exchange' => 'Обменяю',
		'give' => 'Отдам',
		'sell' => 'Продам',
		'services' => 'Услуги',
		'work' => 'Работа',
		'cooperaing' => 'Сотрудничество',
		'conferences' => 'Конференции, выставки'
	);
	
	public $genderList = array(
		'he' => 'Он',
		'she' => 'Она',
		'both' => 'Оба'
	);
	
	public $placement_period_var = array(
		'1' =>'1 месяц',
		'2' =>'2 месяца',
		'4' =>'4 месяца',
		'6' =>'6 месяцев',
		'12'=>'12 месяцев'
	);

	public function primaryKey()
	{
		return 'ad_id';
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Ads the static model class
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
		return 'ads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, ad_text, contact_person, contacts', 'required'),
			array('section_id', 'required', 'on'=>'create, update'),
			array('owner_id, section_id, placement_period', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('contact_person, contacts', 'length', 'max'=>150),
			array('city, suburb', 'length', 'max'=>120),
			array('street', 'length', 'max'=>200),
			array('gender', 'length', 'max'=>4),
			array('breed', 'length', 'max'=>60),
			array('discarded','boolean'),
			array('meta_title, meta_keywords, meta_description, discarded_reason, tags', 'length', 'max'=>255),
			array('publishing_date, ad_text, address, end_publishing_date, ad_type, contacts, contact_person', 'safe'),
			array('ad_id, owner_id, section_id, ad_type, title, ad_text, publishing_date, end_publishing_date, meta_title, meta_keywords, meta_description, tags', 'safe', 'on'=>'search'),
		);
	}

	public function defaultScope()
	{
		return array(
            'order'=>"publishing_date desc",
        );
	}
	
	public function scopes()
	{
		return array(
			'published' => array(
                'condition' => 'discarded=0 AND end_publishing_date>=NOW()',
                'order' => 'publishing_date DESC',
            ),
			'recently' => array(
				'limit' => 6,
			),
			'endSoon'=>array(
				'condition'=>'`end_publishing_date` BETWEEN now() and DATE_ADD(NOW(), INTERVAL 3 DAY)'
			),
			'inCategory' => array(),
		);
	}

	public function inCategory($section_id='')
	{
		$this->getDbCriteria()->mergeWith(array(
			'condition' => 'section_id='.$section_id
		));
		return $this;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'author' => array(self::BELONGS_TO, 'Users', 'owner_id', 'select'=>'first_name, last_name, user_id, address'),
			'section' => array(self::BELONGS_TO, 'Section', 'section_id', 'select'=>'title, id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ad_id' => '#',
			'owner_id' => 'Пользователь',
			'section_id' => 'Категория',
			'ad_type' => 'Тип объявления',
			'title' => 'Заголовок',
			'ad_text' => 'Текст объявления',
			'address' => 'Адрес, местоположение',
			'main_image' => 'Изображение',
			'contact_person' => 'Контактное лицо',
			'placement_period'=>'Срок размещения',
			'contacts' => 'Контактная информация',
			'breed' => 'Подкатегория', // В прошлом Порода
			'city' => 'Город',
			'suburb' => 'Страна', //В прошлом 'Район города',
			'street' => 'Улица',
			'discarded' => 'Не принято',
			'discarded_reason' => 'Причина отказа',
			'publishing_date' => 'Дата публикации',
			'end_publishing_date' => 'Дата окончания публикации',
			'meta_title' => 'Meta: Pаголовок',
			'meta_keywords' => 'Meta: Ключеные слова',
			'meta_description' => 'Meta: Описание',
			'tags' => 'Тэги',
			'views' => 'Просмотров',
		);
	}

	public function beforeValidate()
	{
		Yii::import('application.helpers.CString');
		
		if($this->isNewRecord)
		{
			$connection=Yii::app()->db;
			$dataReader=$connection->createCommand('SELECT NOW()')->query();
			$dataReader->bindColumn(1,$now);
			$dataReader->read();
			$dataReader=$connection->createCommand('SELECT DATE_ADD(NOW(), INTERVAL '.$this->placement_period.' MONTH)')->query();
			$dataReader->bindColumn(1,$month);
			$dataReader->read();
			
			if(!$this->breed) {
				$arr = explode(', ', $this->breed);
				$this->breed = mb_strtolower(trim($arr[0]));
			}

			$this->discarded = 0;
			$this->owner_id = Yii::app()->user->id;
			$this->publishing_date = $now;
			$this->end_publishing_date = $month;
			
		}
		else
		{
			if((int)$_POST['placement_period'] != $this->placement_period) {
				$connection=Yii::app()->db;
				$dataReader=$connection->createCommand('SELECT DATE_ADD("'.$this->publishing_date.'", INTERVAL '.$this->placement_period.' MONTH)')->query();
				$dataReader->bindColumn(1,$month);
				$dataReader->read();
				$this->end_publishing_date = $month;
			}
		}
		
		$p = new CHtmlPurifier();
		$this->ad_text = $p->purify($this->ad_text);

		if( ! trim($this->meta_title) )
			$this->meta_title = trim($this->title);

		if( ! trim($this->meta_keywords) )
			$this->meta_keywords = CString::extractKeywords($this->title);
		
		if( ! trim($this->tags) )
			$this->tags = strtolower(CString::extractKeywords($this->title));

		if( ! trim($this->meta_description) )
			$this->meta_description = trim($this->title);

		return parent::beforeValidate();
	}

	protected function afterSave()
	{
		if($this->validate())
		{
			if($_FILES['Ads']['tmp_name']['main_image'])
			{
				Yii::import('application.helpers.CImageTools');
				$imagePath=CImageTools::attachToRecord($this, !$this->isNewRecord, 'main_image', array(
					'adaptiveThumb'=>array(
						'width'=>Yii::app()->controller->module->imageWidth,
						'height'=>Yii::app()->controller->module->imageHeight
					)
				),'small_');
				CImageTools::attachToRecord($this, !$this->isNewRecord, 'main_image', array('resizeCanvas' => array(
                    'width' => 640,
                    'height' => 480,
                    'backgroundColor' => array(0, 0, 0)
                )), 'orig_');

				$this->setIsNewRecord(false);
				$this->saveAttributes(array('main_image'=>$imagePath));
				$this->setIsNewRecord(true);
			}

			$user = Users::model()->findByPk($this->owner_id);
			if( $this->isNewRecord )
			{
				Yii::import('application.helpers.CWebTools');
				CWebTools::sendEmailAsSiteRobot($user->email, $user->getFullName(), 'Объявление размещено', 'ad_added_success', array(
					'%ADNUMBER%' => $this->ad_id,
					'%ADLINK%' => $this->getAdLink(),
				));
				Yii::app()->user->setFlash('success', 'Объявление успешно размещено!');
			}
			else
			{
				if( $this->getScenario() != 'view' )
					Yii::app()->user->setFlash('success', 'Объявление успешно сохранено!');
			}

			parent::afterSave();
		}
	}

	public function hasImage($type='small')
	{
		return !empty($this->main_image) && file_exists($_SERVER['DOCUMENT_ROOT'] . '/images/Ads/' . $this->ad_id . '/' . $type . '_' . $this->main_image);
	}
	
	public function isOwned()
	{
		return (!Yii::app()->user->isGuest) && ($model->owner_id==Yii::app()->user->id);
	}
	
	public function actualize($term)
	{
		$connection=Yii::app()->db;
		$dataReader=$connection->createCommand('SELECT NOW()')->query();
		$dataReader->bindColumn(1,$now);
		$dataReader->read();
		$dataReader=$connection->createCommand('SELECT DATE_ADD(NOW(), INTERVAL '.$term.' MONTH)')->query();
		$dataReader->bindColumn(1,$month);
		$dataReader->read();

		$this->discarded = 0;
		$this->publishing_date = $now;
		$this->end_publishing_date = $month;
		$this->placement_period = $term;
		$this->save();
		Yii::app()->user->setFlash('success', 'Объявление успешно актуализированно!');
	}
	
	public function getImageWebPath($type)
    {
    	if( $this->hasImage('small') )
	        return '/images/Ads/' . $this->ad_id . '/' . $type . '_' . $this->main_image;
		else
			return '/images/Ads/no-photo.jpg';
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

		if($this->ad_id)
			$criteria->addCondition('ad_id='.$this->ad_id);
		if($this->owner_id)
			$criteria->addCondition('owner_id='.$this->owner_id);
		if($this->section_id)
			$criteria->addCondition('section_id='.$this->section_id);
		$criteria->compare('t.title',$this->title,true);
		if($this->ad_type)
			$criteria->addCondition('ad_type=\''.$this->ad_type.'\'');
		$criteria->compare('ad_text',$this->ad_text,true);
		$criteria->compare('breed',$this->breed,true);
		$criteria->compare('city',$this->city,true);
		if(!empty($this->publishing_date))
			$criteria->addCondition('publishing_date>="'.$this->publishing_date.'"');
		if(!empty($this->end_publishing_date))
			$criteria->addCondition('end_publishing_date <= "'.$this->end_publishing_date.'"');
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('tags',$this->tags,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
                'pageSize'=>Yii::app()->params['adminItemsPerPage'],
            ),
		));
	}

	public function getCssColoring()
	{
		if( strtotime($this->end_publishing_date)<=time() ) {
			return "row-red";
		} else {
			return "row-green";
		}
	}

	private function getAdLink()
	{
		return 'http://'.$_SERVER['SERVER_NAME'].'/ads/default/view/id/'.$this->ad_id;
	}
	
	public function incViews()
    {
        $this->views++;
        $this->save(false);
    }
}