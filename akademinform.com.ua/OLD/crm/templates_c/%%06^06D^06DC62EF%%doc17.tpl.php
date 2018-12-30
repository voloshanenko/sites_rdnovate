<?php /* Smarty version 2.6.18, created on 2010-12-21 17:32:02
         compiled from help/doc17.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'help/doc17.tpl', 6, false),)), $this); ?>
<table style="font-size:13px;">
<tr><td valign="top">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/help/helpointer.gif">
</td><td>

<?php $this->_tag_stack[] = array('t', array('img' => "<img src='".($this->_tpl_vars['siteurl'])."/images/help/help5.jpg' style='position:relative;top:3px;'>",'escape' => false)); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>На этой странице собираются все напоминания по всем компаниям.<br><br>
<b>Ставятся напоминания на карточке компании.</b> Найдите нужного клиента (используя поиск, метки или алфавитный список) - и на его карточке кликните по надписи <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><img 
src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/flag_own2.gif"> <span style="color:#000;text-decoration:none;border-bottom:1px dashed #000"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>поставить напоминание<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span><br><br>
<br>
<?php $this->_tag_stack[] = array('t', array('escape' => false)); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Напоминания - удобная штука для управления работой с клиентами.<br><br>
Напоминания бывают трех видов: самому себе, всей вашей компании, младшему менеджеру.<br><br>
В напоминания можно вносить что угодно: задачи, звонки, встречи, долги, дни рождения, общие пометки и т.д.<br><br>
Напоминание можно привязат к конкретной дате - тогда оно попадет в календарь, а в нужный день и на главную страницу.<br><br>
Напоминания видны на карточке компании, а на этой странице собираются напоминания вообще по всем компаниям - удобно для тактического обзора.
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</td></tr>
</table>