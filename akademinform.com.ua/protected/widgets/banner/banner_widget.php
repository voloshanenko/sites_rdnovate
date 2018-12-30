<?php

class banner_widget extends CWidget
{
	public $banners_array;
	
	public function init() {
	}
	
	public function run()
	{
		$this->render('viewport');
	}
}
