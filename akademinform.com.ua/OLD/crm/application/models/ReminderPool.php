<?php

/**
 * ReminderPool Class
 *  
 * @date	4 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class ReminderPool extends Table
{
	protected static $_table  = 'dacons_reminderspool';

	protected $_column_date;		//datetime
	protected $_column_text;		//text
	protected $_column_manager;		//int(11)
	protected $_column_company; 	//int(11)
	protected $_column_visibility;	//enum('sm', 'own', 'common')

	protected $_notDestroy = array('_column_manager', '_column_company');

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

	public function manager($manager = null, $save = false)
	{
		if ($manager && ($manager instanceof Table)) {
			$this->_column_manager = $manager;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_manager;
	}

	public function company($company = null, $save = false)
	{
		if ($company && ($company instanceof Table)) {
			$this->_column_date = $company;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_company;
	}

	public function visibility($visibility = null, $save = false)
	{
		if ($visibility && in_array(strtolower($visibility), array('sm', 'own', 'common'))) {
			$this->_column_visibility = $visibility;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_visibility;
	}
}