<?php
/**
 * Display connected objects to current.
 * It means that if you are viewing Article that is in "Cats",
 * you also will see Ads, Photos, Contests from "Cats".
 * 
 * This is based on section's id.
 * 
 * In view you make this:
 * 
 * <?php Yii::app()->Connection->setSectionId($model->section_id); ?>
 * ...
 * <?php Yii::app()->Connection->showAds(); ?>
 * and so on.
 * 
 */
class Connection extends CApplicationComponent
{
	private $_section;
	
	public function setSectionId($sectin_id)
	{
		$this->_section = $sectin_id;
	}
	
	public function showAds()
	{
		$items = Ads::model()->published()->inCategory($this->_section)->findAll();
		$number = count($items);
		if($number > 0)
		{
			$data = $this->getResultArray($number, $items, 3, 'ad_id');
			Yii::app()->getController()->widget('application.widgets.ads.ads_sidebar', array('list'=>$data));
		}
	}
	
	public function showNews()
	{
		$items = News::model()->sorted()->published()->inSection($this->_section)->findAll();
		$number = count($items);
		if($number > 0)
		{
			$data = $this->getResultArray($number, $items, 3);
			Yii::app()->getController()->widget('application.widgets.whatsnews.news_sidebar', array('list'=>$data));
		}
	}
	
	public function showEvents()
	{
		$dataPresent = Event::model()->sorted()->atPresent()->inSection($this->_section)->findAll();
		$dataFuture = Event::model()->sorted()->nearest()->inSection($this->_section)->findAll();
		if( count($dataPresent)>0 || count($dataFuture)>0 )
		{
			$dataPresent = $this->getResultArray(count($dataPresent), $dataPresent, 3);
			$dataFuture = $this->getResultArray(count($dataFuture), $dataFuture, 3);
			Yii::app()->getController()->widget('application.widgets.whatsnews.events_sidebar', array('present'=>$dataPresent, 'future'=>$dataFuture));
		}
	}
	
	public function showContests()
	{
		$currentContests = Contest::model()->published()->currently()->inCategory($this->_section)->findAll();
		$futureContests = Contest::model()->published()->planned()->inCategory($this->_section)->findAll();
		if(!empty($currentContests) || !empty($futureContests))
		{
			Yii::app()->getController()->widget('application.widgets.contest.brief', array(
				'currentContests'=>$currentContests,
				'plannedContests'=>$futureContests,
			));
		}
	}
	
	public function showPhotos()
	{
		$items = Photos::model()->published()->inCategory($this->_section)->findAll();
		$number = count($items);
		if($number > 0)
		{
			$data = $this->getResultArray($number, $items, 9);
			Yii::app()->getController()->widget('application.widgets.photos.sidebar', array('list'=>$data));
		}
	}
	
	public function showArticles()
	{
		$items = Article::model()->published()->inCategory($this->_section)->findAll();
		$number = count($items);
		if($number > 0)
		{
			$data = $this->getResultArray($number, $items, 3);
			Yii::app()->getController()->widget('application.widgets.library.listArticles', array('items'=>$data));
		}
	}
	
	public function showQuestions()
	{
		$items = Question::model()->published()->inCategory($this->_section)->findAll();
		$number = count($items);
		if($number > 0)
		{
			$data = $this->getResultArray($number, $items, 3);
			Yii::app()->getController()->widget('application.widgets.qa.questionsList', array('items'=>$data));
		}
	}
  
  private function getResultArray($number, $items, $wantNumber, $pid='id')
  {
    $counter = 0;
    $data = array();
    if($number>$wantNumber)
    {
      $data = array_slice($items, 0, $wantNumber);
    }
    else
    {
      $data = $items;
    }
    return $data;
  }
	
	/*private function getResultArray($number, $items, $wantNumber, $pid='id')
	{
		$counter = 0;
		$data = array();
		if($number>$wantNumber)
		{
			while(true)
			{
				$v = mt_rand(0, $number);
				$item = $items[$v];
				if($item->{$pid}>0 && $counter<$wantNumber && !$data[$item->{$pid}])
				{
					$data[$item->{$pid}] = $item;
					$counter++;
				}
				else if($counter==$wantNumber)
					break;
			}
		}
		else
		{
			$data = $items;
		}
		return $data;
	}*/
}