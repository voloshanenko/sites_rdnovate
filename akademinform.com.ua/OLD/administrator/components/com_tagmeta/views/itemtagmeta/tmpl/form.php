<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php JHTML::_('behavior.tooltip'); ?>

<?php
// Set toolbar items for the page
$edit = JRequest::getVar('edit',true);
$text = !$edit ? JText::_( 'New' ) : JText::_( 'Edit' );
JToolBarHelper::title( JText::_( 'Item' ).': <small>[ ' . $text.' ]</small>' );
JToolBarHelper::save();
JToolBarHelper::apply();
if (!$edit)  {
    JToolBarHelper::cancel();
} else {
    JToolBarHelper::cancel( 'cancel', 'Close' );
}
JToolBarHelper::home();
?>

<script language="javascript" type="text/javascript">
    <!--
    function submitbutton(pressbutton) {
        var form = document.adminForm;
        if (pressbutton == 'cancel') {
            submitform( pressbutton );
            return;
        }

        // do field validation
        if (form.uri.value == ""){
            alert( "<?php echo JText::_( 'Please provide a valid uri', true ); ?>" );
        } else {
            submitform( pressbutton );
        }
    }
    -->
</script>
<style type="text/css">
    table.paramlist td.paramlist_key {
        width: 92px;
        text-align: left;
        height: 30px;
    }
</style>

<form action="index.php" method="post" name="adminForm" id="adminForm">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td width="50%" valign="top">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'Details' ); ?></legend>
        <table class="admintable">
        <tr>
            <td width="100" align="right" class="key">
                <label for="uri">
                    <?php echo JText::_( 'URI' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="uri" id="uri" size="70" maxlength="255" value="<?php echo $this->itemtagmeta->uri;?>" />
            </td>
        </tr>
        <tr>
            <td valign="top" align="right" class="key">
                <?php echo JText::_( 'Published' ); ?>:
            </td>
            <td>
                <?php echo $this->lists['published']; ?>
            </td>
        </tr>
        <tr>
            <td valign="top" align="right" class="key">
                <label for="ordering">
                    <?php echo JText::_( 'Ordering' ); ?>:
                </label>
            </td>
            <td>
                <?php echo $this->lists['ordering']; ?>
            </td>
        </tr>
        <tr>
            <td valign="top" align="right" class="key">
                <label for="title">
                    <?php echo JText::_( 'Title' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="title" id="title" size="70" maxlength="255" value="<?php echo $this->itemtagmeta->title; ?>" />
            </td>
        </tr>
        <tr>
            <td valign="top" align="right" class="key">
                <label for="description">
                    <?php echo JText::_( 'Description' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="description" id="description" size="70" maxlength="255" value="<?php echo $this->itemtagmeta->description; ?>" />
            </td>
        </tr>

        <tr>
            <td valign="top" align="right" class="key">
                <label for="keywords">
                    <?php echo JText::_( 'Keywords' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="keywords" id="keywords" size="70" maxlength="255" value="<?php echo $this->itemtagmeta->keywords; ?>" />
            </td>
        </tr>
    </table>
    </fieldset>
</td>
<td valign="top">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'Robots' ); ?></legend>
        <table class="admintable">
            <tr>
                <td width="100" align="right" class="key">
                    <label for="rindex">
                        <?php echo 'index'; ?>:
                    </label>
                </td>
                <td>
                    <input class="inputbox" type="radio" name="rindex" id="rindex0" value="0" <?php if ( $this->itemtagmeta->rindex == 0) echo "checked=\"checked\"";?> />
                    <label for="rindex0">No</label>
                    <input class="inputbox" type="radio" name="rindex" id="rindex1" value="1" <?php if ( $this->itemtagmeta->rindex == 1) echo "checked=\"checked\"";?> />
                    <label for="rindex1">Yes</label>
                    <input class="inputbox" type="radio" name="rindex" id="rindex2" value="2" <?php if ( $this->itemtagmeta->rindex == 2) echo "checked=\"checked\"";?> />
                    <label for="rindex2">Skip</label>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
                    <label for="rfollow">
                        <?php echo 'follow'; ?>:
                    </label>
                </td>
                <td>
                    <input class="inputbox" type="radio" name="rfollow" id="rfollow0" value="0" <?php if ( $this->itemtagmeta->rfollow == 0) echo "checked=\"checked\"";?> />
                    <label for="rfollow0">No</label>
                    <input class="inputbox" type="radio" name="rfollow" id="rfollow1" value="1" <?php if ( $this->itemtagmeta->rfollow == 1) echo "checked=\"checked\"";?> />
                    <label for="rfollow1">Yes</label>
                    <input class="inputbox" type="radio" name="rfollow" id="rfollow2" value="2" <?php if ( $this->itemtagmeta->rfollow == 2) echo "checked=\"checked\"";?> />
                    <label for="rfollow2">Skip</label>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
                    <label for="rsnippet">
                        <?php echo 'snippet'; ?>:
                    </label>
                </td>
                <td>
                    <input class="inputbox" type="radio" name="rsnippet" id="rsnippet0" value="0" <?php if ( $this->itemtagmeta->rsnippet == 0) echo "checked=\"checked\"";?> />
                    <label for="rsnippet0">No</label>
                    <input class="inputbox" type="radio" name="rsnippet" id="rsnippet1" value="1" <?php if ( $this->itemtagmeta->rsnippet == 1) echo "checked=\"checked\"";?> />
                    <label for="rsnippet1">Yes</label>
                    <input class="inputbox" type="radio" name="rsnippet" id="rsnippet2" value="2" <?php if ( $this->itemtagmeta->rsnippet == 2) echo "checked=\"checked\"";?> />
                    <label for="rsnippet2">Skip</label>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
                    <label for="rarchive">
                        <?php echo 'archive'; ?>:
                    </label>
                </td>
                <td>
                    <input class="inputbox" type="radio" name="rarchive" id="rarchive0" value="0" <?php if ( $this->itemtagmeta->rarchive == 0) echo "checked=\"checked\"";?> />
                    <label for="rarchive0">No</label>
                    <input class="inputbox" type="radio" name="rarchive" id="rarchive1" value="1" <?php if ( $this->itemtagmeta->rarchive == 1) echo "checked=\"checked\"";?> />
                    <label for="rarchive1">Yes</label>
                    <input class="inputbox" type="radio" name="rarchive" id="rarchive2" value="2" <?php if ( $this->itemtagmeta->rarchive == 2) echo "checked=\"checked\"";?> />
                    <label for="rarchive2">Skip</label>
                </td>
            </tr>
            <tr>
                <td width="100" align="right" class="key">
                    <label for="rodp">
                        <?php echo 'odp'; ?>:
                    </label>
                </td>
                <td>
                    <input class="inputbox" type="radio" name="rodp" id="rodp0" value="0" <?php if ( $this->itemtagmeta->rodp == 0) echo "checked=\"checked\"";?> />
                    <label for="rodp0">No</label>
                    <input class="inputbox" type="radio" name="rodp" id="rodp1" value="1" <?php if ( $this->itemtagmeta->rodp == 1) echo "checked=\"checked\"";?> />
                    <label for="rodp1">Yes</label>
                    <input class="inputbox" type="radio" name="rodp" id="rodp2" value="2" <?php if ( $this->itemtagmeta->rodp == 2) echo "checked=\"checked\"";?> />
                    <label for="rodp2">Skip</label>
                </td>
            </tr>
        </table>
    </fieldset>
</td>
</tr>
</table>

<input type="hidden" name="option" value="com_tagmeta" />
<input type="hidden" name="cid[]" value="<?php echo $this->itemtagmeta->id; ?>" />
<input type="hidden" name="task" value="" />
</form>