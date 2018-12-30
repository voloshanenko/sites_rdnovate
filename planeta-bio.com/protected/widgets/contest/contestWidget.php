<?php

class contestWidget extends CWidget {

	public $contest;
	public $onMainPage;

	public function init()
	{
		if(!$this->onMainPage)
			$this->onMainPage = false;
	}

	public function run()
	{
		$this->render('contest');
	}

}