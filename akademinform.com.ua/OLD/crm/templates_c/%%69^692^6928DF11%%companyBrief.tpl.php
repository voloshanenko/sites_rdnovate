<?php /* Smarty version 2.6.18, created on 2010-12-21 16:36:17
         compiled from main/companyBrief.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'main/companyBrief.tpl', 24, false),array('modifier', 'wordwrap', 'main/companyBrief.tpl', 85, false),array('modifier', 'date_format', 'main/companyBrief.tpl', 124, false),array('modifier', 'htmlspecialchars', 'main/companyBrief.tpl', 144, false),array('modifier', 'trim', 'main/companyBrief.tpl', 172, false),array('modifier', 'many_emails', 'main/companyBrief.tpl', 188, false),array('modifier', 'nl2br', 'main/companyBrief.tpl', 193, false),array('modifier', 'regex_replace', 'main/companyBrief.tpl', 275, false),array('modifier', 'lower', 'main/companyBrief.tpl', 317, false),)), $this); ?>
<script language="JavaScript" type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/favoriteController.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/historyModification.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/propBlocks.js"></script>

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


<?php if ($this->_tpl_vars['help']['12']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help/doc12.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>


<?php if (isset ( $this->_tpl_vars['backlink'] ) || $_SESSION['auth']['is_super_user'] == 1): ?>

<table cellpadding="0" border="0" class="content">
<tr><td width="40" valign="top" align="right">
</td>
<td width="620" valign="top" align="left">

<?php if (isset ( $this->_tpl_vars['backlink'] )): ?>
<div class="cListLabel">
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/" style="color:black;"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Клиенты<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a> /
<?php echo $this->_tpl_vars['backlink']; ?>

</div>
<div style="clear:both;"></div>
<?php endif; ?>


<?php if ($_SESSION['auth']['is_super_user'] == 1): ?>



<div style="margin-bottom:5px; float:left">
<?php $this->_tag_stack[] = array('t', array('nickname' => "<span class='black'><b>".($this->_tpl_vars['manager']['nickname'])."</b></span>",'escape' => false)); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Компанию ведет менеджер %nickname<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

</div>
<div style="margin-bottom:5px; float:right">
<?php if (! $_SESSION['auth']['readonly']): ?>
<form method="GET" action="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment/transferCompany">
<?php endif; ?>
<input type="hidden" name="returntobrief" value="1">
<select name="manager">
  <?php $_from = $this->_tpl_vars['managersList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
    <option value="<?php echo $this->_tpl_vars['cur']['id']; ?>
"><?php echo $this->_tpl_vars['cur']['nickname']; ?>
</option>
  <?php endforeach; endif; unset($_from); ?>	
</select>
  <input type="hidden" name="company" value="<?php echo $this->_tpl_vars['company_id']; ?>
"/>
  <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['manager']['id']; ?>
"/>
<?php if (! $_SESSION['auth']['readonly']): ?>
  <input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Передать<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"/>
</form>
<?php endif; ?>
</div>
<div style="clear:both"></div>
<?php endif; ?>
</td>
<td>
&nbsp;
</td>
</table>
<?php endif; ?>

<table cellspacing="0" cellpadding="0" border="0" class="content">
<tr><td width="40" valign="top" align="right">


<div id="fastcommandBrief">

<div class="cisFav" style="visibility: <?php if ($this->_tpl_vars['isFavorite']): ?>visible<?php else: ?>hidden<?php endif; ?>" id="isFav<?php echo $this->_tpl_vars['company_id']; ?>
" onclick="favOff(<?php echo $this->_tpl_vars['company_id']; ?>
)"></div>
<div class="cnotFav" style="visibility: <?php if (! $this->_tpl_vars['isFavorite']): ?>visible<?php else: ?>hidden<?php endif; ?>" id="isnotFav<?php echo $this->_tpl_vars['company_id']; ?>
" onclick="favOn(<?php echo $this->_tpl_vars['company_id']; ?>
)"></div>

<div class="cisClip" style="visibility: <?php if ($this->_tpl_vars['isClip']): ?>visible<?php else: ?>hidden<?php endif; ?>" id="isClip<?php echo $this->_tpl_vars['company_id']; ?>
" onclick="clipOff(<?php echo $this->_tpl_vars['company_id']; ?>
)"></div>
<div class="cnotClip" style="visibility: <?php if (! $this->_tpl_vars['isClip']): ?>visible<?php else: ?>hidden<?php endif; ?>" id="isnotClip<?php echo $this->_tpl_vars['company_id']; ?>
" onclick="clipOn(<?php echo $this->_tpl_vars['company_id']; ?>
)"></div>


</div>

</td>

<td valign="top">
<div class="companyBrief">

<div class="cName"><?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 40, "<br>") : smarty_modifier_wordwrap($_tmp, 40, "<br>")); ?>
</div> 


<div class="cEdit"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/editCompany" class="cLink2"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>править<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
<div class="cPrint"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/printer/companyInfo" class="cLink2" target="_blank"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>печать<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
<div id="clear"></div>
<div></div>

<div id="reminderPool">
<div id="reminderPoolHead"><a href="javascript:void(0)" onclick="rPoolShowForm()" style="color:#000;text-decoration:none;border-bottom:1px dashed #000"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>поставить напоминание<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
<div id="reminderPoolHeadOpen"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>новое напоминание:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></div>
<div id="reminderPoolForm">


<input type="radio" name="visibility" value="own" id="own" checked/><label for="own" style="color:#e1131a"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>себе<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility" value="sm" id="sm"/ <?php if ($_SESSION['auth']['is_super_user'] != 1): ?>disabled="disabled"<?php endif; ?><?php if ($this->_tpl_vars['manager']['id'] == $_SESSION['auth']['id']): ?>disabled="disabled"<?php endif; ?>><label for="sm" style="color:#10a007"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>менеджеру<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility" value="common" id="common"/><label for="common" style="color:#0a65ab"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>всем<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="text" name="rtext" id="rText" value="" style="width:350px;"/>
<input type="button" value="&nbsp;" onclick="rPoolAddReminder();" class="button1 IEremoteBorder"/>
<input type="button" value="&nbsp;" onclick="rPoolHideForm();" class="button2"/>

<?php if ($this->_tpl_vars['help']['11']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help/doc11.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

</div>


</div>

<div style="margin: 0px 15px 15px 15px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="reminderPoolContent">
<?php $_from = $this->_tpl_vars['remindersPool']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<tr id="rPoolTR<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<td onmouseover="rPoolHightlight(this,<?php echo $this->_tpl_vars['cur']['id']; ?>
)" onmouseout="rPoolUnHightlight(this,<?php echo $this->_tpl_vars['cur']['id']; ?>
,'#fff')" style="border-bottom:1px solid #f6f4e6;height:20px;">
<div id="rPoolTRDiv<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<div class="<?php if ($this->_tpl_vars['cur']['visibility'] == 'own'): ?>rpool_r<?php elseif ($this->_tpl_vars['cur']['visibility'] == 'sm'): ?>rpool_g<?php elseif ($this->_tpl_vars['cur']['visibility'] == 'common'): ?>rpool_b<?php endif; ?>" id="rColor<?php echo $this->_tpl_vars['cur']['id']; ?>
">
<span id="inlineText<?php echo $this->_tpl_vars['cur']['id']; ?>
">

<span id="rDate<?php echo $this->_tpl_vars['cur']['id']; ?>
"><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?><?php echo $this->_tpl_vars['cur']['nickname']; ?>
: «<?php endif; ?><?php if ($this->_tpl_vars['cur']['date'] != '2000-01-01 00:00:00'): ?><b><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</b> <?php endif; ?></span><?php echo $this->_tpl_vars['cur']['text']; ?>
<?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?>»<?php endif; ?></span>

<span id="rpoolb<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="rpoolb" style="display:none">

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
<area shape="rect" coords="19,0,32,12" href="javascript:void(0)" onclick="rPoolDeleteLine(<?php echo $this->_tpl_vars['cur']['id']; ?>
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
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'sm'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] != 'sm'): ?> disabled="disabled"<?php endif; ?><?php if ($this->_tpl_vars['manager']['id'] == $_SESSION['auth']['id']): ?> disabled="disabled"<?php endif; ?>/><label for="sm<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#10a007"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>менеджеру<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="common" id="common<?php echo $this->_tpl_vars['cur']['id']; ?>
" <?php if ($this->_tpl_vars['cur']['visibility'] == 'common'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['cur']['visibility'] == 'sm'): ?> disabled="disabled"<?php endif; ?>/><label for="common<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#0a65ab"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>всем<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="text" name="rtext<?php echo $this->_tpl_vars['cur']['id']; ?>
" id="rText<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="<?php if ($this->_tpl_vars['cur']['date'] != '2000-01-01 00:00:00'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
 <?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['text'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : smarty_modifier_htmlspecialchars($_tmp)); ?>
" style="width:350px;"/>
<input type="button" value="&nbsp;" onclick="rPoolSubmitEditForm(<?php echo $this->_tpl_vars['cur']['id']; ?>
)" class="button1 IEremoteBorder"/>
<input type="button" value="&nbsp;" onclick="rPoolHideEditForm(<?php echo $this->_tpl_vars['cur']['id']; ?>
);" class="button2"/>

</div>

</td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>
</div>

<?php echo '
<script language="JavaScript" type="text/javascript">
  var formSlide = new Fx.Slide(\'reminderPoolForm\');
  formSlide.hide();
  $(\'reminderPoolForm\').style.display = \'block\';
</script>
<script language="JavaScript" type="text/javascript" src="'; ?>
<?php echo $this->_tpl_vars['siteurl']; ?>
<?php echo '/js/remindersPool.js"></script> 
'; ?>



<table border="0" style="width:100%">
<tr><td style="padding-left: 12px; padding-bottom: 10px; width:200px;" valign="top" align="left">

<div class="cContactsShort">
<?php if ($this->_tpl_vars['phone'] != ""): ?><?php echo $this->_tpl_vars['phone']; ?>
<br><?php endif; ?>

<?php $this->assign('isFirst', true); ?>
<?php $_from = $this->_tpl_vars['site']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?><?php if (! $this->_tpl_vars['isFirst']): ?>, <?php endif; ?><a href="http://<?php echo ((is_array($_tmp=$this->_tpl_vars['cur'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
" class="cLink size13" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['cur'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
</a><?php if (((is_array($_tmp=$this->_tpl_vars['cur'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)) != ""): ?><?php $this->assign('isFirst', false); ?><?php endif; ?><?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['isFirst'] == false): ?><br><?php endif; ?>

<?php $this->assign('isFirst', true); ?>
<?php $_from = $this->_tpl_vars['email']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?><?php if (! $this->_tpl_vars['isFirst']): ?>, <?php endif; ?><a href="mailto:<?php echo ((is_array($_tmp=$this->_tpl_vars['cur'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
" class="cLink size13"><?php echo ((is_array($_tmp=$this->_tpl_vars['cur'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
</a><?php if (((is_array($_tmp=$this->_tpl_vars['cur'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)) != ""): ?><?php $this->assign('isFirst', false); ?><?php endif; ?><?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['isFirst'] == false): ?><br><?php endif; ?>

<?php echo $this->_tpl_vars['address']; ?>
<br>
</div>


</td><td width="10"></td>

<td valign="top" align="left" style="padding-right: 12px;">

<?php $this->assign('isFirst', true); ?> 
<?php $_from = $this->_tpl_vars['people']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?><?php if ($this->_tpl_vars['isFirst'] == false): ?><br><div id="line">&nbsp;</div><?php endif; ?><?php echo $this->_tpl_vars['cur']['fio']; ?>
<?php if ($this->_tpl_vars['cur']['phone'] != ""): ?>, <?php echo $this->_tpl_vars['cur']['phone']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['cur']['email'] != ""): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['email'])) ? $this->_run_mod_handler('many_emails', true, $_tmp) : smarty_modifier_many_emails($_tmp)); ?>
<?php endif; ?><?php if ($this->_tpl_vars['cur']['comment'] != ""): ?>, <?php echo $this->_tpl_vars['cur']['comment']; ?>
<?php endif; ?><?php $this->assign('isFirst', false); ?><?php endforeach; endif; unset($_from); ?>

</td></tr>
</table>

<div id="aboutcompany"><?php echo ((is_array($_tmp=$this->_tpl_vars['about'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>


<?php if (sizeof ( $this->_tpl_vars['labels'] ) > 0): ?>


<div class="cLabel">
<?php $this->assign('isFirst', true); ?>
<?php $this->assign('n', 0); ?>
<?php $_from = $this->_tpl_vars['labels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<div style="display:inline; height:15px;"><?php if (! $this->_tpl_vars['isFirst']): ?>, <?php endif; ?><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompanyLabels?mode=label&mparam=<?php echo $this->_tpl_vars['cur']['id']; ?>
&page=1" class="cLink3"><?php echo $this->_tpl_vars['cur']['name']; ?>
</a></div><?php $this->assign('isFirst', false); ?>
<?php $this->assign('isFirst', false); ?>
<?php endforeach; endif; unset($_from); ?>
</div>

<?php endif; ?>


<div style="clear:both; height:20px;"></div>

<div class="tabs">
	<div class="tabs_title">
		<div class='active' id='tabHistory'>
			<div class='right'><div class='left'><span><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>История<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></div></div>
		</div>
		<div class='tab' id='tabProps'>
			<div class='right'><div class='left'><span><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Реквизиты<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></div></div>
		</div>
		<div class='tab' id='tabFiles'>
			<div class='right'><div class='left'><span><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Файлы<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></div></div>
		</div>
		<div style='clear:both;'></div>
	</div>
	<div class="tab_content" id='tab_content'>
		<div id='tabHistoryContent' class='content active'>
			<div align="center">
				<form action="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyAddHistory" method="POST" style='text-align:left; margin-left:25px'>
				<table cellpadding="2" cellspacing="0" border="0" style="font-size:10px;">
				<tr>
				<td align="right" valign="bottom" ><div style="padding-bottom:5px; width:68px"><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/plus.gif" /> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>событие<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>&nbsp;</div></td>
				<td>
				<input type="text" id="newEventHeader" name="name" tabindex="1" style="width:440px; height:13px;">
				</td>
				</tr>
				</table>

				<div id="newEventDetails">
				<table cellpadding="2" cellspacing="0" border="0" style="font-size:10px;">
				<tr><td align="right" valign="top"><div style="padding-top:2px"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>подробности<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>&nbsp;</div></td>
				<td>
				<textarea name="comment" id = "newEventDetailsComment" wrap="on" tabindex="2" style="width:440px; height:80px; font-size:11px;"></textarea>
				</td></tr>
				<tr>
				<td></td><td align="right">
				<input type="Submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Добавить<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" class="buttonWithBorder">
				</td>
				</tr>
				</table>
				</div>

				</form>

				<div style="clear:both"></div>

				<table cellpadding="2" cellspacing="0" style="margin-top:20px;" border="0">
				<?php $this->assign('odd', 'true'); ?>
				<?php $_from = $this->_tpl_vars['events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>	
				<?php if ($this->_tpl_vars['odd'] == true): ?><?php $this->assign('trs', 'cOdd'); ?><?php else: ?><?php $this->assign('trs', 'cEven'); ?><?php endif; ?>
					<tr id="event<?php echo $this->_tpl_vars['cur']['id']; ?>
">
					<?php if (((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")) == ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y"))): ?>		
						<td class="<?php echo $this->_tpl_vars['trs']; ?>
 eventPosted" width="71"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Сегодня<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%H:%M") : smarty_modifier_date_format($_tmp, "%H:%M")); ?>
</td>
					<?php else: ?>
						<?php 
							include('incl/month.php');
				            $this->assign('month',$month);
						 ?>	
						<?php $this->assign('m', ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m"))); ?>		
						<td class="<?php echo $this->_tpl_vars['trs']; ?>
 eventPosted" width="71"><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d")); ?>
 <?php echo $this->_tpl_vars['month'][$this->_tpl_vars['m']]; ?>
</td>
					<?php endif; ?>
					<td class="<?php echo $this->_tpl_vars['trs']; ?>
r" width="537">	
					<div style="float:left">
					<div class="eventText" id="heh<?php echo $this->_tpl_vars['cur']['id']; ?>
"><?php echo $this->_tpl_vars['cur']['name']; ?>
</div><div id="heih<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="heih"><input class="heihText" type="text" id="hehData<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['name'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : smarty_modifier_htmlspecialchars($_tmp)); ?>
"></div>
					<div class="eventComment" id="hec<?php echo $this->_tpl_vars['cur']['id']; ?>
"><?php echo $this->_tpl_vars['cur']['comment']; ?>
</div><div id="heic<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="heic"><textarea class="heicText" id="hecData<?php echo $this->_tpl_vars['cur']['id']; ?>
" name="comment" wrap="on"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['cur']['comment'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[\r\t\n]/", "") : smarty_modifier_regex_replace($_tmp, "/[\r\t\n]/", "")))) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/<br>/", "\n") : smarty_modifier_regex_replace($_tmp, "/<br>/", "\n")); ?>
</textarea>  
					</div>
					</div>
					<div style="float:right">
					
										
					<?php if (((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")) == ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")) || ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")) == ((is_array($_tmp=$this->_tpl_vars['yesterday'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")) || $_SESSION['auth']['is_super_user']): ?>

				<?php if (! $_SESSION['auth']['readonly']): ?>
					<div style="width:60px;">
					<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/delete.gif" id="csd<?php echo $this->_tpl_vars['cur']['id']; ?>
" onclick="changeStateDelete('<?php echo $this->_tpl_vars['cur']['id']; ?>
')" class="historyeditbutton">
					<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/edit.gif" id="cs<?php echo $this->_tpl_vars['cur']['id']; ?>
" onclick="changeState('<?php echo $this->_tpl_vars['cur']['id']; ?>
')" class="historydelbutton">
					<div style="clear:both"></div>
					</div>
					
					<input type="button" id="css<?php echo $this->_tpl_vars['cur']['id']; ?>
" onclick="changeStateSave('<?php echo $this->_tpl_vars['cur']['id']; ?>
')" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Сохранить<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" style="visibility:hidden; display:none;" />
					<input type="button" id="csc<?php echo $this->_tpl_vars['cur']['id']; ?>
" onclick="changeStateCancel('<?php echo $this->_tpl_vars['cur']['id']; ?>
')" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Отменить<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" style="visibility:hidden; display:none;"/>
				<?php endif; ?>	
					<?php endif; ?>
					
					</div>
					<div style="clear:both"></div>
					</td>
					</tr>
					<?php if ($this->_tpl_vars['odd'] == true): ?><?php $this->assign('odd', false); ?>
					<?php else: ?><?php $this->assign('odd', true); ?><?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>


				<tr>
				<td colspan="2" height="40" style="font-size:11px; padding-left:15px; text-align:left;">


				<?php if (sizeof ( $this->_tpl_vars['pages'] ) > 1): ?>

				<?php $this->assign('isFirst', true); ?>
				<?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
				<?php $this->assign('m1', ((is_array($_tmp=$this->_tpl_vars['cur']['from'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m"))); ?>	
				<?php $this->assign('m2', ((is_array($_tmp=$this->_tpl_vars['cur']['to'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m"))); ?>	
					<?php if (! $this->_tpl_vars['isFirst']): ?> | <?php endif; ?>
					<?php if ($this->_tpl_vars['cur']['id'] == $this->_tpl_vars['page']): ?>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['from'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['month'][$this->_tpl_vars['m1']])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
 - 
						<?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['to'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['month'][$this->_tpl_vars['m2']])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>

					<?php else: ?>
						<a href="?page=<?php echo $this->_tpl_vars['cur']['id']; ?>
" style="color:#0553f2">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['from'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['month'][$this->_tpl_vars['m1']])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
 - 
						<?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['to'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['month'][$this->_tpl_vars['m2']])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
</a>
					<?php endif; ?>
				<?php $this->assign('isFirst', false); ?>	
				<?php endforeach; endif; unset($_from); ?>

				<?php endif; ?>

				</td>
				</tr>
				</table>

			</div>
		</div>
		<div id='tabPropsContent' class='content'>
			<div id="propsView">
				<?php if (sizeof ( $this->_tpl_vars['props'] ) > 1): ?>
				<div id="props" style="padding:10px;">
				<div id="pblock1">1</div>
				<div id="pblock1_1" onclick="changeBlock(1)">
				<a href="javascript:void(0)" class="pblockLink">&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;</a>
				</div>

				<?php if (sizeof ( $this->_tpl_vars['props'] ) >= 2): ?>
				<div id="pblock2">2</div>
				<div id="pblock2_2" onclick="changeBlock(2)">
				<a href="javascript:void(0)" class="pblockLink">&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;</a>
				</div>
				<?php endif; ?>

				<?php if (sizeof ( $this->_tpl_vars['props'] ) >= 3): ?>
				<div id="pblock3">3</div>
				<div id="pblock3_3" onclick="changeBlock(3)">
				<a href="javascript:void(0)" class="pblockLink">&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;</a>
				</div>
				<?php endif; ?>

				<?php if (sizeof ( $this->_tpl_vars['props'] ) >= 4): ?>
				<div id="pblock4">4</div>
				<div id="pblock4_4" onclick="changeBlock(4)">
				<a href="javascript:void(0)" class="pblockLink">&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;</a>
				</div>
				<?php endif; ?>

				</div>
				<div id="clear"></div>
				<?php endif; ?>

				<div style="margin:0px 10px 0px 10px;">


				<?php $this->assign('prop_id', 1); ?>
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

				<?php if ($this->_tpl_vars['prop_id'] == 2): ?><div id="pblock2_c"></div><div id="pblock3_c"></div><div id="pblock4_c"></div><?php endif; ?>
				<?php if ($this->_tpl_vars['prop_id'] == 3): ?><div id="pblock3_c"></div><div id="pblock4_c"></div><?php endif; ?>
				<?php if ($this->_tpl_vars['prop_id'] == 4): ?><div id="pblock4_c"></div><?php endif; ?>


				</div>

			</div>
		</div>
		<div id='tabFilesContent' class='content'>	
			<div id='attach_list'>
				<input type="Submit" class="buttonWithBorder" id="attach" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>выбрать файлы<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">
				<div id='file-list'>
					<?php $_from = $this->_tpl_vars['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
						<div class='file' id='file<?php echo $this->_tpl_vars['file']['id']; ?>
'>
							<div class='ico'>
								<img src='<?php echo $this->_tpl_vars['siteurl']; ?>
/images/file<?php echo $this->_tpl_vars['file']['type']; ?>
.gif'>
							</div>
							<div class='fileinfo'>
								<div class='del'>
									<a href='#' onclick='delFile(<?php echo $this->_tpl_vars['file']['id']; ?>
);'><img src='<?php echo $this->_tpl_vars['siteurl']; ?>
/images/delete.gif' style='border:none;'></a>
								</div>
								<div><a href='<?php echo $this->_tpl_vars['siteurl']; ?>
/ajax.php?section=45&f=<?php echo $this->_tpl_vars['file']['id']; ?>
' style='color:#000'><?php echo $this->_tpl_vars['file']['original_name']; ?>
</a></div>
								<div style='color:#8c8a8a; font-size:11px; line-height:110%'><?php echo $this->_tpl_vars['file']['comment']; ?>
</div>
								<div style='color:#8c8a8a; font-size:11px; line-height:110%'><?php echo $this->_tpl_vars['file']['size']; ?>
 / <?php echo ((is_array($_tmp=$this->_tpl_vars['file']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d.%m.%Y %H:%M")); ?>
</div>
							</div>
							<div style='clear:both'></div>
						</div>
					<?php endforeach; endif; unset($_from); ?>
				</div>
			</div>
			
			<div id="new_attach" style='display:none'>
				<div id='linux-file-upload' style='display:none;'>
					<script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/FileUploader/ajaxupload.js"></script>
					<input type="submit" class="buttonWithBorder" id="upload-file" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Прикрепить файл<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" /> 
				</div>
				<form id='files-form'>
					<input type='hidden' name='section' value='44'>
					<input type='hidden' name='company' value='<?php echo $_SESSION['auth']['current_company']; ?>
'>
					<table id='new-attach-list' cellpadding=0 cellspacing=0>
						<tr>
							<td><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Выбранные файлы:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
							<td style='min-width:250px;'><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>примечание<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
						</tr>
					</table>			 
					<a href='#' id="attach-2" style="border-bottom:1px dashed; color:#000; font-size: 12px;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>выбрать еще<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
					<input type="button" class="buttonWithBorder" id="attachbtn" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>загрузить<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" style='display:block; margin-top:7px;' onclick='filesSubmitForm()'>
				</form>
			</div>
			
			<script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/FileUploader/Fx.ProgressBar.js"></script>
			<script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/FileUploader/Swiff.Uploader.js"></script>
			<script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/FileUploader/FancyUpload3.js"></script>		
			<script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/FileUploader/script.js"></script>							
		</div>
	</div>
</div>

	<?php echo '
	<script language="JavaScript" type="text/javascript">
	var newEventSlide = new Fx.Slide(\'newEventDetails\');
	newEventSlide.hide();
	
	var cont = new Fx.Slide(\'tab_content\');
	cont.addEvent(\'complete\', function(){
		cont.wrapper.setStyle(\'height\', \'auto\');
	});

	function changeTab(id, e) {
	  		if (($(id)!=null) && ($(id).hasClass(\'tab\'))) {
				var e=new Event(e);
				e.stop();
				var active = $$(\'.tabs_title\').getElement(\'.active\');
				active.removeClass(\'active\');
				active.addClass(\'tab\');
				$(id).removeClass(\'tab\');
				$(id).addClass(\'active\');
				var activetab = $$(\'.tab_content\').getElement(\'.active\');
				cont.hide();
				activetab.removeClass(\'active\');
				$(id+\'Content\').addClass(\'active\');			
				cont.slideIn();			
			}
	}

	$(\'newEventHeader\').addEvent(\'click\', function(e){
		e = new Event(e);	
		newEventSlide.slideIn();
		e.stop();
	});
	
	$(\'tabHistory\').addEvent(\'click\', function(e){
		changeTab(\'tabHistory\', e);
	})
	
	$(\'tabProps\').addEvent(\'click\', function(e){
		changeTab(\'tabProps\', e);
	})
	
	$(\'tabFiles\').addEvent(\'click\', function(e){
		changeTab(\'tabFiles\', e);
	})

	</script>	  
	'; ?>



</td>
<td valign="top" align="left">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/rightBlock.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</td>
</tr>
</table>