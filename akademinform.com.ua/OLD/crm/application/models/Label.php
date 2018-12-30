<?php

/**
 * Label Class
 *  
 * @date	4 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class Label extends Table
{
	protected static $_table  = 'dacons_labels';

	protected $_column_name;		//text
	protected $_column_parent;		//int(11)
	protected $_column_customer;	//int(11)
	protected $_column_picture;		//varchar(20)
	protected $_column_viewed;		//int(11)
	protected $_column_viewed_date; //datetime

	protected $_notDestroy = array('_column_parent', '_column_customer');

	public static function init()
	{
		parent::init();
	}

	public function load($condition)
    {
        return self::getInstances($condition);
    }

    public function tableName()
    {
        return self::$_table;
    }

	public function name($name = null, $save = false)
	{
		if ($name) {
			$this->_column_name = (string)$name;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_name;
	}

	public function father($father = null, $save = false)
	{
		if ($father && ($father instanceof Table)) {
			$this->_column_father = $father;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_father;
	}

	public function customer($customer = null, $save = false)
	{
		if ($customer && ($customer instanceof Table)) {
			$this->_column_customer = $customer;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_customer;
	}

	public function picture($picture = null, $save = false)
	{
		if ($picture) {
			$this->_column_picture = (string)$picture;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_picture;
	}

	public function viewed($viewed = null, $save = false)
	{
		if ($viewed) {
			$this->_column_viewed = (int)$viewed;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_viewed;
	}

	public function viewedDate($date = null, $save = false)
	{
		if ($date) {
			$this->_column_viewed_date = $date;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_viewed_date;
	}
}