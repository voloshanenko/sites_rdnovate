<?php

/**
 * Contact Class
 *  
 * @date	4 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class Contact extends Table
{
	protected static $_table  = 'dacons_people';

	protected $_column_fio;		//text
	protected $_column_email;	//text
	protected $_column_comment;	//text
	protected $_column_phone;	//text

    public function load($condition)
    {
        return self::getInstances($condition);
    }

    public function tableName()
    {
        return self::$_table;
    }

	public function fio($fio = null, $save = false)
	{
		if ($fio) {
			$this->_column_fio = (string)$fio;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_fio;
	}

	public function email($email = null, $save = false)
	{
		if ($email) {
			$this->_column_email = (string)$email;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_email;
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

	public function phone($phone = null, $save = false)
	{
		if ($phone) {
			$this->_column_phone = (string)$phone;
			if ($save) {
				$this->save();
			}
		}
		return $this->_column_phone;
	}
}