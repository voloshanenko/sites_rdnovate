<?php /* Smarty version 2.6.18, created on 2010-12-23 14:42:54
         compiled from pda/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'pda/footer.tpl', 6, false),)), $this); ?>
</div>

<div id="footer">
<?php if (( empty ( $this->_tpl_vars['doNotShowPDAlink'] ) )): ?>
<a href="<?php $_SERVER ['REQUEST_URI'] = str_replace (array ('&pda', '?pda'), '', $_SERVER ['REQUEST_URI']); echo $_SERVER ['REQUEST_URI']; echo (strpos ($_SERVER['REQUEST_URI'], '?') !== false) ? '&' : '?'; echo 'nopda'; ?>" style="color:#000"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Полная версия<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> &nbsp;&nbsp;&nbsp;&nbsp;
<?php endif; ?>
</div>

</body>
</html>