<?php /* Smarty version 2.6.18, created on 2010-12-21 16:23:52
         compiled from main/history_v1.2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'main/history_v1.2.tpl', 1, false),)), $this); ?>
<div style="font-size:12px;margin-bottom:15px;"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Рабочий день:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></div>
<?php if (sizeof ( $this->_tpl_vars['history'] ) == 0): ?>

<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Список пуст.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>
<?php $_from = $this->_tpl_vars['history']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>	
<div style="margin-bottom:5px;">
<div class="<?php if ($this->_tpl_vars['cur']['locked'] == 1): ?>clip_on<?php else: ?>clip_off<?php endif; ?>" onclick="changeClipState(this,<?php echo $this->_tpl_vars['cur']['company_id']; ?>
)"></div><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyBriefFromHistory?id=<?php echo $this->_tpl_vars['cur']['company_id']; ?>
" style="color:#dc8009;font-size:12px;"><?php echo $this->_tpl_vars['cur']['name']; ?>
</a>	
</div>
<?php endforeach; endif; unset($_from); ?>

<?php echo '
<script language="JavaScript" type="text/javascript" src="'; ?>
<?php echo $this->_tpl_vars['siteurl']; ?>
<?php echo '/js/historyClips.js"></script>
'; ?>