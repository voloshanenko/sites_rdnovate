<?php /* Smarty version 2.6.18, created on 2010-12-21 16:58:36
         compiled from help/doc9.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'help/doc9.tpl', 6, false),)), $this); ?>
<table style="font-size:13px;">
<tr><td valign="top">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/help/helpointer.gif">
</td><td>

<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>В журнал собираются все события, записанные в историю ваших клиентов.

Пока вы не внесли ни одного события - поэтому журнал пуст.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br><br>
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>События в историю компании заносятся на её карточке.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Найдите нужного клиента (через поиск, алфавитный список, метки) - и внизу страницы вы увидите простую форму для добавления события.


История работы с клиентом - это ценный актив вашей компании. В неё можно заглянуть, чтобы освежить память. Она поможет новому менеджеру быстро включится в работу с клиентом. В ней фиксируются важные даты (договора, счета, поставки) - всегда можно заглянуть и уточнить.

В историю стоит вносить все более-менее важные события: результаты звонков и встреч, полученную информацию, заключенные сделки и т.д.

Можно вносить события сразу же (версия для КПК: pda.dacons.ru), а можно в конце рабочего дня.

Журнал - это также средство контроля работы ваших менеджеров: сколько звонков и встреч совершено, каковы результаты, над чем ведется работа.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

</td></tr>
</table>