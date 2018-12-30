<?php
/**
* @version $Id: string.class.php 5462 2010-08-18 08:25:37Z Sigrid Suski $
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
class sobi2String {
	function utf82iso88592( $tekscik )
	{
		 $tekscik = str_replace("\xC4\x85", "???", $tekscik);
		 $tekscik = str_replace("\xC4\x84", '???', $tekscik);
		 $tekscik = str_replace("\xC4\x87", '???', $tekscik);
		 $tekscik = str_replace("\xC4\x86", '???', $tekscik);
		 $tekscik = str_replace("\xC4\x99", '???', $tekscik);
		 $tekscik = str_replace("\xC4\x98", '???', $tekscik);
		 $tekscik = str_replace("\xC5\x82", '???', $tekscik);
		 $tekscik = str_replace("\xC5\x81", '???', $tekscik);
		 $tekscik = str_replace("\xC3\xB3", '???', $tekscik);
		 $tekscik = str_replace("\xC3\x93", '???', $tekscik);
		 $tekscik = str_replace("\xC5\x9B", '???', $tekscik);
		 $tekscik = str_replace("\xC5\x9A", '???', $tekscik);
		 $tekscik = str_replace("\xC5\xBC", '???', $tekscik);
		 $tekscik = str_replace("\xC5\xBB", '???', $tekscik);
		 $tekscik = str_replace("\xC5\xBA", '???', $tekscik);
		 $tekscik = str_replace("\xC5\xB9", '???', $tekscik);
	 	 return $tekscik;
	}
	function iso885922utf8( $tekscik )
	{
	     $tekscik = str_replace("&#261;", "\xC4\x85", $tekscik);
	     $tekscik = str_replace('&#260;', "\xC4\x84", $tekscik);
	     $tekscik = str_replace('&#263;', "\xC4\x87", $tekscik);
	     $tekscik = str_replace('&#262;', "\xC4\x86", $tekscik);
	     $tekscik = str_replace('&#281;', "\xC4\x99", $tekscik);
	     $tekscik = str_replace('&#280;', "\xC4\x98", $tekscik);
	     $tekscik = str_replace('&#322;', "\xC5\x82", $tekscik);
	     $tekscik = str_replace('&#321;', "\xC5\x81", $tekscik);
	     $tekscik = str_replace('&#324;', "\xC5\x84", $tekscik);
	     $tekscik = str_replace('&#323;',"\xC5\x83", $tekscik);
	     $tekscik = str_replace('???', "\xC3\xB3", $tekscik);
	     $tekscik = str_replace('???', "\xC3\x93", $tekscik);
	     $tekscik = str_replace('&#347;', "\xC5\x9B", $tekscik);
	     $tekscik = str_replace('&#346;', "\xC5\x9A", $tekscik);
	     $tekscik = str_replace('&#380;', "\xC5\xBC", $tekscik);
	     $tekscik = str_replace('&#379;', "\xC5\xBB", $tekscik);
	     $tekscik = str_replace('&#378;', "\xC5\xBA", $tekscik);
	     $tekscik = str_replace('&#377;', "\xC5\xB9", $tekscik);
	     return $tekscik;
	}
    function cleanString( $string )
    {
    	$string = trim($string);
    	$badChars = '/(;|\*|\||`|>|<|&|~|!|@|#|\$|%|\*|:|;|\+|^|"|'."\n|\r|'".'|\{|\}|\[|\]|\)|\()/';
    	$string = preg_replace($badChars, "", $string);
    	return $string;
    }
    function jsAddSlashes($str)
    {
	   $pattern = array(
	       "/\\\\/"  , "/\n/"    , "/\r/"    , "/\"/"    ,
	       "/\'/"    , "/&/"    , "/</"    , "/>/"
	   );
	   $replace = array(
	       "\\\\\\\\", "\\n"    , "\\r"    , "\\\""    ,
	       "\\'"    , "\\x26"  , "\\x3C"  , "\\x3E"
	   );
	   return preg_replace($pattern, $replace, $str);
	}
}
?>