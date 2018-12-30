<?php

class questionWidget extends CWidget
{
	public $item;
	public $viewType;
	public $canAdmin;
	
	public function init()
	{
		if(!$this->viewType)
			$this->viewType = 'big';
	}
	
	public function run()
	{
		$this->render($this->viewType.'_question');
	}
}
