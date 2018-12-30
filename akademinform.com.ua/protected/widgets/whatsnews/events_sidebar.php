<?php
class events_sidebar extends CWidget
{
	public $present;
	public $future;
	
	public function init()
	{
	}
	
	public function run()
	{
		if($this->present || $this->future)
		{
			echo "<h3>События</h3>";
			if($this->present)
			{
				echo "<strong>Текущие события</strong>";
				foreach ($this->present as $item)
					$this->widget('application.widgets.whatsnews.event_widget', array('data'=>$item, 'type'=>'tiny'));
			}
			if($this->future)
			{
			  echo "<br clear='both' />";
				echo "<strong>Будущие события</strong>";
				foreach ($this->future as $item)
					$this->widget('application.widgets.whatsnews.event_widget', array('data'=>$item, 'type'=>'tiny'));
			}
		}
	}	
}
