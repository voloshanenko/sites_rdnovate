<?php /* Smarty version 2.6.18, created on 2010-12-21 16:23:52
         compiled from main/labels_v1.2.tpl */ ?>
<div style="padding-left:20px">

</div>


<table border="0" style="font-size:11px;" width="95%" cellpadding="0" cellspacing="0">
<?php $_from = $this->_tpl_vars['labelsRoot']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<tr>
<td style="padding-bottom:12px;line-height:150%">
<div style="padding-left:20px">
<div style="padding-top:5px; padding-bottom:5px;"><b><?php echo $this->_tpl_vars['cur']['name']; ?>
</b></div>

<?php $this->assign('isFirst', true); ?>
<?php $_from = $this->_tpl_vars['cur']['labels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?><?php if (! $this->_tpl_vars['isFirst']): ?><span style="color:#0ca414">,</span> &nbsp;<?php else: ?><?php $this->assign('isFirst', false); ?><?php endif; ?><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompanyLabels?mode=label&mparam=<?php echo $this->_tpl_vars['item']['id']; ?>
&page=1" style="color:#0ca414"> <?php echo $this->_tpl_vars['item']['name']; ?>
</a><?php endforeach; endif; unset($_from); ?>
</div>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>