<?php

/**
 * CompanyField Class
 *  
 * @date	5 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class CompanyField extends Table 
{
	protected static $_table  = 'dacons_company_field';
	
	protected $_column_field;	//int
	protected $_column_company; //int
	protected $_column_value;	//text

	protected $_notDestroy = array('_column_field', '_column_company');

	public static function  init()
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
	
	public function field($field = null, $save = false)
	{
		if ($field && ($field instanceof Table)) {
			$this->_column_field = (string)$field;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_field;
	}

	public function company($company = null, $save = false)
	{
		if ($company && ($company instanceof Table)) {
			$this->_column_company = (string)$company;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_company;
	}

	public function value($value = null, $save = false)
	{
		if ($value) {
			$this->_column_value = (string)$value;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_value;
	}
}