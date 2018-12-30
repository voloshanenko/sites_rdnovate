<?php
/**
* @version $Id: stats.php 5462 2010-08-18 08:25:37Z Sigrid Suski $
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
defined( "_VALID_MOS" ) || defined( "_JEXEC" ) || exit("Restricted access");
class sobi2Stats
{

	function stats ()
	{
		$step = sobi2Config::request( $_REQUEST, 'f', null );
		if ( ! $step ) {
			sobi2Stats::screen();
			$config = & sobi2Config::getInstance();
			$database = & $config->getDb();
			$database->setQuery( "DELETE FROM `#__sobi2_cobj` WHERE `slang` LIKE 'sysstat'" );
			$database->query();
		}
		else {
			switch ( $step )
			{
				case 'cFile':
					sobi2Stats::createFile();
					break;
				case 'send':
					sobi2Stats::send();
					break;
				default:
					$step = str_replace( '-', '_', "_{$step}" );
					include_once ( 'PEAR.php' );
					sobi2Stats::$step();
					exit();
					break;
			}
		}
	}

	function parse_user_agent ( $user_agent )
	{
		$client_data = array( 'system' => "", 'system_icon' => "unknown", 'browser' => "", 'browser_icon' => "unknown" );
		$tmp_array = array();
		//
		// Check browsers
		//
		// Camino
		if ( preg_match( '/mozilla.*rv:[0-9\.]+.*gecko\/[0-9]+.*camino\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Camino" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'camino';
		}
		// Netscape
		if ( preg_match( '/mozilla.*netscape[0-9]?\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Netscape" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'netscape';
		}
		if ( preg_match( '/mozilla.*navigator[0-9]?\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Netscape" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'netscape';
		}
		// Epiphany
		if ( preg_match( '/mozilla.*gecko\/[0-9]+.*epiphany\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Epiphany" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'epiphany';
		}
		// Galeon
		if ( preg_match( '/mozilla.*gecko\/[0-9]+.*galeon\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Galeon" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'galeon';
		}
		// Flock
		if ( preg_match( '/mozilla.*gecko\/[0-9]+.*flock\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Flock" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'flock';
		}
		// Minimo
		if ( preg_match( '/mozilla.*gecko\/[0-9]+.*minimo\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Minimo" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'mozilla';
		}
		// K-Meleon
		if ( preg_match( '/mozilla.*gecko\/[0-9]+.*k\-meleon\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "K-Meleon" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'k-meleon';
		}
		// K-Ninja
		if ( preg_match( '/mozilla.*gecko\/[0-9]+.*k-ninja\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "K-Ninja" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'k-ninja';
		}
		// Kazehakase
		if ( preg_match( '/mozilla.*gecko\/[0-9]+.*kazehakase\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Kazehakase" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'kazehakase';
		}
		// SeaMonkey
		if ( preg_match( '/mozilla.*rv:[0-9\.]+.*gecko\/[0-9]+.*seamonkey\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "SeaMonkey" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'seamonkey';
		}
		// Iceape
		if ( preg_match( '/mozilla.*rv:[0-9\.]+.*gecko\/[0-9]+.*iceape\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Iceape" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'iceape';
		}
		// Firefox
		if ( preg_match( '/mozilla.*rv:[0-9\.]+.*gecko\/[0-9]+.*firefox\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Firefox" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'firefox';
		}
		// Iceweasel
		if ( preg_match( '/mozilla.*rv:[0-9\.]+.*gecko\/[0-9]+.*iceweasel\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Iceweasel" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'iceweasel';
		}
		// Bon Echo
		if ( preg_match( '/mozilla.*rv:[0-9\.]+.*gecko\/[0-9]+.*BonEcho\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Bon Echo" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'deerpark';
		}
		// Gran Paradiso
		if ( preg_match( '/mozilla.*rv:[0-9\.]+.*gecko\/[0-9]+.*GranParadiso\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Gran Paradiso" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'deerpark';
		}
		// Shiretoko
		if ( preg_match( '/mozilla.*rv:[0-9\.]+.*gecko\/[0-9]+.*Shiretoko\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Shiretoko" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'deerpark';
		}
		// Minefield
		if ( preg_match( '/mozilla.*rv:[0-9\.]+.*gecko\/[0-9]+.*Minefield\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Minefield" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'minefield';
		}
		// Thunderbird
		if ( preg_match( '/mozilla.*rv:[0-9\.]+.*gecko\/[0-9]+.*thunderbird\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Thunderbird" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'thunderbird';
		}
		// Icedove
		if ( preg_match( '/mozilla.*rv:[0-9\.]+.*gecko\/[0-9]+.*icedove\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Icedove" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'icedove';
		}
		// Firebird
		if ( preg_match( '/mozilla.*rv:[0-9\.]+.*gecko\/[0-9]+.*firebird\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Firebird" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'phoenix';
		}
		// Phoenix
		if ( preg_match( '/mozilla.*rv:[0-9\.]+.*gecko\/[0-9]+.*phoenix\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Phoenix" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'phoenix';
		}
		// Mozilla Suite
		if ( preg_match( '/mozilla.*rv:([0-9\.]+).*gecko\/[0-9]+.*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Mozilla";
			$client_data[ 'browser_icon' ] = 'mozilla';
			// Last official version was 1.7.13, drop all versions where second number > 7
			if ( (int) substr( $tmp_array[ 1 ], 2, 1 ) <= 7 ) {
				$client_data[ 'browser' ] .= ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
			else {
				$client_data[ 'browser' ] .= " " . 'Compatible';
			}
		}
		// Konqueror
		if ( preg_match( '/mozilla.*konqueror\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Konqueror" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'konqueror';
			if ( preg_match( '/khtml\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) ) {
				$client_data[ 'browser' ] = "Konqueror" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		// Opera
		if ( ( preg_match( '/mozilla.*opera ([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) || preg_match( '/^opera\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Opera" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'opera';
			if ( preg_match( '/opera mini/si', $user_agent ) ) {
				preg_match( '/opera mini\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array );
				$client_data[ 'browser' ] .= " (Opera Mini" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" ) . ")";
			}
		}
		// OmniWeb
		if ( preg_match( '/mozilla.*applewebkit\/[0-9]+.*omniweb\/v[0-9\.]+/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "OmniWeb";
			$client_data[ 'browser_icon' ] = 'omniweb';
		}
		// SunriseBrowser
		if ( preg_match( '/mozilla.*applewebkit\/[0-9]+.*sunrisebrowser\/([0-9a-z\+\-\.]+)/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "SunriseBrowser" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'sunrise';
		}
		// DeskBrowse
		if ( preg_match( '/mozilla.*applewebkit\/[0-9]+.*deskbrowse\/([0-9a-z\+\-\.]+)/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "DeskBrowse" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'deskbrowse';
		}
		// Shiira
		if ( preg_match( '/mozilla.*applewebkit.*shiira\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Shiira" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'shiira';
		}
		// Chrome
		if ( preg_match( '/mozilla.*applewebkit.*chrome\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Chrome" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'chrome';
		}
		// Safari (use version string if available)
		if ( preg_match( '/mozilla.*applewebkit.*version\/([0-9\.]+).*safari\/[0-9a-z\+\-\.]+/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Safari" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'safari';
		}
		// Safari (detect version using Safari build number)
		if ( preg_match( '/mozilla.*applewebkit.*safari\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Safari";
			$client_data[ 'browser_icon' ] = 'safari';
			// Translate Safari build into version number
			if ( $tmp_array[ 1 ] == "525.17" || $tmp_array[ 1 ] == "525.18" || $tmp_array[ 1 ] == "525.20" ) {
				$client_data[ 'browser' ] .= " 3.1.1";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 6 ) == "525.13" ) {
				$client_data[ 'browser' ] .= " 3.1";
			}
			elseif ( $tmp_array[ 1 ] == "523.10" || $tmp_array[ 1 ] == "523.12" || $tmp_array[ 1 ] == "523.12.9" || $tmp_array[ 1 ] == "523.15" ) {
				$client_data[ 'browser' ] .= " 3.0.4";
			}
			elseif ( $tmp_array[ 1 ] == "522.12.1" || $tmp_array[ 1 ] == "522.15.5" ) {
				$client_data[ 'browser' ] .= " 3.0.3";
			}
			elseif ( $tmp_array[ 1 ] == "522.12" || $tmp_array[ 1 ] == "522.13.1" ) {
				$client_data[ 'browser' ] .= " 3.0";
			}
			elseif ( $tmp_array[ 1 ] == "522.11.3" ) {
				$client_data[ 'browser' ] .= " 3.0 beta";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 3 ) == "419" ) {
				$client_data[ 'browser' ] .= " 2.0.4";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 3 ) == "417" ) {
				$client_data[ 'browser' ] .= " 2.0.3";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 3 ) == "416" ) {
				$client_data[ 'browser' ] .= " 2.0.2";
			}
			elseif ( $tmp_array[ 1 ] == "412.5" ) {
				$client_data[ 'browser' ] .= " 2.0.1";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 3 ) == "412" ) {
				$client_data[ 'browser' ] .= " 2.0";
			}
			elseif ( $tmp_array[ 1 ] == "312.6" || $tmp_array[ 1 ] == "312.5" ) {
				$client_data[ 'browser' ] .= " 1.3.2";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 5 ) == "312.3" ) {
				$client_data[ 'browser' ] .= " 1.3.1";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 3 ) == "312" ) {
				$client_data[ 'browser' ] .= " 1.3";
			}
			elseif ( $tmp_array[ 1 ] == "125.12" || $tmp_array[ 1 ] == "125.11" ) {
				$client_data[ 'browser' ] .= " 1.2.4";
			}
			elseif ( $tmp_array[ 1 ] == "125.9" ) {
				$client_data[ 'browser' ] .= " 1.2.3";
			}
			elseif ( $tmp_array[ 1 ] == "125.8" || $tmp_array[ 1 ] == "125.7" ) {
				$client_data[ 'browser' ] .= " 1.2.2";
			}
			elseif ( $tmp_array[ 1 ] == "125.1" ) {
				$client_data[ 'browser' ] .= " 1.2.1";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 3 ) == "125" ) {
				$client_data[ 'browser' ] .= " 1.2";
			}
			elseif ( $tmp_array[ 1 ] == "101.1" ) {
				$client_data[ 'browser' ] .= " 1.1.1";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 3 ) == "100" ) {
				$client_data[ 'browser' ] .= " 1.1";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 4 ) == "85.8" ) {
				$client_data[ 'browser' ] .= " 1.0.3";
			}
			elseif ( $tmp_array[ 1 ] == "85.7" ) {
				$client_data[ 'browser' ] .= " 1.0.2";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 2 ) == "85" ) {
				$client_data[ 'browser' ] .= " 1.0";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 2 ) == "74" ) {
				$client_data[ 'browser' ] .= " 1.0b2";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 2 ) == "73" ) {
				$client_data[ 'browser' ] .= " 0.9";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 2 ) == "60" ) {
				$client_data[ 'browser' ] .= " 0.8.2";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 2 ) == "51" ) {
				$client_data[ 'browser' ] .= " 0.8.1";
			}
			elseif ( substr( $tmp_array[ 1 ], 0, 2 ) == "48" ) {
				$client_data[ 'browser' ] .= " 0.8";
			}
		}
		// Dillo
		if ( preg_match( '/dillo\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Dillo" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'dillo';
		}
		// iCab
		if ( preg_match( '/icab\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "iCab" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'icab';
		}
		// Lynx
		if ( preg_match( '/^lynx\/([0-9a-z\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Lynx" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'lynx';
		}
		// Links
		if ( preg_match( '/^links \(([0-9a-z\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Links" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'links';
		}
		// Elinks
		if ( preg_match( '/^elinks \(([0-9a-z\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "ELinks" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'links';
		}
		if ( preg_match( '/^elinks\/([0-9a-z\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "ELinks" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'links';
		}
		if ( preg_match( '/^elinks$/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "ELinks";
			$client_data[ 'browser_icon' ] = 'links';
		}
		// Wget
		if ( preg_match( '/^Wget\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Wget" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'wget';
		}
		// Amiga Aweb
		if ( preg_match( '/Amiga\-Aweb\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Amiga Aweb" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'aweb';
		}
		// Amiga Voyager
		if ( preg_match( '/AmigaVoyager\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Amiga Voyager" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'voyager';
		}
		// QNX Voyager
		if ( preg_match( '/QNX Voyager ([0-9a-z.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "QNX Voyager" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'qnx';
		}
		// IBrowse
		if ( preg_match( '/IBrowse\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "IBrowse" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'ibrowse';
		}
		// Openwave
		if ( preg_match( '/UP\.Browser\/([0-9a-zA-Z\.]+).*/s', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Openwave" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'openwave';
		}
		if ( preg_match( '/UP\/([0-9a-zA-Z\.]+).*/s', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Openwave" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'openwave';
		}
		// NetFront
		if ( preg_match( '/NetFront\/([0-9a-z\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "NetFront" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'netfront';
		}
		// PlayStation Portable
		if ( preg_match( '/psp.*playstation.*portable[^0-9]*([0-9a-z\.]+)\)/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "PSP" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'playstation';
		}
		// Various robots...
		// Googlebot
		if ( preg_match( '/Googlebot\/([0-9a-z\+\-\.]+).*/s', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Googlebot" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// Googlebot Image
		if ( preg_match( '/Googlebot\-Image\/([0-9a-z\+\-\.]+).*/s', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Googlebot Image " . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// Gigabot
		if ( preg_match( '/Gigabot\/([0-9a-z\+\-\.]+).*/s', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Gigabot" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// W3C Validator
		if ( preg_match( '/^W3C_Validator\/([0-9a-z\+\-\.]+)$/s', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "W3C Validator" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// W3C CSS Validator
		if ( preg_match( '/W3C_CSS_Validator_[a-z]+\/([0-9a-z\+\-\.]+)$/s', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "W3C CSS Validator" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// MSN Bot
		if ( preg_match( '/msnbot(-media|)\/([0-9a-z\+\-\.]+).*/s', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "MSNBot" . ( $tmp_array[ 2 ] ? " " . $tmp_array[ 2 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// Psbot
		if ( preg_match( '/psbot\/([0-9a-z\+\-\.]+).*/s', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Psbot" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// IRL crawler
		if ( preg_match( '/IRLbot\/([0-9a-z\+\-\.]+).*/s', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "IRL crawler" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// Seekbot
		if ( preg_match( '/Seekbot\/([0-9a-z\+\-\.]+).*/s', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Seekport Robot" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// Microsoft Research Bot
		if ( preg_match( '/^MSRBOT /s', $user_agent ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "MSRBot";
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// cfetch/voyager
		if ( preg_match( '/^(cfetch|voyager)\/([0-9a-z\+\-\.]+)$/s', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "voyager" . ( $tmp_array[ 2 ] ? " " . $tmp_array[ 2 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// BecomeBot
		if ( preg_match( '/BecomeBot\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "BecomeBot" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// SnapBot
		if ( preg_match( '/SnapBot\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "SnapBot" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// Yeti
		if ( preg_match( '/Yeti\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Yeti" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// Twiceler
		if ( preg_match( '/Twiceler-([0-9\.]+) http:\/\/www.cuill.com/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Twiceler" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// Alexa
		if ( preg_match( '/^ia_archiver$/s', $user_agent ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Alexa";
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// Inktomi Slurp
		if ( preg_match( '/Slurp.*inktomi/s', $user_agent ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Inktomi Slurp";
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// Yahoo Slurp
		if ( preg_match( '/Yahoo!.*Slurp/s', $user_agent ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Yahoo! Slurp";
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// Ask.com
		if ( preg_match( '/Ask Jeeves\/Teoma/s', $user_agent ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Ask.com";
			$client_data[ 'browser_icon' ] = 'robot';
		}
		// end of robots
		// MSIE
		if ( preg_match( '/microsoft.*internet.*explorer/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "MS Internet Explorer 1.0";
			$client_data[ 'browser_icon' ] = 'msie';
		}
		if ( preg_match( '/mozilla.*MSIE ([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "MS Internet Explorer" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'msie';
		}
		// Netscape Navigator
		if ( preg_match( '/Mozilla\/([0-4][0-9\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Netscape Navigator" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'browser_icon' ] = 'netscape_old';
		}
		// Catchall for other Mozilla compatible browsers
		if ( preg_match( '/mozilla/si', $user_agent, $tmp_array ) && ! $client_data[ 'browser' ] ) {
			$client_data[ 'browser' ] = "Mozilla " . 'Compatible';
			$client_data[ 'browser_icon' ] = 'mozilla';
		}
		//
		// Check system
		//
		// Linux
		if ( preg_match( '/linux/si', $user_agent ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Linux";
			$client_data[ 'system_icon' ] = "linux";
			if ( preg_match( '/mdk/si', $user_agent ) ) {
				$client_data[ 'system' ] .= " (Mandrake)";
				$client_data[ 'system_icon' ] = "mandrake";
			}
			elseif ( preg_match( '/kanotix/si', $user_agent ) ) {
				$client_data[ 'system' ] .= " (Kanotix)";
				$client_data[ 'system_icon' ] = "kanotix";
			}
			elseif ( preg_match( '/lycoris/si', $user_agent ) ) {
				$client_data[ 'system' ] .= " (Lycoris)";
				$client_data[ 'system_icon' ] = "lycoris";
			}
			elseif ( preg_match( '/knoppix/si', $user_agent ) ) {
				$client_data[ 'system' ] .= " (Knoppix)";
				$client_data[ 'system_icon' ] = "knoppix";
			}
			elseif ( preg_match( '/centos/si', $user_agent ) ) {
				$client_data[ 'system' ] .= " (CentOS)";
				$client_data[ 'system_icon' ] = "centos";
			}
			elseif ( preg_match( '/gentoo/si', $user_agent ) ) {
				$client_data[ 'system' ] .= " (Gentoo)";
				$client_data[ 'system_icon' ] = "gentoo";
			}
			elseif ( preg_match( '/fedora/si', $user_agent ) ) {
				$client_data[ 'system' ] .= " (Fedora)";
				$client_data[ 'system_icon' ] = "fedora";
			}
			elseif ( preg_match( '/ubuntu/si', $user_agent ) ) {
				// Which *ubuntu do we have?
				if ( preg_match( '/kubuntu/si', $user_agent ) ) {
					$client_data[ 'system' ] .= " (Kubuntu";
					$client_data[ 'system_icon' ] = "kubuntu";
				}
				elseif ( preg_match( '/xubuntu/si', $user_agent ) ) {
					$client_data[ 'system' ] .= " (Xubuntu";
					$client_data[ 'system_icon' ] = "xubuntu";
				}
				else {
					$client_data[ 'system' ] .= " (Ubuntu";
					$client_data[ 'system_icon' ] = "ubuntu";
				}
				// Try to detect version
				if ( preg_match( '/jaunty/si', $user_agent ) ) {
					$client_data[ 'system' ] .= " 9.04 Jaunty)";
				}
				elseif ( preg_match( '/intrepid/si', $user_agent ) ) {
					$client_data[ 'system' ] .= " 8.10 Intrepid)";
				}
				elseif ( preg_match( '/hardy/si', $user_agent ) ) {
					$client_data[ 'system' ] .= " 8.04 LTS Hardy Heron)";
				}
				elseif ( preg_match( '/gutsy/si', $user_agent ) ) {
					$client_data[ 'system' ] .= " 7.10 Gutsy Gibbon)";
				}
				elseif ( preg_match( '/ubuntu.feist/si', $user_agent ) ) {
					$client_data[ 'system' ] .= " 7.04 Feisty Fawn)";
				}
				elseif ( preg_match( '/ubuntu.edgy/si', $user_agent ) ) {
					$client_data[ 'system' ] .= " 6.10 Edgy Eft)";
				}
				elseif ( preg_match( '/ubuntu.dapper/si', $user_agent ) ) {
					$client_data[ 'system' ] .= " 6.06 LTS Dapper Drake)";
				}
				elseif ( preg_match( '/ubuntu.breezy/si', $user_agent ) ) {
					$client_data[ 'system' ] .= " 5.10 Breezy Badger)";
				}
				else {
					$client_data[ 'system' ] .= ")";
				}
			}
			elseif ( preg_match( '/slackware/si', $user_agent ) ) {
				$client_data[ 'system' ] .= " (Slackware)";
				$client_data[ 'system_icon' ] = "slackware";
			}
			elseif ( preg_match( '/suse/si', $user_agent ) ) {
				$client_data[ 'system' ] .= " (Suse)";
				$client_data[ 'system_icon' ] = "suse";
			}
			elseif ( preg_match( '/redhat/si', $user_agent ) ) {
				$client_data[ 'system' ] .= " (Redhat)";
				$client_data[ 'system_icon' ] = "redhat";
			}
			elseif ( preg_match( '/debian/si', $user_agent ) ) {
				$client_data[ 'system' ] .= " (Debian)";
				$client_data[ 'system_icon' ] = "debian";
			}
			elseif ( preg_match( '/PLD\/([0-9.]*) \(([a-z]{2})\)/si', $user_agent, $tmp_array ) ) {
				$client_data[ 'system' ] .= " (PLD" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" ) . ( $tmp_array[ 2 ] ? " " . $tmp_array[ 2 ] : "" ) . ")";
				$client_data[ 'system_icon' ] = "pld";
			}
			elseif ( preg_match( '/PLD\/([a-zA-Z.]*)/si', $user_agent, $tmp_array ) ) {
				$client_data[ 'system' ] .= " (PLD" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" ) . ")";
				$client_data[ 'system_icon' ] = "pld";
			}
		}
		// BSD
		if ( preg_match( '/bsd/si', $user_agent ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "BSD";
			$client_data[ 'system_icon' ] = "bsd";
			if ( preg_match( '/freebsd/si', $user_agent ) ) {
				$client_data[ 'system' ] = "FreeBSD";
			}
			elseif ( preg_match( '/openbsd/si', $user_agent ) ) {
				$client_data[ 'system' ] = "OpenBSD";
			}
			elseif ( preg_match( '/netbsd/si', $user_agent ) ) {
				$client_data[ 'system' ] = "NetBSD";
			}
		}
		// Mac OS (X)
		if ( ( preg_match( '/mac_/si', $user_agent ) || preg_match( '/macos/si', $user_agent ) || preg_match( '/powerpc/si', $user_agent ) || preg_match( '/mac os/si', $user_agent ) || preg_match( '/68k/si', $user_agent ) || preg_match( '/macintosh/si', $user_agent ) ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Mac OS";
			$client_data[ 'system_icon' ] = "macos";
			if ( preg_match( '/mac os x/si', $user_agent ) ) {
				$client_data[ 'system' ] .= " X";
				// use version string if available
				if ( preg_match( '/mac os x ([0-9\._]+)/si', $user_agent, $tmp_array ) ) {
					$client_data[ 'system' ] .= ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
					$client_data[ 'system' ] = preg_replace( '/_/', '.', $client_data[ 'system' ] );
				}
				// if browser == safari try to detect Mac OS X version using WebKit and Safari build numbers
				elseif ( preg_match( '/applewebkit\/([0-9\.]+).*safari\/([0-9\.]+)/si', $user_agent, $tmp_array ) ) {
					if ( $tmp_array[ 1 ] == "523.10.3" ) {
						$client_data[ 'system' ] .= " 10.5/10.5.1";
					}
					elseif ( $tmp_array[ 1 ] == "419.3" ) {
						$client_data[ 'system' ] .= " 10.4.10";
					}
					elseif ( $tmp_array[ 1 ] == "419.2.1" ) {
						$client_data[ 'system' ] .= " 10.4.9/10.4.10";
					}
					elseif ( $tmp_array[ 1 ] == "419" ) {
						$client_data[ 'system' ] .= " 10.4.9";
					}
					elseif ( $tmp_array[ 1 ] == "418.9.1" ) {
						$client_data[ 'system' ] .= " 10.4.8";
					}
					elseif ( $tmp_array[ 1 ] == "418.9" ) {
						$client_data[ 'system' ] .= " 10.4.8";
					}
					elseif ( $tmp_array[ 1 ] == "418.8" ) {
						$client_data[ 'system' ] .= " 10.4.7";
					}
					elseif ( substr( $tmp_array[ 1 ], 0, 3 ) == "418" ) {
						$client_data[ 'system' ] .= " 10.4.6";
					}
					elseif ( $tmp_array[ 1 ] == "417.9" ) {
						$client_data[ 'system' ] .= " 10.4.4/10.4.5";
					}
					elseif ( substr( $tmp_array[ 1 ], 0, 3 ) == "416" ) {
						$client_data[ 'system' ] .= " 10.4.3";
					}
					elseif ( substr( $tmp_array[ 1 ], 0, 4 ) == "412." ) {
						$client_data[ 'system' ] .= " 10.4.2";
					}
					elseif ( substr( $tmp_array[ 1 ], 0, 3 ) == "412" ) {
						$client_data[ 'system' ] .= " 10.4/10.4.1";
					}
					elseif ( substr( $tmp_array[ 1 ], 0, 3 ) == "312" ) {
						$client_data[ 'system' ] .= " 10.3.9";
					}
					elseif ( $tmp_array[ 1 ] == "125.5.7" ) {
						$client_data[ 'system' ] .= " 10.3.8";
					}
					elseif ( $tmp_array[ 1 ] == "125.5.5" && $tmp_array[ 2 ] == "125.11" ) {
						$client_data[ 'system' ] .= " 10.3.6";
					}
					elseif ( ( $tmp_array[ 1 ] == "125.5.6" || $tmp_array[ 1 ] == "125.5.5" ) && substr( $tmp_array[ 2 ], 0, 5 ) == "125.1" ) {
						$client_data[ 'system' ] .= " 10.3.6/10.3.7/10.3.8";
					}
					elseif ( $tmp_array[ 1 ] == "125.5" || $tmp_array[ 1 ] == "125.4" ) {
						$client_data[ 'system' ] .= " 10.3.5";
					}
					elseif ( $tmp_array[ 1 ] == "125.2" ) {
						$client_data[ 'system' ] .= " 10.3.4";
					}
					elseif ( $tmp_array[ 1 ] == "100" && $tmp_array[ 2 ] == "100.1" ) {
						$client_data[ 'system' ] .= " 10.3.2";
					}
					elseif ( substr( $tmp_array[ 1 ], 0, 3 ) == "100" ) {
						$client_data[ 'system' ] .= " 10.3";
					}
					elseif ( substr( $tmp_array[ 1 ], 0, 2 ) == "85" ) {
						$client_data[ 'system' ] .= " 10.2.8";
					}
				}
			}
		}
		// ReactOS
		if ( preg_match( '/ReactOS ([0-9a-zA-Z\+\-\. ]+).*/s', $user_agent, $tmp_array ) ) {
			$client_data[ 'system' ] = "ReactOS" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'system_icon' ] = "reactos";
		}
		// SunOs
		if ( preg_match( '/sunos/si', $user_agent ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Solaris";
			$client_data[ 'system_icon' ] = "solaris";
		}
		// Amiga
		if ( preg_match( '/amiga/si', $user_agent ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Amiga";
			$client_data[ 'system_icon' ] = "amiga";
		}
		// Irix
		if ( preg_match( '/irix/si', $user_agent ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "IRIX";
			$client_data[ 'system_icon' ] = "irix";
		}
		// OpenVMS
		if ( preg_match( '/open.*vms/si', $user_agent ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "OpenVMS";
			$client_data[ 'system_icon' ] = "openvms";
		}
		// BeOs
		if ( preg_match( '/beos/si', $user_agent ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "BeOS";
			$client_data[ 'system_icon' ] = "beos";
		}
		// QNX
		if ( preg_match( '/QNX/si', $user_agent ) && preg_match( '/Photon/si', $user_agent ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "QNX";
			$client_data[ 'system_icon' ] = "qnx";
		}
		// OS/2 Warp
		if ( preg_match( '/OS\/2.*Warp ([0-9.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "OS/2 Warp" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'system_icon' ] = "os2";
		}
		// Java on mobile
		if ( preg_match( '/j2me/si', $user_agent ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Java Platform Micro Edition";
			$client_data[ 'system_icon' ] = "java";
		}
		// Symbian Os
		if ( preg_match( '/symbian/si', $user_agent ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Symbian OS";
			$client_data[ 'system_icon' ] = "symbian";
			// try to get version
			if ( preg_match( '/SymbianOS\/([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) ) {
				$client_data[ 'system' ] .= ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		// Palm Os
		if ( preg_match( '/palmos/si', $user_agent ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Palm OS";
			$client_data[ 'system_icon' ] = "palmos";
			// try to get version
			if ( preg_match( '/PalmOS ([0-9a-z\+\-\.]+).*/si', $user_agent, $tmp_array ) ) {
				$client_data[ 'system' ] .= ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		// PlayStation Portable
		if ( preg_match( '/psp.*playstation.*portable/si', $user_agent ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "PlayStation Portable";
			$client_data[ 'system_icon' ] = 'playstation';
		}
		// Nintentdo Wii
		if ( preg_match( '/Nintendo Wii/si', $user_agent ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Nintendo Wii";
			$client_data[ 'system_icon' ] = 'wii';
		}
		// Try to detect some mobile devices...
		// Nokia
		if ( preg_match( '/Nokia[ ]{0,1}([0-9a-zA-Z\+\-\.]+){0,1}.*/s', $user_agent, $tmp_array ) ) {
			if ( ! $client_data[ 'system' ] ) {
				$client_data[ 'system' ] = "Nokia" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
				$client_data[ 'system_icon' ] = "mobile";
			}
			else {
				$client_data[ 'system' ] .= " / Nokia" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		// Motorola
		if ( preg_match( '/mot\-([0-9a-zA-Z\+\-\.]+){0,1}\//si', $user_agent, $tmp_array ) ) {
			if ( ! $client_data[ 'system' ] ) {
				$client_data[ 'system' ] = "Motorola" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
				$client_data[ 'system_icon' ] = "mobile";
			}
			else {
				$client_data[ 'system' ] .= " / Motorola" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		// Siemens
		if ( preg_match( '/sie\-([0-9a-zA-Z\+\-\.]+){0,1}\//si', $user_agent, $tmp_array ) ) {
			if ( ! $client_data[ 'system' ] ) {
				$client_data[ 'system' ] = "Siemens" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
				$client_data[ 'system_icon' ] = "mobile";
			}
			else {
				$client_data[ 'system' ] .= " / Siemens" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		// Samsung
		if ( preg_match( '/samsung\-([0-9a-zA-Z\+\-\.]+){0,1}\//si', $user_agent, $tmp_array ) ) {
			if ( ! $client_data[ 'system' ] ) {
				$client_data[ 'system' ] = "Samsung" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
				$client_data[ 'system_icon' ] = "mobile";
			}
			else {
				$client_data[ 'system' ] .= " / Samsung" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		// SonyEricsson & Ericsson
		if ( preg_match( '/SonyEricsson[ ]{0,1}([0-9a-zA-Z\+\-\.]+){0,1}.*/s', $user_agent, $tmp_array ) ) {
			if ( ! $client_data[ 'system' ] ) {
				$client_data[ 'system' ] = "Sony Ericsson" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
				$client_data[ 'system_icon' ] = "mobile";
			}
			else {
				$client_data[ 'system' ] .= " / Sony Ericsson" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		elseif ( preg_match( '/Ericsson[ ]{0,1}([0-9a-zA-Z\+\-\.]+){0,1}.*/s', $user_agent, $tmp_array ) ) {
			if ( ! $client_data[ 'system' ] ) {
				$client_data[ 'system' ] = "Ericsson" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
				$client_data[ 'system_icon' ] = "mobile";
			}
			else {
				$client_data[ 'system' ] .= " / Ericsson" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		// Alcatel
		if ( preg_match( '/Alcatel\-([0-9a-zA-Z\+\-\.]+){0,1}.*/s', $user_agent, $tmp_array ) ) {
			if ( ! $client_data[ 'system' ] ) {
				$client_data[ 'system' ] = "Alcatel" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
				$client_data[ 'system_icon' ] = "mobile";
			}
			else {
				$client_data[ 'system' ] .= " / Alcatel" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		// Panasonic
		if ( preg_match( '/Panasonic\-{0,1}([0-9a-zA-Z\+\-\.]+){0,1}.*/s', $user_agent, $tmp_array ) ) {
			if ( ! $client_data[ 'system' ] ) {
				$client_data[ 'system' ] = "Panasonic" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
				$client_data[ 'system_icon' ] = "mobile";
			}
			else {
				$client_data[ 'system' ] .= " / Panasonic" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		// Philips
		if ( preg_match( '/Philips\-([0-9a-z\+\-\@\.]+){0,1}.*/si', $user_agent, $tmp_array ) ) {
			if ( ! $client_data[ 'system' ] ) {
				$client_data[ 'system' ] = "Philips" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
				$client_data[ 'system_icon' ] = "mobile";
			}
			else {
				$client_data[ 'system' ] .= " / Philips" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		// Acer
		if ( preg_match( '/Acer\-([0-9a-z\+\-\.]+){0,1}.*/si', $user_agent, $tmp_array ) ) {
			if ( ! $client_data[ 'system' ] ) {
				$client_data[ 'system' ] = "Acer" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
				$client_data[ 'system_icon' ] = "mobile";
			}
			else {
				$client_data[ 'system' ] .= " / Acer" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		// BlackBerry
		if ( preg_match( '/BlackBerry([0-9a-zA-Z\+\-\.]+){0,1}\//s', $user_agent, $tmp_array ) ) {
			if ( ! $client_data[ 'system' ] ) {
				$client_data[ 'system' ] = "BlackBerry" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
				$client_data[ 'system_icon' ] = "mobile";
			}
			else {
				$client_data[ 'system' ] .= " / BlackBerry" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			}
		}
		// Windows 3.x, 95, 98 and other numerical
		if ( preg_match( '/windows ([0-9\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Windows" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
			$client_data[ 'system_icon' ] = "win_old";
		}
		if ( preg_match( '/[ \(]win([0-9\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'system' ] ) {
			if ( $tmp_array[ 1 ] == "16" ) {
				$client_data[ 'system' ] = "Windows 3.x";
				$client_data[ 'system_icon' ] = "win_old";
			}
			elseif ( $tmp_array[ 1 ] == "32" ) {
				$client_data[ 'system' ] = "Windows";
				$client_data[ 'system_icon' ] = "win_old";
			}
			else {
				$client_data[ 'system' ] = "Windows" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
				$client_data[ 'system_icon' ] = "win_old";
			}
		}
		// Windows ME
		if ( preg_match( '/windows me/si', $user_agent, $tmp_array ) || preg_match( '/win 9x 4\.90/si', $user_agent, $tmp_array ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Windows Millenium";
			$client_data[ 'system_icon' ] = "win_old";
		}
		// Windows CE
		if ( preg_match( '/windows ce/si', $user_agent, $tmp_array ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Windows CE";
			$client_data[ 'system_icon' ] = "win_old";
		}
		// Windows XP
		if ( preg_match( '/windows xp/si', $user_agent, $tmp_array ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Windows XP";
			$client_data[ 'system_icon' ] = "win_new";
		}
		// Windows NT, no version, to be sure it will catch
		if ( preg_match( '/windows nt/si', $user_agent, $tmp_array ) || preg_match( '/winnt/si', $user_agent, $tmp_array ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Windows NT";
			$client_data[ 'system_icon' ] = "win_old";
		}
		// Windows NT with version
		if ( preg_match( '/windows nt ([0-9\.]+).*/si', $user_agent, $tmp_array ) || preg_match( '/winnt([0-9\.]+).*/si', $user_agent, $tmp_array ) && ! $client_data[ 'system' ] ) {
			if ( $tmp_array[ 1 ] == "6.1" ) {
				$client_data[ 'system' ] = "Windows 7/Server 2008 R2";
				$client_data[ 'system_icon' ] = "vista";
			}
			elseif ( $tmp_array[ 1 ] == "6.0" ) {
				$client_data[ 'system' ] = "Windows Vista/Server 2008";
				$client_data[ 'system_icon' ] = "vista";
			}
			elseif ( $tmp_array[ 1 ] == "5.2" ) {
				$client_data[ 'system' ] = "Windows Server Home/Server 2003";
				$client_data[ 'system_icon' ] = "win_new";
			}
			elseif ( $tmp_array[ 1 ] == "5.1" ) {
				$client_data[ 'system' ] = "Windows XP";
				$client_data[ 'system_icon' ] = "win_new";
			}
			elseif ( $tmp_array[ 1 ] == "5.0" || $tmp_array[ 1 ] == "5.01" ) {
				$client_data[ 'system' ] = "Windows 2000";
				$client_data[ 'system_icon' ] = "win_old";
			}
			else {
				$client_data[ 'system' ] = "Windows NT" . ( $tmp_array[ 1 ] ? " " . $tmp_array[ 1 ] : "" );
				$client_data[ 'system_icon' ] = "win_old";
			}
		}
		// Catchall for all other windozez
		if ( preg_match( '/windows/si', $user_agent, $tmp_array ) && ! $client_data[ 'system' ] ) {
			$client_data[ 'system' ] = "Windows";
			$client_data[ 'system_icon' ] = "win_old";
		}
		return $client_data;
	}

	function send ()
	{
		$config = & sobi2Config::getInstance();
		$f = sobi2_ereg_replace( "[^a-zA-Z0-9]", null, base64_encode( 'stat' . $config->secret ) );
		$zfile = sobi2Config::translatePath( 'includes|' . $f, 'adm', false, '.zip' );
		$xfile = sobi2Config::translatePath( 'includes|' . $f, 'adm', false, '.xml' );
		$x = file_get_contents( $xfile );
		$s = false;
		$b = "Server Information Report from Sobi2 user \n\n{$x}";
		if ( defined( '_JEXEC' ) && class_exists( 'JFactory' ) ) {
			$mail = JFactory::getMailer();
			$jConf = new JConfig( );
			$mail->setSender( array( $jConf->mailfrom, "Sobi2 Server Report" ) );
			$mail->setSubject( "Server Information Report" );
			$mail->setBody( $b );
			$mail->AddAttachment( $zfile );
			$mail->addRecipient( "reports@sigsiu.net" );
			if ( $mail->Send() ) {
				sobi2Stats::EndScreen();
				$s = true;
			}
		}
		if ( ! $s ) {
			if ( function_exists( 'mosCreateMail' ) ) {
				$mail = mosCreateMail( $config->mailfrom, "Sobi2 Server Report", "Server Information Report", $b );
				$mail->AddAddress( 'reports@sigsiu.net' );
				$mail->AddAttachment( $zfile );
			}
			if ( $mail->Send() ) {
				sobi2Stats::EndScreen();
				$s = true;
			}
		}
		if ( ! $s ) {
			return sobi2Stats::ErrScreen( $f );
		}
		else {
			$config->setValueInDB( 1, 'ssrs' );
		}
		$database = & $config->getDb();
		$database->setQuery( "DELETE FROM `#__sobi2_cobj` WHERE `slang` LIKE 'sysstat'" );
		$database->query();
		unlink( $zfile );
		unlink( $xfile );
	}

	function ErrScreen ( $f )
	{
		?>
<div style="width: 800px; margin: 15px;text-align:left;">
<h2 style="color: red">Report cannot be sent</h2>
<h3>Unfortunately it wasn't possible to send the report.<br />
You can try to <a
	href="components/com_sobi2/includes/<?php
		echo $f;
		?>.zip"
	target="_blank">download this file</a> and send it manualy to <a
	href="mailto:reports@sigsiu.net">reports@Sigsiu.NET</a><br />
<br />
Thank you very much,<br />
Your Sobi Development Team<br />
<br />
<input type="button" id="StatBt" class="button"
	style="width: 150px; font-size: 15px" value="Return to Sobi2"
	onclick="document.location.href = 'index2.php?option=com_sobi2';" />&nbsp;
</h3>
</div>
<?php
	}

	function EndScreen ()
	{
		?>
<div style="width: 800px; margin: 15px;text-align:left;">
<h2 style="color: blue">Report has been sent</h2>
<h3>Thank you very much for supporting Sobi2 development<br />
<br />
You can find the actually published evaluation of these statistics on the <a href="http://www.sigsiu.net/statistics/" target="_blank">Sigsiu.NET</a> site.
<br />
If you would like to be informed about updates of these statistics,
<b style="color: blue">follow us on Twitter here: <a href="http://twitter.com/neo_sigsiu_net" target="_blank">neo_sigsiu_net</a>
&nbsp;<a href="http://twitter.com/neo_sigsiu_net" target="_blank"><img style="border-style:none;" alt="" src="components/com_sobi2/images/twitter.gif"/></a>
</b>
<br />
<br />

Best regards,<br />
Your Sobi Development Team<br />
<br />
<input type="button" id="StatBt" class="button"
	style="width: 150px; font-size: 15px" value="Return to Sobi2"
	onclick="document.location.href = 'index2.php?option=com_sobi2';" />&nbsp;
</h3>
</div>
<?php
	}

	function createFile ()
	{
		$tests = array();
		$res = array();
		$config = & sobi2Config::getInstance();
		$f = sobi2_ereg_replace( "[^a-zA-Z0-9]", null, base64_encode( 'stat' . $config->secret ) );
		$file = sobi2Config::translatePath( 'includes|' . $f, 'adm', false, '.xml' );
		if ( file_exists( $file ) ) {
			unlink( $file );
		}
		$res[ 'id' ] = array( 'id' => $f, 'comment' => 'Unique identification string to prevent duplicate reports', 'time' => date( DATE_RFC822 ) );
		$tests[ 'PHP' ] = array();
		$tests[ 'CMS' ] = array( 'CMS Name', 'CMS Version', 'CMS SEF', 'CMS Cache', 'FTP Layer' );
		$tests[ 'PHP' ][ 'base' ] = array( 'php info', 'SAPI', 'rg', 'Error Reporting', 'Memory Limit', 'allow URL fopen', 'CURL', 'File Uploads', 'Max Execution Time', 'Max Input Time', 'Post Max Size', 'Upload Max Filesize', 'Magic Quotes', 'shell', 'Java', 'Open Basedir' );
		$tests[ 'PHP' ][ 'libraries' ] = array( 'PEAR', 'XML', 'XSL', 'APC', 'Bytecode Compiler', 'Exif', 'Image GD', 'Imagick', 'Cyrus', 'IMAP', 'Mailparse', 'ID3', 'Amarok', 'OpenAL', 'FTP', 'XML-RPC', 'SOAP', 'Sockets', 'JSON', 'Service Data Objects', 'SDO XML', 'WDDX', 'Gettext', 'Multibyte Support', 'Tokenizer', 'GMP', 'Radius', 'OpenSSL', 'POSIX', 'Pspell', 'GNU Recode', 'Enchant spelling library', 'iconv', 'International Domain Names', 'Bzip2', 'Zip', 'Zlib', 'Calendar Functions', 'Phar', 'RAR', 'File Information', 'Mimetype', 'xdiff', 'Statistics', 'Forms Data Format', 'GNU Privacy Guard', 'PDF', 'Haru PDF', 'Ming', 'PostScript', 'Shockwave Flash', 'Geo IP Location', 'Tidy', 'DOM', 'Shared Memory', 'PCNTL', 'Semaphore', 'SPL', 'FAM', 'HTTP', 'Memcache', 'dl' );
		$tests[ 'MySQL' ] = array( 'MySQL Client Version', 'MySQL Server Version', 'MySQL Procedure', 'MySQL Function', 'MySQL Trigger', 'MySQL View', 'MySQL Engines' );
		$tests[ 'WebServer' ] = array( 'Web Server', 'Platform' );
		$tests[ 'Admin' ] = array( 'Admin Browser' );
		$database = & $config->getDb();
		$query = "SELECT svars FROM `#__sobi2_cobj` WHERE  ( slang = 'sysstat' );";
		$database->setQuery( $query );
		$list = $database->loadObjectList();
		$arrs = array();
		foreach( $list as $p ) {
			$a = null;
			$a = unserialize( ( base64_decode( $p->svars ) ) );
			$k = array_keys( $a );
			$i = $k[ 0 ];
			$arrs[ $i ] = $a[ $i ];
		}
		$res[ 'CMS' ] = array();
		foreach( $tests[ 'CMS' ] as $pos ) {
			$pos = str_replace( ' ', '_', strtolower( $pos ) );
			if ( isset( $arrs[ $pos ] ) ) {
				if ( isset( $arrs[ $pos ][ $pos ] ) ) {
					$res[ 'CMS' ][ $pos ] = $arrs[ $pos ][ $pos ];
				}
				else {
					$res[ 'CMS' ][ $pos ] = $arrs[ $pos ];
				}
			}
		}
		$res[ 'PHP' ] = array();
		$res[ 'PHP' ][ 'base' ] = array();
		foreach( $tests[ 'PHP' ][ 'base' ] as $pos ) {
			$pos = str_replace( ' ', '_', strtolower( $pos ) );
			if ( isset( $arrs[ $pos ] ) ) {
				if ( isset( $arrs[ $pos ][ $pos ] ) ) {
					$t = $arrs[ $pos ][ $pos ];
				}
				else {
					$t = $arrs[ $pos ];
				}
				if ( is_array( $t ) ) {
					$z = array_keys( $t );
					if ( isset( $z[ 0 ] ) && strtolower( $z[ 0 ] ) == $pos ) {
						$t = $t[ $z[ 0 ] ];
					}
				}
				if ( isset( $res[ 'PHP' ][ 'base' ][ $pos ] ) ) {
					$res[ 'PHP' ][ 'base' ][ $pos ] = array_merge( $res[ 'PHP' ][ 'base' ][ $pos ], $t );
				}
				else {
					$res[ 'PHP' ][ 'base' ][ $pos ] = $t;
				}
			}
		}
		if ( ! isset( $res[ 'PHP' ][ 'base' ][ 'curl' ] ) ) {
			if ( function_exists( 'curl_init' ) ) {
				$res[ 'PHP' ][ 'base' ][ 'curl' ][ 'available' ] = 'available but not usable';
			}
		}
		$res[ 'PHP' ][ 'libraries' ] = array();
		foreach( $tests[ 'PHP' ][ 'libraries' ] as $pos ) {
			$pos = str_replace( ' ', '_', strtolower( $pos ) );
			if ( isset( $arrs[ $pos ] ) ) {
				if ( isset( $arrs[ $pos ][ $pos ] ) ) {
					$t = $arrs[ $pos ][ $pos ];
				}
				else {
					$t = $arrs[ $pos ];
				}
				if ( is_array( $t ) ) {
					$z = array_keys( $t );
					if ( strtolower( $z[ 0 ] ) == $pos ) {
						$t = $t[ $z[ 0 ] ];
					}
				}
				if ( isset( $res[ 'PHP' ][ 'libraries' ][ $pos ] ) ) {
					$res[ 'PHP' ][ 'libraries' ][ $pos ] = array_merge( $res[ 'PHP' ][ 'libraries' ][ $pos ], $t );
				}
				else {
					$res[ 'PHP' ][ 'libraries' ][ $pos ] = $t;
				}
			}
		}
		$res[ 'MySQL' ] = array();
		foreach( $tests[ 'MySQL' ] as $pos ) {
			$pos = str_replace( ' ', '_', strtolower( $pos ) );
			if ( isset( $arrs[ $pos ] ) ) {
				if ( isset( $arrs[ $pos ][ $pos ] ) ) {
					$t = $arrs[ $pos ][ $pos ];
				}
				else {
					$t = $arrs[ $pos ];
				}
				if ( is_array( $t ) ) {
					$z = array_keys( $t );
					if ( strtolower( $z[ 0 ] ) == $pos ) {
						$t = $t[ $z[ 0 ] ];
					}
				}
				if ( isset( $res[ 'MySQL' ][ $pos ] ) ) {
					$res[ 'MySQL' ][ $pos ] = array_merge( $res[ 'MySQL' ][ $pos ], $t );
				}
				else {
					$res[ 'MySQL' ][ $pos ] = $t;
				}
			}
		}
		$res[ 'WebServer' ] = array();
		foreach( $tests[ 'WebServer' ] as $pos ) {
			$pos = str_replace( ' ', '_', strtolower( $pos ) );
			if ( isset( $arrs[ $pos ] ) ) {
				if ( isset( $arrs[ $pos ][ $pos ] ) ) {
					$t = $arrs[ $pos ][ $pos ];
				}
				else {
					$t = $arrs[ $pos ];
				}
				if ( is_array( $t ) ) {
					$z = array_keys( $t );
					if ( strtolower( $z[ 0 ] ) == $pos ) {
						$t = $t[ $z[ 0 ] ];
					}
				}
				if ( isset( $res[ 'WebServer' ][ $pos ] ) ) {
					$res[ 'WebServer' ][ $pos ] = array_merge( $res[ 'WebServer' ][ $pos ], $t );
				}
				else {
					$res[ 'WebServer' ][ $pos ] = $t;
				}
			}
		}
		$res[ 'Admin' ] = array();
		foreach( $tests[ 'Admin' ] as $pos ) {
			$pos = str_replace( ' ', '_', strtolower( $pos ) );
			if ( isset( $arrs[ $pos ] ) ) {
				if ( isset( $arrs[ $pos ][ $pos ] ) ) {
					$res[ 'Admin' ][ $pos ] = $arrs[ $pos ][ $pos ];
				}
				else {
					$res[ 'Admin' ][ $pos ] = $arrs[ $pos ];
				}
			}
		}
		$xml = SarrToXML( $res );
		$fp = fopen( $file, 'w' );
		fwrite( $fp, $xml );
		fclose( $fp );
		$zfile = sobi2Config::translatePath( 'includes|' . $f, 'adm', false, '.zip' );
		sobi2Config::import( 'administrator|includes|pcl|pclzip.lib', 'root' );
		$archive = new PclZip( $zfile );
		$list = $archive->create( $file, PCLZIP_OPT_REMOVE_ALL_PATH );
		?>
<div style="width: 800px; margin: 15px;text-align:left;">
<h3>File has been created. If you like to review this file before
sending it to Sigsiu.NET please click here: <a
	href="components/com_sobi2/includes/<?php
		echo $f;
		?>.xml"
	target="_blank"><?php
		echo $f;
		?>.xml</a> <br />
<br />
Please hit the button below to send this file to Sigsiu.NET<br />
This file will be sent as email attachment to reports@Sigsiu.NET<br />
<br />
You can find the actually published evaluation of these statistics on the <a href="http://www.sigsiu.net/statistics/" target="_blank">Sigsiu.NET</a> site.
<br />
If you would like to be informed about updates of these statistics,
<b style="color: blue">follow us on Twitter here: <a href="http://twitter.com/neo_sigsiu_net" target="_blank">neo_sigsiu_net</a>
&nbsp;<a href="http://twitter.com/neo_sigsiu_net" target="_blank"><img style="border-style:none;" alt="" src="components/com_sobi2/images/twitter.gif"/></a>
</b>
<br />
<br />
<input type="button" id="StatBt" class="button"
	style="width: 150px; font-size: 18px" value="Send Report"
	onclick="document.location.href = 'index2.php?option=com_sobi2&task=_stats&f=send';" />&nbsp;
</h3>
</div>
<?php
	}

	function screen ()
	{
		$tests = array();
		$tests[ 'CMS' ] = array( 'CMS Name', 'CMS Version', 'SEF', 'Cache', 'FTP Layer' );
		$tests[ 'PHP' ] = array(
				/* basic information */
				'Version', 'Interface', 'Register Globals', 'Error Reporting', 'Memory Limit', 'URL open', 'CURL', // curl_getinfo
'File Uploads', 'Max Execution Time', 'Max Input Time', 'Post Max Size', 'Upload Max Filesize', 'Basedir', 'Dynamic Library', 'Magic Quotes',
				/* functions */
				'Exec', // escapeshellarg, escapeshellcmd, exec, passthru, proc_close, proc_get_status, proc_nice, proc_open, proc_terminate, shell_exec, system
'Eval',
				/* libraries */
				'PEAR', 'XML', // XML Parser = > xml_parse / XMLReader class / XMLWriter class / XSLTProcessor class / XSLT class / SimpleXML
'XSL', //
'APC', // apc_add - Alternative PHP Cache
/* images */
		'Exif', // read_exif_data
'Image GD', // gd_info
'Imagick', //class  Imagick
/* mails */
		'IMAP', // imap_mail
/* media files */
		/* communication services */
		'FTP', // ftp_connect
'XML-RPC', // xmlrpc_encode
'SOAP', // class SoapServer
'Sockets', 'JSON', // json_decode
'Service Data Objects', // class SDO_Model_ReflectionDataObject - Service Data Objects
'SDO XML', // class SDO_DAS_XML
'WDDX', // wddx_add_vars
/* tools */
		'Gettext', // gettext
'Multibyte Support', 'Tokenizer', // token_get_all
'OpenSSL', 'POSIX', // posix_access
'Pspell', // pspell_check
'iconv', // iconv
'Bzip2', // bzopen
'Zip', // class ZipArchive
'Zlib', // gzopen
'Calendar Functions', // cal_days_in_month
'File Information', // finfo_open
'Mimetype', // mime_content_type
'PDF', // PDF_concat
'PostScript', // ps_fill
'Tidy', // class tidy
'DOM', // class DOMAttr
/* system tools */
		'Shared Memory', // shmop_open
'PCNTL', // Process Control pcntl_exec
'SPL', // Standard PHP Library
'Memcache' ); // class Memcache Memcached
		$tests[ 'MySQL' ] = array( 'Client Version', 'Server Version', 'Procedure', 'Function', 'Trigger', 'View', 'Engines' );
		$tests[ 'WebServer' ] = array( 'Name', 'Platform' );
		$tests[ 'Admin' ] = array( 'Browser' );
		$config = & sobi2Config::getInstance();
		?>
<link rel='stylesheet'
	href='/administrator/components/com_sobi2/includes/admin.sobi2.css'
	type='text/css' />
<style type="text/css">
td {
	font-size: 11px;
	font-family: Verdana, Helvetica, Arial;
}
</style>
<script type='text/javascript'
	src='<?php
		echo $config->liveSite;
		?>/administrator/components/com_sobi2/includes/advajax.js'></script>
<script>
						var StatCount = 0;
						var Retries = 0;
						function StatStart()
						{
							e = SP_class( 'statInner' );
							document.getElementById( 'StatBt' ).disabled = true;
							document.getElementById( 'StatSp' ).innerHTML = '<img src="<?php
		echo $config->liveSite;
		?>/components/com_sobi2/images/spinner.gif">';
							for( var i = 0, j = e.length; i < j; i++ ) {
								Stats( e[ i ] );
							}
						}
						function Send()
						{
							if( StatCount == 0 ) {
								document.getElementById( 'StatBt' ).onclick = function() { document.location.href = 'index2.php?option=com_sobi2&task=_stats&f=cFile' } ;
								document.getElementById( 'StatBt' ).value = "Next >> ";
								document.getElementById( 'StatBt' ).disabled = false;
								document.getElementById( 'StatSp' ).innerHTML = '';
								document.getElementById( 'StatMsg' ).innerHTML = 'Done ! Please press now the "Next >>" button above.'
							}
							else {
								document.getElementById( 'StatMsg' ).innerHTML = 'Wait please ... ' + StatCount + ' processes are still running';
							}
						}
						function Stats( el )
						{
							var start = new Date().getTime();
							for ( var i = 0; i < 1e7; i++ ) {
							      if ( ( new Date().getTime() - start ) > ( 10 ) ){
							            break;
							      }
							}
							var spinner = '<img src="<?php
		echo $config->liveSite;
		?>/components/com_sobi2/images/spinner.gif">';
							StatCount++;
							el.innerHTML = spinner;
							advAJAX.get(
							{
								url: "index2.php?option=com_sobi2&task=_stats&f=" + el.id,
								timeout: 50000,
			 					onTimeout: function()
			 					{
			 						StatCount--;
			 						el.innerHTML = 'Connection timed out.';
									Send();

			 					},
			 					retry: 5,
			 					retryDelay: 2000,
			 					onRetry: function()
			 					{
			 						el.innerHTML = spinner + 'Retry connection...';
			 					},
			 					onRetryDelay: function()
			 					{
			 						el.innerHTML = 'Awaiting retry...';
			 					},
			 					onError: function( obj )
			 					{
			 						el.innerHTML = 'Error ... ' + obj.status;
			 						StatCount--;
			 						Send();
			 					},
			 					onSuccess: function( obj )
			 					{
			 						if( obj.responseText.length < 1000 ) {
			 							el.innerHTML = obj.responseText;
										StatCount--;
										Send();
			 						}
			 						else {
			 							Retries++;
			 							if( Retries < 25 ) {
				 							el.innerHTML = 'Too long answer';
			 								StatCount--;
			 								Stats( el );
			 							}
			 							else {
			 								el.innerHTML = 'Too long answer. Limit expired. Skipping';
			 								StatCount--;
											Send();
			 							}
			 						}
			 					}
							} );
						 }
						 function SP_class( name )
						 {
						    var elements 	= [];
						    var filter 		= new RegExp( '\\b' + name + '\\b' );
						    var e 			= document.getElementsByTagName( "*" );
						    for( var i = 0, j = e.length; i < j; i++ ) {
						        if( filter.test( e[ i ].className ) ) {
						        	elements.push( e[ i ] );
						        }
						    }
						    return elements;
						 }
					</script>
<div style="width: 800px; margin: 15px; text-align:left;">
<h2 style="line-height: 2em; color: blue;">We need you !!</h2>
<span id="explStat"> PHP, MySQL and Joomla! provide a lot of great and
very useful functionality. We are going to revise the Sobi2 roadmap and
plan to add new features into the component.<br />
<br />
To add new features it is very helpful to deploy this functionality.
However, very often some Sobi2 functions cause problems because Sobi2 is
installed on servers which does not provide libraries we use in Sobi2.<br />
<br />
Therefore we want to ask you to provide all necessary information about
the server you are using. Based on these information we are going to
create a statistic which will help us with further Sobi2 development.<br />
<br />
<ul style="margin-top: 0pt; margin-bottom: 0pt;">
	<li>Please hit the button below to start collecting information about
	your webserver, PHP, MySQL and CMS.</li>
	<li>You will see the progress of this operation below.</li>
	<li>After all information are collected, please hit the button again to
	go to step 2.</li>
	<li>A XML file will be created. You will be able to review this file
	before sending it.</li>
	<li>After the file has been created, please hit the "Send Report"
	button. The XML file will be sent to us by email.</li>
</ul>
<br />
Notice: This file does not contain any personal information like email
addresses, passwords, user names or site address or&nbsp;any other
information which could be used to identify you. Should some personal
information be included within this file, we&nbsp;guarantee that we
won't use it.*<br />
Also we don't use your sender email address in any way.<br />
<br />
You can find the actually published evaluation of these statistics on the <a href="http://www.sigsiu.net/statistics/" target="_blank">Sigsiu.NET</a> site.
<br />
If you would like to be informed about updates of these statistics,
<b style="color: blue">follow us on Twitter here: <a href="http://twitter.com/neo_sigsiu_net" target="_blank">neo_sigsiu_net</a>
&nbsp;<a href="http://twitter.com/neo_sigsiu_net" target="_blank"><img style="border-style:none;" alt="" src="components/com_sobi2/images/twitter.gif"/></a>
</b>
<br />
<br />
*Sometimes i.e. parts of the server address can be included in the
kernel name. </span>
<h4 style="line-height: 2em; height: 35px; font-size: 18px">Start
collecting information: <input style="width: 100px; font-size: 15px"
	type="button" id="StatBt" class="button" value="Process"
	onclick="StatStart();" />&nbsp;</h4>
<div
	style="min-width: 100px; height: 35px; margin-left: 10px; font-size: 18px; color: blue;">
<span id="StatSp"></span> <span id="StatMsg"></span></div>
</div>
<div style="width: 800px; margin: 15px;text-align:left;" id="progrStat">
			<?php
		foreach( $tests as $section => $functions ) {
			sobi2Stats::ROW( $section, $functions );
		}
		?>
			</div>
<?php
	}

	function ROW ( $row, $functions )
	{
		?>
<table class="SobiAdminForm" width="100%">
	<colgroup>
		<col width="3%" align="center">
		<col width="20%" align="center">
		<col width="35%" align="center">
	</colgroup>
	<tr>
		<th colspan="3">
								<?php
		echo $row;
		?> Settings / Info
				</th>
	</tr>
			<?php
		$c = 0;
		foreach( $functions as $function ) {
			$c ++;
			$style = $c % 2 ? 'class="row0" ' : 'class="row1"';
			$id = str_replace( ' ', '_', strtolower( $function ) );
			?>
					<tr <?php
			echo $style;
			?>>
		<td>&nbsp;</td>
		<td>
							<?php
			echo $function;
			?>
						</td>
		<td>
		<div class="statInner" id="<?php
			echo $id;
			?>"
			style="height: 20px;"></div>
		</td>
	</tr>
					<?php
		}
		?>
			</table>
<?php
	}

	function save ( $values, $msg, $img = 'info' )
	{
		static $lock = false;
		while ( $lock );
		$co = ( microtime() - time() ) / 1000;
		$co = explode( '.', $co );
		$co = ( $co[ 1 ] * - 1 ) - rand( 5, 15 );
		$a = array_keys( $values );
		$vals[ strtolower( $a[ 0 ] ) ] = $values;
		$obj = base64_encode( serialize( $vals ) );
		$config = & sobi2Config::getInstance();
		$database = & $config->getDb();
		$time = time();
		$size = count( $vals, COUNT_RECURSIVE );
		$strlen = strlen( $obj );
		$query = "INSERT IGNORE INTO `{$config->DBprefix}sobi2_cobj`
		( `atime` , `sid` , `cid` , `svars` , `oid` , `cl` , `params` , `slang` , `schecksum` )
		VALUES ( {$time}, $co, $co, '{$obj}', $co, $co, '{$a[0]}', 'sysstat', '{$size}' );";
		if ( defined( "_SOBI_MAMBO" ) ) {
			$database->_sql = $query;
		}
		else {
			$database->setQuery( $query );
		}
		$database->query();
		$lock = false;
		switch ( $img )
		{
			case 'ok':
				$img = "<img src=\"{$config->liveSite}/administrator/images/tick.png\" />";
				break;
			case 'no':
				$img = "<img src=\"{$config->liveSite}/administrator/images/publish_x.png\" />";
				break;
			case 'info':
				$img = "<img src=\"{$config->liveSite}/administrator/images/publish_g.png\" />";
				break;
		}
		ob_end_clean();
		echo "<div style=\"float:left;\">{$img}</div><div style=\"float:left; min-width: 100px;  padding-top: 2px; margin-left: 4px; \"><b>{$msg}</b></div>";
	}

	function _version ()
	{
		$v = explode( '.', PHP_VERSION );
		$cfg = array();
		$cfg[ 'version' ] = array( 'major' => $v[ 0 ], 'minor' => $v[ 1 ], 'build' => $v[ 2 ] );
		//		$cfg[ 'usage' ] = getrusage();
		sobi2Stats::save( array( 'php_info' => $cfg ), PHP_VERSION );
	}

	function _error_reporting ()
	{
		$cfg = ini_get_all();
		sobi2Stats::save( array( 'error_reporting' => array( 'error_reporting' => $cfg[ 'error_reporting' ], 'display_errors' => $cfg[ 'display_errors' ] ) ), implode( ' | ', $cfg[ 'error_reporting' ] ) );
	}

	function _interface ()
	{
		sobi2Stats::save( array( 'SAPI' => php_sapi_name() ), php_sapi_name() );
	}

	function _memory_limit ()
	{
		$cfg = ini_get_all();
		sobi2Stats::save( array( 'memory_limit' => $cfg[ 'memory_limit' ] ), implode( ' | ', $cfg[ 'memory_limit' ] ) );
	}

	function _curl ()
	{
		if ( function_exists( 'curl_init' ) ) {
			$cfg[ 'available' ] = 'available';
			set_time_limit( 15 );
			$cfg[ 'version' ] = curl_version();
			$c = curl_init( "http://www.sigsiu.net/sobi2/test" );
			if ( $c !== false ) {
				$fp = fopen( "temp.txt", "w" );
				curl_setopt( $c, CURLOPT_MUTE, true );
				curl_setopt( $c, CURLOPT_FILE, $fp );
				curl_setopt( $c, CURLOPT_HEADER, 0 );
				curl_exec( $c );
				$cfg[ 'response' ] = curl_getinfo( $c );
				$i = ", &nbsp;Sigsiu.NET answer code was: " . $cfg[ 'response' ][ 'http_code' ];
				$c = 'ok';
				fclose( $fp );
				unlink( "temp.txt" );
			}
			else {
				$cfg[ 'response' ] = curl_getinfo( $c );
				$cfg[ 'error' ] = curl_error( $c );
				$cfg[ 'available' ] = 'available but not usable';
				$c = 'no';
			}
		}
		else {
			$cfg[ 'available' ] = 'not available';
			$c = 'no';
		}
		sobi2Stats::save( array( 'curl' => $cfg ), $cfg[ 'available' ] . ' ' . $i, $c );
	}

	function _url_open ()
	{
		$cfg = ini_get_all();
		$i = 'no';
		if ( $cfg[ 'allow_url_fopen' ][ 'global_value' ] || $cfg[ 'allow_url_fopen' ][ 'local_value' ] ) {
			set_time_limit( 15 );
			$handle = fopen( 'http://www.sigsiu.net/sobi2/test', 'r' );
			$contents = fread( $handle, 1000 );
			if ( strlen( $contents ) ) {
				$i = 'ok';
			}
			$cfg[ 'allow_url_fopen' ][ 'response' ] = $i;
		}
		sobi2Stats::save( array( 'allow_url_fopen' => $cfg[ 'allow_url_fopen' ] ), ( $i == 'ok' ? 'available' : 'disabled' ), $i );
	}

	function _register_globals ()
	{
		$i = ini_get( 'register_globals' ) ? 'available' : 'disabled';
		sobi2Stats::save( array( 'rg' => $i ), $i, ( ini_get( 'register_globals' ) ? 'no' : 'ok' ) );
	}

	function _file_uploads ()
	{
		$cfg = ini_get_all();
		sobi2Stats::save( array( 'file_uploads' => $cfg[ 'file_uploads' ] ), implode( ' | ', $cfg[ 'file_uploads' ] ), ( ( $cfg[ 'file_uploads' ][ 'local_value' ] || $cfg[ 'file_uploads' ][ 'global_value' ] ) ? 'ok' : 'no' ) );
	}

	function _max_input_time ()
	{
		$cfg = ini_get_all();
		sobi2Stats::save( array( 'max_input_time' => $cfg[ 'max_input_time' ] ), implode( ' | ', $cfg[ 'max_input_time' ] ) );
	}

	function _max_execution_time ()
	{
		$cfg = ini_get_all();
		sobi2Stats::save( array( 'max_execution_time' => $cfg[ 'max_execution_time' ] ), implode( ' | ', $cfg[ 'max_execution_time' ] ) );
	}

	function _dynamic_library ()
	{
		$cfg = ini_get_all();
		$m = implode( ' | ', $cfg[ 'enable_dl' ] );
		$cfg = array( 'dl' => $cfg[ 'enable_dl' ] );
		$l = get_loaded_extensions();
		$cfg[ 'dl' ][ 'loaded' ] = array();
		foreach( $l as $ext ) {
			$cfg[ 'dl' ][ 'loaded' ][ $ext ] = get_extension_funcs( $ext );
		}
		// need to spare a bit time and place - std function, we know all the functions
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'standard' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'standard' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'session' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'session' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'sockets' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'sockets' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'pspell' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'pspell' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'posix' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'posix' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'iconv' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'iconv' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'gmp' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'gmp' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'ftp' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'ftp' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'date' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'date' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'curl' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'curl' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'calendar' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'calendar' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'openssl' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'openssl' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'apache2handler' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'apache2handler' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'gd' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'gd' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'imap' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'imap' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'ldap' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'ldap' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'mbstring' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'mbstring' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'mysql' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'mysql' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'mysqli' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'mysqli' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'xmlrpc' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'xmlrpc' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'xmlwriter' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'xmlwriter' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'xmlwriter' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'xmlwriter' ] );
		}
		if ( isset( $cfg[ 'dl' ][ 'loaded' ][ 'gettext' ] ) ) {
			unset( $cfg[ 'dl' ][ 'loaded' ][ 'gettext' ] );
		}
		sobi2Stats::save( $cfg, $m, ( ( $cfg[ 'dl' ][ 'local_value' ] || $cfg[ 'dl' ][ 'global_value' ] ) ? 'ok' : 'no' ) );
	}

	function _post_max_size ()
	{
		$cfg = ini_get_all();
		sobi2Stats::save( array( 'post_max_size' => $cfg[ 'post_max_size' ] ), implode( ' | ', $cfg[ 'post_max_size' ] ) );
	}

	function _basedir ()
	{
		$cfg = ini_get_all();
		$cfg[ 'open_basedir' ][ 'global_value' ] = isset( $cfg[ 'open_basedir' ][ 'global_value' ] ) && strlen( $cfg[ 'open_basedir' ][ 'global_value' ] ) ? 'defined' : 'not defined';
		$cfg[ 'open_basedir' ][ 'local_value' ] = isset( $cfg[ 'open_basedir' ][ 'local_value' ] ) && strlen( $cfg[ 'open_basedir' ][ 'local_value' ] ) ? 'defined' : 'not defined';
		sobi2Stats::save( array( 'open_basedir' => $cfg[ 'open_basedir' ] ), implode( ' | ', $cfg[ 'open_basedir' ] ) );
	}

	function _exec ()
	{
		$i = 'disabled';
		$cmd = 'date';
		$cfg = array( 'shell' => array() );
		$n = null;
		if ( function_exists( 'exec' ) ) {
			set_time_limit( 15 );
			$cfg[ 'shell' ][ 'exec' ] = trim( exec( $cmd, $n ) );
			$i = 'available';
		}
		if ( function_exists( 'shell_exec' ) ) {
			set_time_limit( 15 );
			$cfg[ 'shell' ][ 'shell_exec' ] = trim( shell_exec( $cmd ) );
			$i = 'available';
		}
		if ( function_exists( 'system' ) ) {
			set_time_limit( 15 );
			$cfg[ 'shell' ][ 'system' ] = trim( system( $cmd, $n ) );
			$i = 'available';
		}
		sobi2Stats::save( $cfg, $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _magic_quotes ()
	{
		$cfg = ini_get_all();
		$m = implode( ' | ', $cfg[ 'magic_quotes_gpc' ] );
		$cfg = array( 'magic_quotes_gpc' => $cfg[ 'magic_quotes_gpc' ], 'magic_quotes_runtime' => $cfg[ 'magic_quotes_runtime' ], 'magic_quotes_sybase' => $cfg[ 'magic_quotes_sybase' ] );
		sobi2Stats::save( array( 'magic_quotes' => $cfg ), $m, ( ( $cfg[ 'magic_quotes_gpc' ][ 'local_value' ] || $cfg[ 'magic_quotes_gpc' ][ 'global_value' ] ) ? 'ok' : 'no' ) );
	}

	function _upload_max_filesize ()
	{
		$cfg = ini_get_all();
		sobi2Stats::save( array( 'upload_max_filesize' => $cfg[ 'upload_max_filesize' ] ), implode( ' | ', $cfg[ 'upload_max_filesize' ] ) );
	}

	function _java ()
	{
		$cmd = 'java -version';
		$cfg = array( 'java' => array() );
		$i = null;
		if ( function_exists( 'exec' ) ) {
			$n = null;
			set_time_limit( 15 );
			$cfg[ 'java' ] = sobi2_ereg_replace( "[^a-zA-Z0-9 ]", '', trim( exec( $cmd, $n ) ) );
			$i = $cfg[ 'java' ];
		}
		sobi2Stats::save( $cfg, ( strlen( $i ) ? $i : 'not available' ), ( strlen( $i ) ? 'ok' : 'no' ) );
	}

	function _xml ()
	{
		// Turn off all error reporting
		$i = array();
		$cfg = array();
		$inf = 'not available';
		$cfg[ 'xml' ] = array();
		if ( class_exists( 'DOMDocument' ) ) {
			$inf = 'available';
			$cfg[ 'xml' ][ 'DOMDocument' ] = 'available';
		}
		else {
			$cfg[ 'xml' ][ 'DOMDocument' ] = 'not available';
		}
		if ( function_exists( 'xml_parse' ) ) {
			$inf = 'available';
			$cfg[ 'xml' ][ 'XML_Parser' ] = 'available';
		}
		else {
			$cfg[ 'xml' ][ 'XML_Parser' ] = 'not available';
		}
		if ( class_exists( 'XMLReader' ) ) {
			$inf = 'available';
			$cfg[ 'xml' ][ 'XMLReader' ] = 'available';
		}
		else {
			$cfg[ 'xml' ][ 'XMLReader' ] = 'not available';
		}
		if ( class_exists( 'XMLWriter' ) ) {
			$cfg[ 'xml' ][ 'XMLWriter' ] = 'available';
		}
		else {
			$cfg[ 'xml' ][ 'XMLWriter' ] = 'not available';
		}
		if ( class_exists( 'SimpleXML' ) ) {
			$inf = 'available';
			$cfg[ 'xml' ][ 'SimpleXML' ] = 'available';
		}
		else {
			$cfg[ 'xml' ][ 'SimpleXML' ] = 'not available';
		}
		if ( function_exists( 'qdom_tree' ) ) {
			$cfg[ 'xml' ][ 'qdom_tree' ] = 'available';
		}
		else {
			$cfg[ 'xml' ][ 'qdom_tree' ] = 'not available';
		}
		if ( class_exists( 'SDO_DAS_XML' ) ) {
			$cfg[ 'xml' ][ 'SDO_XML' ] = 'available';
		}
		else {
			$cfg[ 'xml' ][ 'SDO_XML' ] = 'not available';
		}
		sobi2Stats::save( array( 'xml' => $cfg ), $inf, ( $inf == 'available' ? 'ok' : 'no' ) );
	}

	function _eval ()
	{
		set_time_limit( 15 );
		$e = base64_encode( '$str = "available";' );
		eval( base64_decode( $e ) );
		if ( isset( $str ) ) {
			$r = $str;
			$i = 'ok';
		}
		else {
			$r = 'not usable';
			$i = 'no';
		}
		sobi2Stats::save( array( 'eval' => $r ), $r, $i );
	}

	function _pear ()
	{
		$r = 'not installed';
		$i = 'no';
		$cfg = array( 'pear' => array() );
		if ( class_exists( 'PEAR' ) ) {
			$cfg[ 'pear' ][ 'installed' ] = 'yes';
			$r = 'installed';
			$i = 'ok';
		}
		sobi2Stats::save( $cfg, $r, $i );
	}

	function _xsl ()
	{
		set_error_handler( '_sdummy' );
		$in = array();
		$cfg = array();
		$i = 'not available';
		if ( class_exists( 'XSLTProcessor' ) ) {
			$i = 'available';
			$in[ 'XSLTProcessor' ] = 'available';
		}
		else {
			$in[ 'XSLTProcessor' ] = 'not available';
		}
		if ( ! class_exists( 'XSLTProcessor' ) ) {
			if ( @dl( 'xsl' ) && class_exists( 'XSLTProcessor' ) ) {
				$i = 'available';
				$in[ 'Load_XSLTProcessor' ] = 'loaded';
			}
			else {
				$in[ 'Load_XSLTProcessor' ] = 'not loaded';
			}
		}
		if ( function_exists( 'xslt_backend_info' ) ) {
			$in[ 'xslt_backend_info' ] = 'available';
		}
		else {
			$in[ 'xslt_backend_info' ] = 'not available';
		}
		if ( function_exists( 'domxml_xslt_stylesheet' ) ) {
			$in[ 'domxml_xslt_stylesheet' ] = 'available';
		}
		else {
			$in[ 'domxml_xslt_stylesheet' ] = 'not available';
		}
		if ( ! class_exists( 'domxml_xslt_stylesheet' ) ) {
			if ( @dl( 'domxsl' ) && class_exists( 'domxml_xslt_stylesheet' ) ) {
				$i = 'available';
				$in[ 'Load_domxml_xslt_stylesheet' ] = 'loaded';
			}
			else {
				$in[ 'Load_domxml_xslt_stylesheet' ] = 'not loaded';
			}
		}
		if ( ( strtoupper( substr( PHP_OS, 0, 3 ) ) === 'WIN' && class_exists( 'COM' ) && $th = new COM( 'MSXML2.XSLTemplate.4.0' ) ) ) {
			$in[ 'MSXSL_Com' ] = 'available';
		}
		elseif ( ! strtoupper( substr( PHP_OS, 0, 3 ) ) === 'WIN' || ! class_exists( 'COM' ) ) {
			$in[ 'MSXSL_Com' ] = 'not applicable';
		}
		else {
			$in[ 'MSXSL_Com' ] = 'not available';
		}
		if ( function_exists( 'xsl_xsltprocessor_import_stylesheet' ) ) {
			$in[ 'xsl_xsltprocessor_import_stylesheet' ] = 'available';
		}
		else {
			$in[ 'xsl_xsltprocessor_import_stylesheet' ] = 'not available';
		}
		if ( function_exists( 'xslt_create' ) ) {
			$in[ 'xslt_create' ] = 'available';
		}
		else {
			$in[ 'xslt_create' ] = 'not available';
		}
		if ( ! class_exists( 'xslt_create' ) ) {
			if ( @dl( 'xslt' ) && class_exists( 'xslt_create' ) ) {
				$i = 'available';
				$in[ 'Load_xslt_create' ] = 'loaded';
			}
			else {
				$in[ 'Load_xslt_create' ] = 'not loaded';
			}
		}
		if ( function_exists( 'exec' ) ) {
			$c = trim( @exec( 'which sabcmd' ) );
			$in[ 'XSLT_SAXON_CMD' ] = strlen( $c ) ? $c : 'not available';
		}
		else {
			$in[ 'XSLT_SAXON_CMD' ] = 'not available';
		}
		if ( function_exists( 'exec' ) ) {
			$c = trim( @exec( 'which xsltproc' ) );
			$in[ 'XSLT_XSLTPROC_CMD' ] = strlen( $c ) ? $c : 'not available';
		}
		else {
			$in[ 'XSLT_XSLTPROC_CMD' ] = 'not available';
		}
		$cfg[ 'xsl' ] = $in;
		sobi2Stats::save( array( 'xsl' => $cfg ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _bytecode_compiler ()
	{
		$i = 'not available';
		$cmd = 'date';
		$cf = array( 'xml' => array() );
		if ( function_exists( 'bcompiler_load' ) ) {
			$i = 'available';
		}
		sobi2Stats::save( array( 'bytecode_compiler' => array( 'available' => $i ) ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _apc ()
	{
		$i = 'not available';
		if ( function_exists( 'apc_add' ) ) {
			$i = 'available';
		}
		sobi2Stats::save( array( 'apc' => array( 'available' => $i ) ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _common ( $t, $f, $c = 'function' )
	{
		$i = 'not available';
		$c = "{$c}_exists";
		if ( $c( $f ) ) {
			$i = 'available';
		}
		sobi2Stats::save( array( $t => array( 'available' => $i ) ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _exif ()
	{
		sobi2Stats::_common( 'exif', 'exif_read_data' );
	}

	function _imagick ()
	{
		sobi2Stats::_common( 'imagick', 'Imagick', 'class' );
	}

	function _image_gd ()
	{
		$i = 'not available';
		$a = array( 'available' => &$i );
		if ( function_exists( 'gd_info' ) ) {
			$i = 'available';
			$a[ 'available' ] = $i;
			$a[ 'info' ] = gd_info();
		}
		sobi2Stats::save( array( 'image_gd' => $a ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _mailparse ()
	{
		sobi2Stats::_common( 'mailparse', 'mailparse_msg_create' );
	}

	function _amarok ()
	{
		sobi2Stats::_common( 'amarok', 'KTaglib_Tag', 'class' );
	}

	function _cyrus ()
	{
		sobi2Stats::_common( 'cyrus', 'cyrus_query' );
	}

	function _imap ()
	{
		sobi2Stats::_common( 'imap', 'imap_mail' );
	}

	function _id3 ()
	{
		sobi2Stats::_common( 'id3', 'id3_get_tag' );
	}

	function _openal ()
	{
		sobi2Stats::_common( 'openal', 'openal_buffer_get' );
	}

	function _xml_rpc ()
	{
		sobi2Stats::_common( 'xml-rpc', 'xmlrpc_encode' );
	}

	function _soap ()
	{
		sobi2Stats::_common( 'soap', 'SoapServer', 'class' );
	}

	function _service_data_objects ()
	{
		sobi2Stats::_common( 'service_data_objects', 'SDO_Model_ReflectionDataObject', 'class' );
	}

	function _json ()
	{
		sobi2Stats::_common( 'json', 'json_decode' );
	}

	function _wddx ()
	{
		sobi2Stats::_common( 'wddx', 'wddx_add_vars' );
	}

	function _sdo_xml ()
	{
		sobi2Stats::_common( 'sdo_xml', 'SDO_DAS_XML', 'class' );
	}

	function _gettext ()
	{
		sobi2Stats::_common( 'gettext', 'gettext' );
	}

	function _gmp ()
	{
		sobi2Stats::_common( 'gmp', 'gmp_abs' );
	}

	function _multibyte_support ()
	{
		sobi2Stats::_common( 'multibyte_support', 'mb_strstr' );
	}

	function _tokenizer ()
	{
		sobi2Stats::_common( 'tokenizer', 'token_get_all' );
	}

	function _iconv ()
	{
		sobi2Stats::_common( 'iconv', 'iconv' );
	}

	function _gnu_recode ()
	{
		sobi2Stats::_common( 'gnu_recode', 'recode' );
	}

	function _phar ()
	{
		sobi2Stats::_common( 'phar', 'Phar', 'class' );
	}

	function _calendar_functions ()
	{
		sobi2Stats::_common( 'calendar_functions', 'cal_days_in_month' );
	}

	function _haru_pdf ()
	{
		sobi2Stats::_common( 'haru_pdf', 'HaruDoc', 'class' );
	}

	function _gnu_privacy_guard ()
	{
		sobi2Stats::_common( 'gnu_privacy_guard', 'HaruDoc', 'class' );
	}

	function _xdiff ()
	{
		sobi2Stats::_common( 'xdiff', 'xdiff_file_diff' );
	}

	function _postscript ()
	{
		sobi2Stats::_common( 'postscript', 'ps_fill' );
	}

	function _forms_data_format ()
	{
		sobi2Stats::_common( 'forms_data_format', 'fdf_create' );
	}

	function _statistics ()
	{
		sobi2Stats::_common( 'statistics', 'stats_cdf_f' );
	}

	function _shockwave_flash ()
	{
		sobi2Stats::_common( 'shockwave_flash', 'swf_openfile' );
	}

	function _pdf ()
	{
		sobi2Stats::_common( 'pdf', 'PDF_concat' );
	}

	function _geo_ip_location ()
	{
		sobi2Stats::_common( 'geo_ip_location', 'geoip_db_avail' );
	}

	function _ming ()
	{
		sobi2Stats::_common( 'ming', 'SWFButton', 'class' );
	}

	function _tidy ()
	{
		sobi2Stats::_common( 'tidy', 'tidy', 'class' );
	}

	function _dom ()
	{
		sobi2Stats::_common( 'DOM', 'DOMAttr', 'class' );
	}

	function _spl ()
	{
		sobi2Stats::_common( 'SPL', 'SplFileInfo', 'class' );
	}

	function _http ()
	{
		sobi2Stats::_common( 'Http', 'HttpMessage', 'class' );
	}

	function _fam ()
	{
		sobi2Stats::_common( 'FAM', 'fam_open' );
	}

	function _memcache ()
	{
		sobi2Stats::_common( 'Memcache', 'Memcache', 'class' );
	}

	function _sockets ()
	{
		$cfg = array();
		if ( function_exists( 'socket_create' ) ) {
			$cfg[ 'available' ] = 'available';
			$address = 'sigsiu-net.de';
			$port = 2809;
			set_time_limit( 15 );
			if ( ( $socket = socket_create( AF_INET, SOCK_STREAM, SOL_TCP ) ) !== false ) {
				$cfg[ 'created' ] = 'created';
				if ( ( socket_connect( $socket, $address, $port ) ) !== false ) {
					$cfg[ 'response' ] = trim( socket_read( $socket, 2048 ) );
					$i = ".  &nbsp;Server answer was: " . $cfg[ 'response' ];
					$c = 'ok';
					socket_close( $socket );
				}
				else {
					$cfg[ 'error' ] = socket_strerror( socket_last_error( $socket ) );
					$i = ".  &nbsp;Server answer was: " . $cfg[ 'error' ];
					$cfg[ 'available' ] = 'available but seems to be not usable';
					$c = 'no';
					socket_close( $socket );
				}
			}
			else {
				$cfg[ 'error' ] = socket_strerror( socket_last_error() );
				$cfg[ 'available' ] = 'available but seems to be not usable';
				$c = 'no';
			}
		}
		else {
			$cfg[ 'available' ] = 'disabled';
			$c = 'no';
		}
		sobi2Stats::save( array( 'sockets' => $cfg ), $cfg[ 'available' ] . $i, $c );
	}

	function _ftp ()
	{
		$cfg = array();
		$i = null;
		if ( function_exists( 'ftp_connect' ) ) {
			$cfg[ 'available' ] = 'available';
			$address = 'sigsiu-net.de';
			set_time_limit( 15 );
			if ( ( $ftp = ftp_connect( $address ) ) !== false ) {
				$cfg[ 'connected' ] = 'created';
				set_error_handler( '_sdummy' );
				if ( ( $login = @ftp_login( $ftp, 'ftp' ) ) !== false ) {
					$c = 'ok';
				}
				else {
					$i = ". &nbsp;Connection not possible";
					$cfg[ 'available' ] = 'available but seems to be not usable';
					$c = 'no';
				}
			}
			else {
				$i = ". &nbsp;Connection not possible";
				$cfg[ 'available' ] = 'available but seems to be not usable';
				$c = 'no';
			}
		}
		else {
			$cfg[ 'available' ] = 'disabled';
			$c = 'no';
		}
		sobi2Stats::save( array( 'ftp' => $cfg ), $cfg[ 'available' ] . $i, $c );
	}

	function _posix ()
	{
		$i = 'not available';
		$a = array( 'available' => &$i );
		if ( function_exists( 'posix_uname' ) ) {
			$i = 'available';
			$a[ 'info' ] = posix_uname();
			$a[ 'available' ] = $i;
		}
		sobi2Stats::save( array( 'posix' => $a ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _radius ()
	{
		sobi2Stats::_common( 'radius', 'radius_acct_open' );
	}

	function _pspell ()
	{
		$in = $i = 'not available';
		$c = 'no';
		$a = array( 'available' => &$i );
		if ( function_exists( 'pspell_check' ) ) {
			$i = 'available';
			$pspell_link = pspell_new( 'en' );
			$suggested = pspell_suggest( $pspell_link, 'busines' );
			$a[ 'response' ] = $suggested;
			$t = 0;
			$suggested = array();
			foreach( pspell_suggest( $pspell_link, 'busines' ) as $s ) {
				$suggested[] = $s;
				$t ++;
				if ( $t > 3 ) {
					break;
				}
			}
			if ( $t > 2 ) {
				$c = 'ok';
				$in = $i . ". &nbsp;Suggestion for 'busines': " . implode( ', ', $suggested );
			}
			else {
				$in = $i . 'available but seems to be not usable';
			}
			$a[ 'available' ] = $i;
		}
		sobi2Stats::save( array( 'pspell' => $a ), $in, $c );
	}

	function _openssl ()
	{
		sobi2Stats::_common( 'openssl', 'openssl_open' );
	}

	function _enchant_spelling_library ()
	{
		$i = 'not available';
		$c = 'no';
		$a = array( 'available' => &$i );
		if ( function_exists( 'enchant_dict_check' ) ) {
			$i = 'available';
			$dict = enchant_broker_init();
			$d = enchant_broker_request_dict( $dict, 'en_US' );
			$suggested = enchant_dict_suggest( $dict, 'busines' );
			$a[ 'info' ] = $suggested;
			$t = 0;
			$suggested = array();
			foreach( enchant_dict_suggest( $dict, 'busines' ) as $s ) {
				$suggested[] = $s;
				$t ++;
				if ( $t > 3 ) {
					break;
				}
			}
			if ( $t > 2 ) {
				$c = 'ok';
				$i .= ". &nbsp;Suggestion for 'busines': " . implode( ', ', $suggested );
			}
			else {
				$i = 'available but seems to be not usable';
			}
			$a[ 'available' ] = $i;
		}
		sobi2Stats::save( array( 'enchant_spelling_library' => $a ), $i, $c );
	}

	function _zip ()
	{
		sobi2Stats::_common( 'zip', 'ZipArchive', 'class' );
	}

	function _zlib ()
	{
		sobi2Stats::_common( 'zlib', 'gzcompress' );
	}

	function _bzip2 ()
	{
		sobi2Stats::_common( 'bzip2', 'bzcompress' );
	}

	function _international_domain_names ()
	{
		sobi2Stats::_common( 'international_domain_names', 'idn_to_utf8' );
	}

	function _file_information ()
	{
		$i = 'not available';
		$a = array( 'available' => &$i );
		if ( function_exists( 'finfo_open' ) ) {
			$i = 'available';
			$a[ 'info' ] = finfo_open( FILEINFO_MIME, __FILE__ );
			$a[ 'available' ] = $i;
		}
		sobi2Stats::save( array( 'file_information' => $a ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _mimetype ()
	{
		$i = 'not available';
		$a = array( 'available' => &$i );
		if ( function_exists( 'mime_content_type' ) ) {
			$i = 'available';
			$a[ 'info' ] = mime_content_type( __FILE__ );
			$a[ 'available' ] = $i;
		}
		sobi2Stats::save( array( 'mimetype' => $a ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _rar ()
	{
		sobi2Stats::_common( 'rar', 'rar_open' );
	}

	function _shared_memory ()
	{
		$i = 'not available';
		$a = array( 'available' => &$i );
		if ( function_exists( 'shmop_open' ) ) {
			set_time_limit( 15 );
			$i = 'available';
			$shm_id = shmop_open( 0xff3, 'c', 0644, 100 );
			$a[ 'size' ] = shmop_size( $shm_id );
			$a[ 'bytes_written' ] = shmop_write( $shm_id, serialize( "Testing shared memory \n" ), 0 );
			$a[ 'available' ] = $i;
			if ( $a[ 'bytes_written' ] != strlen( serialize( "Testing shared memory \n" ) ) ) {
				$i = 'available but not usable';
			}
			else {
				$a[ 'read' ] = sobi2_ereg_replace( "[^a-zA-Z0-9 ]", null, trim( unserialize( shmop_read( $shm_id, 0, strlen( serialize( "Testing shared memory \n" ) ) ) ) ) );
				if ( ! $a[ 'read' ] ) {
					$i = 'available but not usable';
				}
			}
			shmop_delete( $shm_id );
			shmop_close( $shm_id );
		}
		sobi2Stats::save( array( 'shared_memory' => $a ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _semaphore ()
	{
		sobi2Stats::_common( 'semaphore', 'sem_ get' );
	}

	function _pcntl ()
	{
		$i = 'not available';
		$a = array( 'available' => &$i );
		if ( function_exists( 'pcntl_fork' ) ) {
			$i = 'available';
			$a[ 'pid' ] = pcntl_fork();
		}
		sobi2Stats::save( array( 'pcntl' => $a ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _client_version ()
	{
		sobi2Stats::save( array( 'mysql_client_version' => array( 'mysql_client_version' => mysql_get_client_info() ) ), mysql_get_client_info() );
	}

	function _server_version ()
	{
		$c = & sobi2Config::getInstance();
		$d = & $c->getDb();
		sobi2Stats::save( array( 'mysql_server_version' => array( 'mysql_server_version' => $d->getVersion() ) ), $d->getVersion() );
	}

	function _procedure ()
	{
		$i = 'not available';
		$a = array( 'available' => &$i );
		$c = & sobi2Config::getInstance();
		$d = & $c->getDb();
		$d->setQuery( 'DROP PROCEDURE IF EXISTS StatProc' );
		$d->query();
		$d->setQuery( '
              CREATE PROCEDURE StatProc ( OUT resp INT )
              BEGIN
				    SELECT COUNT(*) INTO resp FROM #__sobi2_item;
              END
          ' );
		$d->query();
		if ( $d->getErrorNum() ) {
			$i = 'not available';
			$a[ 'available' ] = 'disabled';
			$a[ 'response' ] = strip_tags( $d->getErrorMsg() );
		}
		else {
			$i = 'available';
			$a[ 'available' ] = 'available';
			$d->setQuery( 'CALL StatProc( @a );' );
			$d->query();
			$d->setQuery( 'SELECT @a;' );
			$d->query();
			$a[ 'response' ] = $d->loadResult();
		}
		$d->setQuery( 'DROP PROCEDURE IF EXISTS StatProc' );
		$d->query();
		sobi2Stats::save( array( 'mysql_procedure' => $a ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _engines ()
	{
		$a = array();
		$c = & sobi2Config::getInstance();
		$d = & $c->getDb();
		$d->setQuery( 'SHOW ENGINES' );
		$d->query();
		$a[ 'available' ] = 'available';
		$l = array();
		$engines = $d->loadObjectList();
		foreach( $engines as $engine ) {
			$a[ 'engines' ][ $engine->Engine ][ 'support' ] = $engine->Support;
			$a[ 'engines' ][ $engine->Engine ][ 'comment' ] = $engine->Comment;
			if ( strtolower( $engine->Support ) == 'yes' ) {
				$l[] = $engine->Engine;
			}
		}
		$a[ 'engines' ] = $d->loadObjectList();
		sobi2Stats::save( array( 'mysql_engines' => $a ), implode( ' | ', $l ) );
	}

	function _function ()
	{
		$i = 'not available';
		$a = array( 'available' => &$i );
		$c = & sobi2Config::getInstance();
		$d = & $c->getDb();
		$d->setQuery( '
              CREATE FUNCTION StatFunc ( msg VARCHAR( 20 ) ) returns VARCHAR( 50 )
              BEGIN
				    RETURN ( "Hello in SQL Function" );
              END
          ' );
		$d->query();
		if ( $d->getErrorNum() ) {
			$i = 'not available';
			$a[ 'available' ] = 'not available';
			$a[ 'response' ] = strip_tags( $d->getErrorMsg() );
		}
		else {
			$i = 'available';
			$a[ 'available' ] = 'available';
			$d->setQuery( 'SELECT StatFunc( "Hi" )' );
			$a[ 'response' ] = $d->loadResult();
		}
		$d->setQuery( 'DROP FUNCTION IF EXISTS StatFunc' );
		$d->query();
		sobi2Stats::save( array( 'mysql_function' => $a ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _trigger ()
	{
		$i = 'not available';
		$a = array( 'available' => &$i );
		$c = & sobi2Config::getInstance();
		$d = & $c->getDb();
		$d->setQuery( '
              CREATE TRIGGER StatTrigger BEFORE INSERT ON #__sobi2_item
              FOR EACH ROW BEGIN
				    INSERT INTO #__sobi2_cache ( validtime , task , sid , cid , uid , limitstart , limitall , Itemid , section , params , html , opt , slang , schecksum ) VALUES(  "000", "task", "-999", "-999", "-999", "-99", "-99", "-999", "", "", "", "", "", "" );
              END
          ' );
		$d->query();
		if ( $d->getErrorNum() ) {
			$i = 'not available';
			$a[ 'available' ] = 'not available';
			$a[ 'response' ] = strip_tags( $d->getErrorMsg() );
		}
		else {
			$i = 'available';
			$a[ 'available' ] = 'available';
		}
		$d->setQuery( 'DROP TRIGGER IF EXISTS StatTrigger' );
		$d->query();
		sobi2Stats::save( array( 'mysql_trigger' => $a ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _view ()
	{
		$i = 'not available';
		$a = array( 'available' => &$i );
		$c = & sobi2Config::getInstance();
		$d = & $c->getDb();
		$d->setQuery( 'CREATE VIEW sView AS SELECT * FROM #__sobi2_item' );
		$d->query();
		if ( $d->getErrorNum() ) {
			$i = 'not available';
			$a[ 'available' ] = 'disabled';
			$a[ 'response' ] = strip_tags( $d->getErrorMsg() );
		}
		else {
			$i = 'available';
			$a[ 'available' ] = 'available';
			$d->setQuery( 'SELECT * FROM sView LIMIT 1' );
			$a[ 'response' ] = count( $d->loadResultArray() );
		}
		$d->setQuery( 'DROP VIEW sView' );
		$d->query();
		sobi2Stats::save( array( 'mysql_view' => $a ), $i, ( $i == 'available' ? 'ok' : 'no' ) );
	}

	function _name ()
	{
		$a = array();
		$a[ 'reported_software' ] = $_SERVER[ 'SERVER_SOFTWARE' ];
		if ( function_exists( 'apache_get_version' ) ) {
			$a[ 'apache_version' ] = apache_get_version();
		}
		if ( function_exists( 'iis_get_server_by_comment' ) ) {
			$a[ 'iis' ] = iis_get_server_by_comment();
		}
		if ( function_exists( 'nsapi_response_headers' ) ) {
			$a[ 'nsapi' ] = nsapi_response_headers();
		}
		sobi2Stats::save( array( 'web_server' => $a ), $a[ 'reported_software' ] );
	}

	function _platform ()
	{
		sobi2Stats::save( array( 'platform' => PHP_OS ), PHP_OS );
	}

	function _browser ()
	{
		$browser = sobi2Stats::parse_user_agent( sobi2Config::request( $_SERVER, 'HTTP_USER_AGENT', 0, 0x0004 ) );
		sobi2Stats::save( array( 'admin_browser' => array( 'system' => $browser['system'], 'browser' => $browser['browser'] ) ), implode( ' | ', $browser ) );
	}

	function _cms_name ()
	{
		if ( defined( '_JEXEC' ) && class_exists( 'JFactory' ) ) {
			$version = new JVersion( );
			sobi2Stats::save( array( 'cms_name' => "Joomla! " . $version->RELEASE ), "Joomla! " . $version->RELEASE );
		}
		elseif ( defined( '_SOBI_MAMBO' ) ) {
			sobi2Stats::save( array( 'cms_name' => 'Mambo' ), 'Mambo' );
		}
		elseif ( file_exists( _SOBI_CMSROOT . DS . 'includes' . DS . 'joomla.php' ) ) {
			sobi2Stats::save( array( 'cms_name' => 'Joomla 1.0' ), 'Joomla 1.0' );
		}
		else {
			sobi2Stats::save( array( 'cms_name' => 'Unknown' ), 'Unknown', 'no' );
		}
	}

	function _cms_version ()
	{
		global $_VERSION;
		$cfg = array();
		if ( defined( '_JEXEC' ) && class_exists( 'JFactory' ) ) {
			$version = new JVersion( );
			$v = explode( '.', $version->RELEASE );
			$cfg[ 'version' ] = array( 'major' => $v[ 0 ], 'minor' => $v[ 1 ], 'build' => $version->DEV_LEVEL );
			sobi2Stats::save( array( 'cms_version' => $cfg[ 'version' ] ), implode( '.', $cfg[ 'version' ] ) );
		}
		elseif ( $_VERSION && count( $_VERSION ) ) {
			$v = explode( '.', $_VERSION->RELEASE );
			$cfg[ 'version' ] = array( 'major' => $v[ 0 ], 'minor' => $v[ 1 ], 'build' => $_VERSION->DEV_LEVEL );
			sobi2Stats::save( array( 'cms_version' => $cfg[ 'version' ] ), implode( '.', $cfg[ 'version' ] ) );
		}
		elseif ( file_exists( _SOBI_CMSROOT . DS . 'includes' . DS . 'joomla.php' ) ) {
			$v = explode( '.', $version->RELEASE );
			$cfg[ 'version' ] = array( 'major' => $v[ 0 ], 'minor' => $v[ 1 ], 'build' => $version->DEV_LEVEL );
			sobi2Stats::save( array( 'cms_version' => $cfg[ 'version' ] ), implode( '.', $cfg[ 'version' ] ) );
		}
		else {
			sobi2Stats::save( array( 'cms_name' => 'Unknown' ), 'Unknown', 'no' );
		}
	}

	function _sef ()
	{
		$cfg = array();
		if ( defined( '_JEXEC' ) && class_exists( 'JFactory' ) ) {
			$jConf = new JConfig( );
			$cfg[ 'sef' ] = array( 'enabled' => ( $jConf->sef ? 'enabled' : 'disabled' ), 'sef_rewrite' => $jConf->sef_rewrite, 'sef_suffix' => $jConf->sef_suffix );
		}
		elseif ( defined( '_SOBI_MAMBO' ) ) {
			$cfg[ 'sef' ] = array( 'enabled' => ( $mosConfig_sef ? 'enabled' : 'disabled' ) );
		}
		$sefs = array();
		$coms = sobi2Config::translateDirPath( 'administrator/components', 'root' );
		$handle = opendir( $coms );
		while ( false !== ( $file = readdir( $handle ) ) ) {
			if ( strstr( $file, 'sef' ) ) {
				$sefs[] = $file;
			}
		}
		$sefAuthor = $sefName = $sefVer = null;
		foreach( $sefs as $sef ) {
			$n = str_replace( 'com_', null, $sef );
			$f = $coms . DS . $sef . DS . $n . '.xml';
			if ( file_exists( $f ) ) {
				$xml_values = array();
				$contents = file_get_contents( $f );
				$xml_parser = xml_parser_create( 'UTF-8' );
				xml_parse_into_struct( $xml_parser, trim( $contents ), $xml_values );
				xml_parser_free( $xml_parser );
				foreach( $xml_values as $node ) {
					if ( strtolower( $node[ 'tag' ] ) == 'author' )
						$sefAuthor = trim( $node[ 'value' ] );
					if ( strtolower( $node[ 'tag' ] ) == 'name' )
						$sefName = trim( $node[ 'value' ] );
					elseif ( strtolower( $node[ 'tag' ] ) == 'version' )
						$sefVer = trim( $node[ 'value' ] );
					if ( $sefName && $sefVer && $sefAuthor ) {
						$cfg[ 'sef' ][ 'extensions' ][] = array( 'author' => $sefAuthor, 'name' => $sefName, 'version' => $sefVer );
						$sefAuthor = $sefName = $sefVer = null;
						break;
					}
				}
			}
		}
		sobi2Stats::save( array( 'cms_sef' => $cfg[ 'sef' ] ), $cfg[ 'sef' ][ 'enabled' ], ( $cfg[ 'sef' ][ 'enabled' ] == 'enabled' ? 'ok' : 'no' ) );
	}

	function _cache ()
	{
		$cfg = array();
		if ( defined( '_JEXEC' ) && class_exists( 'JFactory' ) ) {
			$jConf = new JConfig( );
			$cfg = array();
			$cfg[ 'cache' ] = array( 'enabled' => ( $jConf->caching ? 'enabled' : 'disabled' ), 'cache_handler' => $jConf->cache_handler, 'cachetime' => $jConf->cachetime );
		}
		elseif ( defined( '_SOBI_MAMBO' ) ) {
			$cfg[ 'cache' ] = array( 'enabled' => ( $mosConfig_caching ? 'enabled' : 'disabled' ), 'cachetime' => $mosConfig_cachetime );
		}
		sobi2Stats::save( array( 'cms_cache' => $cfg[ 'cache' ] ), $cfg[ 'cache' ][ 'enabled' ], ( $cfg[ 'cache' ][ 'enabled' ] == 'enabled' ? 'ok' : 'no' ) );
	}

	function _ftp_layer ()
	{
		if ( defined( '_JEXEC' ) && class_exists( 'JFactory' ) ) {
			$jConf = new JConfig( );
			$cfg = array();
			$cfg[ 'ftp_layer' ] = array( 'enabled' => ( $jConf->ftp_enable ? 'enabled' : 'disabled' ) );
			sobi2Stats::save( array( 'ftp_layer' => $cfg[ 'ftp_layer' ] ), $cfg[ 'ftp_layer' ][ 'enabled' ], ( $cfg[ 'ftp_layer' ][ 'enabled' ] == 'enabled' ? 'ok' : 'no' ) );
		}
		else {
			sobi2Stats::save( array( 'ftp_layer' => 'does not concern' ), 'does not concern' );
		}
	}
}

function _sdummy ()
{}

function SarrToXML ( $array, $tab = null )
{
	$xml = null;
	if ( ! $tab ) {
		$x = true;
	}
	else {
		$x = false;
	}
	foreach( $array as $key => $value ) {
		$attr = null;
		if ( is_object( $value ) ) {
			$value = get_object_vars( $value );
		}
		if ( is_numeric( $key ) ) {
			$key = 'value';
		}
		elseif ( strstr( $key, ' ' ) ) {
			$attr = " setting=\"{$key}\"";
			$key = 'value';
		}
		$key = strtolower( str_replace( ' ', '_', $key ) );
		if ( is_array( $value ) ) {
			if ( count( $value ) ) {
				$value = SarrToXML( $value, $tab . "\t" );
				$xml .= "\n{$tab}<$key{$attr}>{$value}\n{$tab}</{$key}>";
			}
			else {
				$xml .= "\n{$tab}<$key{$attr}></{$key}>";
			}
		}
		else {
			if ( htmlspecialchars( str_replace( array( "\n", "\t", "\r" ), null, $value ) ) != $value ) {
				$value = "\n<![CDATA[$value]]>\n";
			}
			$xml .= "\n{$tab}<$key{$attr}>{$value}</{$key}>";
		}
	}
	if ( $x ) {
		$x = explode( "\n", $xml, 2 );
		$xml = '<?xml version="1.0" encoding="utf-8"?>' . "\n";
		$xml .= "<server_info>";
		foreach( $x as $line ) {
			$xml .= "\t" . $line . "\n";
		}
		$xml .= "</server_info>";
	}
	return $xml;
}
?>