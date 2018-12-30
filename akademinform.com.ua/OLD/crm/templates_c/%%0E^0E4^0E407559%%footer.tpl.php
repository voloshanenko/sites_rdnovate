<?php /* Smarty version 2.6.18, created on 2010-12-01 22:36:05
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'footer.tpl', 11, false),)), $this); ?>


<div style="clear:both"></div>
<div style="height:35px"></div> 


</div>
</div>
<?php if (( empty ( $this->_tpl_vars['doNotShowPDAlink'] ) )): ?>
<a style = "font-size: 12x; color:#000;" href="<?php 
$_SERVER ['REQUEST_URI'] = str_replace (array ('&nopda', '?nopda'), '', $_SERVER ['REQUEST_URI']); echo $_SERVER ['REQUEST_URI']; echo (strpos ($_SERVER['REQUEST_URI'], '?') !== false) ? '&' : '?'; echo 'pda'; ?>" style="color:#000"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>КПК версия<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> &nbsp;&nbsp;&nbsp;&nbsp;
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['change_pass_question'] )): ?>
<table cellspacing = "0" cellpadding = "0" bgcolor = "yellow" width = "100%"><tr><td><span style = "padding:3px; padding-left:10px;font-weight:bold"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Необходимо сменить пароль для учётной записи администратора.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td></tr></table>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['is_demo'] )): ?>
<table cellspacing = "0" cellpadding = "0" bgcolor = "red" width = "100%"><tr><td style = "color: white;padding:3px; padding-left:10px;font-weight:bold"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Внимание! Это демо-версия. Вы не сможете сохранять информацию.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td></tr></table>
<?php echo '
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-230226-14");
pageTracker._trackPageview();
} catch(err) {}</script>
'; ?>

<?php endif; ?>


</body>
</html>