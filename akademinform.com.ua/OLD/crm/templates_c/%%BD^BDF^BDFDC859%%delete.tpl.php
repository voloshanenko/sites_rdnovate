<?php /* Smarty version 2.6.18, created on 2010-12-21 16:22:34
         compiled from managment/delete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'managment/delete.tpl', 10, false),)), $this); ?>
<div style="padding: 12px;">

<?php if ($this->_tpl_vars['manager']['id'] == $_SESSION['auth']['id'] && $_SESSION['auth']['is_super_user'] == 1): ?>
<?php else: ?>

<form method="GET" action="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment/deleteManagerSubmit">
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Увольнение менеджера<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br><br>


<div class="managerInputLabel" style="margin-top:0px;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>передать фирмы<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div style="float:left;margin-top:5px;">
<select name="manager" style="width:200px;">
  <?php $_from = $this->_tpl_vars['managersList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
    <option value="<?php echo $this->_tpl_vars['cur']['id']; ?>
"><?php echo $this->_tpl_vars['cur']['nickname']; ?>
</option>
  <?php endforeach; endif; unset($_from); ?>	
</select>
</div>
<div id="clear"></div>

<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
"/>
<div class="managerInputLabel"></div>
<div style="float:left;margin-top:5px;">
<input type="submit" style="float:left; background-color:#e0e0e0; border-right: 1px solid #a3a3a3; border-bottom: 1px solid #a3a3a3; margin-top:6px; cursor:pointer;color:#ff0042;font-weight: bold" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Уволить<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" onclick="return confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Удалить менеджера?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>');" class="IEremoteBorder"/>
</div>
<div id="clear"></div>
</form>  

<?php endif; ?>

</div>