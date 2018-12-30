<?php

class AdsReminderCommand extends CConsoleCommand
{
	public function run($args)
	{
		$model = Ads::model()->endSoon()->findAll();
		if($model)
		{
			Yii::import('application.helpers.CWebTools');
			$log = '';
			foreach($model as $ad)
			{
				$usr = Users::model()->findByPk($ad->owner_id);
				if($usr->email)
				{
					$log .= $usr->email.":\n";
					$log .= CWebTools::sendEmailAsSiteRobot($usr->email, $usr->first_name.' '.$usr->last_name, 'Срок публикации объявления истекает', 'ad_publish_remind', array(
						'%ADNUMBER%' => $ad->ad_id,
						'%USER%'=>$usr->first_name.' '.$usr->last_name,
						'%ADLINK%' => 'http://orbita-women.com/ads/default/update/id/'.$ad->ad_id,
					));
					
				} else {
					$log .= 'Ad #'.$ad->ad_id.": has no contact email.";
				}
				$log .= "\n----------\n\n";
				unset($usr);
			}
		}
		CWebTools::sendEmailAsSiteRobot('rdbio@yandex.ua', 'Юрий Николаевич', 'Отчет', 'ads_publish_remind_log', array(
			'%LOG%' => $log,
		));
	}
}