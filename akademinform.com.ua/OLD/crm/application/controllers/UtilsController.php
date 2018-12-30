<?php
/*
 * Создан: 08.11.2007 10:27:58
 * Автор: Александр Перов
 */ 
	
	require_once 'Zend_Controller_ActionWithInit.php';		
	
	
	class UtilsController extends Zend_Controller_ActionWithInit{
		
		public function indexAction() {
			
			$dbparams = $this->getInvokeArg('dbconfig');
			
			$tables_arr = $this->db->fetchAll("SHOW TABLES FROM `".$dbparams["dbname"]."`");
			foreach ($tables_arr as $table) {
				$tables [] = $table [0];
			}
			//Zend_Debug::dump($tables, $label=null, $echo=true); 
			for ($index = 0; $index < sizeof($tables); $index++) {
				$table = $tables[$index];                
				$this->db->query("OPTIMIZE TABLE `$table`")->execute();				 
			}
			
			$this->template = "utils/dbOptimize";
		}
		
		
	} 
		
?>