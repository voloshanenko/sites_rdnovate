<?php /* Smarty version 2.6.18, created on 2010-12-21 16:24:33
         compiled from main/reminderAndFavoritesShort_v1.2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'main/reminderAndFavoritesShort_v1.2.tpl', 7, false),)), $this); ?>

<div style="font-size:12px;">
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/reminders"><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/flag_own.gif" style="border:0px;"></a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/reminders" style="color:#000;"><b><?php echo $this->_tpl_vars['reminderCount']; ?>
</b></a> 


<span style="color:#868585;font-size:11px;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>сегодня:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span> <a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/reminders" style="color:#000"><b><?php echo $this->_tpl_vars['reminderCountToday']; ?>
</b></a>

</div>