<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property string $id
 * @property string $section_id
 * @property string $title
 * @property string $intro
 * @property string $full_text
 * @property string $publishing_date
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $tags
 *
 * The followings are the available model relations:
 * @property Section $section
 */
class News extends CActiveRecord
{
  /**
   * Returns the static model of the specified AR class.
   * @return News the static model class
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
    return 'news';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('section_id', 'length', 'max'=>11),
      array('title, meta_title, meta_keywords, meta_description, tags, image', 'length', 'max'=>255),
      array('intro, full_text, publishing_date', 'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, section_id, title, intro, full_text, publishing_date, meta_title, meta_keywords, meta_description, tags', 'safe', 'on'=>'search'),
    );
  }
  
  public function scopes()
  {
    return array(
      'sorted'=>array(
        'order'=>'publishing_date desc',
      ),
      'reversedSorted'=>array(
        'order'=>'publishing_date desc',
      ),
      'published'=>array(
        'condition'=>'archive=0', // not used in db and management.
      ),
      'briefly'=>array(
        'limit'=>6
      ),
      'recently' => array(
        'limit' => 12,
      ),
      'archived'=>array(
        'condition'=>'publishing_date < date_sub(NOW(), INTERVAL 20 DAY)',
      ),
      'notArchived'=>array(
        'condition'=>'publishing_date >= date_sub(NOW(), INTERVAL 20 DAY)',
      ),
      'forSearch' => array(),
      'atPage' => array(),
      'inSection'=>array(),
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
  
  public function inSection($section_id)
  {
    $this->getDbCriteria()->mergeWith(array(
      'condition'=>'section_id='.$section_id,
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

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()
  {
    return array(
      'id' => 'ID',
      'section_id' => 'Категория',
      'title' => 'Заголовок',
      'intro' => 'Вводная часть',
      'full_text' => 'Полный текст',
      'publishing_date' => 'Дата публикации',
      'meta_title' => 'Meta Заголовок',
      'meta_keywords' => 'Meta Ключевые слова',
      'meta_description' => 'Meta Описание',
      'tags' => 'Тэги, метки',
      'image' => 'Основное изображение',
    );
  }
  
  
  protected function afterSave()
  {
    if($this->validate())
    {
      if($_FILES['News']['tmp_name']['image'])
      {
        Yii::import('application.helpers.CImageTools');
        $path=CImageTools::attachToRecord($this, !$this->isNewRecord, 'image', array(
          'adaptiveThumb'=>array(
            'width'=>Yii::app()->controller->module->newsImageWidth,
            'height'=>Yii::app()->controller->module->newsImageHeight,
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

    $criteria->compare('section_id',$this->section_id,true);
    $criteria->compare('title',$this->title,true);
    $criteria->compare('intro',$this->intro,true);
    $criteria->compare('full_text',$this->full_text,true);
    $criteria->compare('publishing_date',$this->publishing_date,true);
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
  
  /**
     * @param $type array = ('orig', 'small', 'thumb');
     * @return string file path for web.
     */
    public function getImageWebPath($type)
    {
        return '/images/News/' . $this->id . '/' . $type . '_' . $this->image;
    }
}