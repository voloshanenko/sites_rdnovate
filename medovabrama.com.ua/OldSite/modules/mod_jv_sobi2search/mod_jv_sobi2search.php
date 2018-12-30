<?php

defined('_JEXEC') or die('Restricted access'); 

require_once (dirname(__FILE__).DS.'helper.php');
$id_mod = $module->id;
$jvSearch = new modjv_sobi2searchHelper($params);
$list = $jvSearch->searchSobi($id_mod);
require(JModuleHelper::getLayoutPath('mod_jv_sobi2search'));