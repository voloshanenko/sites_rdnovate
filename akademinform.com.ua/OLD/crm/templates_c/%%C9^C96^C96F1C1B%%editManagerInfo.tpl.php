<?php /* Smarty version 2.6.18, created on 2010-12-21 16:22:34
         compiled from managment/editManagerInfo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'managment/editManagerInfo.tpl', 2, false),)), $this); ?>
<div style="padding: 12px 12px 12px 12px;">
<b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Профиль менеджера<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b><br><br>

<form action="<?php echo $this->_tpl_vars['siteurl']; ?>
/managment/editManagerInfoSubmit" method="POST">


<div class="managerInputLabel" <?php if (isset ( $this->_tpl_vars['error']['username'] )): ?>style="color:#f34320"<?php endif; ?>"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>логин<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div style="float:left;margin-top:5px;">
<input type="text" name="username" value="<?php echo $this->_tpl_vars['username']; ?>
" class="size12" style="width:300px"/>
</div>
<div id="clear"></div>

<div class="managerInputLabel" <?php if (isset ( $this->_tpl_vars['error']['nickname'] )): ?>style="color:#f34320"<?php endif; ?>><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>имя<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div style="float:left;margin-top:5px;">
<input type="text" name="nickname" value="<?php echo $this->_tpl_vars['nickname']; ?>
" class="size12" style="width:300px"/>
</div>
<div id="clear"></div>


<?php if ($this->_tpl_vars['manager']['id'] == $_SESSION['auth']['id'] && $_SESSION['auth']['is_super_user'] == 1): ?>
<input type="hidden" name="type" value="1"/>
<?php else: ?>
<div class="managerInputLabel"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>статус<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div style="float:left;margin-top:5px;">
<select name="type">
  <option value="0"<?php if ($this->_tpl_vars['type'] == 0): ?> selected<?php endif; ?>><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Менеджер<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></option>
  <option value="1"<?php if ($this->_tpl_vars['type'] == 1): ?> selected<?php endif; ?>><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Супер-менеджер<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>&nbsp;&nbsp;</option>  
</select>
</div>
<div id="clear"></div>
<?php endif; ?>


<div class="managerInputLabel" <?php if (isset ( $this->_tpl_vars['error']['email'] )): ?>style="color:#f34320"<?php endif; ?>><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>e-mail<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div style="float:left;margin-top:5px;">
<input type="email" name="email" value="<?php echo $this->_tpl_vars['email']; ?>
" class="size12" style="width:300px"/>
</div>
<div id="clear"></div>
<div class="managerInputLabel"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>новый пароль<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div style="float:left;margin-top:5px;">
<input type="password" name="password" value="<?php echo $this->_tpl_vars['password']; ?>
" class="size12" style="width:300px"/>
</div>
<div id="clear"></div>

<div class="managerInputLabel"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>ещё раз<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div style="float:left;margin-top:5px;">
<input type="password" name="passwordagain" value="<?php echo $this->_tpl_vars['passwordagain']; ?>
" class="size12" style="width:300px"/>
</div>
<div id="clear"></div>

<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
"/>
<input type="hidden" name="isForm" value="1"/>

<div class="managerInputLabel">&nbsp;</div>
<div style="float:left;margin-top:5px;">
<input type="submit" style="float:left; background-color:#68c248; border-right: 1px solid #2c6d15; border-bottom: 1px solid #2c6d15; margin-top:6px; cursor:pointer;color:#fff;font-weight: bold" value="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Сохранить изменения<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" class="IEremoteBorder"/>
</div>
<div id="clear"></div>

</form>
</div>