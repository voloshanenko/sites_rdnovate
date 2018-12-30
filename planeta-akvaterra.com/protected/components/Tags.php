<?php

class Tags extends CApplicationComponent
{
	public function show($category=false,$isArchive=false)
	{
		$critaria = new CDbCriteria();
		$critaria->select = 'tags';
		$critaria->addCondition('archived='.($isArchive?'1':'0'));
		if($category!==false) {
			$critaria->addCondition('section_id='.$category);
		}
		$data = array();
		foreach (Article::model()->findAll($critaria) as $value) {
			foreach(explode(',', $value['tags']) as $t) {
				if(trim($t)) array_push($data, trim($t));
			}
		}
		$data = array_unique($data);
		sort($data);
		foreach($data as $t) {
			echo CHtml::link($t, '/library/article/tag/word/'.str_replace(' ', '_', $t)).', ';
		}
	}
}