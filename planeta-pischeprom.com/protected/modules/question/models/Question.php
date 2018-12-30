<?php

/**
 * This is the model class for table "question".
 *
 * The followings are the available columns in table 'question':
 * @property string $id
 * @property string $subject
 * @property string $published_date
 * @property integer $user_id
 * @property string $answers
 * @property integer $discarded
 * @property string $discarding_reason
 */
class Question extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Question the static model class
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
		return 'question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, discarded', 'numerical', 'integerOnly'=>true),
			array('subject, discarding_reason', 'length', 'max'=>255),
			array('answers', 'length', 'max'=>6),
			array('published_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, subject, published_date, user_id, answers, discarded, discarding_reason', 'safe', 'on'=>'search'),
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
			'author' => array(self::BELONGS_TO, 'Users', 'user_id', 'select'=>'first_name, last_name, user_id'),
			'section' => array(self::BELONGS_TO, 'Section', 'section_id', 'select'=>'title, id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subject' => 'Subject',
			'published_date' => 'Published Date',
			'user_id' => 'User',
			'answers' => 'Answers',
			'discarded' => 'Discarded',
			'discarding_reason' => 'Discarding Reason',
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
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('published_date',$this->published_date,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('answers',$this->answers,true);
		$criteria->compare('discarded',$this->discarded);
		$criteria->compare('discarding_reason',$this->discarding_reason,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}