<?php /* Smarty version 2.6.18, created on 2011-01-14 12:39:03
         compiled from help/doc3.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'help/doc3.tpl', 6, false),)), $this); ?>
<table style="font-size:13px;">
<tr><td valign="top">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/help/helpointer.gif">
</td><td>

<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>У вас нет датированных напоминаний. Они удобны, когда речь идет о конкретно назначенных делах - встречах, звонках и т.д. 

Когда добавляете напоминание, поставьте в его тексте дату (формат дд.мм.гг.) - и напоминание станет датированным! Попадет в расписание, а в нужный день - и на главную страницу.

Пример: «перезвонить по поводу предложения 12.08.08».<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

</td></tr>
</table>