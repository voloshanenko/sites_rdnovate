<?php
/**
 * @package JoomlaPack
 * @copyright Copyright (c)2006-2009 JoomlaPack Developers
 * @license GNU General Public License version 2, or later
 * @version $id$
 * @since 1.3
 */

// Protect from unauthorized access
defined('_JEXEC') or die('Restricted Access');

$editor =& JFactory::getEditor();
$getText = $editor->getContent('comment');

?>
<?php if($this->haserrors): ?>
<div class="errorframe">
<h3><?php echo JText::_('BACKUP_LABEL_DETECTEDERRORS') ?></h3>
<p><?php echo JText::_('BACKUP_LABEL_ERRORSLIST') ?></p>
<?php echo $this->quirks; ?></div>
<?php else: ?>

<script type="text/javascript" language="Javascript">
function submitButton(pressbutton)
{
	var form = document.adminForm;
	<?php echo $editor->save('comment'); ?>
	submitform( pressbutton );
}
</script>

<form name="adminForm" id="adminForm"
	action="<?php echo JURI::base(); ?>index.php" method="post"><input
	type="hidden" name="task" value="backup" /> <input type="hidden"
	name="option" value="com_joomlapack" /> <input type="hidden"
	name="view" value="backup" />

<table class="adminlist" width="100%">


	<input type="hidden" name="profile" id="profile" value="1" />

	<input type="hidden" name="description" value="<?php echo $this->description; ?>"/>
	<input type="hidden" name="comment" value="<?php echo $this->comment; ?>"/>
<tr>
<td>
	<div id="cpanel">
		<?php $template	= $mainframe->getTemplate(); ?>

		<div style="float:left;">

			<div class="icon">
				<a href="#" onclick="submitButton('backup');">
					<?php echo JHTML::_('image.site', 'icon-48-database.png', '/templates/'. $template .'/images/header/', NULL, NULL, 'BACKUP_LABEL_START' ); ?>
					<span><?php echo JText::_( 'BACKUP_LABEL_START'); ?></span>
				</a>
			</div>
		</div>
		<div style="float:left;">
			<div class="icon">

				<a href="index.php?option=com_joomlapack&view=buadmin">
					<?php echo JHTML::_('image.site', 'icon-48-database.png', '/templates/'. $template .'/images/header/', NULL, NULL, 'OLD COPIES' ); ?>
					<span><?php echo JText::_( 'OLD COPIES'); ?></span>
				</a>
			</div>
		</div>
		<div style="float:left;">
			<div class="icon">
				<a href="#" onclick="javascript:history.back();">
					<?php echo JHTML::_('image.site', 'icon-48-cancel.png', '/templates/'. $template .'/images/header/', NULL, NULL, 'BACKUP_LABEL_CANCEL' ); ?>
					<span><?php echo JText::_( 'BACKUP_LABEL_CANCEL'); ?></span>
				</a>
			</div>
		</div>
	</div>
</td>
</tr>
</table>
</form>
	<?php endif; ?>