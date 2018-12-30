<?php

class news_widget extends CWidget
{
	public $data;
	public $counter;
	public $columns=false; // if items on page are ordered in columns
	public $type='tiny';
	public $canAdmin;

	public function init()
	{
		if($this->counter)
			$this->columns=true;
	}
	
	public function run()
	{
		$this->render('news_'.$this->type);
	}
}