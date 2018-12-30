<?php

class answerWidget extends CWidget
{
	public $item;
	public $canAdmin;
	
	public function init() {}
	
	public function run()
	{
		$this->render('answer');
	}
}