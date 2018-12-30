<?php /* Smarty version 2.6.18, created on 2010-12-21 16:22:34
         compiled from managment/manager.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'managment/manager.tpl', 2, false),)), $this); ?>
<div style="padding: 12px 12px 12px 12px;">
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Передача фирмы<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br><br>

<form method="POST" action="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment/transferCompany">

<div class="managerInputLabel">&nbsp;</div>
<div style="float:left;">
 
  <select name="company" style="width: 200px;">
  <?php $_from = $this->_tpl_vars['allCompanies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
    <option value="<?php echo $this->_tpl_vars['cur']['id']; ?>
"><?php echo $this->_tpl_vars['cur']['name']; ?>
</option>
  <?php endforeach; endif; unset($_from); ?>	
  </select>
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/managmentTransfer.gif" style="position:relative; top:5px; margin-left:15px; margin-right:20px;">
  <select name="manager" style="width: 200px;">
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

<div class="managerInputLabel"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>причина<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div style="float:left;margin-top:5px;">

<input type="text" name="comment" style="width:420px;" value="<?php echo $this->_tpl_vars['comment']; ?>
">
</div>  
<div id="clear"></div>
  
<input type="hidden" name="page" value="<?php echo $this->_tpl_vars['page']; ?>
"/>
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['manager']['id']; ?>
"/>

<div class="managerInputLabel">&nbsp;</div>
<div style="float:left;">
<input style="float:left; background-color:#68c248; border-right: 1px solid #2c6d15; border-bottom: 1px solid #2c6d15; margin-top:6px; cursor:pointer;color:#fff;font-weight: bold" type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Передать<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" class="IEremoteBorder"/>    
</div>
<div id="clear"></div>

</form>

</div>