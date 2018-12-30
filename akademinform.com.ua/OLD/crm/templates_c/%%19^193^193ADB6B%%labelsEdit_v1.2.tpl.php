<?php /* Smarty version 2.6.18, created on 2010-12-21 16:58:58
         compiled from main/labelsEdit_v1.2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'main/labelsEdit_v1.2.tpl', 18, false),)), $this); ?>
<?php echo '
<script language="JavaScript" type="text/javascript" src="'; ?>
<?php echo $this->_tpl_vars['siteurl']; ?>
<?php echo '/js/editLabels.js"></script>
'; ?>
  


<div id="labelCategoryWnd" class="categoryWndWrap">
		<div class="categoryWnd">
			<div style="clear:both">
			<div id="labelCategoryImg" class="selectCatImg"><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/labels/25/label0.jpg" id="categImg"/></div>
			<div style="float:left; padding:4px 0px 0px 10px;"><input type="text" id="labelCategoryTxt" value="" style="width:160px;"/></div>
			</div>
			<div id="clear"></div>
			<div id="newCategoryImgs">
				<!--<?php echo $this->_tpl_vars['labelsImgs']; ?>
-->
			</div>
			<div>			
				<div style="padding:10px 5px 0px 5px;">
				<div onclick="labelCategoryWnd.deleteFn();" style="cursor:pointer; color: #e62726;	text-decoration: underline; float:left" id="categoryDelBtn"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Удалить!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
				<div style="float:right">
				<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/confirm.gif" style="cursor:pointer" onclick="labelCategoryWnd.request();">
				<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/cencel.gif" style="cursor:pointer" onclick="labelCategoryWnd.hide();">
				</div>
				</div>
			</div>	
		</div>
</div>


<div id="labelWnd" class="labelWndWrap">
<div class="labelWnd">	
	<textarea name="nl" id="labelName" wrap="on" class="labelTxt" onkeypress="labelWnd.hotkey(event);"></textarea>
	<div style="padding:2px 0px 0px 0px;">
	
	<div onclick="labelWnd.deleteFn();" style="cursor:pointer; color: #e62726;	text-decoration: underline; float:left" id="labelDelBtn"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Удалить!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
	<div style="float:right">
	<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/confirm.gif" style="cursor:pointer" onclick="labelWnd.request();">
	<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/cencel.gif" style="cursor:pointer" onclick="labelWnd.hide();">
	</div>
	</div>
</div>
</div>

<div id="deleteCategoryWnd" class="deleteWndWrap">
<div class="deleteWnd">
<center style="color:#cc3406"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Внимание! Удаление категории!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></center><br>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Вы желаете удалить категорию и перенести метки в другую категорию?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br>
<div style="padding-top:10px;">
  <div style="float:left">
  <select name="moveTo" id="moveTo" style="width:130px;">
	<option value="-1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Не переносить<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></option>
  	<?php $_from = $this->_tpl_vars['delCategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
	  	<?php if ($this->_tpl_vars['cur']['parent_id'] == 0): ?>
		  	<option value="<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="grElGr"><?php echo $this->_tpl_vars['cur']['name']; ?>
</option>	
	  	<?php endif; ?>		
	<?php endforeach; endif; unset($_from); ?>
  </select>
  </div>
  	<div style="float:right; padding-top:1px;">
	<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/confirm.gif" style="cursor:pointer" onclick="deleteCategoryWnd.request()">
	<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/cencel.gif" style="cursor:pointer" onclick="deleteCategoryWnd.hide()">
	</div>
</div>

</div>
</div>



<div id="deleteLabelWnd" class="deleteWndWrap">
<div class="deleteWnd">
<center style="color:#cc3406"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Внимание! Удаление метки!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></center><br>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Вы желаете удалить метку и присвоить фирмам под этой меткой другую метку?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><br>

<div style="padding-top:10px;">
  <div style="float:left">
  <select name="deleteTo" id="deleteTo" style="width:130px;">
  	<option value="-1"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Не присваивать<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></option>	
  	<?php $_from = $this->_tpl_vars['delCategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
	  	<?php if ($this->_tpl_vars['cur']['parent_id'] == 0): ?>
	  		<optgroup label="<?php echo $this->_tpl_vars['cur']['name']; ?>
" class="grElGr">
	  	<?php else: ?>
		  	<option value="<?php echo $this->_tpl_vars['cur']['id']; ?>
" class="grElGr"><?php echo $this->_tpl_vars['cur']['name']; ?>
</option>	
	  	<?php endif; ?>		
	<?php endforeach; endif; unset($_from); ?>
  </select>
  </div>
  
	<div style="float:right; padding-top:1px;">  
	<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/confirm.gif" style="cursor:pointer" onclick="deleteLabelWnd.request();">
	<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/cencel.gif" style="cursor:pointer" onclick="deleteLabelWnd.hide();">
	</div>
</div>
	
</div>
</div>



<table border="0" style="font-size:11px;" width="95%" cellpadding="0" cellspacing="0">
<tr>

<td style="padding-bottom:10px;"><span onClick="labelCategoryWnd.show(event,0,false);" style="font-size:11px; color:#000; cursor:pointer; background-color:#fbfacc; padding: 2px 5px 4px 3px;"><span style="color:#f4b715;"><b>+</b></span>&nbsp;&nbsp;<u><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Новая категория<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></u></span>
	
</td>
</tr>


<?php $_from = $this->_tpl_vars['labelsRoot']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<tr>
<td style="padding-bottom:12px;line-height:150%">
<div style="padding-left:20px">
<div style="padding-top:5px; padding-bottom:5px;"><span onclick="labelCategoryWnd.show(event,<?php echo $this->_tpl_vars['cur']['id']; ?>
,true);" style="cursor:pointer;"><u><b><?php echo $this->_tpl_vars['cur']['name']; ?>
</b></u></span></div>
<?php $this->assign('isFirst', true); ?>
<span onclick="labelWnd.show(event,0,false,<?php echo $this->_tpl_vars['cur']['id']; ?>
)" style="font-size:11px; color:#000; cursor:pointer; background-color:#fbfacc; padding: 0px 5px 2px 3px;"><span style="color:#f4b715;"><b>+</b></span> <u><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>метка<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></u></span><?php $_from = $this->_tpl_vars['cur']['labels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?><span onclick="labelWnd.show(event,<?php echo $this->_tpl_vars['item']['id']; ?>
,true,<?php echo $this->_tpl_vars['cur']['id']; ?>
)" style="color:#0ca414; cursor:pointer"><?php if ($this->_tpl_vars['isFirst'] == false): ?>, &nbsp;<?php else: ?> &nbsp;<?php endif; ?><?php echo $this->_tpl_vars['item']['name']; ?>
</span><?php $this->assign('isFirst', false); ?><?php endforeach; endif; unset($_from); ?>
</div>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>

</table>