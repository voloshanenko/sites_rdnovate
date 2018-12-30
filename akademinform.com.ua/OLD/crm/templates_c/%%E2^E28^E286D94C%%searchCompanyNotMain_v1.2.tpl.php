<?php /* Smarty version 2.6.18, created on 2010-12-21 16:24:33
         compiled from main/searchCompanyNotMain_v1.2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'main/searchCompanyNotMain_v1.2.tpl', 6, false),)), $this); ?>


<div style="padding-top:10px;">

<div style="float:left">
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=all&page=1" style="font-size:12px;color:#000"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Все компании<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a>
<span style="color:#8f8f8f;font-size:12px"><?php echo $this->_tpl_vars['allCompanyByManager']; ?>
</span>
</div>

<div style="float:left">
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=favorites&page=1" style="color:#000; font-size:12px;padding-left:35px;background-image:url('<?php echo $this->_tpl_vars['siteurl']; ?>
/images/star_on.gif'); background-repeat:no-repeat; background-position: 16px 0px;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Избранное<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
<span style="color:#8f8f8f;font-size:12px"><?php echo $this->_tpl_vars['favoriteCount']; ?>
</span>
</div>

<div id="clear" style="height:15px"></div>
<?php if ($this->_tpl_vars['locale_conf']['alphabet_national']): ?>
<?php $_from = $this->_tpl_vars['locale_conf']['alphabet_national']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['row']):
?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=<?php echo $this->_tpl_vars['key']; ?>
&page=1" class="allCompanyWLink"><?php echo $this->_tpl_vars['row']['view']; ?>
</a>
<?php endforeach; endif; unset($_from); ?>
<br><br>
<?php endif; ?>

<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=1&page=1" class="allCompanyWLinkS">1</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=2&page=1" class="allCompanyWLinkS">2</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=3&page=1" class="allCompanyWLinkS">3</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=4&page=1" class="allCompanyWLinkS">4</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=5&page=1" class="allCompanyWLinkS">5</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=6&page=1" class="allCompanyWLinkS">6</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=7&page=1" class="allCompanyWLinkS">7</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=8&page=1" class="allCompanyWLinkS">8</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=9&page=1" class="allCompanyWLinkS">9</a>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=0&page=1" class="allCompanyWLinkS">0</a>

<br><br>


<?php $_from = $this->_tpl_vars['locale_conf']['alphabet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['row']):
?>
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/searchCompany?mode=word&mparam=<?php echo $this->_tpl_vars['key']; ?>
&page=1" class="allCompanyWLinkS"><?php echo $this->_tpl_vars['row']['view']; ?>
</a>
<?php endforeach; endif; unset($_from); ?>
</div>