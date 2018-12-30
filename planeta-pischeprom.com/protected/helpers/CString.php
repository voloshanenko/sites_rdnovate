<?php
/**
 * String helper class
 *
 * @author Demchenko Ivan
 */

class CString
{
	/**
	 * @return string the random generated string of given length
	 */
	public static function randomString($length)
	{
		$chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
		shuffle($chars);
		return implode('', array_slice($chars, 0, $length));
	}

	/**
	 * @return string the file extension name for {@link name}.
	 * The extension name does not include the dot character. An empty string
	 * is returned if {@link name} does not have an extension name.
	 */
	public static function getFileExtension($filename)
	{
		if(($pos=strrpos($filename,'.'))!==false)
			return (string)substr($filename,$pos+1);
		else
			return '';
	}

	public static function getFormedEmailText($filepath, array $replacements)
	{
		$text = file_get_contents(dirname(__FILE__).'/../messages/'.$filepath);
		$keys = array_keys($replacements);
		$values = array_values($replacements);
		return str_replace($keys, $values, $text);
	}

	public static function calcDaysBetweenDates($begin, $end)
	{
		return round((strtotime($end) - strtotime($begin)) / (60 * 60 * 24));
	}

    public static function readableDate($date, $format="l, d M Y")
    {
        $days = array('Monday'=>'Понедельник', 'Tuesday'=>'Вторник', 'Wednesday'=>'Среда', 'Thursday'=>'Четверг', 'Friday'=>'Пятница', 'Saturday'=>'Суббота', 'Sunday'=>'Воскресение');
        $daysShort = array('Mon'=>'Пон', 'Tue'=>'Вто', 'Wed'=>'Сре', 'Thu'=>'Чет', 'Fri'=>'Пят', 'Sat'=>'Суб', 'Sun'=>'Вос');
        $months = array('January'=>'Января', 'February'=>'Февраля', 'March'=>'Марта', 'April'=>'Апреля', 'May'=>'Мая', 'June'=>'Июня', 'July'=>'Июля', 'August'=>'Августа', 'September'=>'Сентября', 'October'=>'Октября', 'November'=>'Ноября', 'December'=>'Декабря');
        $monthsShort = array('Jan'=>'Янв', 'Feb'=>'Фев', 'Mar'=>'Мар', 'Apr'=>'Апр', 'May'=>'Мая', 'Jun'=>'Июн', 'Jul'=>'Июл', 'Aug'=>'Авг', 'Sep'=>'Сен', 'Oct'=>'Окт', 'Nov'=>'Ноя', 'Dece'=>'Дек');
        $vocab = array_merge($daysShort, $days, $months, $monthsShort);
        return strtr(date($format, strtotime($date)), $vocab);
    }
	
	public static function extractKeywords($text)
	{
		$text = preg_replace("/([\s]+)|(,[\s]+)/u", " ", $text);
		$arr = array_unique(explode(' ', $text));
		return implode(', ', $arr);
	}
	
	public static function mysubstr($str,$from,$len){
		return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
		'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
		'$1',$str);
		} 
}