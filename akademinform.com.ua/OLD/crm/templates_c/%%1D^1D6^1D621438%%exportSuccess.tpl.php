<?php /* Smarty version 2.6.18, created on 2010-12-21 15:40:02
         compiled from backup/exportSuccess.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'backup/exportSuccess.tpl', 26, false),)), $this); ?>
<div style="padding:20px 40px 0px 40px;">

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

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "backup/leftmenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div style="float:left;margin-left:40px;margin-top:5px;">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Данные успешно экспортированы и доступны по адресу:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <a href = "<?php echo $this->_tpl_vars['siteurl']; ?>
/<?php echo $this->_tpl_vars['filename']; ?>
"><?php echo $this->_tpl_vars['siteurl']; ?>
/<?php echo $this->_tpl_vars['filename']; ?>
</a>
</div>

</div>