<?php /* Smarty version 2.6.18, created on 2010-12-02 16:06:58
         compiled from backup/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'backup/index.tpl', 34, false),)), $this); ?>
<div style="padding:20px 40px 0px 40px;">

<?php if (isset ( $this->_tpl_vars['error'] )): ?>
<?php if (isset ( $this->_tpl_vars['error']['username'] )): ?>
<span style="background-color:#f34320; padding:2px 5px 2px 5px; color:#fff; font-size:12px;"><?php echo $this->_tpl_vars['error']['username']; ?>
</span><br>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['error']['nickname'] )): ?>
<span style="background-color:#f34320; padding:2px 5px 2px 5px; color:#fff; font-size:12px;"><?php echo $this->_tpl_vars['error']['nickname']; ?>
</span><br>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['error']['password'] )): ?>
<span style="background-color:#f34320; padding:2px 5px 2px 5px; color:#fff; font-size:12px;"><?php echo $this->_tpl_vars['error']['password']; ?>
</span><br>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['error']['email'] )): ?>
<span style="background-color:#f34320; padding:2px 5px 2px 5px; color:#fff; font-size:12px;"><?php echo $this->_tpl_vars['error']['email']; ?>
</span><br>
<?php endif; ?>

<?php endif; ?>





<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "backup/leftmenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div style="margin-left:40px;margin-top:5px;">
<table style="font-size:13px;width:720px;margin-left:30px;">
<tr><td valign="top">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/help/helpointer.gif">
</td><td>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Данный раздел предназначен для управления базой данных.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<ol>
<?php if (! $this->_tpl_vars['is_saas']): ?><li><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>При любых изменениях в системе (обновления, установка новых модулей и т.д.) обязательно производите резервное копирование данных в формат SQL.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></li><?php endif; ?>
<li><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Формат CSV предназначен для резервного копирования только самой необходимой информация из базы данных (контактной данные компании и сотрудников, отсутствует история работы, метки и др.). Его можно использовать для работы с базой данных в Excel.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></li>
<?php if (! $this->_tpl_vars['is_saas']): ?><li><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Востановление данных производится из формата SQL. Имейте ввиду, что после восстановления, вся информация в базе заменяется. Будьте аккуратны при использовании этой функции, чтобы не удалить последние изменения.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></li><?php endif; ?>
<li><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Импорт из Excel является удобным средством для заполнения базы данных клиентов. Все клиенты ипортированные через Excel добавляются в базу данных, не изменяя существующую информацию.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></li>
</ol>
</td>
</tr>
</table>


</div>