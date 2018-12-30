<?php

/**
 * Event Class
 *  
 * @date	4 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class Event extends Table
{
	protected static $_table  = 'dacons_events';

	protected $_column_date; 	//datetime
	protected $_column_name;	//text
	protected $_column_comment;	//text
	protected $_column_company;	//int(10)

	protected $_notDestroy = array('_column_company');

	public function load($condition)
    {
        return self::getInstances($condition);
    }

    public function tableName()
    {
        return self::$_table;
    }
    
	public function date($date = null, $save = false)
	{
		if ($date) {
			$this->_column_date = $date;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_date;
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

	public function comment($comment = null, $save = false)
	{
		if ($comment) {
			$this->_column_comment = (string)$comment;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_comment;
	}

	public function company($company = null, $save = false)
	{
		if ($company && ($company instanceof Table)) {
			$this->_column_company = $company;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_company;
	}
}