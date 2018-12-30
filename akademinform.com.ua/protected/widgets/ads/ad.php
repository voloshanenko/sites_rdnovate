<?php
class ad extends CWidget
{
	public $item;
	public $type;
	public $own;
	public $canAdmin;
	
	public function init()
	{
		if(!$this->type)
			$this->type = 'short';

		if(!$this->own)
			$this->own = false;
	}
	
	public function run()
	{
		$this->render($this->type);
	}
}