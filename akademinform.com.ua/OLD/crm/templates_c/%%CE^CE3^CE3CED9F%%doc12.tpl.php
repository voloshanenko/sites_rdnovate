<?php /* Smarty version 2.6.18, created on 2010-12-21 16:36:17
         compiled from help/doc12.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'help/doc12.tpl', 6, false),)), $this); ?>
<table style="font-size:13px;margin-left:40px;margin-bottom:10px;">
<tr><td valign="top">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/help/helpointer.gif">
</td><td>

<?php $this->_tag_stack[] = array('t', array('escape' => false)); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ваш первый клиент добавлен в базу!<br><br>
Сейчас вы видите карточку компании - одну из основных страниц Консильери. На карточке отображена вся информация о клиенте.</br></br> 

На ней же можно поставить напоминания, касающиеся данного клиента. Или добавить событие в историю отношений с клиентом (форма внизу карточки).</br></br>

Попасть на карточку конкретного клиента можно следующими способами:
<b>1</b> Введя в поле поиска полное название клиента, или его часть
<b>2</b> Найдя клиента в любом из списоков: алфавитном, метках и т.д. и кликнув по его названию.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

</td></tr>
</table>