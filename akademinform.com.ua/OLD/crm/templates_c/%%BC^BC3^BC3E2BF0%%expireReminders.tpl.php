<?php /* Smarty version 2.6.18, created on 2010-12-21 16:23:52
         compiled from main/expireReminders.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'main/expireReminders.tpl', 7, false),array('modifier', 'date_format', 'main/expireReminders.tpl', 19, false),array('modifier', 'htmlspecialchars', 'main/expireReminders.tpl', 40, false),)), $this); ?>
<?php if (sizeof ( $this->_tpl_vars['expiredReminders'] ) > 0): ?>

<div id="favandrem">

<div id="mainrem" style='font-size:11px;'>
<span style='color:#FF9228'>(!)</span>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>просроченные<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> &nbsp;
</div>

<div id="clear"></div>

<table border="0" cellpadding="0" cellspacing="0" width="100%" style="font-weight:normal;font-size:11px;">
<?php $_from = $this->_tpl_vars['expiredReminders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<tr>
<td onmouseover="rPoolHightlight(this,<?php echo $this->_tpl_vars['cur']['id']; ?>
)" onmouseout="rPoolUnHightlight(this,<?php echo $this->_tpl_vars['cur']['id']; ?>
,'#f6f4e6')">
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
, <?php echo $this->_tpl_vars['cur']['company_id']; ?>
)"/></map>
</span>
</span>

</div>
</div>

<div style="display:none;background-color:#fffc82;padding: 4px 5px 4px 0px;font-size:11px;" id="rPoolTRForm<?php echo $this->_tpl_vars['cur']['id']; ?>
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
" style="width:152px;"/>
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