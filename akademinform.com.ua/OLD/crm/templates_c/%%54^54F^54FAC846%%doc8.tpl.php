<?php /* Smarty version 2.6.18, created on 2011-01-05 14:43:59
         compiled from help/doc8.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'help/doc8.tpl', 6, false),)), $this); ?>
<table style="font-size:13px;margin-left:20px;">
<tr><td valign="top">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/help/helpointer.gif">
</td><td>

<?php $this->_tag_stack[] = array('t', array('img' => "<img src='".($this->_tpl_vars['siteurl'])."/images/help/help4.jpg' style='position:relative;top:3px;'>",'escape' => false)); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Метки позволяют классифицировать ваших клиентов, а также являются инструментом анализа вашей клиентской базы. Поставить метки клиенту можно при его создании и правке. Если вам не хватает каких-то категорий и меток, кликните %img вверху<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

</td></tr>
</table>