<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property string $comment_id
 * @property string $comment_text
 * @property string $user_id
 * @property string $object_id
 * @property string $object
 * @property integer $discarded
 * @property string $discarded_reason
 */
class Comment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Comment the static model class
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
		return 'comment';
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
			array('user_id, object_id', 'length', 'max'=>11),
			array('object', 'length', 'max'=>7),
			array('discarded_reason', 'length', 'max'=>255),
			array('comment_text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('comment_id, comment_text, user_id, object_id, object, discarded, discarded_reason', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'comment_id' => 'Comment',
			'comment_text' => 'Comment Text',
			'user_id' => 'User',
			'object_id' => 'Object',
			'object' => 'Object',
			'discarded' => 'Discarded',
			'discarded_reason' => 'Discarded Reason',
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

		$criteria->compare('comment_id',$this->comment_id,true);
		$criteria->compare('comment_text',$this->comment_text,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('object_id',$this->object_id,true);
		$criteria->compare('object',$this->object,true);
		$criteria->compare('discarded',$this->discarded);
		$criteria->compare('discarded_reason',$this->discarded_reason,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}