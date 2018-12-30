<?php

class libArticle extends CWidget
{
	public $content;
	public $type;
	public $canAdmin;

	public function init()
	{
		if(!$this->type)
			$this->type = 'short';
	}

	public function run()
	{
		$this->render($this->type);
	}
}
