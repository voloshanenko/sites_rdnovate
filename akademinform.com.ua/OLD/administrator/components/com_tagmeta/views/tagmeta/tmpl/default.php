<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php JHTML::_('behavior.tooltip'); ?>

<?php
  // Set toolbar items for the page
  JToolBarHelper::title(   JText::_( 'Tag Meta Manager' ), 'generic.png' );
  JToolBarHelper::publishList();
  JToolBarHelper::unpublishList();
  JToolBarHelper::customX( 'copy', 'copy.png', 'copy_f2.png', 'Copy' );
  JToolBarHelper::deleteList();
  JToolBarHelper::editListX();
  JToolBarHelper::addNewX();
  JToolBarHelper::preferences('com_tagmeta', '380');
  JToolBarHelper::home();
?>
<form action="index.php" method="post" name="adminForm">
<table>
<tr>
  <td align="left" width="100%">
    <?php echo JText::_( 'Filter' ); ?>:
    <input type="text" name="search" id="search" value="<?php echo $this->lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" />
    <button onclick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
    <button onclick="document.getElementById('search').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
  </td>
  <td nowrap="nowrap">
    <?php
      echo $this->lists['state'];
    ?>
  </td>
</tr>
</table>
<div id="editcell">
  <table class="adminlist">
  <thead>
    <tr>
      <th width="5">
        <?php echo JText::_( 'NUM' ); ?>
      </th>
      <th width="2%">
        <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
      </th>
      <th width="2%" nowrap="nowrap">
        <?php echo JHTML::_('grid.sort', 'ID', 'a.id', $this->lists['order_Dir'], $this->lists['order'] ); ?>
      </th>
      <th width="90">
        <?php echo JHTML::_('grid.sort', 'URI', 'a.uri', $this->lists['order_Dir'], $this->lists['order'] ); ?>
      </th>
      <th width="40">
        <?php echo JHTML::_('grid.sort', 'Title', 'a.title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
      </th>
      <th width="40">
        <?php echo JHTML::_('grid.sort', 'Description', 'a.description', $this->lists['order_Dir'], $this->lists['order'] ); ?>
      </th>
      <th width="40">
        <?php echo JHTML::_('grid.sort', 'Keywords', 'a.keywords', $this->lists['order_Dir'], $this->lists['order'] ); ?>
      </th>
      <th width="40">Robots</th>
      <th width="6%" nowrap="nowrap">
        <?php echo JHTML::_('grid.sort', 'Order', 'a.ordering', $this->lists['order_Dir'], $this->lists['order'] ); ?>
        <?php echo JHTML::_('grid.order', $this->items ); ?>
      </th>
      <th width="6%" nowrap="nowrap">
        <?php echo JHTML::_('grid.sort', 'Published', 'a.published', $this->lists['order_Dir'], $this->lists['order'] ); ?>
      </th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <td colspan="10">
        <?php echo $this->pagination->getListFooter(); ?>
      </td>
    </tr>
  </tfoot>
  <tbody>
  <?php
  $k = 0;
    if( count( $this->items ) > 0 ) {
      for ($i=0, $n=count( $this->items ); $i < $n; $i++)
        {
            $row = &$this->items[$i];

            $link   = JRoute::_( 'index.php?option=com_tagmeta&view=itemtagmeta&task=edit&cid[]='. $row->id );

            $checked   = JHTML::_('grid.checkedout',   $row, $i );
            $published   = JHTML::_('grid.published', $row, $i );

            $ordering = ($this->lists['order'] == 'a.ordering');
            ?>
            <tr class="<?php echo "row$k"; ?>">
                <td>
                    <?php echo $this->pagination->getRowOffset( $i ); ?>
                </td>
                <td>
                    <?php echo $checked; ?>
                </td>
                <td align="center">
                    <?php echo $row->id; ?>
                </td>
                <td align="left">
                    <?php
                    $max_chars = 100;
                    if( strlen( $row->uri ) > $max_chars ) {
                        $row_uri = substr( $row->uri, 0, $max_chars ) . ' ...' ;
                    } else {
                        $row_uri = $row->uri;
                    }
                    if (  JTable::isCheckedOut($this->user->get ('id'), $row->checked_out ) ) {
                        echo $row_uri;
                    } else {
                    ?>
                        <a href="<?php echo $link; ?>" title="<?php echo JText::_( 'Edit List' ); ?>">
                            <?php echo $row_uri; ?></a>
                    <?php
                    }
                    ?>
                </td>
                <td align="left">
                    <?php
                    $max_chars = 50;
                    if( strlen( $row->title ) > $max_chars ) {
                        echo substr( $row->title, 0, $max_chars ) . ' ...' ;
                    } else {
                        echo $row->title;
                    }
                    ?>
                </td>
                <td align="left">
                    <?php
                    $max_chars = 50;
                    if( strlen( $row->description ) > $max_chars ) {
                        echo substr( $row->description, 0, $max_chars ) . ' ...' ;
                    } else {
                        echo $row->description;
                    }
                    ?>
                </td>
                <td align="left">
                    <?php
                    $max_chars = 50;
                    if( strlen( $row->keywords ) > $max_chars ) {
                        echo substr( $row->keywords, 0, $max_chars ) . ' ...' ;
                    } else {
                        echo $row->keywords;
                    }
                    ?>
                </td>
                <td align="left">
                    <?php
                    $robots = '';
                    if ($row->rindex != 2) { $robots .= ($row->rindex) ? 'index,' : 'noindex,'; }
                    if ($row->rfollow != 2) { $robots .= ($row->rfollow) ? 'follow,' : 'nofollow,'; }
                    if ($row->rsnippet != 2) { $robots .= ($row->rsnippet) ? 'snippet,' : 'nosnippet,'; }
                    if ($row->rarchive != 2) { $robots .= ($row->rarchive) ? 'archive,' : 'noarchive,'; }
                    if ($row->rodp != 2) { $robots .= ($row->rodp) ? 'odp' : 'noodp'; }
                    $robots = rtrim($robots, ','); // Drop last char if is a comma
                    $max_chars = 50;
                    if( strlen( $robots ) > $max_chars ) {
                        echo substr( $robots, 0, $max_chars ) . ' ...' ;
                    } else {
                        echo $robots;
                    }
                    ?>
                </td>
                <td class="order">
                    <span><?php echo $this->pagination->orderUpIcon( $i, ($row->catid == @$this->items[$i-1]->catid),'orderup', 'Move Up', $ordering ); ?></span>
                    <span><?php echo $this->pagination->orderDownIcon( $i, $n, ($row->catid == @$this->items[$i+1]->catid), 'orderdown', 'Move Down', $ordering ); ?></span>
                    <?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
                    <input type="text" name="order[]" size="5" value="<?php echo $row->ordering;?>" <?php echo $disabled ?> class="text_area" style="text-align: center" />
                </td>
                <td align="center">
                    <?php echo $published;?>
                </td>
            </tr>
            <?php
            $k = 1 - $k;
        }
    } else {
        ?>
        <tr>
        <td colspan="10">
            <?php echo JText::_( 'There are no items present' ); ?>
        </td>
        </tr>
        <?php
    }
  ?>
  </tbody>
  </table>
</div>

<input type="hidden" name="option" value="com_tagmeta" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="" />
</form>