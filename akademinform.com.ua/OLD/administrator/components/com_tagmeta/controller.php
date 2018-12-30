<?php
/**
 * Tag Meta component for Joomla! 1.5
 *
 * @author Luigi Balzano (info@sistemistica.it)
 * @package TagMeta
 * @copyright Copyright 2009
 * @license GNU Public License
 * @link http://www.sistemistica.it
 * @version 1.2
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.controller' );
//require_once( JPATH_COMPONENT.DS.'helpers'.DS.'helper.php' );

/**
 * Tag Meta Controller
 *
 * @package TagMeta
 *
 */
class TagMetaController extends JController
{
    function __construct()
    {
        parent::__construct();

        // Register Extra tasks
        $this->registerTask( 'add',  'display' );
        $this->registerTask( 'edit', 'display' );
        $this->registerTask( 'about', 'about' );
    }

    function display( )
    {
        switch($this->getTask())
        {
            case 'add':
            {
                JRequest::setVar( 'hidemainmenu', 1 );
                JRequest::setVar( 'layout', 'form' );
                JRequest::setVar( 'view' , 'itemtagmeta');
                JRequest::setVar( 'edit', false );

                // Checkout the item tag meta
                $model = $this->getModel('itemtagmeta');
                $model->checkout();
            } break;
            case 'edit':
            {
                JRequest::setVar( 'hidemainmenu', 1 );
                JRequest::setVar( 'layout', 'form' );
                JRequest::setVar( 'view'  , 'itemtagmeta');
                JRequest::setVar( 'edit', true );

                // Checkout the item tag meta
                $model = $this->getModel('itemtagmeta');
                $model->checkout();
            } break;
        }

        parent::display();
    }

    function about()
    {
        // Set toolbar items for the page
        JToolBarHelper::title(   JText::_( 'Tag Meta Manager' ), 'generic.png' );
        JToolBarHelper::preferences('com_tagmeta', '380');
        echo "<h1>Tag Meta</h1><h3>Version 1.2</h3><p>&copy; 2009 <a href=\"http://www.sistemistica.it\" target=\"_blank\">Sistemistica.it</a></p>";
        echo JText::_( 'TAG META ABOUT DESC' );
        echo "<br /><br />".JText::_( 'TAG META DONATE' )."<br /><br />";
        ?>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="donate" onsubmit="window.open('', 'donate', 'width=450,height=300,status=yes,resizable=yes,scrollbars=yes')">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHRwYJKoZIhvcNAQcEoIIHODCCBzQCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYBB4KFhDAWJ/MHAx5zhYB7ixmhKbOYiUZ1hVDcJYoBeN+S0cFNk/oHiqBbcEx5CLbsmzzBij8/uWAEtmtCu78bjA+Y85JkDcVLw8EN0qxcEr5Du+rK+GqJJjBp2RMz0mp31oZvUiVhucjS2U8F7f72MMPPCz2EnUIa2XQq1IhrfNzELMAkGBSsOAwIaBQAwgcQGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQIOnYNgUheEQeAgaCQBcVeO98HHQuOiBGStuGXgLVh/k8eN+GT19qcMyt5fGqL56WSUeXsJnDw3xhd6q531xxyehGckCERhjqYTRa7Ir4VTmRBj3M8y7Qw5jJlEDgT7ry2ANo68t8vFw8KONClKLvXn+oeDitWn9ycWUuz++FYW3cP85DwEo88VbycY6HjEjkY41zaL2BudtidYZgzOmuDA0EW2/n/eF+pz1gwoIIDhzCCA4MwggLsoAMCAQICAQAwDQYJKoZIhvcNAQEFBQAwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMB4XDTA0MDIxMzEwMTMxNVoXDTM1MDIxMzEwMTMxNVowgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDBR07d/ETMS1ycjtkpkvjXZe9k+6CieLuLsPumsJ7QC1odNz3sJiCbs2wC0nLE0uLGaEtXynIgRqIddYCHx88pb5HTXv4SZeuv0Rqq4+axW9PLAAATU8w04qqjaSXgbGLP3NmohqM6bV9kZZwZLR/klDaQGo1u9uDb9lr4Yn+rBQIDAQABo4HuMIHrMB0GA1UdDgQWBBSWn3y7xm8XvVk/UtcKG+wQ1mSUazCBuwYDVR0jBIGzMIGwgBSWn3y7xm8XvVk/UtcKG+wQ1mSUa6GBlKSBkTCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb22CAQAwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOBgQCBXzpWmoBa5e9fo6ujionW1hUhPkOBakTr3YCDjbYfvJEiv/2P+IobhOGJr85+XHhN0v4gUkEDI8r2/rNk1m0GA8HKddvTjyGw/XqXa+LSTlDYkqI8OwR8GEYj4efEtcRpRYBxV8KxAW93YDWzFGvruKnnLbDAF6VR5w/cCMn5hzGCAZowggGWAgEBMIGUMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMDkwMTE0MTUzNDUyWjAjBgkqhkiG9w0BCQQxFgQUaWmfrW+//w1iraZwwJ1rdE4dQjkwDQYJKoZIhvcNAQEBBQAEgYC/Ffd1vPRuhB3iPFtjHRapF6vdGO5icHrCijJ9YWiSjzRIny5nT7Wk0K+ktPv1nSF9kX4DZYd6EU3e0bNjT5AsDrmLTiJLYdPDnjvo6lFNWAzWyCukAdifS/BQIAR4OM6vXkQrESv9gZG93GBb5ut1wy6dTNJjGiP25POvrbEVBg==-----END PKCS7-----">
        <input type="image" src="https://www.paypal.com/it_IT/IT/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="">
        <img alt="" border="0" src="https://www.paypal.com/it_IT/i/scr/pixel.gif" width="1" height="1">
        </form>
        <?php
    }

    function store()
    {
        $post    = JRequest::get('post');
        $cid    = JRequest::getVar( 'cid', array(0), 'post', 'array' );
        $post['id'] = (int)$cid[0];
        $this->id = $post['id'] ;

        $model = $this->getModel('itemtagmeta');

        if ($model->store($post)) {
            $this->msg = JText::_( 'Item Saved' );
        } else {
            $this->msg = JText::_( 'Error Saving Item' );
        }

        // Check in (unlock) item, so it can be edited...
        $model->checkin();
    }

    function save()
    {
        $this->store() ;
        $link = 'index.php?option=com_tagmeta';
        $this->setRedirect( $link, $this->msg);
    }

    function apply()
    {
        $this->store() ;
        $link = 'index.php?option=com_tagmeta&view=itemtagmeta&task=edit&cid[]=' . $this->id ;
        $this->setRedirect($link, $this->msg);
    }

    function remove()
    {
        $cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
        JArrayHelper::toInteger($cid);

        if (count( $cid ) < 1) {
            JError::raiseError(500, JText::_( 'Select an item to delete' ) );
        }

        $model = $this->getModel('itemtagmeta');
        if(!$model->delete($cid)) {
            echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
        }

        $this->setRedirect( 'index.php?option=com_tagmeta' );
    }


    function publish()
    {
        $cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
        JArrayHelper::toInteger($cid);

        if (count( $cid ) < 1) {
            JError::raiseError(500, JText::_( 'Select an item to publish' ) );
        }

        $model = $this->getModel('itemtagmeta');
        if(!$model->publish($cid, 1)) {
            echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
        }

        $this->setRedirect( 'index.php?option=com_tagmeta' );
    }


    function unpublish()
    {
        $cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
        JArrayHelper::toInteger($cid);

        if (count( $cid ) < 1) {
            JError::raiseError(500, JText::_( 'Select an item to unpublish' ) );
        }

        $model = $this->getModel('itemtagmeta');
        if(!$model->publish($cid, 0)) {
            echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
        }

        $this->setRedirect( 'index.php?option=com_tagmeta' );
    }

    function cancel()
    {
        // Checkin the itemtagmeta
        $model = $this->getModel('itemtagmeta');
        $model->checkin();

        $this->setRedirect( 'index.php?option=com_tagmeta' );
    }

    function copy()
    {
      // Check for request forgeries
      //JRequest::checkToken() or jexit( 'Invalid Token' );

      $this->setRedirect( 'index.php?option=com_tagmeta' );

      $cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
      $db =& JFactory::getDBO();
      $table =& JTable::getInstance('itemtagmeta', 'Table');
      $n = count( $cid );

      if ($n > 0)
      {
        foreach ($cid as $id)
        {
          if ($table->load( (int)$id ))
          {
            $table->id            = 0;
            $table->uri           = 'Copy of ' . $table->uri;
            $table->ordering      = 0;
            $table->published     = false;
            $table->checked_out   = false;

            if (!$table->store()) {
              return JError::raiseWarning( $table->getError() );
            }
          }
          else {
            return JError::raiseWarning( 500, $table->getError() );
          }
        }
      }
      else {
        return JError::raiseWarning( 500, JText::_( 'No items selected' ) );
      }
      $this->setMessage( JText::sprintf( 'Items copied', $n ) );
    }

    function orderup()
    {
        $model = $this->getModel('itemtagmeta');
        $model->move(-1);

        $this->setRedirect( 'index.php?option=com_tagmeta');
    }

    function orderdown()
    {
        $model = $this->getModel('itemtagmeta');
        $model->move(1);

        $this->setRedirect( 'index.php?option=com_tagmeta');
    }

    function saveorder()
    {
        $cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
        $order = JRequest::getVar( 'order', array(), 'post', 'array' );
        JArrayHelper::toInteger($cid);
        JArrayHelper::toInteger($order);

        $model = $this->getModel('itemtagmeta');
        $model->saveorder($cid, $order);

        $this->setRedirect( 'index.php?option=com_tagmeta', JText::_( 'New ordering saved' ) );
    }
}
?>