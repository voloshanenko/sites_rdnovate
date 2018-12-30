<?php defined('_JEXEC') or die('Restricted access'); ?>
<div class="item">
	<a href="javascript:FileManager.populateFields('<?php echo $this->_tmp_doc->path_relative; ?>')">
		<img src="<?php echo $this->_tmp_doc->icon_16; ?>" width="16" height="16" alt="<?php echo $this->_tmp_doc->name; ?>" />
		<span><?php echo $this->_tmp_doc->name; ?></span></a>
</div>