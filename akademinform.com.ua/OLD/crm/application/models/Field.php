<?php

/**
 * Field Class
 *  
 * @date	5 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class Field extends Table 
{
	protected static $_table  = 'dacons_fields';
	
	protected $_column_name;	//varchar
	protected $_column_comment; //text
	protected $_column_color;	//int
	protected $_column_order;	//int
	protected $_column_status;	//int
	protected $_column_type;	//int

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

	public function color($color = null, $save = false)
	{
		if ($color) {
			$this->_column_color = (int)$color;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_color;
	}

	public function order($order = null, $save = false)
	{
		if ($order) {
			$this->_column_order = (int)$order;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_order;
	}

	public function status($status = null, $save = false)
	{
		if ($status) {
			$this->_column_status = (int)$status;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_status;
	}

	public function type($type = null, $save = false)
	{
		if ($type) {
			$this->_column_type = (int)$type;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_type;
	}
}