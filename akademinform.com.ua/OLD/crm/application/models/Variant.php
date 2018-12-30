<?php

/**
 * Variant Class
 *  
 * @date	5 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class Variant extends Table 
{
	protected static $_table  = 'dacons_variants';
	
	protected $_column_field;	//int
	protected $_column_variant;	//text

	protected $_notDestroy = array('_column_field');

    public function load($condition)
    {
        return self::getInstances($condition);
    }

    public function tableName()
    {
        return self::$_table;
    }
    
	public function variant($variant = null, $save = false)
	{
		if ($variant) {
			$this->_column_variant = (string)$variant;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_variant;
	}

	public function field($field = null, $save = false)
	{
		if ($field && ($field instanceof Table)) {
			$this->_column_field = $field;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_field;
	}
}