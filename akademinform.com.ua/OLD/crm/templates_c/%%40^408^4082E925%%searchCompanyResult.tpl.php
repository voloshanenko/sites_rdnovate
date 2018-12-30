<?php /* Smarty version 2.6.18, created on 2010-12-23 14:43:34
         compiled from pda/main/searchCompanyResult.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'pda/main/searchCompanyResult.tpl', 2, false),)), $this); ?>

<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main" style="color:black;"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Клиенты<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a> / 
<b><?php echo $this->_tpl_vars['nowLocation']; ?>
</b>
<br>

<span class="size2">

<?php if ($this->_tpl_vars['pages'] == 1): ?><br><?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pda/pages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php if (sizeof ( $this->_tpl_vars['companyList'] ) == 0): ?>
<br><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Не найдено.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>

<?php $this->assign('odd', true); ?>
<?php $_from = $this->_tpl_vars['companyList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<?php if ($this->_tpl_vars['odd'] == true): ?><div style="background-color:#ededeb"><?php else: ?><div><?php endif; ?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyBriefFromLabel?id=<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
&mode=<?php echo $this->_tpl_vars['mode']; ?>
&mparam=<?php echo $this->_tpl_vars['mparam']; ?>
&page=1" style="color:#ee9420"><b><?php echo $this->_tpl_vars['cur']['prop']['name']; ?>
</b></a>
</div>
<?php if ($this->_tpl_vars['odd'] == true): ?><?php $this->assign('odd', false); ?><?php else: ?><?php $this->assign('odd', true); ?><?php endif; ?><br>
<?php endforeach; endif; unset($_from); ?>
</span>