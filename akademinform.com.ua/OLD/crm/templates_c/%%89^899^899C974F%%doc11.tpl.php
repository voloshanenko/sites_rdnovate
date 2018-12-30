<?php /* Smarty version 2.6.18, created on 2010-12-21 16:36:17
         compiled from help/doc11.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'help/doc11.tpl', 2, false),)), $this); ?>
<span style="font-size:10px;">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Если поставить в тексте напоминания дату (формат дд.мм.гг), напоминание станет датированным и попадет в расписание. Пример: «перезвонить по поводу предложения 12.08.08».<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</span>