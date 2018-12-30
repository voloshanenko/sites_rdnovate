<?php

/**
 * Reminder Class
 *  
 * @date	4 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class Reminder extends Table
{
	protected static $_table  = 'dacons_reminders';

	protected $_column_date;	//datetime
	protected $_column_text;	//text
	protected $_column_user;	//int(11)
	protected $_column_company; //int(11)

	protected $_notDestroy = array('_column_user', '_column_company');

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

	public function text($text = null, $save = false)
	{
		if ($text) {
			$this->_column_text = (string)$text;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_text;
	}

	public function user($user = null, $save = false)
	{
		if ($user && ($user instanceof Table)) {
			$this->_column_user = $user;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_user;
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