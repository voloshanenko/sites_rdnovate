<?php

/**
 * Upload Class
 *  
 * @date	4 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class Upload extends Table
{
	protected static $_table  = 'dacons_uploads';

	protected $_column_original_name; 	//text
	protected $_column_filename;		//text
	protected $_column_company; 		//int(11)
	protected $_column_comment;			//text
	protected $_column_size;			//text
	protected $_column_type;			//int(11)
	protected $_column_date;			//datetime

	protected $_notDestroy = array('_column_company');

	public function load($condition)
    {
        return self::getInstances($condition);
    }

    public function tableName()
    {
        return self::$_table;
    }

	public function originalName($name = null, $save = false)
	{
		if ($name) {
			$this->_column_original_name = (string)$name;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_original_name;
	}

	public function filename($filename = null, $save = false)
	{
		if ($filename) {
			$this->_column_filename = (string)$filename;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_filename;
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

	public function size($size = null, $save = false)
	{
		if ($size) {
			$this->_column_size = (string)$size;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_size;
	}
	
	public function type($type = null, $save = false)
	{
		if ($type) {
			$this->_column_type = (int)$type;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_type;
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
}