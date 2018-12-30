<?php
class news_sidebar extends CWidget
{
	public $list;
	
	public function init()
	{
	}
	
	public function run()
	{
		if($this->list)
		{
			echo "<h3>Новости</h3>";
			foreach ($this->list as $item)
				$this->widget('application.widgets.whatsnews.news_widget', array('data'=>$item));
		}
	}	
}
