<?php /* Smarty version 2.6.18, created on 2010-12-21 16:23:51
         compiled from main/selectCompany_v1.2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'main/selectCompany_v1.2.tpl', 5, false),)), $this); ?>
 
<div style="background-color:#edfbde; padding:10px 0px 0px 45px;width:535px;height: 30px; float:left">
<form action="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/selectCompanySubmit" method="get">
<div style="float:left;font-family: arial;">
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Клиент:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>&nbsp;
<input type="text" name="company" id="company" value="" style="width:410px;"/>
&nbsp; 
</div>
<div style="float:left">

<input type="submit" name="name" value="" class="buttonBorder"/>

</div>
<div id="clear"></div>

</form> 
</div>

<div style="margin-right:70px;border-left:1px solid #deeecd;float:left;background-color:#fbfacc;background-image:url('<?php echo $this->_tpl_vars['siteurl']; ?>
/images/newComp.gif');font-size:11px;background-repeat:no-repeat;height:26px;width:37px;padding:14px 10px 0px 28px;background-position:9px 15px">
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/addCompany" style="color:#000"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>новый<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></a>
</div>