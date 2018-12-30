<?php /* Smarty version 2.6.18, created on 2010-12-21 16:23:51
         compiled from main/managers_v1.2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'main/managers_v1.2.tpl', 23, false),)), $this); ?>
<?php if ($_SESSION['auth']['is_super_user']): ?>


<?php echo '
<script language="JavaScript" type="text/javascript">
  function managerSwitcher() {
  	if ($(\'managerSwitcher\').value!=\'\') {
  		document.location = $(\'managerSwitcher\').value;
  	}
  }
</script>
  
'; ?>

<?php 
global $conf;
//if (substr ($_SERVER ['REQUEST_URI'], -5) != "/main") 
{
 ?>
<div style="margin-top:5px; background-image:url('<?php echo $this->_tpl_vars['siteurl']; ?>
/images/creature2.gif'); background-repeat:no-repeat; padding:4px 0px 0px 23px; height:28px;background-position:2px 1px;float:left">
  
<select name="name" style="font-size:12px;" id="managerSwitcher" onchange="managerSwitcher()">
	<?php if ($this->_tpl_vars['managerFilter'] == -1): ?>	
		<option value="" selected><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Клиенты всех менеджеров<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></option>
	<?php else: ?>
		<option value="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=manager&mparam=-1&page=1&fakemode=<?php echo $this->_tpl_vars['mode']; ?>
&fakemparam=<?php echo $this->_tpl_vars['mparam']; ?>
&return=1" checked><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Клиенты всех менеджеров<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></option>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['managerFilter'] == $_SESSION['auth']['id']): ?>	
		<option value="" selected><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Только МОИ клиенты<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></option>
	<?php else: ?>
		<option value="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=manager&mparam=<?php echo $_SESSION['auth']['id']; ?>
&page=1&fakemode=<?php echo $this->_tpl_vars['mode']; ?>
&fakemparam=<?php echo $this->_tpl_vars['mparam']; ?>
&return=1" checked><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Только МОИ клиенты<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></option>
	<?php endif; ?>
<?php $_from = $this->_tpl_vars['managers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
	
		<?php if ($this->_tpl_vars['cur']['id'] != $_SESSION['auth']['id']): ?>
		<?php if ($this->_tpl_vars['cur']['id'] == $this->_tpl_vars['managerFilter']): ?>
			<option value="" selected><?php echo $this->_tpl_vars['cur']['nickname']; ?>
</option>
		<?php else: ?>
			
			<option value="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=manager&mparam=<?php echo $this->_tpl_vars['cur']['id']; ?>
&page=1&fakemode=<?php echo $this->_tpl_vars['mode']; ?>
&fakemparam=<?php echo $this->_tpl_vars['mparam']; ?>
&return=1"><?php echo $this->_tpl_vars['cur']['nickname']; ?>
</option>
		<?php endif; ?>
		<?php endif; ?>
		
		
		
<?php endforeach; endif; unset($_from); ?>
</select>


</div>
<?php 
}
 ?>
<?php endif; ?>