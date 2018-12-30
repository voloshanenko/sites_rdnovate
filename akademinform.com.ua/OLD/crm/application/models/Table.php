<?php

/**
 * Table Class
 *  
 * @date	2 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'libs/DBConnect.php';

class Table
{   
	const ID_PREFIX = '_id';
	
    const SQL_LOGS_PATH = "../sql_logs.txt";
    
    const FOPEN_MODE = 'a'; // append
    
    protected static $_db = null;
    
    protected static $_table = 'Table';
	
	protected $_column_id = null;

	protected $_notDestroy = array();
    
    /**
     * initialization Editor Model
     */
    public static function init()
    {
		self::$_db = DBConnect::getInstance();
    }

    public function tableName(){
        return self::$_table;
    }

    public static function Instance($className)
	{
		global $globalInstances;
		if (!isset($globalInstances[$className])) {
			$globalInstances[$className] = new $className();
		}

		return $globalInstances[$className];
	}
	
	protected static function _checkTableName($tableName = null)
    {
        $result = null;
		
        if (!empty($tableName)) {
            $result = $tableName;
        } else{
            $tableName = self::Instance(get_called_class())->tableName();
            if ($tableName) {
                $result = $tableName;
            } else if (DBConnect::throwExceptions()) {
                throw new Exception('ERROR: don\'t forget about parameter $_table !!!');
            }
        }
        
        return $result;
    }
	
	/**
     * Convert an array or string
     * into a string to put in a WHERE clause.
     *
     * @param mixed $where
     * @return string
     */
    protected static function _whereExpr($where)
    {
        if (empty($where)) {
            return $where;
        }
        
        if (!is_array($where)) {
            $where = array($where);
        }
        
        $bool_op = 'AND';
        if (isset($where['bool_op'])) {
            if (in_array(strtoupper($where['bool_op']), array('AND', 'OR'))) {
                $bool_op = strtoupper($where['bool_op']);
            }
            unset($where['bool_op']);
        }
        
        foreach ($where as &$term) {
            $term = '(' . $term . ')';
        }
        
        $where = implode(' ' . $bool_op . ' ', $where);
        return $where;
    }        

	
	public static function db()
    {
        return self::$_db;
    }
    
    /**
     * $data_insert = array('column_name' => 'column_value', ...)
     */
    public static function insert(array $data_insert, $tableName = '')
    {
        try {
            $tableName = self::_checkTableName($tableName);
        } catch (Zend_Exception $e) {
            echo $e;
        }
                
        if (!empty($data_insert)) {    
            try { 
	      		return self::$_db->insert($tableName, $data_insert);
            } catch (Exception $e) {
            	self::_writeLog($tableName, 'INSERT', $data_insert, $e);
				return -1;
            }
        }
    }
    
    public static function delete($where = '', $tableName = '')
    {
        try {
            $tableName = self::_checkTableName($tableName);
        } catch (Zend_Exception $e) {
            echo $e;
        }
        
        $where = self::_whereExpr($where);
      
        try {
	    	self::$_db->delete($tableName, $where); 
			return mysql_affected_rows();
        } catch (Exception $e) {
            self::_writeLog($tableName, 'DELETE', array(), $e, $where);
			return -1;
        }
    }
       
    /**
     * $data_update = array('column_name' => 'column_value', ...)
     */
    public static function update(array $data_update, $where = '', $tableName = '')
    {
        try {
            $tableName = self::_checkTableName($tableName);
        } catch (Exception $e) {
            echo $e;
        }
        
        if (!empty($data_update)) {
            $where = self::_whereExpr($where);	        
	      try {
	      		self::$_db->update($tableName, $data_update, $where);
				return mysql_affected_rows();
	      } catch (Exception $e) {
	            self::_writeLog($tableName, 'UPDATE', $data_update, $e, $where);
				return -1;
        	}
        }
    }
    
    protected static function _writeLog($tableName, $actionType, $data = array(), $exception, $where = '')
    {
        $filename = self::SQL_LOGS_PATH;
		       
		$content  = 'TABLE: `' . $tableName . '` [' . $actionType . ']  ' . $exception->getMessage() . "\r\n"
		   		 .'DATA = ' . serialize($data) . "\r\n";
		   		 
		if (!empty($where)) {
		    $content .= 'WHERE = ' . $where . "\r\n";
		}
		
		$content .= '__________________________________________________'
		         .'____________________________________________________' 
		         . "\r\n\r\n\r\n";
		                
		if (!$handle = fopen($filename, self::FOPEN_MODE)) {
		    exit;
		}
		if (fwrite($handle, $content) === FALSE) {
		    exit;
		}		
		fclose($handle);
    }  

	public static function getColumns($columnName, $where, $tableName = '')
    {
		try {
			$tableName = self::_checkTableName($tableName);
		} catch (Zend_Exception $e) {
			echo $e;
		}
			
		$where = self::_whereExpr($where);

		$query = "SELECT `{$columnName}` FROM {$tableName} WHERE {$where}";
		
		$res = self::$_db->fetchCol($query);
		if (count($res) == 1) {
			return current($res);
		} else {
			return $res;
		}
    }

    /**
     * SET or GET {static::Instance()}::$_table
     * 
     * @param  string $table
     * @return void | {static::Instance()}::$_table
     */
   /* public static function tableName($table = '')
	{
		if (!empty($table)) {
			static::$_table = (string)$table;
		} else {
			return static::$_table;
		}
	}*/

	/**
     * SET or GET $this->_column_id
     * 
     * @param  integer $id
     * @return void | $this->_column_id
     */
    public function id($id = null)
	{
		if (!empty($id)) {
			$this->_column_id = (int) $id;
		} else {
			return $this->_column_id;
		}
	}

	public function create()
	{
		$dataInsert = array('id' => 'NULL');
		$reflection = new ReflectionObject($this);
        
        foreach ($reflection->getProperties() as $property) {
            
            $name = $property->getName();

			if ('_column_' != substr($name, 0, 8)) {
				continue;
			} else if ('_column_id' == substr($name, 0, 10)) {
				continue;
			}

			$columnName = substr($name, 8);

			if (is_object($this->{$name}) && ($this->{$name} instanceof Table)) {
				$id = $this->{$name}->id();
				if ($id != -1) {
					$dataInsert[$columnName . ($columnName!='manager'?self::ID_PREFIX:"")] = $id;
				} else {
					return $id;
				}
			} else if (!is_object($this->{$name})) {
				$dataInsert[$columnName] = $this->{$name};
			}
        }

		if (!empty($dataInsert)) {
			return $this->_column_id = $this->insert($dataInsert, self::Instance(get_called_class())->tableName());
		} else {
			return false;
		}
	}
	
	public function save()
	{
		$dataUpdate = array();
		$reflection = new ReflectionObject($this);
        
        foreach ($reflection->getProperties() as $property) {
            
            $name = $property->getName();

			if ('_column_' != substr($name, 0, 8)) {
				continue;
			} else if ('_column_id' == substr($name, 0, 10)) {
				continue;
			}

			$columnName = substr($name, 8);

			if (is_object($this->{$name}) && ($this->{$name} instanceof Table)) {
				$dataUpdate[$columnName . self::ID_PREFIX] = $this->{$name}->id();
			} else if (!is_object($this->{$name})) {
				$dataUpdate[$columnName] = $this->{$name};
			}
        }

		if (!empty($dataUpdate)) {
			return $this->update($dataUpdate, "id = {$this->id()}", self::Instance(get_called_class())->tableName());
		} else {
			return false;
		}
	}

	public function destroy()
	{
		$reflection = new ReflectionObject($this);
        
        foreach ($reflection->getProperties() as $property) {
            
            $name = $property->getName();

			if ('_column_' != substr($name, 0, 8)) {
				continue;
			} else if ('_column_id' == substr($name, 0, 10)) {
				continue;
			}

			if (is_object($this->{$name}) && ($this->{$name} instanceof Table)) {
				if (in_array($name, $this->_notDestroy)) {
					continue;
				}

				$res = $this->{$name}->destroy();
				if ($res == -1) {
					return $res;
				}
			}
        }
		
		return $this->delete("id = {$this->id()}", self::Instance(get_called_class())->tableName());
	}
	
	public static function getInstances($condition, $cols = '*', $table = '', $joinExpr = '')
	{
        $className = get_called_class();
		$condition = self::_whereExpr($condition);
		if (empty($table)) {
			$tableName = (string)self::Instance(get_called_class())->tableName();
		} else {
			$tableName = (string)$table;
		}
		
		$query = "SELECT {$cols} FROM {$tableName}";
		if (!empty($joinExpr)) {
			$query .= " JOIN {$joinExpr}";
		}
		$query .= " WHERE {$condition}";
		$resource = mysql_query($query);

		if (empty($resource)) {
			return FALSE;
		}

		$result = array();
		while($obj = mysql_fetch_object($resource)) {            
			$table = new $className();
			$reflection = new ReflectionObject($obj);
			foreach ($reflection->getProperties() as $property) {
				$name = $property->getName();
				$propertyName = '_column_' . $name;
                if ($name=='manager') $propertyName.=self::ID_PREFIX;
				if (('_id' == substr($propertyName, -3)) && (substr($propertyName, 0, -3)!='_column')) {
					$propertyName = substr($propertyName, 0, -3);
					$subClass = strtoupper(substr($name, 0, 1)) . substr($name, 1, -3);
					if ($subClass == 'Person') {
						$subClass = 'Contact';
					} else if ($subClass == 'Mana') {
						$subClass = 'User';
					}
                    if (file_exists(dirname(__FILE__).'/'.$subClass.'.php')){
                        require_once $subClass . '.php';
                        $subObj = self::Instance($subClass);
                        $table->{$propertyName} = $subObj->load('id = ' . $obj->{$name});
                    } else {
                        $propertyName.=self::ID_PREFIX;
                        echo $propertyName;
                        $table->{$propertyName} = $obj->{$name};
                    }
				} else {
					$table->{$propertyName} = $obj->{$name};
				}
			}
			$result[] = $table;
		}

		if (count($result) == 1) {
			return current($result);
		} else if (empty($result)){
			return false;
		}
		return $result;
	}
}
Table::init();