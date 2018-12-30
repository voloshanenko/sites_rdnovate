<?php

/**
 * User Class
 *  
 * @date	2 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class User extends Table 
{
	protected static $_table  = 'dacons_users';	

	protected $_column_username; 
	protected $_column_password;
	protected $_column_nickname;
	protected $_column_customer;
	protected $_column_email;
	protected $_column_subscribed; 
	protected $_column_is_super_user;
	protected $_column_is_admin;
	protected $_column_readonly;
	protected $_column_location; 
	protected $_column_location_exp;
	protected $_column_help;

	protected $_notDestroy = array('_column_customer');

    public function load($condition)
    {
        return self::getInstances($condition);
    }

    public function tableName()
    {
        return self::$_table;
    }

	public function workList($companies = array())
	{
		if (empty($companies)) {
			return self::getInstances(
						"dacons_history.user_id = {$this->id()}", 
						'company.id, company.name, company.site, company.email, company.isClient, company.manager, company.relations, company.phone, company.address, company.city_id, company.viewed, company.viewed_date, company.about', 
						'dacons_history',
						'dacons_companies AS company ON dacons_history.company_id = company.id');
		}

		if (!is_array($companies)) {
			$companies = array($companies);
		}
		
		foreach($companies as $company) {
			if (!($company instanceof Table)) {
				echo 'ERROR: parameter $companies is not an array of instances';
				return;
			}
			self::insert(array('company_id' => $company->id(), 'user_id' => $this->id()), 'dacons_history');
		}
	}

	public function isInWorkList($company)
	{
		if (!($company instanceof Table)) {
			echo 'ERROR: parameter $company is not an instance';
			return;
		}
		$res = self::getInstances("company_id = {$company->id()} AND user_id = {$this->id()}", 'locked', 'dacons_history');
		if ($res == false) {
			return false;
		} else {
			return true;
		}
	}

	public function deleteFromWorkList($companies)
	{
		if (!is_array($companies)) {
			$companies = array($companies);
		}
		foreach ($companies as $company) {
			if (!($company instanceof Table)) {
				echo 'ERROR: parameter $companies is not an array of instances or is not an instance';
				return;
			}

			self::delete("company_id = {$company->id()} AND user_id = {$this->id()}", 'dacons_history');
		}
	}

	public function clearWorkList()
	{
		self::delete("user_id = {$this->id()}", 'dacons_history');
	}

	public function clearFavorites()
	{
		self::delete("user_id = {$this->id()}", 'dacons_favorite_companies');
	}

	public function favorites($companies = array())
	{
		if (empty($companies)) {
			return self::getInstances(
						"dacons_favorite_companies.user_id = {$this->id()}", 
						'company.id, company.name, company.site, company.email, company.isClient, company.manager, company.relations, company.phone, company.address, company.city_id, company.viewed, company.viewed_date, company.about', 
						'dacons_favorite_companies',
						'dacons_companies AS company ON dacons_favorite_companies.company_id = company.id');
		}

		if (!is_array($companies)) {
			$companies = array($companies);
		}
		
		foreach($companies as $company) {
			if (!($company instanceof Table)) {
				echo 'ERROR: parameter $companies is not an array of instances';
				return;
			}
			self::insert(array('company_id' => $company->id(), 'user_id' => $this->id()), 'dacons_favorite_companies');
		}
	}

	public function isFavorite($company)
	{
		if (!($company instanceof Table)) {
			echo 'ERROR: parameter $company is not an instance';
			return;
		}
		$res = self::getInstances("company_id = {$company->id()} AND user_id = {$this->id()}", 'company_id', 'dacons_favorite_companies');
		if ($res == false) {
			return false;
		} else {
			return true;
		}
	}

	public function unsetFavorite($companies)
	{
		if (!is_array($companies)) {
			$companies = array($companies);
		}
		foreach ($companies as $company) {
			if (!($company instanceof Table)) {
				echo 'ERROR: parameter $companies is not an array of instances or is not an instance';
				return;
			}

			self::delete("company_id = {$company->id()} AND user_id = {$this->id()}", 'dacons_favorite_companies');
		}
	}

	public static function Instance()
	{
		global $globalInstances;
		$className = __CLASS__;
		if (!isset($globalInstances[$className])) {
			$globalInstances[$className] = new $className();
		}

		return $globalInstances[$className];
	}
	
	public function username($name = null, $save = false)
	{
		if ($name) {
			$this->_column_username = (string)$name;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_username;
	}

	public function password($pass = null, $save = false)
	{
		if ($pass) {
			$this->_column_password = (string)$pass;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_password;
	}

	public function nickname($name = null, $save = false)
	{
		if ($name) {
			$this->_column_nickname = (string)$name;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_nickname;
	}

	public function customer($customer = null, $save = false)
	{
		if ($customer && ($customer instanceof Table)) {
			$this->_column_customer = $customer;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_customer;
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

	public function subscribed($value = null, $save = false)
	{
		if ($value) {
			$this->_column_subscribed = (string)$value;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_subscribed;
	}

	public function isSuperUser($value = null, $save = false)
	{
		if ($value) {
			$this->_column_is_super_user = (int)$value;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_is_super_user;
	}

	public function isAdmin($value = null, $save = false)
	{
		if ($value) {
			$this->_column_is_admin = (int)$value;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_is_admin;
	}

	public function readonly($value = null, $save = false)
	{
		if ($value) {
			$this->_column_readonly = (int)$value;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_readonly;
	}

	public function location($value = null, $save = false)
	{
		if ($value) {
			$this->_column_location = (int)$value;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_location;
	}

	public function locationExp($date = null, $save = false)
	{
		if ($date) {
			$this->_column_location_exp = $date;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_location_exp;
	}

	public function help($text = null, $save = false)
	{
		if ($text) {
			$this->_column_help = (string)$text;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_help;
	}
}