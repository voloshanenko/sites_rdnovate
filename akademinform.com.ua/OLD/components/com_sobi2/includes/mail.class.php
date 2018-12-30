<?php
/**
* @version $Id: mail.class.php 5462 2010-08-18 08:25:37Z Sigrid Suski $
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
class sobi2Mail {
	/**
	 * function for send emails
	 *
	 * @param string $subject
	 * @param string $message
	 * @param string $addresse
	 * @param boolean $forAdmin
	 * @param string $fromMail
	 * @param string $fromName
	 * @param integer $sobiId
	 * @param bool $html
	 * @param string $cc
	 * @param string $bcc
	 * @param string $replyTo
	 * @param string $replyToName
	 */
	function send( $subject, $message, $addresse = null, $forAdmin = false, $fromMail = null, $fromName = null, $sobiId = 0, $html = false, $cc = null, $bcc = null, $replyTo = null, $replyToName = null )
	{
		$config =& sobi2Config::getInstance();
		if(!$fromMail || !$fromName) {
			if ( $config->mailfrom && $config->fromname ) {
				$fromName = $config->fromname;
				$fromMail = $config->mailfrom;
			}
			else {
				$query = "SELECT name, email"
				. "\n FROM #__users"
				. "\n WHERE LOWER( usertype ) = 'superadministrator'"
				. "\n OR LOWER( usertype ) = 'super administrator'"
				;
				$config->database->setQuery( $query );
				$rows 		= $config->database->loadObjectList();
				$row2 		= $rows[0];
				$fromName 	= $row2->name;
				$fromMail 	= $row2->email;
			}
		}
		if( $forAdmin ) {
			$query = "SELECT email, name"
				. "\n FROM #__users"
				. "\n WHERE gid IN ({$config->mailAdmGid})"
				. "\n AND ( sendemail = 1 OR gid IN (18, 19, 20, 21, 23) )"
				;
			$config->database->setQuery( $query );
			$config->database->query();
			$adminRows = $config->database->loadObjectList();
			foreach( $adminRows as $adminRow ) {
				if( class_exists( 'JUTility' ) ) {
					JUTility::sendMail( $fromMail, $fromName, $adminRow->email, $config->makeSubject( $subject ), $message, $html );
				}
				else {
					mosMail( $fromMail, $fromName, $adminRow->email, $config->makeSubject( $subject ), $message, $html );
				}
			}
		}
		if( $sobiId ) {
			if( $config->mailSoJ == 0 ) {
				$query = "SELECT `data_txt` FROM `#__sobi2_fields_data` WHERE `fieldid` = {$config->mailFieldId} AND `itemid` = {$sobiId}";
				$config->database->setQuery( $query );
				$addresse = $config->database->loadResult();
				$uname = null;
			}
			else {
				sobi2Config::import( "sobi2.class") ;
				$sobi = new sobi2( $sobiId );
				if( class_exists( 'JTableUser' ) ) {
					$u = new JTableUser( $config->database );
				}
				else {
					$u 	= new mosUser( $config->database );
				}
				$u->load( $sobi->owner );
				$addresse 	= $u->email;
				$uname 		= $u->username;
			}
			if( !$addresse ) {
				trigger_error("sobi2config::sendSobiMail(): Having no valid email address for the entry: {$sobiId}. Email from: {$config->mailSoJ}/{$uname}", E_USER_WARNING);
			}
		}
		if( $addresse ) {
				if( class_exists( 'JUTility' ) ) {
					JUTility::sendMail( $fromMail, $fromName, $addresse, $config->makeSubject( $subject ), $message, $html, $cc, $bcc, null, $replyTo, $replyToName  );
				}
				else {
					mosMail( $fromMail, $fromName, $addresse, $config->makeSubject( $subject ), $message, $html, $cc, $bcc, null, $replyTo, $replyToName );
				}
		}
		else {
			trigger_error("sobi2config::sendSobiMail(): No valid email address available", E_USER_WARNING );
		}
	}
}
?>