<?php /* Smarty version 2.6.18, created on 2011-01-28 13:41:41
         compiled from backup/sqlbackup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'backup/sqlbackup.tpl', 35, false),)), $this); ?>

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

<div style="margin-top:5px;">
<table style="font-size:13px;width:720px;margin-left:30px;">
<tr><td valign="top">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/help/helpointer.gif">
</td><td>
	<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Данный раздел предназначен для полного бэкапа базы данных. Мы рекомендуем  производить резервное копирование базы данных не реже одного раза в неделю. Не храните всю информацию на хостинге, делайте копии на другие надежные носители и держите их в надежном месте.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br><br>

<?php if ($this->_tpl_vars['is_demo']): ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Вы не можете загрузить данные в демо-режиме.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php else: ?>
<SCRIPT LANGUAGE="JavaScript">
	idTimer=window.setTimeout("reloadFrame();", 3 * 1000);
	function reloadFrame() {
		frame1 = document.getElementById("frame1");
		if ((frame1.contentDocument == null)||(frame1.contentDocument.title == ""))
			if (navigator.userAgent.toLowerCase().indexOf('gecko')!=-1)
				frame1.src+='&'+new Date().getTime();
			else
				frame1.location.reload();
		return;
	}
</SCRIPT>
 <iframe src="<?php echo $this->_tpl_vars['siteurl']; ?>
/dumper/dumper.php?act=backup" noresize="noresize" frameborder="0" border="0" cellspacing="0" style="border: none ; width: 385px; height: 290px;" align="left" id='frame1'>
    <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ваш браузер не поддерживает плавающие фреймы!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
 </iframe>
<?php endif; ?>
 
</td>
</tr>
</table>

</div>

</div>