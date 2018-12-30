<?php
/**
 *
 * Set the tag 'title' and the meta tags 'description', 'keywords' and 'robots' on pages (useful for SEO)
 *
 * noindex
 *     Don't index the page
 * nofollow
 *     Don't follow links found in the page
 * nosnippet
 *     Don't show a short description for the page in search results
 * noarchive
 *     Don't save a copy cache of the page
 * noodp
 *     Don't use Dmoz description in search resultsm even if present
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

class plgSystemTagMeta extends JPlugin {
  /**
   * Constructor
   *
   * For php4 compatability we must not use the __constructor as a constructor for plugins
   * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
   * This causes problems with cross-referencing necessary for the observer design pattern.
   *
   * @param object $subject The object to observe
   * @since 1.5
   */
  function plgSystemTagMeta(& $subject, $config) {
    parent :: __construct($subject, $config);
  }

  function onAfterDispatch() {
    global $mainframe;

    $document = & JFactory::getDocument();
    $docType = $document->getType();
    // Only mod site pages that are html docs (no admin, install, etc.)
    if ( !$mainframe->isSite() ) return;
    if ( $docType != 'html' ) return;

    $plugin = & JPluginHelper :: getPlugin('system', 'tagmeta');
    $params = new JParameter($plugin->params);

    if ( ($params->get('redirect', 0) == 1) && ( (isset($_SERVER['REDIRECT_URL'])) || (isset($_SERVER['HTTP_X_REWRITE_URL'])) ) ) {
      $currenturi = (isset($_SERVER['HTTP_X_REWRITE_URL'])) ? $_SERVER['HTTP_X_REWRITE_URL'] : $_SERVER['REDIRECT_URL'];
    } else {
      $currenturi = $_SERVER['REQUEST_URI'];
    }

    $db = JFactory::getDBO();
    $db->setQuery("SELECT * FROM #__tagmeta WHERE (". $db->quote( $currenturi ) ." REGEXP uri)>0 and published='1' ORDER BY ordering");
    $items = $db->loadObjectList();
    if ( count($items) > 0 ) {
      // Notes: if more than one match with current URI, we takes only the first one with ordering set
      if ( !empty($items[0]->title) ) { $document->setTitle($items[0]->title); }
      if ( !empty($items[0]->description) ) { $document->setDescription($items[0]->description); }
      if ( !empty($items[0]->keywords) ) { $document->setMetaData('keywords', $items[0]->keywords); }
      // Robots meta options: 0=No,1=Yes,2=Skip
      $robots = '';
      if ($items[0]->rindex != 2) { $robots .= ($items[0]->rindex) ? 'index,' : 'noindex,'; }
      if ($items[0]->rfollow != 2) { $robots .= ($items[0]->rfollow) ? 'follow,' : 'nofollow,'; }
      if ($items[0]->rsnippet != 2) { $robots .= ($items[0]->rsnippet) ? 'snippet,' : 'nosnippet,'; }
      if ($items[0]->rarchive != 2) { $robots .= ($items[0]->rarchive) ? 'archive,' : 'noarchive,'; }
      if ($items[0]->rodp != 2) { $robots .= ($items[0]->rodp) ? 'odp' : 'noodp'; }
      $robots = rtrim($robots, ','); // Drop last char if is a comma
      if ( !empty($robots) ) { $document->setMetaData('robots', $robots); }
    }

    if ($document->getMetaData('generator')) {
      $customgenerator = $params->get('customgenerator', '');
      $replacegenerator = $params->get('replacegenerator', 0);
      if ($replacegenerator == 1) {
        $document->setGenerator($customgenerator);
      } else {
        if ($replacegenerator == 2) { $document->setGenerator(''); } // Clean
      }
    }

    $addsitename = $params->get('addsitename', 0);
    if ($addsitename != 0) {
      // Add site name before or after the page title
      $sitename = $mainframe->getCfg('sitename');
      $separator = str_replace( '\b', ' ', $this->params->get('separator') );
      $currenttitle = $document->getTitle();
      if ( $addsitename == 1 ) {
        $newtitle = $sitename . $separator . $currenttitle; // Before
      } else {
        $newtitle = $currenttitle . $separator . $sitename; // After
      }
      $document->setTitle($newtitle);
    }

    if ( $this->params->get('cleandefaultpage') == 1 ) {
      // Check if this is the default page (home page)
      $menu =& JSite::getMenu();
      if ( $menu->getActive() == $menu->getDefault() ) {
        $sitename = $mainframe->getCfg('sitename');	
        $document->setTitle($sitename);
      }
    }

    $metatitle = $params->get('metatitle', 1);
    if ( $metatitle ) {
          $tagvalue = $document->getTitle();
          if ( empty($tagvalue) ) {
                // Tag title is empty
                $metavalue = $document->getMetaData('title');
                if ( ( !empty($metavalue) ) && ($metatitle == 2) ) {
                  $document->setTitle($metavalue);
                }
          } else {
                // Tag title is not empty
                $metavalue = $document->getMetaData('title');
                if ( ( !empty($metavalue) ) || ($metatitle == 2) ) {
                  $document->setMetaData('title', $tagvalue);
                }
          }
    }

    $customauthor = $params->get('customauthor', '');
    $addauthor = $params->get('addauthor', 0);
    if ( ( $customauthor ) && ($addauthor != 0) ) {
          $currentauthor = $document->getMetaData('author');
          if ( ($addauthor == 1) || ( empty($currentauthor) ) ) {
                $document->setMetaData('author', $customauthor);
          }
    }

  }

}