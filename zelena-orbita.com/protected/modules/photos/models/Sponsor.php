<?php

/**
 * This is the model class for table "sponsor".
 *
 * The followings are the available columns in table 'sponsor':
 * @property string $id
 * @property string $name
 * @property string $url
 * @property string $icon
 * @property string $icon_url
 * @property string $slogan
 * @property string $info
 * @property string $short_info
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 *
 * The followings are the available model relations:
 * @property Contest[] $contests
 */
class Sponsor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Sponsor the static model class
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
		return 'sponsor';
	}

	protected function afterSave()
	{
		if($this->validate())
		{
            if($_FILES['Sponsor']['tmp_name']['icon'])
			{
				Yii::import('application.helpers.CImageTools');
				$imagePath = CImageTools::attachToRecord($this, !$this->isNewRecord, 'icon', array(
					'resizeCanvas' => array('toWidth'=>'80', 'toHeight'=>'80','backgroundColor'=>array(255, 255, 255))
				));

				$this->setIsNewRecord(false);
				$this->saveAttributes(array('icon'=>$imagePath));
			}

  			Yii::app()->user->setFlash('success', 'Спонсор "'.$this->name.'" успешно сохранен');

			parent::afterSave();
		}
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>100),
			array('info, icon, short_info, slogan, url', 'safe'),
            array('icon_url', 'url'),
            array('meta_title, meta_keywords, meta_description', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
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
			'contests' => array(self::HAS_MANY, 'Contest', 'sponsor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Идентификатор',
			'name' => 'Название',
			'url' => 'URL',
			'icon' => 'Логотип',
            'icon_url' => 'Ссылка на спонсора',
			'slogan' => 'Слоган',
            'info' => 'Информация',
            'short_info' => 'Краткая информация',
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
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
                'pageSize'=>Yii::app()->params['adminItemsPerPage'],
            ),
		));
	}
}