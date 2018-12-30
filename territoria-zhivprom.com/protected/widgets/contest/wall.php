<?php

class wall extends CWidget
{

	public $photos;
    public $type = 'public';

	public function init()
	{
	}

	public function run()
	{
		$this->render('wall_'.$this->type);
	}

}
