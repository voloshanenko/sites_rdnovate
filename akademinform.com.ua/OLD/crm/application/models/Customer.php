<?php

/**
 * Customer Class
 *  
 * @date	2 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class Customer extends Table 
{
	protected static $_table  = 'dacons_customers';
	
	protected $_column_name;
	protected $_column_GMT;
	protected $_column_master;
	protected $_column_reg_date;

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

	public function GMT($GMT = null, $save = false)
	{
		if ($GMT) {
			$this->_column_GMT = (int)$GMT;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_GMT;
	}

	public function master($master = null, $save = false)
	{
		if ($master) {
			$this->_column_master = (int)$master;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_master;
	}

	public function regDate($date = null, $save = false)
	{
		if ($date) {
			$this->_column_reg_date = $date;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_reg_date;
	}
}