<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property string $id
 * @property string $section_id
 * @property string $url
 * @property string $title
 * @property string $intro
 * @property string $body
 * @property string $icon
 * @property string $tags
 * @property string $publishing_date
 * @property int $published
 * @property int $show_on_main
 * @property int $archived
 * @property int $show_on_main
 * @property string $tags
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 *
 * The followings are the available model relations:
 * @property Section $section
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Article the static model class
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
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, intro, body', 'required'),
			array('published, show_on_main, archived', 'boolean'),
			array('section_id', 'length', 'max'=>11),
			array('url, title, meta_title, meta_keywords, meta_description', 'length', 'max'=>255),
			array('intro, icon, body, publishing_date, tags', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, section_id, url, title, intro, body, icon, meta_title, meta_keywords, meta_description', 'safe', 'on'=>'search'),
		);
	}
	
	public function scopes()
	{
		return array(
			'published' => array(
				'condition' => 'published=1',
				'order' => 'publishing_date DESC',
			),
			'atPage' => array(
			),
			'archived' => array(
				'condition' => 'archived=1',
			),
			'notArchived' => array(
				'condition' => 'archived=0',
			),
			'recently' => array(
				'condition' => 'archived!=1',
				'limit' => 6,
			),
			'onMainPage' => array(
				'condition' => 'show_on_main=1',
			),
			'inCategory' => array(
			),
			'forSearch' => array(
			),
			'hasTag' => array(
			),
		);
	}
	
	public function forSearch($term)
	{
		$criteria = new CDbCriteria();
		$criteria->addSearchCondition('title', $term, true, 'OR');
		$criteria->addSearchCondition('intro', $term, true, 'OR');
		$this->getDbCriteria()->mergeWith($criteria);
		return $this;
	}
	
	public function inCategory($section_id='')
	{
		$this->getDbCriteria()->mergeWith(array(
			'condition' => 'section_id='.$section_id
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
	
	public function hasTag($word)
	{
		$word = str_replace('_', ' ', $word);
		$this->getDbCriteria()->mergeWith(array(
			'condition' => "tags LIKE '%$word%'",
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'section_id' => 'Категория',
			'url' => 'Url статьи',
			'title' => 'Заголовок',
			'intro' => 'Вводная часть',
			'body' => 'Основной текст',
			'icon' => 'Пиктограмма',
			'publishing_date'=>'Дата публикации',
			'published'=>'Опубликовано?',
			'archived'=>'В архиве',
			'tags' => 'Теги (метки)',
			'show_on_main'=>'Показывать на главной',
			'meta_title' => 'Заголовок',
			'meta_keywords' => 'Ключевые слова',
			'meta_description' => 'Описание',
		);
	}

	protected function beforeValidate()
	{
		if($this->isNewRecord)
			$this->publishing_date = new CDbExpression('NOW()');
		
		if(!$this->meta_title)
			$this->meta_title = $this->title;

		Yii::import('application.helpers.CString');
		if(!$this->meta_keywords)
			$this->meta_keywords = CString::extractKeywords($this->title);
		
		return parent::beforeValidate();
	}

	protected function afterSave()
    {
        if($this->validate())
        {
            if($_FILES['Article']['tmp_name']['icon'])
            {
                Yii::import('application.helpers.CImageTools');
                $fileName=CImageTools::attachToRecord($this, !$this->isNewRecord, 'icon', array('adaptiveThumb' => array(
                    'width' => Yii::app()->controller->module->smallIconWidth,
                    'height' => Yii::app()->controller->module->smallIconHeight
                )), 'small_');
                CImageTools::attachToRecord($this, !$this->isNewRecord, 'icon', array('adaptiveThumb' => array(
                    'width' => Yii::app()->controller->module->mediumIconWidth,
                    'height' => Yii::app()->controller->module->mediumIconHeight
                )), 'middle_');

                $this->setIsNewRecord(false);
                $this->saveAttributes(array('icon' => $fileName));
            }

            Yii::app()->user->setFlash('success', 'Статья успешно добавлена!');

            parent::afterSave();
        }
    }

	public function iconExists($type)
	{
		return (boolean)$this->icon && file_exists($_SERVER['DOCUMENT_ROOT'].$this->getIconPath($type));
	}

	public function getIconPath($type)
    {
        return '/images/Article/' . $this->id . '/' . $type . '_' . $this->icon;
    }
	
	public function splitTags()
	{
		return explode(', ', $this->tags);
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
		$criteria->compare('section_id',$this->section_id,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('intro',$this->intro,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('published',$this->published,true);
		$criteria->compare('archived',$this->archived,true);
		$criteria->compare('show_on_main',$this->show_on_main,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
                'pageSize'=>Yii::app()->params['adminItemsPerPage'],
            ),
		));
	}
}