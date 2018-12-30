<?php

/**
 * Company Class
 *  
 * @date	2 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class Company extends Table 
{
	protected static $_table  = 'dacons_companies';	

	protected $_column_name; 
	protected $_column_site;
	protected $_column_email;
	protected $_column_isClient;
	protected $_column_manager;
	protected $_column_relations; 
	protected $_column_phone;
	protected $_column_address;
	protected $_column_city_id;
	protected $_column_viewed; 
	protected $_column_viewed_date;
	protected $_column_about;

	protected $_notDestroy = array('_column_manager', '_column_city');

    public function load($condition)
    {
        return self::getInstances($condition);
    }

    public function tableName()
    {
        return self::$_table;
    }

	public function contacts($contacts = array())
	{
		if (empty($contacts)) {
			return self::getInstances(
						"dacons_people_company.company_id = {$this->id()}", 
						'contact.id, contact.fio, contact.email, contact.comment, contact.phone', 
						'dacons_people_company',
						'dacons_people AS contact ON dacons_people_company.person_id = contact.id');
		}

		if (!is_array($contacts)) {
			$contacts = array($contacts);
		}
		
		foreach($contacts as $contact) {
			$res = self::getInstances("company_id = {$this->id()} AND person_id = {$contact->id()}", 'appointment', 'dacons_people_company');
			if ($res == false) {
				self::insert(array(
								'company_id' => $this->id(), 
								'person_id' => $contact->id(),
								'appointment' => NULL), 
							'dacons_people_company');
			} else {
				self::update(array('appointment' => NULL),
							"company_id = {$this->id()} AND person_id = {$contact->id()}", 
							'dacons_people_company');
			}
		}
	}

	public function favorite($user, $todo = null)
	{
		$returnFlag = false;
		if (!($user instanceof Table)) {
			echo 'ERROR: parameter $user is not an instance';
			return;
		}
		$res = self::getInstances("company_id = {$this->id()} AND user_id = {$user->id()}", 'user_id', 'dacons_favorite_companies');
		if ($res == false) {
			$returnFlag = false;
		} else {
			$returnFlag = true;
		}

		if (empty($todo) || $todo == false) {
			self::insert(array('user_id' => $user->id(), 'company_id' => $this->id()), 'dacons_favorite_companies');
		} else {
			self::delete("user_id = {$user->id()} AND company_id = {$this->id()}", 'dacons_favorite_companies');
		}

		return $returnFlag;
	}

	public function deleteContacts($contacts)
	{
		if (!is_array($contacts)) {
			$contacts = array($contacts);
		}
		foreach ($contacts as $contact) {
			if (!($contact instanceof Table)) {
				echo 'ERROR: parameter $contacts is not an array of instances or is not an instance';
				return;
			}

			self::delete("company_id = {$this->id()} AND person_id = {$contact->id()}", 'dacons_people_company');
		}
	}

	public function clearContacts()
	{
		self::delete("company_id = {$this->id()}", 'dacons_people_company');
	}

	public function labels($labels = array())
	{
		if (empty($labels)) {
			return self::getInstances(
						"dacons_companies_labels.company_id = {$this->id()}", 
						'label.id, label.parent, label.customer, label.picture, label.viewed, label.viewed_date', 
						'dacons_companies_labels',
						'dacons_labels AS label ON dacons_companies_labels.label_id = label.id');
		}

		if (!is_array($labels)) {
			$labels = array($labels);
		}
		
		foreach($labels as $label) {
			if (!($label instanceof Table)) {
				echo 'ERROR: parameter $labels is not an array of instances';
				return;
			}
			self::insert(array('company_id' => $this->id(), 'label_id' => $label->id()), 'dacons_companies_labels');
		}
	}

	public function hasLabel($label)
	{
		if (!($label instanceof Table)) {
			echo 'ERROR: parameter $label is not an instance';
			return;
		}
		$res = self::getInstances("company_id = {$this->id()} AND label_id = {$label->id()}", 'label_id', 'dacons_companies_labels');
		if ($res == false) {
			return false;
		} else {
			return true;
		}
	}

	public function deleteLabel($label)
	{
		if (!($label instanceof Table)) {
			echo 'ERROR: parameter $label is not an instance';
			return;
		}

		self::delete("company_id = {$this->id()} AND label_id = {$label->id()}", 'dacons_companies_labels');
	}

	public function clearLabels()
	{
		self::delete("company_id = {$this->id()}", 'dacons_companies_labels');
	}

	public function clearProperties()
	{
		self::delete("company_id = {$this->id()}", 'dacons_company_properties');
	}

	public function properties($properties = array())
	{
		if (empty($properties)) {
			return self::getInstances("company_id = {$this->id()}", '*', 'dacons_company_properties');
		}

		if (!is_array($properties)) {
			$properties = array($properties);
		}
		
		foreach($properties as $property) {
			if (!($property instanceof Table)) {
				echo 'ERROR: parameter $properties is not an array of instances';
				return;
			}
			$property->company($this, true);
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

	public function site($site = null, $save = false)
	{
		if ($site) {
			$this->_column_site = (string)$site;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_site;
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

	public function isClient($value = null, $save = false)
	{
		if ($value) {
			$this->_column_isClient = (int)$value;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_isClient;
	}

	public function manager($manager = null, $save = false)
	{
		if ($manager && ($manager instanceof Table)) {
			$this->_column_manager = $manager;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_manager;
	}

	public function relations($value = null, $save = false)
	{
		if ($value) {
			$this->_column_relations = (int)$value;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_relations;
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

	public function address($address = null, $save = false)
	{
		if ($address) {
			$this->_column_address = (string)$address;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_address;
	}

	public function city($city = null, $save = false)
	{
		if ($city && ($city instanceof Table)) {
			$this->_column_city_id = $city;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_city_id;
	}

	public function viewed($value = null, $save = false)
	{
		if ($value) {
			$this->_column_viewed = (int)$value;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_viewed;
	}

	public function viewedDate($date = null, $save = false)
	{
		if ($date) {
			$this->_column_viewed_date = $date;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_viewed_date;
	}

	public function about($text = null, $save = false)
	{
		if ($text) {
			$this->_column_about = (string)$text;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_about;
	}
}