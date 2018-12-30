<?php

class sidebar extends CWidget
{
	public $list;
	
	public function init()
	{
	}
	
	public function run()
	{
		$this->render('sidebar');
	}
}
