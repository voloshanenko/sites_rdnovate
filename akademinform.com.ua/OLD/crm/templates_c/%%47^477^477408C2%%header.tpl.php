<?php /* Smarty version 2.6.18, created on 2010-12-23 14:42:54
         compiled from pda/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'pda/header.tpl', 3, false),)), $this); ?>
<html>
<head>
<title><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Консильери<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/pda.css" media="handheld, all">
<meta name="viewport" content="width=240">
<META content="text/html; charset=utf8" http-equiv=Content-Type>
</head>
<body>

<table border=0 id="header" cellpadding=3>
<tr>
<td align="left" class="size4" <?php if ($_SESSION['auth']['nickname'] != ""): ?>colspan=2<?php endif; ?>>
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Консильери<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>
</td>
</tr>

<?php if ($_SESSION['auth']['nickname'] != ""): ?>
<tr>
<td align="left">
<?php echo $_SESSION['auth']['nickname']; ?>

</td>
<td align="right" valign="top">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/pda/exit.gif" />
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/users/logout?pda" style="color:#fff"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>выйти<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
<span style="font-size:10%"><br><br></span>
</td>
</tr>
<?php endif; ?>

</table>

<?php if ($this->_tpl_vars['actionName'] != 'logoutStatus' && $this->_tpl_vars['actionName'] != 'login'): ?>
<div id="search">
<form action="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/selectCompanySubmit" method="POST">
<input type="text" name="company"/>
<input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Поиск<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"/>
</form> 
</div>
<?php endif; ?>

<div id="content">