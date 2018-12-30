<?php

/**
 * This is the model class for table "contest".
 *
 * The followings are the available columns in table 'contest':
 * @property integer $id
 * @property string $title
 * @property integer $sponsor_id
 * @property integer $section_id
 * @property integer $partner_id
 * @property string $date_start
 * @property string $date_end
 * @property string $comment
 * @property integer $show_on_main
 * @property string $prize1
 * @property string $prize1_url
 * @property string $prize2
 * @property string $prize2_url
 * @property string $prize3
 * @property string $prize3_url
 * @property string $prize_comments
 * @property string $appeal
 * @property string $awarding_info
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 *
 * The followings are the available model relations:
 * @property Sponsor $sponsor
 * @property Photos $photos
 * @property Section $section
 * @property Partners $partner
 */
class Contest extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Contest the static model class
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
		return 'contest';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, date_start, date_end', 'required'),
			array('title', 'length', 'max'=>255),
      array('awarding_info, comment, appeal, prize_comments', 'safe'),
			array('sponsor_id, partner_id, section_id', 'length', 'max'=>3),
			array('prize1, prize2, prize3, meta_title, meta_keywords, meta_description', 'length', 'max'=>255),
      array('prize1_url, prize2_url, prize3_url', 'url'),
      array('show_on_main', 'boolean'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, sponsor_id, date_start, date_end', 'safe', 'on'=>'search'),
		);
	}
	
	public function scopes()
	{
		return array(
			'published' => array(
				'order' => 'date_end ASC',
				'with'=>array(
                'photos'=>array(
                'order'=>'rating DESC, created_at ASC',
                'condition'=>'published=1 AND discarded!=1'),
            ),
			),
			'onMainPage' => array(
				'condition' => 'show_on_main=1',
			),
			'inCategory'=>array(
			),
			'currently' => array(
				'condition' => 'date_end >= NOW() AND date_start <= NOW()',
			),
			'past' => array(
				'condition' => 'date_end < NOW()',
			),
			'atPage'=>array(),
			'planned' => array(
				'condition' => 'date_start > NOW()'
			),
		);
	}

	public function inCategory($category_id)
	{
		$alias = $this->getTableAlias() ? $this->getTableAlias().'.' : '';
		$this->getDbCriteria()->mergeWith(array(
			'condition'=>$alias.'section_id='.$category_id,
		));
		return $this;
	}

	public function atPage($page=1)
	{
		$this->getDbCriteria()->mergeWith(array(
			'limit'=>Yii::app()->params['contestsPerPage'],
			'offset'=>(Yii::app()->params['contestsPerPage']*$page)-Yii::app()->params['contestsPerPage'],
		));
		return $this;
	}

    protected function afterSave()
    {
        if($this->validate())
        {
            $this->setIsNewRecord(false);
            $attributes = array();
            $fields = array('prize1', 'prize2', 'prize3');
            foreach($fields as $key)
            {
                if($_FILES['Contest']['error'][$key] == 0)
                {
                    Yii::import('application.helpers.CImageTools');
                    $imagePath = CImageTools::attachToRecord($this, !$this->isNewRecord, $key, array(
                        'resizeCanvas' => array('toWidth'=>'300', 'toHeight'=>'100','backgroundColor'=>array(255, 255, 255))
                    ));
                    $attributes[$key] = $imagePath;
                }
            }

            if($attributes)
                $this->saveAttributes($attributes);

            Yii::app()->user->setFlash('success', 'Фотоконкурс "'.$this->title.'" успешно сохранен');

            parent::afterSave();
        }
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'sponsor' => array(self::BELONGS_TO, 'Sponsor', 'sponsor_id'),
			'photos' => array(self::HAS_MANY, 'Photos', 'contest_id'),
      'section' => array(self::BELONGS_TO, 'Section', 'section_id', 'select'=>'title, id'),
      'partner' => array(self::BELONGS_TO, 'Partners', 'partner_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Название',
      'date_start' => 'Дата начала',
      'date_end' => 'Дата окончания',
			'comment' => 'Описание фотоконкурса',
      'show_on_main' => 'Показывать на главной',
      'sponsor_id' => 'Спонсор',
      'section_id' => 'Категория',
      'partner_id' => 'Партнер',
      'prize1' => 'Приз за первое место',
      'prize1_url' => 'Ссылка на приз за первое место',
      'prize2' => 'Приз за второе место',
      'prize2_url' => 'Ссылка на приз за второе место',
      'prize3' => 'Приз за третье место',
      'prize3_url' => 'Ссылка на приз за третье место',
      'prize_comments' => 'Комментарии к призовым местам',
      'appeal' => 'Обращение к пользователям',
      'awarding_info' => 'Информация о награждениях',
      'meta_title' => 'Заголовок',
      'meta_keywords' => 'Ключевые слова',
      'meta_description' => 'Описание',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('date_end',$this->date_end,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getWinners()
	{
        $dataProvider = new CActiveDataProvider('Photos', array(
            'criteria'=>array(
                'condition'=>'contest_id='.$this->id,
                'order'=>'rating DESC',
                'with'=>array('owner'),
                'limit'=>3,
            ),
            'pagination'=>false,
        ));
        return $dataProvider->getData();
	}

	public function canHasWinners()
	{
		return strtotime($this->date_start)<=time();
	}

    public function getOtherParticipants()
    {
        $dataProvider=new CActiveDataProvider('Photos', array(
            'criteria'=>array(
                'condition'=>'contest_id='.$this->id,
                'limit'=>1000,
                'offset'=>3,
                'order'=>'rating DESC',
                'with'=>'owner',
            ),
            'pagination'=>false,
        ));
        return $dataProvider->getData();
    }
}