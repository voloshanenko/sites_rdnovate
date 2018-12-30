<?php
class ads_sidebar extends CWidget
{
	public $list;
	
	public function init()
	{
	}
	
	public function run()
	{
		$this->render('listing_from_array');
	}
}