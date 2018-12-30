<?php

/**
 * This is the model class for table "contest".
 *
 * The followings are the available columns in table 'contest':
 * @property integer $id
 * @property integer $user_id
 * @property integer $contest_id
 * @property integer $section_id
 * @property string $url
 * @property string $name
 * @property string $comments
 * @property string $created_at
 * @property integer $published
 * @property integer $discarded
 * @property string $discarded_reason
 * @property integer $rating
 * @property integer $views
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $breed
 *
 * The followings are the available model relations:
 * @property Users $owner
 * @property Contest $contest
 * @property Section $section
 * @property Votes $votes
 * @property CountVotes $countVotes
 */
class Photos extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className
     * @return Photos the static model class
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
        return 'photos';
    }
	
	public function scopes()
	{
		return array(
			'published' => array(
				'condition' => 'published=1',
				'order' => 'rating DESC',
			),
			'inCategory' => array(
			),
			'atPage' => array(
			),
			'hasBreed' => array(
			),
			'discarded' => array(
				'condition' => 'discarded=1',
			),
			'notDiscarded' => array(
				'condition' => 'discarded=0',
			),
			'recently' => array(
				'limit' => 12,
			),
			'inContest' => array(
			),
			'ofUser' => array(
			),
			'fromSection' => array(
			),
		);
	}
	
	public function hasBreed($breed)
	{
		$this->getDbCriteria()->mergeWith(array(
			'condition' => 'breed=\''.$breed.'\'',
		));
		return $this;
	}
	
	public function atPage($page=1)
	{
		$this->getDbCriteria()->mergeWith(array(
			'limit'=>Yii::app()->params['photosPerPage'],
			'offset'=>(Yii::app()->params['photosPerPage']*$page)-Yii::app()->params['photosPerPage'],
		));
		return $this;
	}
	
	public function inContest($contest_id)
	{
		$this->getDbCriteria()->mergeWith(array(
			'condition'=>'contest_id='.$contest_id,
		));
		return $this;
	}
	
	public function inCategory($category_id)
	{
		$this->getDbCriteria()->mergeWith(array(
			'condition'=>'section_id='.$category_id,
		));
		return $this;
	}
	
	public function ofUser($user_id)
	{
		$this->getDbCriteria()->mergeWith(array(
			'condition'=>'user_id='.$user_id,
		));
		return $this;
	}

	public function fromSection($section_id)
	{
		$this->getDbCriteria()->mergeWith(array(
			'condition'=>'section_id='.$section_id,
		));
		return $this;
	}

    public function beforeValidate()
    {
        if ($this->isNewRecord)
        {
            $this->published=1;
            $this->discarded=0;
            $this->user_id=Yii::app()->user->id;
            $this->created_at=new CDbExpression('NOW()');
            $this->rating=0;
            $this->views=0;
            $this->url = 'abc';
        }
        return parent::beforeValidate();
    }

    public function afterSave()
    {
        if ((($this->scenario=='update' && $this->url=='') || $this->scenario=='create') && $this->validate())
        {
            if ($_FILES['Photos']['tmp_name']['url']!='')
            {
                Yii::import('application.helpers.CImageTools');
                $fileName=CImageTools::attachToRecord($this, !$this->isNewRecord, 'url', array('adaptiveThumb' => array(
                    'width' => Yii::app()->controller->module->smallWidth,
                    'height' => Yii::app()->controller->module->smallHeight
                )), 'small_');
                CImageTools::attachToRecord($this, !$this->isNewRecord, 'url', array('adaptiveThumb' => array(
                    'width' => Yii::app()->controller->module->mediumWidth,
                    'height' => Yii::app()->controller->module->mediumHeight
                )), 'middle_');
                CImageTools::attachToRecord($this, !$this->isNewRecord, 'url', array('adaptiveThumb' => array(
                    'width' => Yii::app()->controller->module->bigWidth,
                    'height' => Yii::app()->controller->module->bigHeight
                )), 'big_');
                CImageTools::attachToRecord($this, !$this->isNewRecord, 'url', array('resizeCanvas' => array(
                    'width' => 640,
                    'height' => 480,
                    'backgroundColor' => array(
                        000,
                        000,
                        000
                    )
                )), 'orig_');

                $this->setIsNewRecord(false);
                $this->saveAttributes(array('url' => $fileName));
            }

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
            array('user_id, name, section_id', 'required'),
            array('url', 'required', 'on'=>'create'),
            array('published, discarded, rating', 'numerical', 'integerOnly' => true),
            array('user_id', 'length', 'max' => 5),
            array('contest_id', 'safe'),
            array('url, name, breed', 'length', 'max' => 100),
            array('comments, meta_title, meta_keywords, meta_description', 'length', 'max' => 255),
            array('discarded_reason', 'length', 'max' => 120 ),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array(
                'id, user_id, url, name, comments, created_at, published, discarded, discarded_reason, section_id, contest_id',
                'safe',
                'on' => 'search'
            ),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        Yii::import('application.helpers.CWebTools');
        return array(
            'owner' => array(self::BELONGS_TO, 'Users', 'user_id', 'select'=>'first_name, last_name, user_id, address'),
            'votes' => array(self::HAS_MANY, 'PhotosVotes', 'photo_id'),
            'section' => array(self::BELONGS_TO, 'Section', 'section_id', 'select'=>'title, id'),
            'countVotes' => array(self::STAT, 'PhotosVotes', 'photo_id', 'condition'=>'ip=\''.CWebTools::getUsersIp()."'"),
            'contest' => array(self::BELONGS_TO, 'Contest', 'contest_id', 'with'=>'sponsor'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'url' => 'Изображение',
            'user_id' => 'Пользователь',
            'name' => 'Название',
            'contest_id' => 'Фото учавствует в конкурсе:',
            'section_id' => 'Выберите, пожалуйста, категорию',
            'comments' => 'Комментарии (если желаете)',
            'created_at' => 'Дата загрузки',
            'published' => 'Показывать фото или временно скрыть?',
            'discarded' => 'Не принято администрацией',
            'discarded_reason' => 'Причина отказа',
            'rating' => 'Количество голосов',
            'views' => 'Просмотров',
            'meta_title' => 'Заголовок',
            'meta_keywords' => 'Ключевые слова',
            'meta_description' => 'Описание',
            'breed' => 'Подкатегория',
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
		if($this->id)
			$criteria->addCondition('id='.$this->id);
        
		if($this->user_id)
			$criteria->addCondition('user_id='.$this->user_id);
			
    $criteria->compare('name', $this->name, true);
		
		if($this->section_id)
			$criteria->addCondition('section_id='.$this->section_id);
        
		if($this->contest_id)
			$criteria->addCondition('contest_id='.$this->contest_id);
			
		if($this->created_at)
			$criteria->addCondition('created_at="'.$this->created_at.'"');
    
    if($this->breed)
      $criteria->compare('breed', $this->breed, true);
			
		$criteria->compare('published', $this->published);
		$criteria->compare('discarded', $this->discarded);

        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
                'pageSize'=>Yii::app()->params['adminItemsPerPage'],
            ),
		));
    }

    public function vote($id, $ip)
    {
        $this->updateByPk($id, array('rating' => ++$this->rating));

        $voting=new PhotosVotes();
        $voting->attributes=array('ip' => $ip,'photo_id' => $id);
        $voting->save();
    }

    /**
     * @param $type array = ('small', 'middle', 'big');
     * @return string file path for web.
     */
    public function getWebPath($type)
    {
        return '/images/Photos/' . $this->id . '/' . $type . '_' . $this->url;
    }

    public function isVoteable()
    {
        return
            ($this->countVotes == 0) AND
            ($this->contest_id > 0) AND
            ($this->getContest() != null);
    }

    public function isOwner($user_id)
    {
        $photo = $this->with('owner');
        return ($photo->owner->user_id == $user_id);
    }

    public function getContest()
    {
        return Contest::model()->findByPk($this->contest_id);
    }
	
	public function deleteFiles()
	{
		$serverPath = $_SERVER['DOCUMENT_ROOT'] . $this->getWebPath('small');
		if(file_exists($serverPath))
			unlink($serverPath);
		
		$serverPath = $_SERVER['DOCUMENT_ROOT'] . $this->getWebPath('orig');
		if(file_exists($serverPath))
			unlink($serverPath);
		
		$serverPath = $_SERVER['DOCUMENT_ROOT'] . $this->getWebPath('middle');
		if(file_exists($serverPath))
			unlink($serverPath);
		
		$serverPath = $_SERVER['DOCUMENT_ROOT'] . $this->getWebPath('big');
		if(file_exists($serverPath))
			unlink($serverPath);

		$path_parts = pathinfo($this->getWebPath('big'));
		$dir = $_SERVER['DOCUMENT_ROOT'] . $path_parts['dirname'].'/';
		if(file_exists($path))
			rmdir($path);
	}

    public function incViews()
    {
        $this->views++;
        $this->save(false);
    }
}
