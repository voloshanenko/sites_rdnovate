<?php /* Smarty version 2.6.18, created on 2010-12-02 16:05:58
         compiled from managment/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'managment/index.tpl', 4, false),)), $this); ?>

<div style="padding:0px 40px 0px 40px;">
<div style='float:left; margin-top: 20px;'>
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Менеджеры<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br>

<?php if (isset ( $this->_tpl_vars['error'] )): ?>
<?php if (isset ( $this->_tpl_vars['error']['username'] )): ?>
<span style="background-color:#f34320; padding:2px 5px 2px 5px; color:#fff; font-size:12px;"><?php echo $this->_tpl_vars['error']['username']; ?>
</span><br>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['error']['nickname'] )): ?>
<span style="background-color:#f34320; padding:2px 5px 2px 5px; color:#fff; font-size:12px;"><?php echo $this->_tpl_vars['error']['nickname']; ?>
</span><br>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['error']['password'] )): ?>
<span style="background-color:#f34320; padding:2px 5px 2px 5px; color:#fff; font-size:12px;"><?php echo $this->_tpl_vars['error']['password']; ?>
</span><br>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['error']['email'] )): ?>
<span style="background-color:#f34320; padding:2px 5px 2px 5px; color:#fff; font-size:12px;"><?php echo $this->_tpl_vars['error']['email']; ?>
</span><br>
<?php endif; ?>

<?php endif; ?>




<?php if ($this->_tpl_vars['showInfo']): ?>

<div style="float:left;margin-top:10px;">
<?php $_from = $this->_tpl_vars['managers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<div style="font-size:12px;padding: 0px 10px 1px 5px;margin-top:3px;"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment/index?id=<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="font-size:12px; color:#000"><?php echo $this->_tpl_vars['cur']['nickname']; ?>
</a></div>
<?php endforeach; endif; unset($_from); ?>

<?php if ($this->_tpl_vars['show_create_manager'] == true): ?>

<?php if ($this->_tpl_vars['actionName'] == 'newManager' || $this->_tpl_vars['actionName'] == 'newManagerSubmit'): ?>
<div class="selectedManager"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Новый менеджер<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<?php else: ?>
<div style="position:relative;left:-12px;font-size:12px;padding: 0px 10px 1px 5px;margin-top:3px;"><span style="color:#f4b715">+</span> <a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment/newManager" style="font-size:12px; color:#dc8009"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Новый менеджер<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
<?php endif; ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "managment/leftmenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</div>
<div style="float:left;margin-left:40px;margin-top:20px;">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help/doc16.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><br><br><br>
</div>

<?php else: ?>

<div style="float:left;margin-top:10px;">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "managment/managers.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "managment/leftmenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<div style="float:left;margin-left:40px;margin-top:5px;">

<div class="managerControl">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "managment/manager.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div style="border-bottom:1px solid #cfcdc1; font-size:10px;"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "managment/editManagerInfo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div style="border-bottom:1px solid #cfcdc1; font-size:10px;"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "managment/delete.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

</div>
</div>

<div id="clear"></div>
<?php endif; ?>