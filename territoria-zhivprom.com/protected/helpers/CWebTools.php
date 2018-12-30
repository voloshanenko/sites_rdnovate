<?php

class CWebTools
{
	public static function getUsersIp()
	{
		$ip='';
		if ($_SERVER['REMOTE_ADDR'])
		{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
		{
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
			$headers=getallheaders();
			$ip=$headers["X-Real-IP"];
		}
		return $ip;
	}
	
	public static function sendEmailAsSiteRobot($to, $toName, $subject, $body, $textReplacements)
	{
		Yii::import('application.helpers.CString');
		Yii::import('application.extensions.phpmailer.JPhpMailer');
		$mail = new JPhpMailer;
		$mail->IsMail();
		$mail->CharSet = "UTF-8";
		$mail->IsHTML(true);
		$mail->SingleTo = true;
		$mail->SetFrom(Yii::app()->params['spam']['fromEmail'], Yii::app()->params['spam']['fromName']);
		$mail->Subject = $subject;
		$mail->AltBody = CString::getFormedEmailText($body.'_alt.txt', $textReplacements);
		$mail->MsgHTML(CString::getFormedEmailText($body.'.txt', $textReplacements));
		$mail->AddAddress($to, $toName);
		$mail->Send();
		return $mail->Send() ? 'E-mail sent' : $to.': '.$mail->ErrorInfo."\n";
	}
	
	public static function sendEmailThroughGmail($to, $toName, $subject, $body, $textReplacements)
	{
		Yii::import('application.helpers.CString');
		Yii::import('application.extensions.phpmailer.JPhpMailer');
		$mail = new JPhpMailer;
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->CharSet = "UTF-8";
		$mail->SMTPSecure = "ssl";
		$mail->Host = 'smtp.gmail.com';
		$mail->Username = "abc@gmail.com";
		$mail->Password = "abc";
		$mail->Port = 465;
		$mail->Subject = $subject;
		$mail->AltBody = CString::getFormedEmailText($body.'_alt.txt', $textReplacements);
		$mail->SetFrom(Yii::app()->params['spam']['fromEmail'], Yii::app()->params['spam']['fromName']);
		$mail->MsgHTML(CString::getFormedEmailText($body.'.txt', $textReplacements));
		$mail->AddAddress($to, $toName);
		return $mail->Send() ? 'E-mail sent' : $mail->ErrorInfo;
	}
}
