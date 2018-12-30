<?php

/**
 * This is the model class for table "event".
 *
 * The followings are the available columns in table 'event':
 * @property string $id
 * @property string $title
 * @property string $date_start
 * @property string $date_end
 * @property string $short_description
 * @property string $full_description
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $tags
 * @property string $section_id
 *
 * The followings are the available model relations:
 * @property Section $section
 */
class Event extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Event the static model class
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
		return 'event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, meta_title, meta_keywords, meta_description, tags, image', 'length', 'max'=>255),
			array('section_id', 'length', 'max'=>11),
			array('date_start, date_end, short_description, full_description', 'safe'),
			// Search
			array('id, title, date_start, date_end, short_description, full_description, meta_title, meta_keywords, meta_description, tags, section_id', 'safe', 'on'=>'search'),
		);
	}
	
	public function scopes()
	{
		return array(
			'sorted'=>array(
				'order'=>'date_start asc',
			),
			'reversedSorted'=>array(
				'order'=>'date_start desc',
			),
			'atPresent'=>array(
				'condition'=>'date_start <= NOW() AND date_end > NOW()',
			),
			'nearest'=>array(
				'condition'=>'date_start > NOW()',
			),
			'past'=>array(
				'condition'=>'date_end < NOW()',
			),
			'briefly'=>array(
				'limit'=>3
			),
			'longerBriefly'=>array(
				'limit'=>6
			),
			'atPage' => array(),
			'inSection'=>array(),
			'limited'=>array(),
		);
	}
	
	public function inSection($section_id)
	{
		$this->getDbCriteria()->mergeWith(array(
			'condition'=>'section_id='.$section_id,
		));
		return $this;
	}

	public function limited($limit)
	{
		$this->getDbCriteria()->mergeWith(array(
			'limit'=>$limit,
		));
		return $this;
	}

	public function atPage($page='')
	{
		$this->getDbCriteria()->mergeWith(array(
			'limit' => Yii::app()->params['itemsPerPage'],
			'offset' => (Yii::app()->params['itemsPerPage'] * $page) - Yii::app()->params['itemsPerPage'],
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
			'section' => array(self::BELONGS_TO, 'Section', 'section_id'),
		);
	}
	
	protected function afterSave()
	{
		if($this->validate())
		{
			if($_FILES['Event']['tmp_name']['image'])
			{
				Yii::import('application.helpers.CImageTools');
				$path=CImageTools::attachToRecord($this, !$this->isNewRecord, 'image', array(
					'adaptiveThumb'=>array(
						'width'=>Yii::app()->controller->module->eventImageWidth,
						'height'=>Yii::app()->controller->module->eventImageHeight,
					)
				),'small_');
				CImageTools::attachToRecord($this, !$this->isNewRecord, 'image', array(
					'adaptiveThumb'=>array(
						'width'=>Yii::app()->controller->module->thumbImageWidth,
						'height'=>Yii::app()->controller->module->thumbImageHeight,
					)
				),'thumb_');
				CImageTools::attachToRecord($this, !$this->isNewRecord, 'image', array('resizeCanvas' => array(
                    'width' => 640,
                    'height' => 480,
                    'backgroundColor' => array(0, 0, 0)
                )), 'orig_');

				$this->setIsNewRecord(false);
				$this->saveAttributes(array('image'=>$path));
				$this->setIsNewRecord(true);
			}

			parent::afterSave();
		}
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Заголовок',
			'date_start' => 'Дата начала',
			'date_end' => 'Дата окончания',
			'short_description' => 'Краткое описание',
			'full_description' => 'Полное описание',
			'meta_title' => 'Meta Заголовок',
			'meta_keywords' => 'Meta Ключевые слова',
			'meta_description' => 'Meta Описание',
			'tags' => 'Тэги, метки',
			'section_id' => 'Категория',
			'image' => 'Главное изображение'
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

		if($this->id)
			$criteria->addCondition('id='.$this->id);
			
		if($this->section_id)
			$criteria->addCondition('section_id='.$this->section_id);
		
		if($this->title)
			$criteria->compare('title',$this->title,true);
		
		if($this->tags)
			$criteria->compare('tags', $this->tags,true);
		
		if($this->short_description)
			$criteria->compare('short_description', $this->short_description,true);
		
		if($this->full_description)
			$criteria->compare('full_description', $this->full_description,true);
		
		if($this->date_start)
			$criteria->addCondition('date_start>="'.$this->date_start.'"');
		
		if($this->date_end)
			$criteria->addCondition('date_end<="'.$this->date_end.'"');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
                'pageSize'=>Yii::app()->params['adminItemsPerPage'],
            ),
		));
	}
	
	/**
	 * CSS Color for past, current and future events
	 */
	public function getCssColoring()
	{
		if( strtotime($this->date_start)<=time() && strtotime($this->date_end)<=time() ) {
			// Passed
			return "row-red";
		} else if( strtotime($this->date_start)<=time() && strtotime($this->date_end)>=time() ) {
			// Current
			return "row-white";
		} else if( strtotime($this->date_start)>=time() && strtotime($this->date_end)>=time() ) {
			// Future
			return "row-blue";
		}
	}
	
	/**
     * @param $type array = ('orig', 'small', 'thumb');
     * @return string file path for web.
     */
    public function getImageWebPath($type)
    {
        return '/images/Event/' . $this->id . '/' . $type . '_' . $this->image;
    }
}