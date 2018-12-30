<?php

class brief extends CWidget
{
	public $currentContests;
	public $plannedContests;
	
	public function init()
	{
	}
	
	public function run()
	{
		$this->render('briefly');
	}
	
}