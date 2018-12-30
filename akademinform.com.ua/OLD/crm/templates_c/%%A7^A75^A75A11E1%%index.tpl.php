<?php /* Smarty version 2.6.18, created on 2010-12-23 14:43:26
         compiled from pda/main/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'pda/main/index.tpl', 3, false),)), $this); ?>
<?php if (isset ( $this->_tpl_vars['selectError'] )): ?><span class="size2"><?php echo $this->_tpl_vars['selectError']; ?>
<br></span><?php endif; ?>

<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Метки<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>&nbsp;&nbsp;
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/pda/fav.gif" />:<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=favorites&page=1" style="color:#000"><?php echo $this->_tpl_vars['favoriteCount']; ?>
</a>&nbsp;
<?php if (sizeof ( $this->_tpl_vars['remToday'] ) > 0 || sizeof ( $this->_tpl_vars['remTodayM'] ) > 0): ?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/mainpda/todayReminders" style="color:#ec392e">!</a><?php endif; ?>

<span class="size2">
<?php $_from = $this->_tpl_vars['labelsRoot']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<br><br>
<b><?php echo $this->_tpl_vars['cur']['name']; ?>
</b>
<?php $this->assign('isFirst', true); ?>
<?php $_from = $this->_tpl_vars['cur']['labels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?><?php if (! $this->_tpl_vars['isFirst']): ?> <span style="color:gray">|</span> <?php else: ?><?php $this->assign('isFirst', false); ?><?php endif; ?><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompanyLabels?mode=label&mparam=<?php echo $this->_tpl_vars['item']['id']; ?>
&page=1" style="color:#0ca414"> <?php echo $this->_tpl_vars['item']['name']; ?>
</a><?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>

<br><br>

<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=all&page=1" class="allCompanyLink"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Все компании:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a> &nbsp;
<?php $_from = $this->_tpl_vars['locale_conf']['alphabet_national']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['row']):
?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=<?php echo $this->_tpl_vars['key']; ?>
&page=1" class="allCompanyWLink"><?php echo $this->_tpl_vars['row']['view']; ?>
</a>&nbsp;
<?php endforeach; endif; unset($_from); ?>

&nbsp;&nbsp;

<?php $_from = $this->_tpl_vars['locale_conf']['alphabet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['row']):
?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=<?php echo $this->_tpl_vars['key']; ?>
&page=1" class="allCompanyWLinkS"><?php echo $this->_tpl_vars['row']['view']; ?>
</a>&nbsp;
<?php endforeach; endif; unset($_from); ?>
&nbsp;&nbsp;

<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=0&page=1" class="allCompanyWLink">0</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=1&page=1" class="allCompanyWLink">1</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=2&page=1" class="allCompanyWLink">2</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=3&page=1" class="allCompanyWLink">3</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=4&page=1" class="allCompanyWLink">4</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=5&page=1" class="allCompanyWLink">5</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=6&page=1" class="allCompanyWLink">6</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=7&page=1" class="allCompanyWLink">7</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=8&page=1" class="allCompanyWLink">8</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=9&page=1" class="allCompanyWLink">9</a>

</span>