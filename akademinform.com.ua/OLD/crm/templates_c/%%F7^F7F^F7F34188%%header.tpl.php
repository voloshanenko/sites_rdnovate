<?php /* Smarty version 2.6.18, created on 2010-12-01 22:36:05
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'header.tpl', 54, false),array('modifier', 'date_format', 'header.tpl', 83, false),array('function', 'lang_echo_day', 'header.tpl', 85, false),)), $this); ?>
<?php if (empty ( $this->_tpl_vars['do_not_render_header'] )): ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/style_IE6.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/st.css" rel="stylesheet" type="text/css">

<?php echo '
<script>
if (!window.opera) {
document.write(\'<link href="'; ?>
<?php echo $this->_tpl_vars['siteurl']; ?>
<?php echo '/images/fixOpera.css" rel="stylesheet" type="text/css">\');
}
'; ?>

window.siteurl = "<?php echo $this->_tpl_vars['siteurl']; ?>
";
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "jscontacts.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</script>


<link rel="icon" href="<?php echo $this->_tpl_vars['siteurl']; ?>
/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['siteurl']; ?>
/favicon.ico" type="image/x-icon"> 
<?php if ($this->_tpl_vars['lang'] == 'de'): ?>
<link href="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/deutsch.css" rel="stylesheet" type="text/css">
<?php endif; ?>
<script src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/mootools-1.2.4-with-1.1-classes.js"></script>
<script src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/mootools-1.1-to-1.2-upgrade-helper.js"></script>
<?php if ($this->_tpl_vars['controllerName'] == 'journal'): ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->_tpl_vars['siteurl']; ?>
/libs/jscalendar/calendar.css"/> 
<?php endif; ?>

<?php if ($_SESSION['auth']['study'] == true): ?>
<link href="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/help.css" rel="stylesheet" type="text/css">
<script src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/help.js"></script>
<?php endif; ?>

<?php echo '
<!--[if IE 6]>
<style>
#content { float:left; width:100%; }
#footer { clear:left; }
#wrapper { height:100%; }
</style>
<![endif]-->
'; ?>
    


<?php if ($this->_tpl_vars['controllerName'] == 'users' && $this->_tpl_vars['actionName'] == 'logoutStatus'): ?>
<meta http-equiv="refresh" content="1;url=<?php echo $this->_tpl_vars['conf_url']; ?>
/" />
<?php endif; ?>

<title>
<?php if ($_SESSION['auth']['nickname'] != ""): ?>
<?php $this->_tag_stack[] = array('t', array('nickname' => $_SESSION['auth']['nickname'])); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>%nickname - Консильери<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php else: ?>
Консильери
<?php endif; ?>
</title>

</head>

<body id="docbody">



<div id="wrapper">		

	<div id="content">

<!--в случае редактирования сайта изменить false на true-->
<?php if (false): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "update/index.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<div id="logo"><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/logo.jpg" width="235" height="46"></div>

<?php if ($_SESSION['auth']['id'] != ""): ?>
<?php 
	include('incl/month.php');
    $this->assign('month',$month);
    $this->assign('day', date ("j"));
 ?>	
<?php $this->assign('monthh', ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m"))); ?>
<div id="userinfo">
<div><span class="today"><?php echo smarty_function_lang_echo_day(array('day' => $this->_tpl_vars['day'],'month' => $this->_tpl_vars['month'][$this->_tpl_vars['monthh']]), $this);?>
</span></div>

<div class="user">
<?php $this->_tag_stack[] = array('t', array('nickname' => $_SESSION['auth']['nickname'])); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Работает %nickname<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>&nbsp;&nbsp;
<span class="exit"><a href="<?php echo $this->_tpl_vars['conf_url']; ?>
/users/logout" class="size12 cWhite"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>выйти<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>  </span><br>
<?php $this->_tag_stack[] = array('t', array('company' => $_SESSION['auth']['usercompany'])); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>из компании «%company»<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</div>
</div> 

<div class="help"><div class="helpInner">
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/" class="helpLink"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>главная<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
</div></div>

<?php endif; ?>


<div class="help"></div>
<div style="clear:both"></div>




<div class="menuBlock">
<?php if ($_SESSION['auth']['id'] != ""): ?>

<?php if ($_SESSION['auth']['is_admin'] != 1): ?>
    
    <?php if ($this->_tpl_vars['controllerName'] == 'main'): ?>
    <div class="menu"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main" style="color:#000000"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Клиенты<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
    <?php else: ?>
    <div class="menuSel"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main" style="color:#000000"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Клиенты<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
    <?php endif; ?>
    
    <?php if ($this->_tpl_vars['controllerName'] == 'journal'): ?>
    <div class="menu"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/journal" style="color:#000000"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Журнал<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
    <?php else: ?>
    <div class="menuSel"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/journal" style="color:#000000"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Журнал<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
    <?php endif; ?>
    
    <?php 
    if (file_exists ('application/controllers/ProfileController.php')) :
     ?>
    <?php if ($this->_tpl_vars['controllerName'] == 'profile'): ?>
    <div class="menu"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/profile" style="color:#000000"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Смена пароля<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
    <?php else: ?>
    <div class="menuSel"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/profile" style="color:#000000"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Смена пароля<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
    <?php endif; ?>
    <?php 
    endif;
     ?>
    
    <!--<div class="menuSel"><a href="#" style="color:#000000">Отчеты</a></div>-->
    <?php if ($_SESSION['auth']['is_super_user'] == 1): ?>
	    <?php if ($this->_tpl_vars['controllerName'] == 'managment'): ?>
	    <div class="menu"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment" style="color:#000000;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Управление<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
	    <?php else: ?>
	    <div class="menuSel"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment" style="color:#000000;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Управление<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
	    <?php endif; ?>
    <?php endif; ?>
    
<?php else: ?>
	<?php if ($this->_tpl_vars['controllerName'] == 'managment'): ?>
	<div class="menu"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment" style="color:#000000;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Управление<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
	<?php else: ?>
	<div class="menuSel"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment" style="color:#000000;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Управление<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['controllerName'] == 'backup'): ?>
	<div class="menu"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/backup" style="color:#000000;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>База данных<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
	<?php else: ?>
	<div class="menuSel"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/backup" style="color:#000000;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>База данных<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
	<?php endif; ?>
<?php endif; ?>    

<?php else: ?>
<div class="menu"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/" style="color:#000000"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Главная<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
<?php endif; ?>




</div>
<?php endif; ?>