<?php
/**
* @version $Id: video.field.php 5462 2010-08-18 08:25:37Z Sigrid Suski $
* @package: Sigsiu Online Business Index 2 (Sobi2)
* ===================================================
* @author
* Name: Sigrid & Radek Suski, Sigsiu.NET GmbH
* Email: sobi[at]sigsiu.net
* Url: http://www.sigsiu.net
* ===================================================
* @copyright Copyright (C) 2006 - 2010 Sigsiu.NET GmbH (http://www.sigsiu.net). All rights reserved.
* @license see http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL.
* You can use, redistribute this file and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation.
*/
defined( '_SOBI2_' ) || exit("Restricted access");
function createSpecialVideoMediaField( $fid, $w, $h, $data, $autostart )
{
	$w = $w < 425 ? 425 : $w;
	$h = $h < 350 ? 350 : $h;
	
	$cssId = "object_id_{$fid}";
	
	$position = strrpos($data, '.');
	$extension = '';
	if ($position) {
		$extension = substr($data,$position+1);
	}
	$extension = strtolower($extension);
	
	$classid = "22D6F312-B0F6-11D0-94AB-0080C74C7E95";
	$type = "video/x-ms-wvx";

	//Quicktime
	if ($extension == 'mov') {	
		$classid = "02BF25D5-8C17-4B23-BC80-D3488ABDDC6B";
		$type = "video/quicktime";
	}

	//Shockwave
	if ($extension == 'swf') {
		$classid = "D27CDB6E-AE6D-11cf-96B8-444553540000";
		$type = "application/x-shockwave-flash";
	}
	
	$autoplay = ($autostart)?'true':'false';
	$sobiMediaObject = "\n\t<object classid='clsid:{$classid}' id='{$cssId}' type='application/x-oleobject' height='$h' width='$w'>";
	$sobiMediaObject .= "\n\t\t<param name='url' value='{$data}' />";
	$sobiMediaObject .= "\n\t\t<param name='src' value='{$data}' />";
	$sobiMediaObject .= "\n\t\t<param name='controller' value='true' />";
	$sobiMediaObject .= "\n\t\t<param name='ShowStatusBar' value='true' />";
	$sobiMediaObject .= "\n\t\t<param name='autoplay' value='{$autoplay}' />";
	$sobiMediaObject .= "\n\t\t<param name='autostart' value='{$autostart}' />";
	$sobiMediaObject .= "\n\t\t<param name='DisplayBackColor' value='0' />";
	$sobiMediaObject .= "\n\t\t<param name='TransparentAtStart' value='true' />";
	$sobiMediaObject .= "\n\t\t<param name='showcontrols' value='true' />";
	$sobiMediaObject .= "\n\t\t<embed src='{$data}' showstatusbar='1' transparentatstart='true' type='{$type}' autostart='{$autostart}' controller='true' showcontrols='1' height='$h' width='$w' ></embed>";
	$sobiMediaObject .= "\n\t</object>";


	if ($extension == 'flv') {
		$sobiMediaObject = "{$data} - Not supported video format '{$extension}'.";
	}	
	
	return $sobiMediaObject;
}
?>