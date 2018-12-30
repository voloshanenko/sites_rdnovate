<?php /* Smarty version 2.6.18, created on 2010-12-23 17:15:58
         compiled from error/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'error/index.tpl', 5, false),)), $this); ?>
<table cellpadding="0" border="0" class="content">
<tr><td width="40"></td>
<td width="620" valign="top" align="left">

<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ошибка!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

</td>
<td>

</td>
</table>