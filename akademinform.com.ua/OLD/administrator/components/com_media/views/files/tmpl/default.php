<?php defined('_JEXEC') or die('Restricted access'); ?>
<script type='text/javascript'>
var file_base_path = '<?php $params =& JComponentHelper::getParams('com_media');
echo $params->get('files_path', 'images/stories');?>/';
</script>
<form action="index.php" id="fileForm" method="post" enctype="multipart/form-data">
	<div id="messages" style="display: none;">
		<span id="message"></span><img src="<?php echo JURI::base() ?>components/com_media/images/dots.gif" width="22" height="12" alt="..." />
	</div>
	<fieldset>
		<div style="float: left">
			<label for="folder"><?php echo JText::_('Directory') ?></label>
			<?php echo $this->folderList; ?>
			<button type="button" id="upbutton" title="<?php echo JText::_('Directory Up') ?>"><?php echo JText::_('Up') ?></button>
		</div>
		<div style="float: right">
			<button type="button" onclick="FileManager.onok();window.parent.document.getElementById('sbox-window').close();"><?php echo JText::_('Insert') ?></button>
			<button type="button" onclick="window.parent.document.getElementById('sbox-window').close();"><?php echo JText::_('Cancel') ?></button>
		</div>
	</fieldset>
	<iframe id="fileframe" name="fileframe" src="index.php?option=com_media&amp;view=filesList&amp;tmpl=component&amp;folder=<?php echo $this->state->folder?>"></iframe>

	<fieldset>
		<table class="properties">
			<tr>
				<td><label for="f_url"><?php echo JText::_('File URL') ?></label></td>
				<td><input type="text" id="f_url" value="" /></td>
				<td><label for="f_align"><?php echo JText::_('Align') ?></label></td>
				<td>
					<select size="1" id="f_align" title="Positioning of this file">
						<option value="" selected="selected"><?php echo JText::_('Not Set') ?></option>
						<option value="left"><?php echo JText::_('Left') ?></option>
						<option value="right"><?php echo JText::_('Right') ?></option>
						<option value="center"><?php echo JText::_('Center') ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label for="f_text"><?php echo JText::_('Title_text') ?></label></td>
				<td><input type="text" id="f_text" value="" /></td>
			</tr>
			<tr>
				<td><label for="f_title"><?php echo JText::_('Title') ?></label></td>
				<td><input type="text" id="f_title" value="" /></td>
				<td><label for="f_caption"><?php echo JText::_('Caption') ?></label></td>
				<td><input type="checkbox" id="f_caption" /></td>
			</tr>
		</table>
	</fieldset>
	<input type="hidden" id="dirPath" name="dirPath" />
	<input type="hidden" id="f_file" name="f_file" />
	<input type="hidden" id="tmpl" name="component" />
</form>
<?php	$params =& JComponentHelper::getParams('com_media');
		$acl = & JFactory::getACL();
		switch ($params->get('allowed_media_usergroup')) 
		{
			case '1':
				$acl->addACL( 'com_media', 'upload', 'users', 'publisher' );
				break;
			case '2':
				$acl->addACL( 'com_media', 'upload', 'users', 'publisher' );
				$acl->addACL( 'com_media', 'upload', 'users', 'editor' );
				break;
			case '3': 
				$acl->addACL( 'com_media', 'upload', 'users', 'publisher' );
				$acl->addACL( 'com_media', 'upload', 'users', 'editor' );				
				$acl->addACL( 'com_media', 'upload', 'users', 'author' );
				break;								
			case '4':
				$acl->addACL( 'com_media', 'upload', 'users', 'publisher' );				
				$acl->addACL( 'com_media', 'upload', 'users', 'editor' );
				$acl->addACL( 'com_media', 'upload', 'users', 'author' );
				$acl->addACL( 'com_media', 'upload', 'users', 'registered' );
				break;
		} ?>
<?php $user = & JFactory::getUser(); ?>
<?php $canUpload= ($user->authorize('com_media', 'upload')); ?> 	
<?php if ($canUpload) : ?>			
	<form action="<?php echo JURI::base(); ?>index.php?option=com_media&amp;task=file.upload&amp;tmpl=component&amp;<?php echo $this->session->getName().'='.$this->session->getId(); ?>&amp;pop_up=1&amp;<?php echo JUtility::getToken();?>=1" id="uploadForm" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend><?php echo JText::_('Upload'); ?></legend>
			<fieldset class="actions">
				<input type="file" id="file-upload" name="Filedata" />
				<input type="submit" id="file-upload-submit" value="<?php echo JText::_('Start Upload'); ?>"/>
				<span id="upload-clear"></span>
			</fieldset>
			<ul class="upload-queue" id="upload-queue">
				<li style="display: none" />
			</ul>
		</fieldset>
		<input type="hidden" name="return-url" value="<?php echo base64_encode('index.php?option=com_media&view=files&tmpl=component&e_name='.JRequest::getCmd('e_name')); ?>" />
</form>
<?php endif; ?>