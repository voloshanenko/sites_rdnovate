<?php /* Smarty version 2.6.18, created on 2010-12-21 16:24:47
         compiled from journal/daymanagers.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'journal/daymanagers.tpl', 2, false),)), $this); ?>
<div id="managersfilter">
	<span class="managertext"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Менеджеры:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span><br><br>
	<?php if ($this->_tpl_vars['manager'] == -1): ?>
		<div class="managersel"><span><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Все менеджеры<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></div>
	<?php else: ?>
		<div class="managerunsel">
		<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/journal?scale=1&d=<?php echo $this->_tpl_vars['d']; ?>
&m=<?php echo $this->_tpl_vars['m']; ?>
&y=<?php echo $this->_tpl_vars['y']; ?>
"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Все менеджеры<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
		</div>
	<?php endif; ?>
	<?php $_from = $this->_tpl_vars['managers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
		<?php if ($this->_tpl_vars['cur']['id'] == $this->_tpl_vars['manager']): ?>
			<div class="managersel"><span><?php echo $this->_tpl_vars['cur']['nickname']; ?>
 [<?php echo $this->_tpl_vars['cur']['cnt']; ?>
]</span></div>
		<?php else: ?>
			<div class="managerunsel">
			<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/journal?scale=1&d=<?php echo $this->_tpl_vars['d']; ?>
&m=<?php echo $this->_tpl_vars['m']; ?>
&y=<?php echo $this->_tpl_vars['y']; ?>
&manager=<?php echo $this->_tpl_vars['cur']['id']; ?>
"><?php echo $this->_tpl_vars['cur']['nickname']; ?>
</a> [<?php echo $this->_tpl_vars['cur']['cnt']; ?>
]
			</div>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>		
</div>