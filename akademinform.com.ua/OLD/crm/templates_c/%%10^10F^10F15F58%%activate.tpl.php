<?php /* Smarty version 2.6.18, created on 2010-12-01 22:38:04
         compiled from index/activate.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'index/activate.tpl', 8, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN"
        "http://www.w3.org/TR/html4/strict.dtd">



<html>
<head>
	<title><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Активация программы<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></title>
<META content="text/html; charset=utf8" http-equiv=Content-Type>
<style>
<?php echo '
BODY {padding: 0 0 0 0; margin: 0 0 0 0; color: #000; font-family: Arial, Tahoma, sans-serif; font-size: 85%; background: url('; ?>
<?php echo $this->_tpl_vars['siteurl']; ?>
<?php echo '/images/body_back.png) repeat-x #88ff1a;}
#logo {position: absolute; z-index: 3; top: 0; right: 0;}
#login {/*background: url('; ?>
<?php echo $this->_tpl_vars['siteurl']; ?>
<?php echo '/images/login_back.png) no-repeat #fff; */ width: 438px; height: 500px; margin: 166px auto 0 auto;  bgcolor:white; background-color:white;}
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
</head>

<body>
<div id="login">

<img src="http://consileri.com/demo/images/kons.png" alt="Консильери" class="kons" />
<form method="POST" action = "<?php echo $this->_tpl_vars['siteurl']; ?>
/index/activate">
<table cellpadding="0" cellspacing="0" border="0" class="blabla">
<?php if ($this->_tpl_vars['mode'] != 2): ?>
<tr>
	<td>
<span style = "padding-right: 30px">
<?php if (! $this->_tpl_vars['we_need_more_users']): ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Для того, чтобы начать работу с программой, сначала нужно её активировать.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <br>
<?php $this->_tag_stack[] = array('t', array('url' => "<a href = 'http://www.consileri.ru/reg/' target = _blank>http://www.consileri.ru/reg/</a>",'escape' => false)); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Для этого необходимо посетить страницу %url , где зарегистрировать программу на своё имя, и при регистрации ввести этот «Запрос на активацию»:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php else: ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Вы зарегистрировали больше пользователей, чем это предусмотрено вашим лицензионным ключом. <br>
Обратитесь, пожалуйста, в службу техподдержки <a href = "mailto:support@consileri.ru">support@consileri.ru</a> , сообщите 
количество пользователей, которое наиболее точно соответствует потребностям вашего бизнеса
и этот «Запрос на активацию»:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>
</span>
</td>
</tr>
<tr><td class="vr"></td></tr>
<tr>
	<td class="value"><textarea name = "act" readonly = "readonly" style="width: 250px; height: 75px;"><?php echo $this->_tpl_vars['activation_request']; ?>
</textarea></td>
</tr>
<tr><td class="vr"></td></tr>
<tr>
	<td style = "padding-right:30px;">
<span style = "padding-right: 30px">
<?php if (! $this->_tpl_vars['we_need_more_users']): ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>После регистрации программы по указанному адресу, вы получите «Ключ активации».
Введите его сюда:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php else: ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>После этого вы получите «Ключ активации».
Введите его сюда:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>
<span style = "padding-right: 30px">
</td>
</tr>
<tr><td class="vr"></td></tr>
<tr>
	<td class="value">
<span style = "padding-right: 30px">
<input type="text" class="input"  name="code" id = "code" />
	<?php if (( $this->_tpl_vars['mode'] == 1 )): ?>
	<br><small><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Был указан неверный код. Попробуйте его ввести ещё раз.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></small>
	<?php endif; ?>
</span>
	</td>
</tr>
<tr><td class="vr"></td></tr>
<tr>
	<td style="padding-top: 15px;"><input type="submit" class="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Активировать программу<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"></td>
</tr>
<?php else: ?>
<tr>
	<td style="padding-top: 15px;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Программа успешно активирована.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
</tr>
<tr>
	<td style="padding-top: 15px;"><input type="button" class="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Поработать!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" onclick = "window.location = '<?php echo $this->_tpl_vars['siteurl']; ?>
/';"></td>
</tr>
<?php endif; ?>
</table>

</form>
</div>


<div id=logo><img src="http://consileri.com/demo/images/logo_reg.png" alt="K" /></div>
</body>
</html>