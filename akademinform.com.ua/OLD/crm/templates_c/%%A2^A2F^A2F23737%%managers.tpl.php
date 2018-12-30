<?php /* Smarty version 2.6.18, created on 2010-12-02 16:07:13
         compiled from managment/managers.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'managment/managers.tpl', 12, false),)), $this); ?>

<?php $_from = $this->_tpl_vars['managers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<?php if ($this->_tpl_vars['cur']['id'] == $this->_tpl_vars['manager']['id']): ?>
<div class="selectedManager"><?php echo $this->_tpl_vars['cur']['nickname']; ?>
</div>
<?php else: ?>
<div style="font-size:12px;padding: 0px 10px 1px 5px;margin-top:3px;"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment/index?id=<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="font-size:12px; color:#000"><?php echo $this->_tpl_vars['cur']['nickname']; ?>
</a></div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php if ($this->_tpl_vars['show_create_manager'] == true): ?>
<?php if ($this->_tpl_vars['actionName'] == 'newManager' || $this->_tpl_vars['actionName'] == 'newManagerSubmit'): ?>
<div class="selectedManager"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Новый менеджер<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<?php else: ?>
<div style="position:relative;left:-12px;font-size:12px;padding: 0px 10px 1px 5px;margin-top:3px;"><span style="color:#f4b715">+</span> <a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment/newManager" style="font-size:12px; color:#dc8009"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Новый менеджер<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
<?php endif; ?>
<?php endif; ?>