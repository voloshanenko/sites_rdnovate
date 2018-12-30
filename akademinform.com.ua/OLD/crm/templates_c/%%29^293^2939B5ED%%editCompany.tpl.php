<?php /* Smarty version 2.6.18, created on 2010-12-21 16:36:53
         compiled from main/editCompany.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'main/editCompany.tpl', 3, false),)), $this); ?>
<script language="JavaScript" type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/favoriteController.js"></script>
<div style="padding-left:40px; margin-bottom:14px;">
<div style="margin-bottom:7px;font-size:11px; font-family:tahoma;color:#000;"><< <a href="javascript:history.back()" style="color:#000;"> <?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Вернуться<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Редактирование компании<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b>

<?php if ($this->_tpl_vars['error']): ?>
<div class="errorPanel">
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ошибка:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br>
 <?php if ($this->_tpl_vars['error']['email']): ?><?php echo $this->_tpl_vars['error']['email']; ?>
<br><?php endif; ?>
 <?php if ($this->_tpl_vars['error']['address']): ?><?php echo $this->_tpl_vars['error']['address']; ?>
<br><?php endif; ?> 
 <?php if ($this->_tpl_vars['error']['phone']): ?><?php echo $this->_tpl_vars['error']['phone']; ?>
<br><?php endif; ?> 
 <?php if ($this->_tpl_vars['error']['site']): ?><?php echo $this->_tpl_vars['error']['site']; ?>
<br><?php endif; ?> 
 <?php if ($this->_tpl_vars['error']['people']): ?><?php echo $this->_tpl_vars['error']['people']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['name']): ?><?php echo $this->_tpl_vars['error']['name']; ?>
<br><?php endif; ?>   
  
 <?php if ($this->_tpl_vars['error']['inn1']): ?><?php echo $this->_tpl_vars['error']['inn1']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['kpp1']): ?><?php echo $this->_tpl_vars['error']['kpp1']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['settlementAccount1']): ?><?php echo $this->_tpl_vars['error']['settlementAccount1']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['bank1']): ?><?php echo $this->_tpl_vars['error']['bank1']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['bik1']): ?><?php echo $this->_tpl_vars['error']['bik1']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['account1']): ?><?php echo $this->_tpl_vars['error']['account1']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['okpo1']): ?><?php echo $this->_tpl_vars['error']['okpo1']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['okonh1']): ?><?php echo $this->_tpl_vars['error']['okonh1']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['ogrn1']): ?><?php echo $this->_tpl_vars['error']['ogrn1']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['okved1']): ?><?php echo $this->_tpl_vars['error']['okved1']; ?>
<br><?php endif; ?>      
 <?php if ($this->_tpl_vars['error']['cname1']): ?><?php echo $this->_tpl_vars['error']['cname1']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['director1']): ?><?php echo $this->_tpl_vars['error']['director1']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['prop_address1']): ?><?php echo $this->_tpl_vars['error']['prop_address1']; ?>
<br><?php endif; ?>    

 <?php if ($this->_tpl_vars['error']['inn2']): ?><?php echo $this->_tpl_vars['error']['inn2']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['kpp2']): ?><?php echo $this->_tpl_vars['error']['kpp2']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['settlementAccount2']): ?><?php echo $this->_tpl_vars['error']['settlementAccount2']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['bank2']): ?><?php echo $this->_tpl_vars['error']['bank2']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['bik2']): ?><?php echo $this->_tpl_vars['error']['bik2']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['account2']): ?><?php echo $this->_tpl_vars['error']['account2']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['okpo2']): ?><?php echo $this->_tpl_vars['error']['okpo2']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['okonh2']): ?><?php echo $this->_tpl_vars['error']['okonh2']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['ogrn2']): ?><?php echo $this->_tpl_vars['error']['ogrn2']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['okved2']): ?><?php echo $this->_tpl_vars['error']['okved2']; ?>
<br><?php endif; ?>      
 <?php if ($this->_tpl_vars['error']['cname2']): ?><?php echo $this->_tpl_vars['error']['cname2']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['director2']): ?><?php echo $this->_tpl_vars['error']['director2']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['prop_address2']): ?><?php echo $this->_tpl_vars['error']['prop_address2']; ?>
<br><?php endif; ?>

 <?php if ($this->_tpl_vars['error']['inn3']): ?><?php echo $this->_tpl_vars['error']['inn3']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['kpp3']): ?><?php echo $this->_tpl_vars['error']['kpp3']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['settlementAccount3']): ?><?php echo $this->_tpl_vars['error']['settlementAccount3']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['bank3']): ?><?php echo $this->_tpl_vars['error']['bank3']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['bik3']): ?><?php echo $this->_tpl_vars['error']['bik3']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['account3']): ?><?php echo $this->_tpl_vars['error']['account3']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['okpo3']): ?><?php echo $this->_tpl_vars['error']['okpo3']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['okonh3']): ?><?php echo $this->_tpl_vars['error']['okonh3']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['ogrn3']): ?><?php echo $this->_tpl_vars['error']['ogrn3']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['okved3']): ?><?php echo $this->_tpl_vars['error']['okved3']; ?>
<br><?php endif; ?>      
 <?php if ($this->_tpl_vars['error']['cname3']): ?><?php echo $this->_tpl_vars['error']['cname3']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['director3']): ?><?php echo $this->_tpl_vars['error']['director3']; ?>
<br><?php endif; ?>
 <?php if ($this->_tpl_vars['error']['prop_address3']): ?><?php echo $this->_tpl_vars['error']['prop_address3']; ?>
<br><?php endif; ?>         
 
 <?php if ($this->_tpl_vars['error']['inn4']): ?><?php echo $this->_tpl_vars['error']['inn4']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['kpp4']): ?><?php echo $this->_tpl_vars['error']['kpp4']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['settlementAccount4']): ?><?php echo $this->_tpl_vars['error']['settlementAccount4']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['bank4']): ?><?php echo $this->_tpl_vars['error']['bank4']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['bik4']): ?><?php echo $this->_tpl_vars['error']['bik4']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['account4']): ?><?php echo $this->_tpl_vars['error']['account4']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['okpo4']): ?><?php echo $this->_tpl_vars['error']['okpo4']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['okonh4']): ?><?php echo $this->_tpl_vars['error']['okonh4']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['ogrn4']): ?><?php echo $this->_tpl_vars['error']['ogrn4']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['okved4']): ?><?php echo $this->_tpl_vars['error']['okved4']; ?>
<br><?php endif; ?>      
 <?php if ($this->_tpl_vars['error']['cname4']): ?><?php echo $this->_tpl_vars['error']['cname4']; ?>
<br><?php endif; ?>   
 <?php if ($this->_tpl_vars['error']['director4']): ?><?php echo $this->_tpl_vars['error']['director4']; ?>
<br><?php endif; ?> 
 <?php if ($this->_tpl_vars['error']['prop_address4']): ?><?php echo $this->_tpl_vars['error']['prop_address4']; ?>
<br><?php endif; ?>    
 
</div>
<?php endif; ?>

</div>

<form method="POST" action="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/editCompanySubmit">

<table border="0" width="1000"  cellpadding="0" cellspacing="0">
<tr>
<td width="710" valign="top">

<div id="fastcommandBrief" style="margin-left:17px;">

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




<div class="company" style="margin:0px 40px 0px 23px; padding:12px 15px 12px 15px; width:590px; background-image:url('<?php echo $this->_tpl_vars['siteurl']; ?>
/images/creature1.gif');background-repeat:no-repeat; background-position:right 100px;">

<div class="companyDataH"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Компания<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div><input type="text" name="name" value="<?php echo $this->_tpl_vars['name']; ?>
" style="width:567px;font-size:18px;" tabindex="1"></div>

<div class="companyDataH" style="margin-top:18px;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Контактная информация<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php if ($this->_tpl_vars['help']['1']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help/doc1.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
</div>
<table cellpadding="2" cellspacing="1" border="0" width="100%" style="font-family:tahoma; font-size:10px;">
<tr><td<?php if ($this->_tpl_vars['error']['phone']): ?> class="error"<?php endif; ?> width="10"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>телефоны<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td><input type="text" name="phone" value="<?php echo $this->_tpl_vars['phone']; ?>
" style="width: 275px" tabindex="2"></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['address']): ?> class="error"<?php endif; ?> width="10"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>адрес<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td><input type="text" name="address" value="<?php echo $this->_tpl_vars['address']; ?>
" style="width: 275px" tabindex="3"></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['site']): ?> class="error"<?php endif; ?> width="10"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>www сайт<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td><input type="text" name="site" value="<?php echo $this->_tpl_vars['site']; ?>
" style="width: 275px" tabindex="4"></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['email']): ?> class="error"<?php endif; ?> width="10"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>@почта<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
<td><input type="text" name="email" value="<?php echo $this->_tpl_vars['email']; ?>
" style="width: 275px" tabindex="5"></td>
</tr>
</table>

<div class="companyDataH" style="margin-top:18px;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Люди<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php if ($this->_tpl_vars['help']['2']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help/doc2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
</div>

<div><textarea name="people" id="people" wrap="on" class="companyPeopleF" tabindex="6"><?php echo $this->_tpl_vars['people']; ?>
</textarea></div>


<div class="companyDataH" style="margin-top:18px;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Примечания<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div><textarea name="about" wrap="on" id="aboutcompanyedit" tabindex="7"><?php echo $this->_tpl_vars['about']; ?>
</textarea></div>


<div id="slidein" style="font-size:11px;margin:20px 0px 10px 0px;padding:0px 9px 0px 0px;background-image:url('<?php echo $this->_tpl_vars['siteurl']; ?>
/images/pointer11.gif');background-repeat:no-repeat;background-position:right 5px;float:left;"><div style="float:left;border-bottom:1px dashed #000;cursor:pointer;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Реквизиты тоже заполнить<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div></div>

<div id="slideoutWrap" style="display:none;font-size:11px;margin:20px 0px 0px 0px;padding-bottom:10px;float:left">

<span style="float:left; color:#dc8009"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Реквизиты<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> &nbsp;&nbsp;&nbsp;</b></span>

<div id="slideout" style="padding:0px 9px 0px 0px;cursor:pointer;float:left;background-image:url('<?php echo $this->_tpl_vars['siteurl']; ?>
/images/pointer12.gif');background-repeat:no-repeat;background-position:right 5px;"><div style="border-bottom:1px dashed #000;cursor:pointer;float:left;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>да ну их<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div></div>
</div>

<div id="clear"></div>


<script language="JavaScript" type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/propBlocks.js"></script>
  

<div id="props">

<div id="pblock1">1</div>

<div id="pblock1_1" onclick="changeBlock(1)">
<a href="javascript:void(0)" class="pblockLink" tabindex="8">&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;&nbsp;</a>
</div>

<div id="pblock2">2</div>

<div id="pblock2_2" onclick="changeBlock(2)">
<a href="javascript:void(0)" class="pblockLink" tabindex="9">&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;</a>
</div>

<div id="pblock3">3</div>

<div id="pblock3_3" onclick="changeBlock(3)">
<a href="javascript:void(0)" class="pblockLink" tabindex="10">&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;</a>
</div>

<div id="pblock4">4</div>

<div id="pblock4_4" onclick="changeBlock(4)">
<a href="javascript:void(0)" class="pblockLink" tabindex="11">&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;</a>
</div>


<div id="clear" style="height:23px;"></div>



<div id="pblock1_c" style="font-size:10px;padding-bottom:10px;">
<table cellpadding="2" cellspacing="1" border="0" width="100%" style="margin-left:5px;">
<tr><td<?php if ($this->_tpl_vars['error']['cname1']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 0): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Наимен.:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 0): ?><input type="text" name="cname1" value="<?php echo $this->_tpl_vars['cname1']; ?>
" class="companyPropF" tabindex="12"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['director1']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 0): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Руководитель:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 0): ?><input type="text" name="director1" value="<?php echo $this->_tpl_vars['director1']; ?>
" class="companyPropF" tabindex="13"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['prop_address1']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 1): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Адрес:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 1): ?><input type="text" name="prop_address1" value="<?php echo $this->_tpl_vars['prop_address1']; ?>
" class="companyPropF" tabindex="14"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['inn1']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 1): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ИНН:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 1): ?><input type="text" name="inn1" value="<?php echo $this->_tpl_vars['inn1']; ?>
" class="companyPropF" tabindex="15"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['kpp1']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 2): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>КПП:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 2): ?><input type="text" name="kpp1" value="<?php echo $this->_tpl_vars['kpp1']; ?>
" class="companyPropF" tabindex="16"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['settlementAccount1']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 2): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>p/c:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 2): ?><input type="text" name="settlementAccount1" value="<?php echo $this->_tpl_vars['settlementAccount1']; ?>
" class="companyPropF" tabindex="17"><?php endif; ?></td>
</tr>
<tr><td nowrap<?php if ($this->_tpl_vars['error']['bank1']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 3): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>В банке:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 3): ?><input type="text" name="bank1" value="<?php echo $this->_tpl_vars['bank1']; ?>
" class="companyPropF" tabindex="18"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['bik1']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 3): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>БИК:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 3): ?><input type="text" name="bik1" value="<?php echo $this->_tpl_vars['bik1']; ?>
" class="companyPropF" tabindex="19"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['account1']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 4): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>к/c:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 4): ?><input type="text" name="account1" value="<?php echo $this->_tpl_vars['account1']; ?>
" class="companyPropF" tabindex="20"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['okpo1']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 4): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКПО:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 4): ?><input type="text" name="okpo1" value="<?php echo $this->_tpl_vars['okpo1']; ?>
" class="companyPropF" tabindex="21"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['okonh1']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 5): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКОНХ:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 5): ?><input type="text" name="okonh1" value="<?php echo $this->_tpl_vars['okonh1']; ?>
" class="companyPropF" tabindex="22"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['ogrn1']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 5): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОГРН:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 5): ?><input type="text" name="ogrn1" value="<?php echo $this->_tpl_vars['ogrn1']; ?>
" class="companyPropF" tabindex="23"><?php endif; ?></td>
</tr>
<tr>
<td></td>
<td></td>
<td<?php if ($this->_tpl_vars['error']['okved1']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 6): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКВЕД:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 6): ?><input type="text" name="okved1" value="<?php echo $this->_tpl_vars['okved1']; ?>
" class="companyPropF" tabindex="24"><?php endif; ?></td>
</tr>
</table>
</div>




<div id="pblock2_c" style="font-size:10px;padding-bottom:10px;">
<table cellpadding="2" cellspacing="1" border="0" width="100%" style="margin-left:5px;">
<tr><td<?php if ($this->_tpl_vars['error']['cname2']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 0): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Наимен.:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 0): ?><input type="text" name="cname2" value="<?php echo $this->_tpl_vars['cname2']; ?>
" class="companyPropF" tabindex="25"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['director2']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 0): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Руководитель:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 0): ?><input type="text" name="director2" value="<?php echo $this->_tpl_vars['director2']; ?>
" class="companyPropF" tabindex="26"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['prop_address2']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 1): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Адрес:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 1): ?><input type="text" name="prop_address2" value="<?php echo $this->_tpl_vars['prop_address2']; ?>
" class="companyPropF" tabindex="27"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['inn2']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 1): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ИНН:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 1): ?><input type="text" name="inn2" value="<?php echo $this->_tpl_vars['inn2']; ?>
" class="companyPropF" tabindex="28"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['kpp2']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 2): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>КПП:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 2): ?><input type="text" name="kpp2" value="<?php echo $this->_tpl_vars['kpp2']; ?>
" class="companyPropF" tabindex="29"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['settlementAccount2']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 2): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>p/c:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 3): ?><input type="text" name="settlementAccount2" value="<?php echo $this->_tpl_vars['settlementAccount2']; ?>
" class="companyPropF" tabindex="30"><?php endif; ?></td>
</tr>
<tr><td nowrap<?php if ($this->_tpl_vars['error']['bank2']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 3): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>В банке:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 3): ?><input type="text" name="bank2" value="<?php echo $this->_tpl_vars['bank2']; ?>
" class="companyPropF" tabindex="31"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['bik2']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 3): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>БИК:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 3): ?><input type="text" name="bik2" value="<?php echo $this->_tpl_vars['bik2']; ?>
" class="companyPropF" tabindex="32"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['account2']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 4): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>к/c:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 4): ?><input type="text" name="account2" value="<?php echo $this->_tpl_vars['account2']; ?>
" class="companyPropF" tabindex="33"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['okpo2']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 4): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКПО:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 4): ?><input type="text" name="okpo2" value="<?php echo $this->_tpl_vars['okpo2']; ?>
" class="companyPropF" tabindex="34"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['okonh2']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 5): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКОНХ:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 5): ?><input type="text" name="okonh2" value="<?php echo $this->_tpl_vars['okonh2']; ?>
" class="companyPropF" tabindex="35"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['ogrn2']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 5): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОГРН:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 5): ?><input type="text" name="ogrn2" value="<?php echo $this->_tpl_vars['ogrn2']; ?>
" class="companyPropF" tabindex="36"><?php endif; ?></td>
</tr>
<tr>
<td></td>
<td></td>
<td<?php if ($this->_tpl_vars['error']['okved2']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 6): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКВЕД:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 6): ?><input type="text" name="okved2" value="<?php echo $this->_tpl_vars['okved2']; ?>
" class="companyPropF" tabindex="37"><?php endif; ?></td>
</tr>
</table>
</div>



<div id="pblock3_c" style="font-size:10px;padding-bottom:10px;">
<table cellpadding="2" cellspacing="1" border="0" width="100%" style="margin-left:5px;">
<tr><td<?php if ($this->_tpl_vars['error']['cname3']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 0): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Наимен.:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 0): ?><input type="text" name="cname3" value="<?php echo $this->_tpl_vars['cname3']; ?>
" class="companyPropF" tabindex="38"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['director3']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 0): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Руководитель:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 0): ?><input type="text" name="director3" value="<?php echo $this->_tpl_vars['director3']; ?>
" class="companyPropF" tabindex="39"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['prop_address3']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 1): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Адрес:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 1): ?><input type="text" name="prop_address3" value="<?php echo $this->_tpl_vars['prop_address3']; ?>
" class="companyPropF" tabindex="40"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['inn3']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 1): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ИНН:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 1): ?><input type="text" name="inn3" value="<?php echo $this->_tpl_vars['inn3']; ?>
" class="companyPropF" tabindex="41"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['kpp3']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 2): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>КПП:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 2): ?><input type="text" name="kpp3" value="<?php echo $this->_tpl_vars['kpp3']; ?>
" class="companyPropF" tabindex="42"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['settlementAccount3']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 2): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>p/c:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 2): ?><input type="text" name="settlementAccount3" value="<?php echo $this->_tpl_vars['settlementAccount3']; ?>
" class="companyPropF" tabindex="43"><?php endif; ?></td>
</tr>
<tr><td nowrap<?php if ($this->_tpl_vars['error']['bank3']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 3): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>В банке:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 3): ?><input type="text" name="bank3" value="<?php echo $this->_tpl_vars['bank3']; ?>
" class="companyPropF" tabindex="44"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['bik3']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 3): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>БИК:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 3): ?><input type="text" name="bik3" value="<?php echo $this->_tpl_vars['bik3']; ?>
" class="companyPropF" tabindex="45"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['account3']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 4): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>к/c:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 4): ?><input type="text" name="account3" value="<?php echo $this->_tpl_vars['account3']; ?>
" class="companyPropF" tabindex="46"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['okpo3']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 4): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКПО:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 4): ?><input type="text" name="okpo3" value="<?php echo $this->_tpl_vars['okpo3']; ?>
" class="companyPropF" tabindex="47"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['okonh3']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 5): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКОНХ:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 5): ?><input type="text" name="okonh3" value="<?php echo $this->_tpl_vars['okonh3']; ?>
" class="companyPropF" tabindex="48"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['ogrn3']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 5): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОГРН:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 5): ?><input type="text" name="ogrn3" value="<?php echo $this->_tpl_vars['ogrn3']; ?>
" class="companyPropF" tabindex="49"><?php endif; ?></td>
</tr>
<tr>
<td></td>
<td></td>
<td<?php if ($this->_tpl_vars['error']['okved3']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 6): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКВЕД:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 6): ?><input type="text" name="okved3" value="<?php echo $this->_tpl_vars['okved3']; ?>
" class="companyPropF" tabindex="50"><?php endif; ?></td>
</tr>
</table>
</div>

<div id="pblock4_c" style="font-size:10px;padding-bottom:10px;">
<table cellpadding="2" cellspacing="1" border="0" width="100%" style="margin-left:5px;">
<tr><td<?php if ($this->_tpl_vars['error']['cname4']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 0): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Наимен.:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 0): ?><input type="text" name="cname4" value="<?php echo $this->_tpl_vars['cname4']; ?>
" class="companyPropF" tabindex="51"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['director4']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 0): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Руководитель:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 0): ?><input type="text" name="director4" value="<?php echo $this->_tpl_vars['director4']; ?>
" class="companyPropF" tabindex="52"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['prop_address4']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 1): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Адрес:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 1): ?><input type="text" name="prop_address4" value="<?php echo $this->_tpl_vars['prop_address4']; ?>
" class="companyPropF" tabindex="53"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['inn4']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 1): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ИНН:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 1): ?><input type="text" name="inn4" value="<?php echo $this->_tpl_vars['inn4']; ?>
" class="companyPropF" tabindex="54"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['kpp4']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 2): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>КПП:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 2): ?><input type="text" name="kpp4" value="<?php echo $this->_tpl_vars['kpp4']; ?>
" class="companyPropF" tabindex="55"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['settlementAccount4']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 2): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>p/c:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 2): ?><input type="text" name="settlementAccount4" value="<?php echo $this->_tpl_vars['settlementAccount4']; ?>
" class="companyPropF" tabindex="56"><?php endif; ?></td>
</tr>
<tr><td nowrap<?php if ($this->_tpl_vars['error']['bank4']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 3): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>В банке:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 3): ?><input type="text" name="bank4" value="<?php echo $this->_tpl_vars['bank4']; ?>
" class="companyPropF" tabindex="57"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['bik4']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 3): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>БИК:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 3): ?><input type="text" name="bik4" value="<?php echo $this->_tpl_vars['bik4']; ?>
" class="companyPropF" tabindex="58"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['account4']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 4): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>к/c:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 4): ?><input type="text" name="account4" value="<?php echo $this->_tpl_vars['account4']; ?>
" class="companyPropF" tabindex="59"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['okpo4']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 4): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКПО:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 4): ?><input type="text" name="okpo4" value="<?php echo $this->_tpl_vars['okpo4']; ?>
" class="companyPropF" tabindex="60"><?php endif; ?></td>
</tr>
<tr><td<?php if ($this->_tpl_vars['error']['okonh4']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_left'] > 5): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКОНХ:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_left'] > 5): ?><input type="text" name="okonh4" value="<?php echo $this->_tpl_vars['okonh4']; ?>
" class="companyPropF" tabindex="61"><?php endif; ?></td>

<td<?php if ($this->_tpl_vars['error']['ogrn4']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 5): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОГРН:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 5): ?><input type="text" name="ogrn4" value="<?php echo $this->_tpl_vars['ogrn4']; ?>
" class="companyPropF" tabindex="62"><?php endif; ?></td>
</tr>
<tr>
<td></td>
<td></td>
<td<?php if ($this->_tpl_vars['error']['okved4']): ?> class="error"<?php endif; ?>><?php if ($this->_tpl_vars['bank_properties_right'] > 6): ?><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ОКВЕД:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?></td>
<td><?php if ($this->_tpl_vars['bank_properties_right'] > 6): ?><input type="text" name="okved4" value="<?php echo $this->_tpl_vars['okved4']; ?>
" class="companyPropF" tabindex="63"><?php endif; ?></td>
</tr>
</table>
</div>

</div>


<?php echo '
<script language="JavaScript" type="text/javascript">
var propSlide = new Fx.Slide(\'props\');
'; ?>


<?php if ($this->_tpl_vars['cname1'] != "" || $this->_tpl_vars['director1'] != "" || $this->_tpl_vars['prop_address1'] != "" || $this->_tpl_vars['inn1'] != "" || $this->_tpl_vars['kpp'] != "" || $this->_tpl_vars['settlementAccount1'] != "" || $this->_tpl_vars['bank1'] != "" || $this->_tpl_vars['bik1'] != "" || $this->_tpl_vars['account1'] != "" || $this->_tpl_vars['okpo1'] != "" || $this->_tpl_vars['okonh1'] != "" || $this->_tpl_vars['ogrn1'] != "" || $this->_tpl_vars['okved1'] != ""): ?> 
 $('slidein').style.display = 'none';
 $('slideoutWrap').style.display = 'block';
<?php else: ?> 
 propSlide.hide();
<?php endif; ?>

<?php echo '	
$(\'slidein\').addEvent(\'click\', function(e){
	e = new Event(e);
	$(\'slidein\').style.display = \'none\';
	$(\'slideoutWrap\').style.display = \'block\';	
	propSlide.slideIn();
	e.stop();
});
 
$(\'slideout\').addEvent(\'click\', function(e){
	e = new Event(e);
	$(\'slidein\').style.display = \'block\';
	$(\'slideoutWrap\').style.display = \'none\';
	propSlide.slideOut();
	e.stop();
});

</script>
  
'; ?>


<div style="float:right">
<input type="submit" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Изменить<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" id="lockButton" style="background-color:#68c248;font-family:arial;font-size:16px;color:#fff;font-weight:bold;border-bottom:1px solid #2c6d15;border-right:1px solid #2c6d15" tabindex="200">
<input type="button" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Отмена<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" id="lockButton" onclick="document.location='<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyBrief'" style="background-color:#68c248;font-family:arial;font-size:16px;color:#fff;font-weight:bold;border-bottom:1px solid #2c6d15;border-right:1px solid #2c6d15" tabindex="201">
<input type="hidden" name="isForm" value="1">
</div>
<div id="clear"></div>

</div>

</div>

</td>
<td align="left" valign="top" style="font-size:11px;">




<div style="color:#0ca414; padding: 12px 0px 15px 0px; font-size:11px; font-weight:bold;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Метки<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>

<?php $this->assign('ti', 65); ?>
<?php $_from = $this->_tpl_vars['labelsRoot']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>

<?php $this->assign('i', 0); ?>
<b><?php echo $this->_tpl_vars['cur']['name']; ?>
</b>

<div>
<?php $this->assign('isFirst', true); ?>
<?php $_from = $this->_tpl_vars['cur']['labels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<div style="float:left; width:49%">
<input type="checkbox" name="ch<?php echo $this->_tpl_vars['item']['id']; ?>
"<?php if (in_array ( $this->_tpl_vars['item']['id'] , $this->_tpl_vars['lb'] )): ?> checked<?php endif; ?> id="ch<?php echo $this->_tpl_vars['item']['id']; ?>
" style="margin-left:0px; margin-top:5px;" class="checkboxFix" tabindex="<?php echo $this->_tpl_vars['ti']; ?>
"><label for="ch<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</label>
</div>

<?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
<?php if ($this->_tpl_vars['i'] > 2): ?><?php $this->assign('i', 1); ?><?php endif; ?>
<?php if ($this->_tpl_vars['i'] == 2): ?><div id="clear"></div><?php endif; ?>

<?php $this->assign('ti', $this->_tpl_vars['ti']+1); ?>
<?php endforeach; endif; unset($_from); ?>
<div id="clear"></div>
<span style="color:#f4b715">+</span> <input type="text" name="newch<?php echo $this->_tpl_vars['cur']['id']; ?>
" value="<?php echo $this->_tpl_vars['nlb'][$this->_tpl_vars['cur']['id']]; ?>
" style="width:90px;margin-top:5px;" tabindex="<?php echo $this->_tpl_vars['ti']; ?>
">
<br><br>
</div>

<?php $this->assign('ti', $this->_tpl_vars['ti']+1); ?>
<?php endforeach; endif; unset($_from); ?>

</div>


</td>
</tr>
</table>

</form>