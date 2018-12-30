<?php /* Smarty version 2.6.18, created on 2010-12-02 16:05:58
         compiled from managment/leftmenu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'managment/leftmenu.tpl', 7, false),)), $this); ?>
<!--<?php if ($_SESSION['auth']['is_admin'] == 1): ?>
	<div style="font-size:12px;padding: 0px 10px 1px 5px;margin-top:3px;"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment/delclient" style="font-size:12px; color:#000">Удаление клиентов</a></div>
<?php endif; ?>-->

<?php if ($_SESSION['auth']['is_admin'] == 1): ?>
<br><br>
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Информация о
компании<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br>
<div style="font-size:12px;padding: 0px 10px 1px 5px;margin-top:3px;"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment/customer" style="font-size:12px; color:#000"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Название компании<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
<?php endif; ?>