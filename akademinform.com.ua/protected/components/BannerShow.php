<?php

class BannerShow extends CApplicationComponent
{
	public function showBanners($animalKindId, $position)
	{
		$data = $this->prepareData($animalKindId, $position);
		Yii::app()->getController()->widget('application.widgets.banner.banner_widget', array('banners_array'=>$data));
	}
	
	/**
	 * return raw array for futhure translate it into JSON
	 * 
	 * It's used in Photo module, View method
	 */
	public function renderBanners($animalKindId, $position)
	{
		return $this->prepareData($animalKindId, $position);
	}
	
	/**
	 * Check if banner exists in that section, kind of animal and position
	 */
	public function bannersPlacedTo($animalKindId, $position)
	{
		return count($this->prepareData($animalKindId, $position)) > 0;
	}
	
	/**
	 * This function, actually, makes request to model
	 */
	private function prepareData($animalKindId, $position)
	{
		$controller_id = Yii::app()->controller->id;
		$criteria = new CDbCriteria();
		
		$criteria->addColumnCondition(array(
			'position' => $position,
			'active' => 1
		));
		
		if($position!='p1') {
			$criteria->addColumnCondition(array(
				'controller_id' => $controller_id
			));
		}
		
		if($animalKindId) {
			$criteria->addColumnCondition(array(
			'section_id' => $animalKindId
			));
		}
		
		$criteria->compare('validTo', '>'.date('Y-m-d H:m:i'));
		return Banner::model()->findAll($criteria);
	}
}