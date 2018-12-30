<?php /* Smarty version 2.6.18, created on 2010-12-23 14:43:39
         compiled from pda/main/companyBrief.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'pda/main/companyBrief.tpl', 2, false),array('modifier', 'trim', 'pda/main/companyBrief.tpl', 18, false),array('modifier', 'many_emails', 'pda/main/companyBrief.tpl', 38, false),)), $this); ?>
<?php if (isset ( $this->_tpl_vars['backlink'] )): ?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/" style="color:black;"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Клиенты<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a> /
<?php echo $this->_tpl_vars['backlink']; ?>

<?php else: ?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/" style="color:black;"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Клиенты<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a> / 
<?php endif; ?>
<b style="color:#dc8009"><?php echo $this->_tpl_vars['name']; ?>
</b>

<?php if ($this->_tpl_vars['RemCount'] != 0): ?><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/pda/rem.gif" /> : <a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/mainpda/remindersByCompany" style="color:#000"><?php echo $this->_tpl_vars['RemCount']; ?>
</a>&nbsp;<?php endif; ?>
<?php if ($this->_tpl_vars['MRemCount'] != 0): ?><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/pda/rem2.gif" /> : <a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/mainpda/remindersByCompany" style="color:#000"><?php echo $this->_tpl_vars['MRemCount']; ?>
</a><?php endif; ?>


<span class="size2">
<br><br>
<?php if ($this->_tpl_vars['phone'] != ""): ?><?php echo $this->_tpl_vars['phone']; ?>
<br><?php endif; ?>

<?php $this->assign('isFirst', true); ?>
<?php $_from = $this->_tpl_vars['site']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?><?php if (! $this->_tpl_vars['isFirst']): ?>, <?php endif; ?><a href="http://<?php echo ((is_array($_tmp=$this->_tpl_vars['cur'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
" target="_blank" style="color:#0553f2"><?php echo ((is_array($_tmp=$this->_tpl_vars['cur'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
</a><?php if (((is_array($_tmp=$this->_tpl_vars['cur'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)) != ""): ?><?php $this->assign('isFirst', false); ?><?php endif; ?><?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['isFirst'] == false): ?><br><?php endif; ?>

<?php $this->assign('isFirst', true); ?>
<?php $_from = $this->_tpl_vars['email']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?><?php if (! $this->_tpl_vars['isFirst']): ?>, <?php endif; ?><a href="mailto:<?php echo ((is_array($_tmp=$this->_tpl_vars['cur'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
" style="color:#0553f2"><?php echo ((is_array($_tmp=$this->_tpl_vars['cur'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
</a><?php if (((is_array($_tmp=$this->_tpl_vars['cur'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)) != ""): ?><?php $this->assign('isFirst', false); ?><?php endif; ?><?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['isFirst'] == false): ?><br><?php endif; ?>

<?php echo $this->_tpl_vars['address']; ?>
<br>
</span>

</div>

<div id="people">


<?php $this->assign('isFirst', true); ?>
<?php $_from = $this->_tpl_vars['people']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<?php if ($this->_tpl_vars['isFirst'] == false): ?>
<div style="border-top:1px solid black; font-size:1px;margin-top:3px;">&nbsp;</div>
<?php endif; ?>
<?php echo $this->_tpl_vars['cur']['fio']; ?>
<?php if ($this->_tpl_vars['cur']['phone'] != ""): ?>, <?php echo $this->_tpl_vars['cur']['phone']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['cur']['email'] != ""): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['cur']['email'])) ? $this->_run_mod_handler('many_emails', true, $_tmp) : smarty_modifier_many_emails($_tmp)); ?>
<?php endif; ?><?php if ($this->_tpl_vars['cur']['comment'] != ""): ?>, <?php echo $this->_tpl_vars['cur']['comment']; ?>
<?php endif; ?><?php $this->assign('isFirst', false); ?><?php endforeach; endif; unset($_from); ?>


</div>


<div id="content">
<span class="size2">

<?php if (sizeof ( $this->_tpl_vars['labels'] ) > 0): ?>
<div style="text-align:right">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Метки:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> 
<?php $this->assign('isFirst', true); ?>
<?php $_from = $this->_tpl_vars['labels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<?php if (! $this->_tpl_vars['isFirst']): ?>, <?php endif; ?><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompanyLabels?mode=label&mparam=<?php echo $this->_tpl_vars['cur']['id']; ?>
&page=1" style="color:#0ca414"><?php echo $this->_tpl_vars['cur']['name']; ?>
</a><?php $this->assign('isFirst', false); ?>
<?php endforeach; endif; unset($_from); ?>
</div>

<?php endif; ?>

<form action="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyAddHistory" method="POST">
<table>
<tr>
<td valign="top">
<input type="text" name="name" tabindex="1" style="width:150px" value="<?php echo $_GET['pda_p1']; ?>
"><br>
<textarea name="comment" wrap="on" tabindex="2" style="width:150px; height:50px;"><?php echo $_GET['pda_p2']; ?>
</textarea>
</td>
<td valign="top">
<input type="Submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Добавить<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"><br>
<span class="size2">
<?php if ($_GET['pda_added'] == 1): ?>
<span style="color:#dc8009"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Добавлено.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span><br>
<?php endif; ?>
<?php if ($_GET['pda_added'] == 2): ?>
<span style="color:#dc8009"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Не добавлено.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span><br>
<?php endif; ?>
<br>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/mainpda/history" style="color:#a3a3a3">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Загрузить
историю<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
</span>
</td>
</tr>
</table>
</form>

</span>