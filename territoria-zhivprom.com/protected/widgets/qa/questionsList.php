<?php

class questionsList extends CWidget
{
	public $items;
	
	public function init() {}

	public function run()
	{
		$this->render('sidebar_questions_list');
	}
}
