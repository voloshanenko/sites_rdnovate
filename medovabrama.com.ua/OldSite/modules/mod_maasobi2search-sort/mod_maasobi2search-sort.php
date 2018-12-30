<?php
defined('_JEXEC') or die('Restricted access');

defined( 'DS' )	|| define( 'DS',DIRECTORY_SEPARATOR );
$add = 	defined( 'JPATH_SITE' ) ?  DS.'mod_maasobi2search-sort' : null;
defined( '_SOBI_CMSROOT' ) || define( '_SOBI_CMSROOT', str_replace( DS.'modules'.$add, null, dirname( __FILE__ ) ) );
class_exists( 'sobi2Config' ) || require_once( _SOBI_CMSROOT.DS.'components'.DS.'com_sobi2'.DS.'config.class.php' );

require_once(JPATH_BASE.DS.'components'.DS.'com_sobi2'.DS.'axsearch.class.php');
require_once(JPATH_BASE.DS.'components'.DS.'com_sobi2'.DS.'includes'.DS.'html.php');
require_once(JPATH_BASE.DS.'components'.DS.'com_sobi2'.DS.'languages'.DS.'russian.php');
require_once( dirname(__FILE__).DS.'helper.php' );

$moduleclass_sfx = $params->get('moduleclass_sfx', '');
$field_id = $params->get('field_id');

$fieldid = explode(" ", $field_id);

$select = modSobi2SortHelper::getSobi2Sort($fieldid);
$selectName = modSobi2SortHelper::getSobi2SortName($fieldid);

require(JModuleHelper::getLayoutPath('mod_maasobi2search-sort'));

?>