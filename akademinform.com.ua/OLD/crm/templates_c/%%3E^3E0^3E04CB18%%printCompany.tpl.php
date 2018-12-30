<?php /* Smarty version 2.6.18, created on 2011-01-20 19:47:36
         compiled from printer/printCompany.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'printer/printCompany.tpl', 5, false),array('modifier', 'nl2br', 'printer/printCompany.tpl', 44, false),)), $this); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title><?php $this->_tag_stack[] = array('t', array('name' => $this->_tpl_vars['name'])); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Компания %name<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></title>
<META content="text/html; charset=utf8" http-equiv=Content-Type>
<link href="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/style_IE6.css" rel="stylesheet" type="text/css">
<script src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/mootools.v1.11.js"></script>

<script language="JavaScript" type="text/javascript">
<?php echo '
	window.addEvent(\'load\', function() {
		window.print();
	});
'; ?>

</script>

</head>

<body id="docbody" style="background-image:none;">

<div class="companyBrief">
<div class="cName"><?php echo $this->_tpl_vars['name']; ?>
</div> 
<div class="cRep"></div>
<div style="clear:both"></div>

<div class="cContacts">
<?php echo $this->_tpl_vars['phone']; ?>
<br>
<a href="#" class="cLink" target="_blank"><?php echo $this->_tpl_vars['site']; ?>
</a><br>
<a href="#" class="cLink"><?php echo $this->_tpl_vars['email']; ?>
</a><br>
<?php echo $this->_tpl_vars['address']; ?>
<br>
</div>
<div class="cPeople">
<?php $_from = $this->_tpl_vars['people']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
	<?php echo $this->_tpl_vars['cur']['fio']; ?>
 
	<?php if ($this->_tpl_vars['cur']['phone'] != ""): ?>, <?php echo $this->_tpl_vars['cur']['phone']; ?>
<?php endif; ?>
	<?php if ($this->_tpl_vars['cur']['email'] != ""): ?>, <a href="#" class="cLink"><?php echo $this->_tpl_vars['cur']['email']; ?>
</a><?php endif; ?> 	
	<?php if ($this->_tpl_vars['cur']['comment'] != ""): ?>, <?php echo $this->_tpl_vars['cur']['comment']; ?>
<?php endif; ?><br>
<?php endforeach; endif; unset($_from); ?>

</div>
<div style="clear:both; height:10px;"></div>

<div id="aboutcompany"><?php echo ((is_array($_tmp=$this->_tpl_vars['about'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>

<div class="cLabel">
<?php $this->assign('isFirst', true); ?>
<?php $_from = $this->_tpl_vars['labels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<?php if (! $this->_tpl_vars['isFirst']): ?>, <?php endif; ?><a href="#" class="cLink3"><?php echo $this->_tpl_vars['cur']['name']; ?>
</a><?php $this->assign('isFirst', false); ?>
<?php endforeach; endif; unset($_from); ?>
</div>
<div style="clear:both;"></div>

<div style="padding-left:10px;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Реквизиты:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>

<?php $_from = $this->_tpl_vars['props']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['prop']):
?>
<?php $this->assign('isFirst', true); ?>

<div id="pblock<?php echo $this->_tpl_vars['prop_id']; ?>
_c" style="font-size:10px;padding-bottom:10px;">
<table cellpadding="2" cellspacing="1" border="0" width="100%" class="briefPropCont">
<?php if ($this->_tpl_vars['prop']['cname'] != ""): ?>
<tr<?php if ($this->_tpl_vars['isFirst']): ?> class="lnClear"<?php $this->assign('isFirst', false); ?><?php endif; ?>>
<td class="ln1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Организация<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td class="ln2">&nbsp;</td>
<td class="ln3"><?php echo $this->_tpl_vars['prop']['cname']; ?>
</td>
</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['prop']['INN'] != ""): ?>
<tr<?php if ($this->_tpl_vars['isFirst']): ?> class="lnClear"<?php $this->assign('isFirst', false); ?><?php endif; ?>>
<td class="ln1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ИНН<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td class="ln2">&nbsp;</td>
<td class="ln3"><?php echo $this->_tpl_vars['prop']['INN']; ?>
</td>
</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['prop']['KPP'] != ""): ?>
<tr<?php if ($this->_tpl_vars['isFirst']): ?> class="lnClear"<?php $this->assign('isFirst', false); ?><?php endif; ?>>
<td class="ln1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>КПП<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td class="ln2">&nbsp;</td>
<td class="ln3"><?php echo $this->_tpl_vars['prop']['KPP']; ?>
</td>
</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['prop']['settlementAccount'] != ""): ?>
<tr<?php if ($this->_tpl_vars['isFirst']): ?> class="lnClear"<?php $this->assign('isFirst', false); ?><?php endif; ?>>
<td class="ln1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>p/c<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td class="ln2">&nbsp;</td>
<td class="ln3"><?php echo $this->_tpl_vars['prop']['settlementAccount']; ?>
</td>
</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['prop']['bank'] != ""): ?>
<tr<?php if ($this->_tpl_vars['isFirst']): ?> class="lnClear"<?php $this->assign('isFirst', false); ?><?php endif; ?>>
<td class="ln1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>В банке<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td class="ln2">&nbsp;</td>
<td class="ln3"><?php echo $this->_tpl_vars['prop']['bank']; ?>
</td>
</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['prop']['BIK'] != ""): ?>
<tr<?php if ($this->_tpl_vars['isFirst']): ?> class="lnClear"<?php $this->assign('isFirst', false); ?><?php endif; ?>>
<td class="ln1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>БИК<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td class="ln2">&nbsp;</td>
<td class="ln3"><?php echo $this->_tpl_vars['prop']['BIK']; ?>
</td>
</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['prop']['account'] != ""): ?>
<tr<?php if ($this->_tpl_vars['isFirst']): ?> class="lnClear"<?php $this->assign('isFirst', false); ?><?php endif; ?>>
<td class="ln1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>к/c<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td class="ln2">&nbsp;</td>
<td class="ln3"><?php echo $this->_tpl_vars['prop']['account']; ?>
</td>
</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['prop']['OKPO'] != ""): ?>
<tr<?php if ($this->_tpl_vars['isFirst']): ?> class="lnClear"<?php $this->assign('isFirst', false); ?><?php endif; ?>>
<td class="ln1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКПО<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td class="ln2">&nbsp;</td>
<td class="ln3"><?php echo $this->_tpl_vars['prop']['OKPO']; ?>
</td>
</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['prop']['OKONH'] != ""): ?>
<tr<?php if ($this->_tpl_vars['isFirst']): ?> class="lnClear"<?php $this->assign('isFirst', false); ?><?php endif; ?>>
<td class="ln1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКОНХ<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td class="ln2">&nbsp;</td>
<td class="ln3"><?php echo $this->_tpl_vars['prop']['OKONH']; ?>
</td>
</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['prop']['OGRN'] != ""): ?>
<tr<?php if ($this->_tpl_vars['isFirst']): ?> class="lnClear"<?php $this->assign('isFirst', false); ?><?php endif; ?>>
<td class="ln1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОГРН<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td class="ln2">&nbsp;</td>
<td class="ln3"><?php echo $this->_tpl_vars['prop']['OGRN']; ?>
</td>
</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['prop']['OKVED'] != ""): ?>
<tr<?php if ($this->_tpl_vars['isFirst']): ?> class="lnClear"<?php $this->assign('isFirst', false); ?><?php endif; ?>>
<td class="ln1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКВЕД<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td class="ln2">&nbsp;</td>
<td class="ln3"><?php echo $this->_tpl_vars['prop']['OKVED']; ?>
</td>
</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['prop']['director'] != ""): ?>
<tr<?php if ($this->_tpl_vars['isFirst']): ?> class="lnClear"<?php $this->assign('isFirst', false); ?><?php endif; ?>>
<td class="ln1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ген. директор<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td class="ln2">&nbsp;</td>
<td class="ln3"><?php echo $this->_tpl_vars['prop']['director']; ?>
</td>
</tr>
<?php endif; ?>
</table>

</div>

<?php $this->assign('prop_id', $this->_tpl_vars['prop_id']+1); ?>

<?php endforeach; endif; unset($_from); ?>

</div>

</body>
</html>