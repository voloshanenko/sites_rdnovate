<?php /* Smarty version 2.6.18, created on 2010-12-21 16:25:12
         compiled from help/doc14.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'help/doc14.tpl', 2, false),)), $this); ?>
<div style="font-size:11px;background-color:#fff;padding: 3px 2px 3px 2px;margin-top:15px;">
<span style="color:#17b80b">#</span> <?php $this->_tag_stack[] = array('t', array('escape' => false)); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>В каждое поле можно вносить сколько угодно значений. Для удобства разделяйте их запятыми, например:<br>&nbsp;&nbsp;&nbsp; «(4732) 20-53-70, 89722849327».<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>