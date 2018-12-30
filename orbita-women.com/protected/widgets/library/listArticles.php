<?php

class listArticles extends CWidget
{
	public $items;
	
	public function init()
	{
	}
	
	public function run()
	{
		$this->render('sidebarList');
	}
}
