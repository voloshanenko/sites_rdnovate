<?php
/*
/**
* CHRONOFORMS version 3.0 stable
* Copyright (c) 2006 Chrono_Man, ChronoEngine.com. All rights reserved.
* Author: Chrono_Man (ChronoEngine.com)
* See readme.html.
* @license		GNU/GPL
* Visit http://www.ChronoEngine.com for regular update and information.
**/

/* ensure that this file is called from another file */
defined('_JEXEC') or die('Restricted access'); 

jimport( 'joomla.application.component.controller' );


class TableChronoContact extends JTable {
  // Declaration and initialisation of the instantiation variable
  // INT(11) AUTO_INCREMENT
  var $id=null;
  // TEXT
  var $name=null;
  // TEXT
  var $html=null;
  // TEXT
  var $scriptcode=null;
  var $stylecode=null;
  // TEXT
  var $redirecturl=null;
  // TINYINT(1)
  var $emailresults=null;
  // TEXT
  var $fieldsnames=null;
  // TEXT
  var $fieldstypes=null;
  // TEXT
  var $onsubmitcode=null;
  // TEXT
  var $onsubmitcodeb4=null;
  
  var $server_validation= null;
  // TEXT
  var $attformtag=null;
  // TEXT
  var $submiturl=null;
  var $dbclasses=null;
  // TEXT
  var $emailtemplate=null;
  var $useremailtemplate=null;
  
  var $paramsall = null;
  
  var $titlesall = null;
  var $extravalrules=null;
  var $autogenerated = null;
  var $theme = 'default';
    // TINYINT(1)
  var $published=null;
  
  var $extra1=null;
  var $extra2=null;
  var $extra3=null;
  var $extra4=null;
  var $extra5=null;
  
  var $chronocode=null;

  // The constructor is called by the instantiation
  function __construct( &$database ) {
    parent::__construct( '#__chrono_contact', 'id', $database );
  }
}
?>