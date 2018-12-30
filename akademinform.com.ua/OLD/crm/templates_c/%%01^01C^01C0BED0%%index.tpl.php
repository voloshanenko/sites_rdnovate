<?php /* Smarty version 2.6.18, created on 2010-12-21 16:24:47
         compiled from journal/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'journal/index.tpl', 12, false),array('modifier', 'date_format', 'journal/index.tpl', 64, false),array('modifier', 'lower', 'journal/index.tpl', 69, false),)), $this); ?>


<table cellpadding="0" border="0" class="content">
<tr><td width="40">&nbsp;</td>
<td width="620" valign="top" align="left">


<table>
<tr>
<td>
<div class="journalh">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Журнал:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> 
</div>
</td>



<?php if ($this->_tpl_vars['scale'] == 1): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "journal/topday.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['scale'] == 2): ?> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "journal/topweek.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "journal/topmonth.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['help']['5']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help/doc5.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['help']['9']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help/doc9.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<br>

<?php if (sizeof ( $this->_tpl_vars['journaldata'] ) == 0): ?>
<table cellpadding="0" cellspacing="0" width="100%" id="journaldata"> 
<tr><td class="journalOdd pad2">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Нет событий.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
</td></tr>
<tr>
<td class="journalBottom">&nbsp;</td>
</tr>
</table>

<?php else: ?>
<table cellpadding="0" cellspacing="0" width="100%" id="journaldata"> 
<?php $this->assign('odd', 'true'); ?>

<?php 
	include('incl/month.php');
    $this->assign('month',$month);
 ?>	

	<?php $_from = $this->_tpl_vars['journaldata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
	
	<tr>
	
	<?php if ($this->_tpl_vars['odd'] == true): ?><?php $this->assign('trs', 'journalOdd'); ?><?php else: ?><?php $this->assign('trs', 'journalEven'); ?><?php endif; ?>
	
	<td class="<?php echo $this->_tpl_vars['trs']; ?>
 pad2 al-center eventPosted" width="71">
	

	<?php $this->assign('mdisplay', ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m"))); ?>
	
	<?php if ($this->_tpl_vars['scale'] == 1): ?>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%H:%M") : smarty_modifier_date_format($_tmp, "%H:%M")); ?>

	<?php elseif ($this->_tpl_vars['scale'] == 2): ?>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%e") : smarty_modifier_date_format($_tmp, "%e")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['month'][$this->_tpl_vars['mdisplay']])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>

	<?php else: ?>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%e") : smarty_modifier_date_format($_tmp, "%e")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['month'][$this->_tpl_vars['mdisplay']])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>

	<?php endif; ?>
	</td>
	<td class="<?php echo $this->_tpl_vars['trs']; ?>
 pad2" style="font-size:12px;">
	<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyBriefFromLabel?id=<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="journalCompany"><?php echo $this->_tpl_vars['cur']['cname']; ?>
</a><?php if ($this->_tpl_vars['cur']['manager_name'] != ""): ?> (<?php echo $this->_tpl_vars['cur']['manager_name']; ?>
)<?php endif; ?><br>
	<span class="eventText"><?php echo $this->_tpl_vars['cur']['ename']; ?>
</span><br>
	<span class="eventComment"><?php echo $this->_tpl_vars['cur']['comment']; ?>
</span><br>
	</td>
		 
	</tr>
	<?php if ($this->_tpl_vars['odd'] == true): ?><?php $this->assign('odd', false); ?>
	<?php else: ?><?php $this->assign('odd', true); ?><?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	
<tr>
<td class="journalBottom">&nbsp;</td>
<td class="journalBottom">&nbsp;</td>
</tr>	
</table>
<?php endif; ?>




</td>
<td valign="top">

<div id="scale">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "journal/scale.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<?php if ($this->_tpl_vars['scale'] == 1): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "journal/day.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['scale'] == 2): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "journal/week.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "journal/month.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>


<?php if ($_SESSION['auth']['is_super_user']): ?>



<?php if ($this->_tpl_vars['scale'] == 1): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "journal/daymanagers.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['scale'] == 2): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "journal/weekmanagers.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "journal/monthmanagers.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php endif; ?>


</td></tr>
</table>