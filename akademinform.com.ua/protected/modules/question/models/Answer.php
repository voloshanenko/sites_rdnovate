<?php

/**
 * This is the model class for table "answer".
 *
 * The followings are the available columns in table 'answer':
 * @property string $id
 * @property string $question_id
 * @property string $user_id
 * @property string $text
 * @property string $published_date
 * @property string $votes
 * @property integer $discarded
 * @property string $discard_reason
 */
class Answer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Answer the static model class
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
		return 'answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('discarded', 'numerical', 'integerOnly'=>true),
			array('question_id', 'length', 'max'=>11),
			array('user_id', 'length', 'max'=>6),
			array('votes', 'length', 'max'=>5),
			array('discard_reason', 'length', 'max'=>255),
			array('text, published_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, question_id, user_id, text, published_date, votes, discarded, discard_reason', 'safe', 'on'=>'search'),
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
			'question' => array(self::BELONGS_TO, 'Question', 'id', 'select'=>'subject, id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'question_id' => 'Question',
			'user_id' => 'User',
			'text' => 'Text',
			'published_date' => 'Published Date',
			'votes' => 'Votes',
			'discarded' => 'Discarded',
			'discard_reason' => 'Discard Reason',
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
		$criteria->compare('question_id',$this->question_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('published_date',$this->published_date,true);
		$criteria->compare('votes',$this->votes,true);
		$criteria->compare('discarded',$this->discarded);
		$criteria->compare('discard_reason',$this->discard_reason,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}