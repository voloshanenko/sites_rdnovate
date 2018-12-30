<?php /* Smarty version 2.6.18, created on 2010-12-21 17:32:02
         compiled from main/reminders.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'main/reminders.tpl', 14, false),array('modifier', 'date_format', 'main/reminders.tpl', 68, false),array('modifier', 'htmlspecialchars', 'main/reminders.tpl', 68, false),array('modifier', 'lower', 'main/reminders.tpl', 101, false),)), $this); ?>

<script language="JavaScript" type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/remindersPool.js"></script> 


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/selectCompany_v1.2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/managers_v1.2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="clear" style="margin-bottom:25px;"></div>  
<div style="padding:0px 40px 0px 40px; font-size:11px;">



<div class="cListLabel">
<a style="color: black;" href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Клиенты<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a> / 
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/flag_own.gif" />
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Напоминания<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> (
</b><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/remPool_r.gif"/> <span style="font-size:11px"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>мои<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span> &nbsp;
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/remPool_g.gif"/> <span style="font-size:11px"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>от старшего менеджера<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span> &nbsp;
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/remPool_b.gif"/> <span style="font-size:11px"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>всеобщие<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span><b>
)</b>

</div>
<div id="clear"></div>

<div style="width:430px;float:left;margin-top: 10px;">

<?php if ($this->_tpl_vars['help']['6']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help/doc6.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['help']['15']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help/doc17.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if (sizeof ( $this->_tpl_vars['todayReminders'] ) > 0): ?>
<div class="remindersToday">
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Сегодня:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>

<table border="0" cellpadding="0" cellspacing="0">
<?php $_from = $this->_tpl_vars['todayReminders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<tr id="rPoolTR<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<td onmouseover="rPoolHightlight(this,<?php echo $this->_tpl_vars['cur']['id']; ?>
)" onmouseout="rPoolUnHightlight(this,<?php echo $this->_tpl_vars['cur']['id']; ?>
,'#f6f4e6')" style="height:28px;">

<div id="rPoolTRDiv<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<div class="<?php if ($this->_tpl_vars['cur']['visibility'] == 'own'): ?>rpool_r_i<?php elseif ($this->_tpl_vars['cur']['visibility'] == 'sm'): ?>rpool_g_i<?php elseif ($this->_tpl_vars['cur']['visibility'] == 'common'): ?>rpool_b_i<?php endif; ?>" id="rColor<?php echo $this->_tpl_vars['cur']['id']; ?>
">
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyBriefFromHistory?id=<?php echo $this->_tpl_vars['cur']['company_id']; ?>
" style="color:#dc8009"><?php echo $this->_tpl_vars['cur']['name']; ?>
</a> - 
<span id="inlineText<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<span id="rDate<?php echo $this->_tpl_vars['cur']['id']; ?>
"><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?><?php echo $this->_tpl_vars['cur']['nickname']; ?>
: «<?php endif; ?></span><?php echo $this->_tpl_vars['cur']['text']; ?>
<?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?>»<?php endif; ?></span>

<span id="rpoolb<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="rpoolb">
<span style="position:relative">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/edit_delete.gif" width="30" height="12" border="0" usemap="#edit_delete<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="edit_delete"/>
<map name="edit_delete<?php echo $this->_tpl_vars['cur']['id']; ?>
" id="edit_delete<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="display:none">
<area shape="rect" coords="0,0,13,12" href="javascript:void(0)" onclick="rPoolEdit(<?php echo $this->_tpl_vars['cur']['id']; ?>
,'<?php echo $this->_tpl_vars['cur']['visibility']; ?>
')"/>
<area shape="rect" coords="19,0,32,12" href="javascript:void(0)" onclick="rPoolDeleteLineWithComp(<?php echo $this->_tpl_vars['cur']['id']; ?>
,<?php echo $this->_tpl_vars['cur']['company_id']; ?>
)"/></map>
</span>

</span>

</div>
</div>

<div style="display:none;background-color:#fffc82;padding: 4px 0px 4px 0px;" id="rPoolTRForm<?php echo $this->_tpl_vars['cur']['id']; ?>
">

<input type="radio" name="visibility<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="own" id="own<?php echo $this->_tpl_vars['cur']['id']; ?>
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'own'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?> disabled="disabled"<?php endif; ?>/><label for="own<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#e1131a"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>себе<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="sm" id="sm<?php echo $this->_tpl_vars['cur']['id']; ?>
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'sm'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] != 'sm'): ?> disabled="disabled"<?php endif; ?><?php if ($this->_tpl_vars['cur']['manager_id'] == $_SESSION['auth']['id']): ?> disabled="disabled"<?php endif; ?>/><label for="sm<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#10a007"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>менеджеру<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="common" id="common<?php echo $this->_tpl_vars['cur']['id']; ?>
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'common'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?> disabled="disabled"<?php endif; ?>/><label for="common<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#0a65ab"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>всем<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="text" name="rtext<?php echo $this->_tpl_vars['cur']['id']; ?>
" id="rText<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="<?php if ($this->_tpl_vars['cur']['date'] != '2000-01-01 00:00:00'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
 <?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['text'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : smarty_modifier_htmlspecialchars($_tmp)); ?>
" style="width:165px;"/>
<input type="button" value="&nbsp;" onclick="rPoolSubmitEditForm2(<?php echo $this->_tpl_vars['cur']['id']; ?>
,<?php echo $this->_tpl_vars['cur']['company_id']; ?>
)" class="button1 IEremoteBorder"/>
<input type="button" value="&nbsp;" onclick="rPoolHideEditForm(<?php echo $this->_tpl_vars['cur']['id']; ?>
);" class="button2"/>

</div>

</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
</div>
<?php endif; ?>

<?php 
	include('incl/month.php');
    $this->assign('month',$month2);
 ?>	


<?php if ($this->_tpl_vars['help']['3'] && ! $this->_tpl_vars['help']['6']): ?>
<?php if (sizeof ( $this->_tpl_vars['todayReminders'] ) == 0 && sizeof ( $this->_tpl_vars['futureReminders'] ) == 0 && sizeof ( $this->_tpl_vars['expiredReminders'] ) == 0 && sizeof ( $this->_tpl_vars['withoutDateReminders'] ) == 0): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help/doc18.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help/doc3.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php endif; ?>

<?php $this->assign('curmonth', ""); ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">

<?php $_from = $this->_tpl_vars['futureReminders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<?php if ($this->_tpl_vars['curmonth'] != ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m"))): ?>
<?php $this->assign('curmonth', ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m"))); ?>
<tr><td colspan="2" style="padding-top:30px;padding-bottom:5px;"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['month'][$this->_tpl_vars['curmonth']])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
</b></td></tr>
<?php endif; ?>


<tr id="rPoolTR<?php echo $this->_tpl_vars['cur']['id']; ?>
">

<td width="28" valign="top">
<div id="reminderDate"><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d")); ?>
</div>
</td>
<td onmouseover="rPoolHightlight(this,<?php echo $this->_tpl_vars['cur']['id']; ?>
)" onmouseout="rPoolUnHightlight(this,<?php echo $this->_tpl_vars['cur']['id']; ?>
,'#fff')" style="height:28px;">

<div id="rPoolTRDiv<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<div class="<?php if ($this->_tpl_vars['cur']['visibility'] == 'own'): ?>rpool_r_i<?php elseif ($this->_tpl_vars['cur']['visibility'] == 'sm'): ?>rpool_g_i<?php elseif ($this->_tpl_vars['cur']['visibility'] == 'common'): ?>rpool_b_i<?php endif; ?>" id="rColor<?php echo $this->_tpl_vars['cur']['id']; ?>
">
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyBriefFromHistory?id=<?php echo $this->_tpl_vars['cur']['company_id']; ?>
" style="color:#dc8009"><?php echo $this->_tpl_vars['cur']['name']; ?>
</a> - 
<span id="inlineText<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<span id="rDate<?php echo $this->_tpl_vars['cur']['id']; ?>
"><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?><?php echo $this->_tpl_vars['cur']['nickname']; ?>
: «<?php endif; ?></span><?php echo $this->_tpl_vars['cur']['text']; ?>
<?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?>»<?php endif; ?></span>

<span id="rpoolb<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="rpoolb">

<span style="position:relative">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/edit_delete.gif" width="30" height="12" border="0" usemap="#edit_delete<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="edit_delete"/>
<map name="edit_delete<?php echo $this->_tpl_vars['cur']['id']; ?>
" id="edit_delete<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="display:none">
<area shape="rect" coords="0,0,13,12" href="javascript:void(0)" onclick="rPoolEdit(<?php echo $this->_tpl_vars['cur']['id']; ?>
,'<?php echo $this->_tpl_vars['cur']['visibility']; ?>
')"/>
<area shape="rect" coords="19,0,32,12" href="javascript:void(0)" onclick="rPoolDeleteLineWithComp(<?php echo $this->_tpl_vars['cur']['id']; ?>
,<?php echo $this->_tpl_vars['cur']['company_id']; ?>
)"/></map>
</span>

</span>

</div>
</div>

<div style="display:none;background-color:#fffc82;padding: 4px 0px 4px 0px;" id="rPoolTRForm<?php echo $this->_tpl_vars['cur']['id']; ?>
">

<input type="radio" name="visibility<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="own" id="own<?php echo $this->_tpl_vars['cur']['id']; ?>
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'own'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?> disabled="disabled"<?php endif; ?>/><label for="own<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#e1131a"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>себе<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="sm" id="sm<?php echo $this->_tpl_vars['cur']['id']; ?>
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'sm'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] != 'sm'): ?> disabled="disabled"<?php endif; ?><?php if ($this->_tpl_vars['cur']['manager_id'] == $_SESSION['auth']['id']): ?> disabled="disabled"<?php endif; ?>/><label for="sm<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#10a007"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>менеджеру<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="common" id="common<?php echo $this->_tpl_vars['cur']['id']; ?>
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'common'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?> disabled="disabled"<?php endif; ?>/><label for="common<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#0a65ab"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>всем<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="text" name="rtext<?php echo $this->_tpl_vars['cur']['id']; ?>
" id="rText<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="<?php if ($this->_tpl_vars['cur']['date'] != '2000-01-01 00:00:00'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
 <?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['text'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : smarty_modifier_htmlspecialchars($_tmp)); ?>
" style="width:165px;"/>
<input type="button" value="&nbsp;" onclick="rPoolSubmitEditForm2(<?php echo $this->_tpl_vars['cur']['id']; ?>
,<?php echo $this->_tpl_vars['cur']['company_id']; ?>
)" class="button1 IEremoteBorder"/>
<input type="button" value="&nbsp;" onclick="rPoolHideEditForm(<?php echo $this->_tpl_vars['cur']['id']; ?>
);" class="button2"/>

</div>

</td>
</tr>


<?php endforeach; endif; unset($_from); ?>

</table>


<div style="border-bottom:1px solid #d9d9d9; margin-bottom:30px;margin-top:19px;">&nbsp;</div>
<?php if (sizeof ( $this->_tpl_vars['expiredReminders'] ) > 0): ?>

<b><span style="color:#ff9228">(!)</span> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>просроченные<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br>
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:5px;">
<?php $_from = $this->_tpl_vars['expiredReminders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<tr id="rPoolTR<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<td onmouseover="rPoolHightlight(this,<?php echo $this->_tpl_vars['cur']['id']; ?>
)" onmouseout="rPoolUnHightlight(this,<?php echo $this->_tpl_vars['cur']['id']; ?>
,'#fff')" style="height:28px;">

<div id="rPoolTRDiv<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<div class="<?php if ($this->_tpl_vars['cur']['visibility'] == 'own'): ?>rpool_r_i<?php elseif ($this->_tpl_vars['cur']['visibility'] == 'sm'): ?>rpool_g_i<?php elseif ($this->_tpl_vars['cur']['visibility'] == 'common'): ?>rpool_b_i<?php endif; ?>" id="rColor<?php echo $this->_tpl_vars['cur']['id']; ?>
">
&nbsp;&nbsp;&nbsp;&nbsp;<?php if ($this->_tpl_vars['cur']['date'] != '2000-01-01 00:00:00'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
 <?php endif; ?><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyBriefFromHistory?id=<?php echo $this->_tpl_vars['cur']['company_id']; ?>
" style="color:#dc8009"><?php echo $this->_tpl_vars['cur']['name']; ?>
</a> - 
<span id="inlineText<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<span id="rDate<?php echo $this->_tpl_vars['cur']['id']; ?>
"><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?><?php echo $this->_tpl_vars['cur']['nickname']; ?>
: «<?php endif; ?></span><?php echo $this->_tpl_vars['cur']['text']; ?>
<?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?>»<?php endif; ?></span>

<span id="rpoolb<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="rpoolb">
<span style="position:relative">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/edit_delete.gif" width="30" height="12" border="0" usemap="#edit_delete<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="edit_delete"/>
<map name="edit_delete<?php echo $this->_tpl_vars['cur']['id']; ?>
" id="edit_delete<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="display:none">
<area shape="rect" coords="0,0,13,12" href="javascript:void(0)" onclick="rPoolEdit(<?php echo $this->_tpl_vars['cur']['id']; ?>
,'<?php echo $this->_tpl_vars['cur']['visibility']; ?>
')"/>
<area shape="rect" coords="19,0,32,12" href="javascript:void(0)" onclick="rPoolDeleteLineWithComp(<?php echo $this->_tpl_vars['cur']['id']; ?>
,<?php echo $this->_tpl_vars['cur']['company_id']; ?>
)"/></map>
</span>
</span>
</div>
</div>

<div style="display:none;background-color:#fffc82;padding: 4px 0px 4px 0px;" id="rPoolTRForm<?php echo $this->_tpl_vars['cur']['id']; ?>
">

<input type="radio" name="visibility<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="own" id="own<?php echo $this->_tpl_vars['cur']['id']; ?>
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'own'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?> disabled="disabled"<?php endif; ?>/><label for="own<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#e1131a"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>себе<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="sm" id="sm<?php echo $this->_tpl_vars['cur']['id']; ?>
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'sm'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] != 'sm'): ?> disabled="disabled"<?php endif; ?><?php if ($this->_tpl_vars['cur']['manager_id'] == $_SESSION['auth']['id']): ?> disabled="disabled"<?php endif; ?>/><label for="sm<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#10a007"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>менеджеру<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="common" id="common<?php echo $this->_tpl_vars['cur']['id']; ?>
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'common'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?> disabled="disabled"<?php endif; ?>/><label for="common<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#0a65ab"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>всем<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="text" name="rtext<?php echo $this->_tpl_vars['cur']['id']; ?>
" id="rText<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="<?php if ($this->_tpl_vars['cur']['date'] != '2000-01-01 00:00:00'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
 <?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['text'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : smarty_modifier_htmlspecialchars($_tmp)); ?>
" style="width:165px;"/>
<input type="button" value="&nbsp;" onclick="rPoolSubmitEditForm2(<?php echo $this->_tpl_vars['cur']['id']; ?>
,<?php echo $this->_tpl_vars['cur']['company_id']; ?>
)" class="button1 IEremoteBorder"/>
<input type="button" value="&nbsp;" onclick="rPoolHideEditForm(<?php echo $this->_tpl_vars['cur']['id']; ?>
);" class="button2"/>

</div>

</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>

<?php endif; ?>
</div>


<div style="margin-left:470px;margin-top: 10px;width:430px;">

<?php if (sizeof ( $this->_tpl_vars['withoutDateReminders'] ) > 0): ?>

<div id="remindersUnDated">
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>не привязаны к дате<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br>
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:5px;">
<?php $_from = $this->_tpl_vars['withoutDateReminders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>

<tr id="rPoolTR<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<td onmouseover="rPoolHightlight(this,<?php echo $this->_tpl_vars['cur']['id']; ?>
)" onmouseout="rPoolUnHightlight(this,<?php echo $this->_tpl_vars['cur']['id']; ?>
,'#f2f2f2')" style="height:28px;">

<div id="rPoolTRDiv<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<div class="<?php if ($this->_tpl_vars['cur']['visibility'] == 'own'): ?>rpool_r_i<?php elseif ($this->_tpl_vars['cur']['visibility'] == 'sm'): ?>rpool_g_i<?php elseif ($this->_tpl_vars['cur']['visibility'] == 'common'): ?>rpool_b_i<?php endif; ?>" id="rColor<?php echo $this->_tpl_vars['cur']['id']; ?>
">
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyBriefFromHistory?id=<?php echo $this->_tpl_vars['cur']['company_id']; ?>
" style="color:#dc8009"><?php echo $this->_tpl_vars['cur']['name']; ?>
</a> - 
<span id="inlineText<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<span id="rDate<?php echo $this->_tpl_vars['cur']['id']; ?>
"><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?><?php echo $this->_tpl_vars['cur']['nickname']; ?>
: «<?php endif; ?></span><?php echo $this->_tpl_vars['cur']['text']; ?>
<?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?>»<?php endif; ?></span>

<span id="rpoolb<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="rpoolb">
<span style="position:relative">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/edit_delete.gif" width="30" height="12" border="0" usemap="#edit_delete<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="edit_delete"/>
<map name="edit_delete<?php echo $this->_tpl_vars['cur']['id']; ?>
" id="edit_delete<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="display:none">
<area shape="rect" coords="0,0,13,12" href="javascript:void(0)" onclick="rPoolEdit(<?php echo $this->_tpl_vars['cur']['id']; ?>
,'<?php echo $this->_tpl_vars['cur']['visibility']; ?>
')"/>
<area shape="rect" coords="19,0,32,12" href="javascript:void(0)" onclick="rPoolDeleteLineWithComp(<?php echo $this->_tpl_vars['cur']['id']; ?>
,<?php echo $this->_tpl_vars['cur']['company_id']; ?>
)"/></map>
</span>
</span>
</div>
</div>

<div style="display:none;background-color:#fffc82;padding: 4px 0px 4px 0px;" id="rPoolTRForm<?php echo $this->_tpl_vars['cur']['id']; ?>
">

<input type="radio" name="visibility<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="own" id="own<?php echo $this->_tpl_vars['cur']['id']; ?>
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'own'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?> disabled="disabled"<?php endif; ?>/><label for="own<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#e1131a"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>себе<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="sm" id="sm<?php echo $this->_tpl_vars['cur']['id']; ?>
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'sm'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] != 'sm'): ?> disabled="disabled"<?php endif; ?><?php if ($this->_tpl_vars['cur']['manager_id'] == $_SESSION['auth']['id']): ?> disabled="disabled"<?php endif; ?>/><label for="sm<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#10a007"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>менеджеру<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="common" id="common<?php echo $this->_tpl_vars['cur']['id']; ?>
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'common'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?> disabled="disabled"<?php endif; ?>/><label for="common<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#0a65ab"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>всем<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="text" name="rtext<?php echo $this->_tpl_vars['cur']['id']; ?>
" id="rText<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="<?php if ($this->_tpl_vars['cur']['date'] != '2000-01-01 00:00:00'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
 <?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['text'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : smarty_modifier_htmlspecialchars($_tmp)); ?>
" style="width:165px;"/>
<input type="button" value="&nbsp;" onclick="rPoolSubmitEditForm2(<?php echo $this->_tpl_vars['cur']['id']; ?>
,<?php echo $this->_tpl_vars['cur']['company_id']; ?>
)" class="button1 IEremoteBorder"/>
<input type="button" value="&nbsp;" onclick="rPoolHideEditForm(<?php echo $this->_tpl_vars['cur']['id']; ?>
);" class="button2"/>

</div>

</td>
</tr>

<?php endforeach; endif; unset($_from); ?>
</table>
</div>

<?php endif; ?>

</div>

</div>