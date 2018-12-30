<?php

/**
 * CompanyProperty Class
 *  
 * @date	7 July 2010
 * @author  Valera Kogut
 * @version 1.0.0
 */

require_once 'Table.php';

class CompanyProperty extends Table 
{
	protected static $_table  = 'dacons_company_properties';	

	protected $_column_INN; 
	protected $_column_KPP;
	protected $_column_settlementAccount;
	protected $_column_bank;
	protected $_column_BIK;
	protected $_column_account; 
	protected $_column_OKPO;
	protected $_column_OKONH;
	protected $_column_OGRN;
	protected $_column_OKVED; 
	protected $_column_additionalText;
	protected $_column_company;
	protected $_column_cname; 
	protected $_column_director;
	protected $_column_address;
	protected $_column_num;

	protected $_notDestroy = array('_column_company');

	public function load($condition)
    {
        return self::getInstances($condition);
    }

    public function tableName()
    {
        return self::$_table;
    }
	
	public function INN($inn = null, $save = false)
	{
		if ($inn) {
			$this->_column_INN = (string)$inn;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_INN;
	}

	public function KPP($kpp = null, $save = false)
	{
		if ($kpp) {
			$this->_column_KPP = (string)$kpp;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_KPP;
	}

	public function settlementAccount($acc = null, $save = false)
	{
		if ($acc) {
			$this->_column_settlementAccount = (string)$acc;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_settlementAccount;
	}

	public function bank($bank = null, $save = false)
	{
		if ($bank) {
			$this->_column_bank = (string)$bank;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_bank;
	}

	public function BIK($bik = null, $save = false)
	{
		if ($bik) {
			$this->_column_BIK = (string)$bik;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_BIK;
	}

	public function account($account = null, $save = false)
	{
		if ($account) {
			$this->_column_account = (string)$account;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_account;
	}

	public function OKPO($okpo = null, $save = false)
	{
		if ($okpo) {
			$this->_column_OKPO = (string)$okpo;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_OKPO;
	}

	public function OKONH($okonh = null, $save = false)
	{
		if ($okonh) {
			$this->_column_OKONH = (string)$okonh;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_OKONH;
	}

	public function OGRN($ogrn = null, $save = false)
	{
		if ($ogrn) {
			$this->_column_OGRN = (string)$ogrn;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_OGRN;
	}

	public function OKVED($okved = null, $save = false)
	{
		if ($okved) {
			$this->_column_OKVED = (string)$okved;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_OKVED;
	}

	public function additionalText($text = null, $save = false)
	{
		if ($text) {
			$this->_column_additionalText = (string)$text;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_additionalText;
	}

	public function company($company = null, $save = false)
	{
		if ($company && ($company instanceof Table)) {
			$this->_column_company = $company;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_company;
	}

	public function cname($cname = null, $save = false)
	{
		if ($cname) {
			$this->_column_cname = (string)$cname;
			if ($save){
				$this->save();
			}
		} 
		return $this->_column_cname;
	}

	public function director($director = null, $save = false)
	{
		if ($director) {
			$this->_column_director = (string)$director;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_director;
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

	public function num($num = null, $save = false)
	{
		if ($num) {
			$this->_column_num = (int)$num;
			if ($save) {
				$this->save();
			}
		} 
		return $this->_column_num;
	}
}