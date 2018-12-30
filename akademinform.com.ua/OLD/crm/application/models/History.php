<?php

/**
 * History Class
 *  
 * @date	2 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class History extends Table 
{
	protected static $_table  = 'dacons_history';
	
	protected $_column_updated;
	protected $_column_user;
	protected $_column_company;
	protected $_column_locked;

	protected $_notDestroy = array('_column_user', '_column_company');

	public function load($condition)
    {
        return self::getInstances($condition);
    }
    
    public function tableName()
    {
        return self::$_table;
    }
	
	public function updated($date = null, $save = false)
	{
		if ($date) {
			$this->_column_updated = $date;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_updated;
	}

	public function locked($value = null, $save = false)
	{
		if ($value) {
			$this->_column_locked = (int)$value;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_locked;
	}

	public function user($user = null, $save = false)
	{
		if ($user && ($user instanceof Table)) {
			$this->_column_user = $user;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_user;
	}

	public function company($company = null, $save = false)
	{
		if ($company && ($company instanceof Table)) {
			$this->_column_company = $company;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_company;
	}
}