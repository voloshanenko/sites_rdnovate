<?php

class event_widget extends CWidget
{
	public $data;
	public $counter;
	public $two_columns=false;
	public $type='single';
	public $canAdmin;

	public function init()
	{
		if($this->counter)
			$this->two_columns=true;
	}
	
	public function run()
	{
		$this->render($this->type.'_event');
	}
}