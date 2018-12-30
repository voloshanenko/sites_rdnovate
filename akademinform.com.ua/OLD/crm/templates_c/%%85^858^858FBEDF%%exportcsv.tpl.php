<?php /* Smarty version 2.6.18, created on 2010-12-21 15:39:24
         compiled from backup/exportcsv.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'backup/exportcsv.tpl', 42, false),)), $this); ?>

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

<div style="float:left;margin-top:5px;">

<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
<?php echo $this->_tpl_vars['error']; ?>
<br>
<?php endforeach; endif; unset($_from); ?>
<?php if (sizeof ( $this->_tpl_vars['errors'] ) > 0): ?><br><?php endif; ?>

<table style="font-size:13px;width:720px;">
<tr><td valign="top">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/help/helpointer.gif">
</td><td>

<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Формат CSV предназначен для резервного копирования только самой необходимой информация из базы данных (контактной данные компании и сотрудников, отсутствует история работы, метки и др.). Его можно использовать для работы с базой данных в Exel.
Для бэкапа данных используйте формат SQL<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br><br>

<div class="managerControl" style='width:310px'>

<div style="padding:11px">
<form action="<?php echo $this->_tpl_vars['siteurl']; ?>
/backup/exportcsvgo" method="POST">
<input type='hidden' name='go' value='1' />
<div style="float:left;margin-top:5px;">
<input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Экспортировать данные<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"/>
</div>
<div id="clear"></div>
</form>
<hr style='border: none; 
 color: #D6D4C6; 
 background-color: #D6D4C6; 
 height: 1px; margin:10px 0;'>
<div>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Существующие файлы экспорта:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br>
<select id="fileselect" style='width:200px;'>
<?php $_from = $this->_tpl_vars['csvfiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['filename'] => $this->_tpl_vars['url']):
?>
   <option value="<?php echo $this->_tpl_vars['siteurl']; ?>
<?php echo $this->_tpl_vars['url']; ?>
"><?php echo $this->_tpl_vars['filename']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
</select>
<input type="button" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Загрузить<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" onclick="location.href=document.getElementById('fileselect').options[document.getElementById('fileselect').selectedIndex].value" />
</div>


</div>

</div>
</td>
</tr>
</table>


</div>

</div>