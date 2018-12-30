<?php /* Smarty version 2.6.18, created on 2011-01-26 18:30:59
         compiled from pda/main/reminders.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'pda/main/reminders.tpl', 1, false),array('modifier', 'date_format', 'pda/main/reminders.tpl', 24, false),)), $this); ?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main" style="color:black;"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Клиенты<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a> / <b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Напоминания:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br><br>

<span class="size2">

<?php if (sizeof ( $this->_tpl_vars['todayReminders'] ) == 0 && sizeof ( $this->_tpl_vars['withoutDateReminders'] ) == 0): ?>
	<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Нет напоминаний.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>



<table border="0" cellpadding="0" cellspacing="0" style="font-size:100%">
<?php $_from = $this->_tpl_vars['todayReminders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<tr>
<td valign="top">
<?php if ($this->_tpl_vars['cur']['t'] == 2): ?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/reminders?delrem=<?php echo $this->_tpl_vars['cur']['id']; ?>
&t=1"><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/pda/remg.gif" /></a>
<?php else: ?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/reminders?delrem=<?php echo $this->_tpl_vars['cur']['id']; ?>
"><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/pda/remr.gif" /></a>
<?php endif; ?>&nbsp;
</td>
<td style="padding-bottom:5px;">

<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyBriefFromHistory?id=<?php echo $this->_tpl_vars['cur']['company_id']; ?>
" style="color:#dc8009"><?php echo $this->_tpl_vars['cur']['name']; ?>
</a>
<span style="color:#339913"><?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%e.%m.%y") : smarty_modifier_date_format($_tmp, "%e.%m.%y")); ?>
</span>
<?php echo $this->_tpl_vars['cur']['text']; ?>
<br><br>

</td>
</tr>
<?php endforeach; endif; unset($_from); ?>


<tr>
<td></td>
<td><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Без даты<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br><br></td>
</tr>

<?php $_from = $this->_tpl_vars['withoutDateReminders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<tr>
<td valign="top">
<?php if ($this->_tpl_vars['cur']['t'] == 2): ?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/reminders?delrem=<?php echo $this->_tpl_vars['cur']['id']; ?>
&t=1"><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/pda/remg.gif" /></a>
<?php else: ?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/reminders?delrem=<?php echo $this->_tpl_vars['cur']['id']; ?>
"><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/pda/remr.gif" /></a>
<?php endif; ?>&nbsp;
</td>
<td style="padding-bottom:5px;">
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyBriefFromHistory?id=<?php echo $this->_tpl_vars['cur']['company_id']; ?>
" style="color:#dc8009"><?php echo $this->_tpl_vars['cur']['name']; ?>
</a>
<?php echo $this->_tpl_vars['cur']['text']; ?>
<br><br>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>

<?php if (sizeof ( $this->_tpl_vars['withoutDateReminders'] ) > 0): ?>
<tr><td></td><td>
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Помеченные<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br><br>
</td></tr>
<?php endif; ?>

<?php $this->assign('isEmpty', true); ?>
<?php $_from = $this->_tpl_vars['reminderChecked']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<?php if (( $this->_tpl_vars['cur']['t'] == 1 && ! in_array ( $this->_tpl_vars['cur']['name'] , $this->_tpl_vars['exclude'] ) ) || ( $this->_tpl_vars['cur']['t'] == 2 && ! in_array ( $this->_tpl_vars['cur']['name'] , $this->_tpl_vars['exclude2'] ) )): ?>
<?php $this->assign('isEmpty', false); ?>
<tr>
<td valign="top">
<?php if ($this->_tpl_vars['cur']['t'] == 2): ?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/reminders?delrem2=<?php echo $this->_tpl_vars['cur']['company_id']; ?>
&t=1"><img src="/images/pda/remg.gif" /></a>
<?php else: ?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/reminders?delrem2=<?php echo $this->_tpl_vars['cur']['company_id']; ?>
"><img src="/images/pda/remr.gif" /></a>
<?php endif; ?>&nbsp;
</td>
<td style="padding-bottom:5px;">
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyBriefFromHistory?id=<?php echo $this->_tpl_vars['cur']['company_id']; ?>
" style="color:#dc8009"><?php echo $this->_tpl_vars['cur']['name']; ?>
</a>
</td>
</tr>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php if ($this->_tpl_vars['isEmpty'] == true): ?>
<tr><td colspan="2">
<span style="font-size:11px"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Список пуст.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span><br><br>
</td></tr>
<?php endif; ?>

</table>
</span>