<?php /* Smarty version 2.6.18, created on 2010-12-01 22:35:59
         compiled from index/login3.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'index/login3.tpl', 8, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN"
        "http://www.w3.org/TR/html4/strict.dtd">



<html>
<head>
	<title><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Вход в Консильери<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></title>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<style>
<?php echo '
BODY {padding: 0 0 0 0; margin: 0 0 0 0; color: #000; font-family: Arial, Tahoma, sans-serif; font-size: 85%; background: url('; ?>
<?php echo $this->_tpl_vars['siteurl']; ?>
<?php echo '/images/body_back.png) repeat-x #88ff1a;}
#logo {position: absolute; z-index: 3; top: 0; right: 0;}
#login {background: url('; ?>
<?php echo $this->_tpl_vars['siteurl']; ?>
<?php echo '/images/login_back.png) no-repeat #fff; width: 438px; height: 261px; margin: 166px auto 0 auto;  }
.kons {margin: 20px 0 0 35px;}
.blabla { margin: 10px 0 0 40px;}
.label { vertical-align: middle; text-align: right; padding-right: 17px;}
.input { height: 28px; width: 215px; background: #feffed; border-top: 1px solid #989898; border-left: 1px solid #989898; border-right: 1px solid #cfcfcf; border-bottom: 1px solid #cfcfcf;}
.vr { height: 15px;}
.value { vertical-align: middle;}

small {font-size: .8em;}
A {color: #000; text-decoration: underline;}

.submit { height: 34px;  line-height: 30px; padding: 0 25px 0 25px;  background: #159f04;  border-right: 2px solid #0e6a03;
 color: #fff; font-weight: bold; border-bottom: 2px solid #0e6a03; border-top: 2px solid #159f04; border-left: 2px solid #159f04;  font-family: Arial, Tahoma, sans-serif; font-size: 1em;}
'; ?>

</style>

<?php if ($this->_tpl_vars['lang'] == 'de'): ?>
<link href="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/deutsch.css" rel="stylesheet" type="text/css">
<?php endif; ?>

</head>

<body>
<div id="login">
<form action="<?php echo $this->_tpl_vars['siteurl']; ?>
/users/login" method="POST">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/kons.png" alt="Консильери" class="kons" />
<table cellpadding="0" cellspacing="0" border="0" class="blabla">
<tr>
	<td class="label"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>логин<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
	<td class="value"><input type="text" class="input" name="login_username" value="<?php echo $this->_tpl_vars['login_username']; ?>
"></td>
</tr>
<tr><td colspan="2" class="vr"><?php if (( ! empty ( $this->_tpl_vars['error'] ) )): ?><small style = "color:red"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Была указана неправильная пара логин-пароль<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></small></td></tr>
<tr>
	<td class="label"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>пароль<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
	<td class="value"><input type="password" class="input"  name="login_password"> &nbsp;  <small><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/companies/restore"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>забыли?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></small></td>
</tr>
<tr>
	<td></td>
	<td style="padding-top: 5px;"><input type="checkbox" name="remember_me" value="1" checked="checked" id="remember"> <small><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>запомнить меня на этом компьютере<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></small></td>
</tr>
<tr>
	<td></td>
	<td style="padding-top: 15px;"><input type="submit" class="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Поработать!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"></td>
</tr>
</table>

</form>
</div>


<div id=logo><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/logo_reg.png" alt="K" /></div>
</body>
</html>