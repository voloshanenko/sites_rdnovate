<?php /* Smarty version 2.6.18, created on 2010-12-21 17:44:11
         compiled from main/selectCompanyNotFound.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'main/selectCompanyNotFound.tpl', 41, false),array('modifier', 'date_format', 'main/selectCompanyNotFound.tpl', 273, false),array('modifier', 'htmlspecialchars', 'main/selectCompanyNotFound.tpl', 291, false),array('modifier', 'trim', 'main/selectCompanyNotFound.tpl', 320, false),array('modifier', 'many_emails', 'main/selectCompanyNotFound.tpl', 340, false),)), $this); ?>
<script language="JavaScript" type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/favoriteController.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/remindersPoolList.js"></script>

<?php if ($this->_tpl_vars['company'] == ""): ?><?php $this->assign('company', $_GET['company']); ?><?php endif; ?>
<?php echo '
<script>
document.addEvent(\'click\', function checkelements(e){		
		elem = e.target || e.srcElement;
		if (elem.id=="" && historyWnd!=0) hideActHistoryWnd();
});

var grCompanies = '; ?>
<?php echo $this->_tpl_vars['grCompany']; ?>
;

var nowPage = "selectCompanyNotFound?company=<?php echo $this->_tpl_vars['selectedCompany']; ?>
&page=<?php echo $this->_tpl_vars['page']; ?>
";
var printPage = "printSelected?mode=<?php echo $this->_tpl_vars['mode']; ?>
&mparam=<?php echo $this->_tpl_vars['mparam']; ?>
&page=<?php echo $this->_tpl_vars['page']; ?>
";

<?php echo '
function groupAction() {

	if ($(\'grAction\').value == \'none\') return;
	
	var req = nowPage+"&gr="+$(\'grAction\').value;
	var print = false;
	if ($(\'grAction\').value==\'print\') {
		print = true;
		var req = printPage;
	}	
	
	var go = false;
	for (i=0; i < grCompanies.length; i++) {
		try {
		if ($(\'checkComp\'+grCompanies[i]).getProperty(\'checked\') == true) {
			go = true;
			req = req + \'&checkComp\'+grCompanies[i]+\'=1\';
		}
		}catch(e) 
		{}
	}
	if (go)	{
		if (print) {			
			window.open(\''; ?>
<?php echo $this->_tpl_vars['siteurl']; ?>
<?php echo '/printer/\'+req,\''; ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Компании<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '\');
			$(\'grAction\').value = \'none\';
		} else {
			document.location = \''; ?>
<?php echo $this->_tpl_vars['siteurl']; ?>
<?php echo '/main/\'+req; 
		}	
	} else {
		$(\'grAction\').value = \'none\';
		alert(\''; ?>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ничего не выбрано!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '\');		
	}	
}

function markAll() {
	for (i=0; i < grCompanies.length; i++) {
		try{
		$(\'checkComp\'+grCompanies[i]).setProperty(\'checked\',true);
		} catch(e) {
		}
	}
}

function unmarkAll() {
	for (i=0; i < grCompanies.length; i++) {
		try{
		$(\'checkComp\'+grCompanies[i]).setProperty(\'checked\',false);
		} catch(e) {
		}
	}
}

function marking() {
	if ($(\'marking\').getProperty(\'checked\')==true) {
		markAll();
	} else {
		unmarkAll();
	}
}

</script>
'; ?>




<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/selectCompany_v1.2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/managers_v1.2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="clear" style="margin-bottom:25px;"></div>  


<table cellpadding="0" border="0" class="content">
<tr><td width="17"></td>
<td width="656" valign="top" align="left">

<span class="size12" style="margin-left:23px;"><?php $this->_tag_stack[] = array('t', array('company' => $this->_tpl_vars['company'])); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Компании '%company' нет в нашей базе!<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> 
<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/addCompany?name=<?php echo $this->_tpl_vars['company']; ?>
" class="cLink"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Добавить?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
</span>

<?php if ($this->_tpl_vars['pages'] == 1): ?><br><br><?php endif; ?>

<div style="margin-left:23px">


<?php if (isset ( $this->_tpl_vars['pages'] ) && $this->_tpl_vars['pages'] > 1): ?>
<div class="pages">

<?php if ($this->_tpl_vars['pages'] > 20): ?>

<link href="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/navigator.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
    var pFrom   = 1,
        pTo     = 25,
        pMax    = <?php echo $this->_tpl_vars['pages']; ?>
,
        curPage = <?php echo $this->_tpl_vars['page']; ?>
,
        timer, timer2,
        page = '<?php echo $this->_tpl_vars['siteurl']; ?>
/main/selectCompanyNotFound?company=<?php echo $this->_tpl_vars['company']; ?>
&page=';
</script>

<script src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/navigator.js"></script>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
  <td></td>
  <td width=510 height=2 style="background-repeat: no-repeat;" id="tdMark">
    <div id="divPos" style="filter: alpha(opacity=65); -moz-opacity: 0.65; height: 2px; position: relative; left: 0px; top: 0px; background-color: #AAAAAA;"><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/blank.gif" width=50 height=1></div>
  </td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td style="background-color: #EFEFEF; padding: 5px 0px 5px 0px;">
    <div id="divPages" style="width: 510px; overflow: hidden;"
         onmousemove="moveScrolling(event)" onmouseover="startScrolling()">
      <script type="text/javascript">document.write(getPages(pFrom, pTo))</script>
    </div>
  </td>  
  <td colspan="2" nowrap>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/selectCompanyNotFound?company=<?php echo $this->_tpl_vars['company']; ?>
" class="pagesAllList"  onclick="if (<?php echo $this->_tpl_vars['pages']; ?>
>50 && !confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Вывод всех данных может выполняться долго!\nВы уверены?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) return false;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>весь список<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>   
  </td>
</tr>
<tr>
  <td><a href="javascript: setPages(-25)" class="arr">&lt;&lt;</a></td>
  <td class="stat"><div id="divStat"></div></td>
  <td><a href="javascript: setPages(25)" class="arr">&gt;&gt;</a></td>
  <td></td>
</tr>
</table>

<?php else: ?>

	<?php unset($this->_sections['name']);
$this->_sections['name']['name'] = 'name';
$this->_sections['name']['start'] = (int)1;
$this->_sections['name']['loop'] = is_array($_loop=$this->_tpl_vars['pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['name']['show'] = true;
$this->_sections['name']['max'] = $this->_sections['name']['loop'];
$this->_sections['name']['step'] = 1;
if ($this->_sections['name']['start'] < 0)
    $this->_sections['name']['start'] = max($this->_sections['name']['step'] > 0 ? 0 : -1, $this->_sections['name']['loop'] + $this->_sections['name']['start']);
else
    $this->_sections['name']['start'] = min($this->_sections['name']['start'], $this->_sections['name']['step'] > 0 ? $this->_sections['name']['loop'] : $this->_sections['name']['loop']-1);
if ($this->_sections['name']['show']) {
    $this->_sections['name']['total'] = min(ceil(($this->_sections['name']['step'] > 0 ? $this->_sections['name']['loop'] - $this->_sections['name']['start'] : $this->_sections['name']['start']+1)/abs($this->_sections['name']['step'])), $this->_sections['name']['max']);
    if ($this->_sections['name']['total'] == 0)
        $this->_sections['name']['show'] = false;
} else
    $this->_sections['name']['total'] = 0;
if ($this->_sections['name']['show']):

            for ($this->_sections['name']['index'] = $this->_sections['name']['start'], $this->_sections['name']['iteration'] = 1;
                 $this->_sections['name']['iteration'] <= $this->_sections['name']['total'];
                 $this->_sections['name']['index'] += $this->_sections['name']['step'], $this->_sections['name']['iteration']++):
$this->_sections['name']['rownum'] = $this->_sections['name']['iteration'];
$this->_sections['name']['index_prev'] = $this->_sections['name']['index'] - $this->_sections['name']['step'];
$this->_sections['name']['index_next'] = $this->_sections['name']['index'] + $this->_sections['name']['step'];
$this->_sections['name']['first']      = ($this->_sections['name']['iteration'] == 1);
$this->_sections['name']['last']       = ($this->_sections['name']['iteration'] == $this->_sections['name']['total']);
?>
	<?php if ($this->_sections['name']['index'] == $this->_tpl_vars['page']): ?> 
		<span class="pageActive"><?php echo $this->_sections['name']['index']; ?>
</span>
		<?php else: ?>
		<span class="pageInactive"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/selectCompanyNotFound?company=<?php echo $this->_tpl_vars['company']; ?>
&page=<?php echo $this->_sections['name']['index']; ?>
" class="pageInactiveLink"><?php echo $this->_sections['name']['index']; ?>
</a></span>
		<?php endif; ?>
	<?php endfor; endif; ?>
	&nbsp;&nbsp;&nbsp;
	<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/selectCompanyNotFound?company=<?php echo $this->_tpl_vars['selectedCompany']; ?>
" class="pagesAllList"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>весь список<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
<?php endif; ?>
	
</div>
</div>
<?php endif; ?>

</div>

<?php if (sizeof ( $this->_tpl_vars['companyList'] ) > 0): ?>
<div>
<div style="position:relative; top:-1px;left:-4px;float:left;margin-right:2px;">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/pointer14.gif">
<input type="checkbox" id="marking" onclick="marking()"/>
</div>  

<select id="grAction" style="margin-bottom:5px;" onchange="groupAction()">
<option value="none"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Выберите действие<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></option>
<optgroup label="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Выполнить действие:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">
<option value="print"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>печать выбранного<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></option>
</optgroup>


<optgroup label="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Передать менеджеру:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">
<?php $_from = $this->_tpl_vars['managers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<option value="manager:<?php echo $this->_tpl_vars['cur']['id']; ?>
"><?php echo $this->_tpl_vars['cur']['nickname']; ?>
</option>	
<?php endforeach; endif; unset($_from); ?>
</optgroup>

<optgroup label="<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Присвоить метку:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">
<?php $_from = $this->_tpl_vars['labelsRoot']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<optgroup label="&nbsp;&nbsp;&nbsp;<?php $this->_tag_stack[] = array('t', array('category' => $this->_tpl_vars['cur']['name'])); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>В категории %category<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">
<?php $_from = $this->_tpl_vars['cur']['labels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<option value="label:<?php echo $this->_tpl_vars['item']['id']; ?>
"><?php echo $this->_tpl_vars['item']['name']; ?>
</option>
<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>

</optgroup>
</select>
</div>
<?php endif; ?>

<?php if (sizeof ( $this->_tpl_vars['companyList'] ) == 0): ?>
<div style="margin-left:25px;margin-top:30px;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Не найдено.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<?php endif; ?>


<?php $this->assign('ci', true); ?>

<?php $_from = $this->_tpl_vars['companyList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
<?php if ($this->_tpl_vars['cur']['blocked'] == false): ?>

<div class="companyBriefWrap">

<div class="fastcommandWrap">

<div class="checkCompany">
<input type="checkbox" name="check" id="checkComp<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
">
</div>

<div id="fastcommand">

<div class="cisFav" style="visibility: <?php if ($this->_tpl_vars['cur']['prop']['isFavorite']): ?>visible<?php else: ?>hidden<?php endif; ?>;top:1px;" id="isFav<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
" onclick="favOff(<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
)"></div>
<div class="cnotFav" style="visibility: <?php if (! $this->_tpl_vars['cur']['prop']['isFavorite']): ?>visible<?php else: ?>hidden<?php endif; ?>;top:1px;" id="isnotFav<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
" onclick="favOn(<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
)"></div>


<div class="cisClip" style="visibility: <?php if ($this->_tpl_vars['cur']['prop']['isClip']): ?>visible<?php else: ?>hidden<?php endif; ?>;top:21px;" id="isClip<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
" onclick="clipOff(<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
)"></div>
<div class="cnotClip" style="visibility: <?php if (! $this->_tpl_vars['cur']['prop']['isClip']): ?>visible<?php else: ?>hidden<?php endif; ?>;top:21px;" id="isnotClip<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
" onclick="clipOn(<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
)"></div>


</div>

</div>




<div class="companyBriefShort" <?php if ($this->_tpl_vars['ci'] == true): ?>style="background-color:#f6f2df"<?php $this->assign('ci', false); ?><?php else: ?><?php $this->assign('ci', true); ?><?php endif; ?>>


<div class="cNameShort"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/companyBriefFromLabel?id=<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
&mode=<?php echo $this->_tpl_vars['mode']; ?>
&mparam=<?php echo $this->_tpl_vars['mparam']; ?>
&page=1" class="cNameShortLink"><?php echo $this->_tpl_vars['cur']['prop']['name']; ?>
</a></div> 
<div class="cEdit"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/gotoEditCompany?id=<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
" style="color:#000;font-size:10px;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>править<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
<div style="clear:both;"></div>



<div id="reminderPool<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
" class="reminderPool">
<div id="reminderPoolHead<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
" class="reminderPoolHead"><a href="javascript:void(0)" onclick="rPoolShowForm(<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
)" style="color:#000;text-decoration:none;border-bottom:1px dashed #000"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>поставить напоминание<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></div>
<div id="reminderPoolHeadOpen<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
" class="reminderPoolHeadOpen"><b><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>новое напоминание:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></b></div>
<div id="reminderPoolForm<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
" class="reminderPoolForm">


<input type="radio" name="visibility" value="own" id="own<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
" checked/><label for="own" style="color:#e1131a"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>себе<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility" value="sm" id="sm<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
"/ <?php if ($_SESSION['auth']['is_super_user'] != 1): ?>disabled="disabled"<?php endif; ?><?php if ($this->_tpl_vars['cur']['prop']['manager'] == $_SESSION['auth']['id']): ?> disabled="disabled"<?php endif; ?>><label for="sm" style="color:#10a007"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>менеджеру<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility" value="common" id="common<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
"/><label for="common" style="color:#0a65ab"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>всем<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="text" name="rtext" id="rText<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
" value="" style="width:350px;"/>
<input type="button" value="&nbsp;" onclick="rPoolAddReminder(<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
);" class="button1 IEremoteBorder"/>
<input type="button" value="&nbsp;" onclick="rPoolHideForm(<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
);" class="button2"/>

</div>
</div>


<div style="margin: 0px 15px 15px 0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="reminderPoolContent">
<?php $_from = $this->_tpl_vars['cur']['prop']['remindersPool']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reminder']):
?>
<tr id="rPoolTR<?php echo $this->_tpl_vars['reminder']['id']; ?>
">
<td onmouseover="rPoolHightlight(this,<?php echo $this->_tpl_vars['reminder']['id']; ?>
)" onmouseout="rPoolUnHightlight(this,<?php echo $this->_tpl_vars['reminder']['id']; ?>
,'#fff')" style="border-bottom:1px solid #f6f4e6;height:20px;">
<div id="rPoolTRDiv<?php echo $this->_tpl_vars['reminder']['id']; ?>
">
<div class="<?php if ($this->_tpl_vars['reminder']['visibility'] == 'own'): ?>rpool_r<?php elseif ($this->_tpl_vars['reminder']['visibility'] == 'sm'): ?>rpool_g<?php elseif ($this->_tpl_vars['reminder']['visibility'] == 'common'): ?>rpool_b<?php endif; ?>" id="rColor<?php echo $this->_tpl_vars['reminder']['id']; ?>
">
<span id="inlineText<?php echo $this->_tpl_vars['reminder']['id']; ?>
">

<span id="rDate<?php echo $this->_tpl_vars['reminder']['id']; ?>
"><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['reminder']['visibility'] == 'sm'): ?><?php echo $this->_tpl_vars['reminder']['nickname']; ?>
: «<?php endif; ?><?php if ($this->_tpl_vars['reminder']['date'] != '2000-01-01 00:00:00'): ?><b><?php echo ((is_array($_tmp=$this->_tpl_vars['reminder']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</b> <?php endif; ?></span><?php echo $this->_tpl_vars['reminder']['text']; ?>
<?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['reminder']['visibility'] == 'sm'): ?>»<?php endif; ?></span>

<span id="rpoolb<?php echo $this->_tpl_vars['reminder']['id']; ?>
" class="rpoolb" style="display:none">
<span style="position:relative">
<img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/edit_delete.gif" width="30" height="12" border="0" usemap="#edit_delete<?php echo $this->_tpl_vars['reminder']['id']; ?>
" class="edit_delete"/>
<map name="edit_delete<?php echo $this->_tpl_vars['reminder']['id']; ?>
" id="edit_delete<?php echo $this->_tpl_vars['reminder']['id']; ?>
" style="display:none">
<area shape="rect" coords="0,0,13,12" href="javascript:void(0)" onclick="rPoolEdit(<?php echo $this->_tpl_vars['reminder']['id']; ?>
,'<?php echo $this->_tpl_vars['reminder']['visibility']; ?>
')"/>
<area shape="rect" coords="19,0,32,12" href="javascript:void(0)" onclick="rPoolDeleteLine(<?php echo $this->_tpl_vars['reminder']['id']; ?>
,<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
)"/></map>
</span>

</div>
</div>

<div style="display:none;background-color:#fffc82;padding: 4px 0px 4px 0px;" id="rPoolTRForm<?php echo $this->_tpl_vars['reminder']['id']; ?>
">

<input type="radio" name="visibility<?php echo $this->_tpl_vars['reminder']['id']; ?>
" value="own" id="own<?php echo $this->_tpl_vars['reminder']['id']; ?>
" <?php if ($this->_tpl_vars['reminder']['visibility'] == 'own'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['reminder']['visibility'] == 'sm'): ?> disabled="disabled"<?php endif; ?>/><label for="own<?php echo $this->_tpl_vars['reminder']['id']; ?>
" style="color:#e1131a"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>себе<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility<?php echo $this->_tpl_vars['reminder']['id']; ?>
" value="sm" id="sm<?php echo $this->_tpl_vars['reminder']['id']; ?>
" <?php if ($this->_tpl_vars['reminder']['visibility'] == 'sm'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['reminder']['visibility'] != 'sm'): ?> disabled="disabled"<?php endif; ?><?php if ($this->_tpl_vars['cur']['prop']['manager'] == $_SESSION['auth']['id']): ?> disabled="disabled"<?php endif; ?>/><label for="sm<?php echo $this->_tpl_vars['reminder']['id']; ?>
" style="color:#10a007"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>менеджеру<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="radio" name="visibility<?php echo $this->_tpl_vars['reminder']['id']; ?>
" value="common" id="common<?php echo $this->_tpl_vars['reminder']['id']; ?>
" <?php if ($this->_tpl_vars['reminder']['visibility'] == 'common'): ?>checked="checked"<?php endif; ?><?php if ($_SESSION['auth']['is_super_user'] != 1 && $this->_tpl_vars['reminder']['visibility'] == 'sm'): ?> disabled="disabled"<?php endif; ?>/><label for="common<?php echo $this->_tpl_vars['reminder']['id']; ?>
" style="color:#0a65ab"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>всем<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></label>
<input type="text" name="rtext<?php echo $this->_tpl_vars['reminder']['id']; ?>
" id="rText<?php echo $this->_tpl_vars['reminder']['id']; ?>
" value="<?php if ($this->_tpl_vars['reminder']['date'] != '2000-01-01 00:00:00'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['reminder']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
 <?php endif; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['reminder']['text'])) ? $this->_run_mod_handler('htmlspecialchars', true, $_tmp) : smarty_modifier_htmlspecialchars($_tmp)); ?>
" style="width:350px;"/>
<input type="button" value="&nbsp;" onclick="rPoolSubmitEditForm2(<?php echo $this->_tpl_vars['reminder']['id']; ?>
,<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
)" class="button1 IEremoteBorder"/>
<input type="button" value="&nbsp;" onclick="rPoolHideEditForm(<?php echo $this->_tpl_vars['reminder']['id']; ?>
);" class="button2"/>

</div>

</td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>
</div>


<table border="0" width="100%">
<?php $this->assign('cursite', false); ?>
<?php $this->assign('curemail', false); ?>
<?php $this->assign('curpeople', false); ?>
<?php $_from = $this->_tpl_vars['cur']['site']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bnm']):
?><?php if ($this->_tpl_vars['bnm'] != ""): ?><?php $this->assign('cursite', true); ?><?php endif; ?><?php endforeach; endif; unset($_from); ?>
<?php $_from = $this->_tpl_vars['cur']['email']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bnm']):
?><?php if ($this->_tpl_vars['bnm'] != ""): ?><?php $this->assign('curemail', true); ?><?php endif; ?><?php endforeach; endif; unset($_from); ?>
<?php $_from = $this->_tpl_vars['cur']['people']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bnm']):
?><?php if ($this->_tpl_vars['bnm'] != ""): ?><?php $this->assign('curpeople', true); ?><?php endif; ?><?php endforeach; endif; unset($_from); ?>

<?php if ($this->_tpl_vars['cur']['prop']['phone'] != "" || $this->_tpl_vars['cur']['prop']['address'] != "" || $this->_tpl_vars['cursite'] == true || $this->_tpl_vars['curemail'] == true || $this->_tpl_vars['curpeople'] == true): ?>
<tr>
<td rowspan="3" valign="top" width="200" style="padding-right:10px;">



<div class="cContactsShort">
<?php if ($this->_tpl_vars['cur']['prop']['phone'] != ""): ?><?php echo $this->_tpl_vars['cur']['prop']['phone']; ?>
<br><?php endif; ?>
<?php $this->assign('isFirst', true); ?>
<?php $_from = $this->_tpl_vars['cur']['site']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['elem']):
?><?php if (! $this->_tpl_vars['isFirst']): ?>, <?php endif; ?><a href="http://<?php echo ((is_array($_tmp=$this->_tpl_vars['elem'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
" class="cLink size13" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['elem'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
</a><?php if (((is_array($_tmp=$this->_tpl_vars['elem'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)) != ""): ?><?php $this->assign('isFirst', false); ?><?php endif; ?><?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['isFirst'] == false): ?><br><?php endif; ?>

<?php $this->assign('isFirst', true); ?>
<?php $_from = $this->_tpl_vars['cur']['email']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['elem']):
?><?php if (! $this->_tpl_vars['isFirst']): ?>, <?php endif; ?><a href="mailto:<?php echo ((is_array($_tmp=$this->_tpl_vars['elem'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
" class="cLink size13"><?php echo ((is_array($_tmp=$this->_tpl_vars['elem'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)); ?>
</a><?php if (((is_array($_tmp=$this->_tpl_vars['elem'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)) != ""): ?><?php $this->assign('isFirst', false); ?><?php endif; ?><?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['isFirst'] == false): ?><br><?php endif; ?>

<?php echo $this->_tpl_vars['cur']['prop']['address']; ?>
<br><br>
</div>

</td>
<td rowspan="3" width="1" style="font-size:0px;"><div style="height:72px;"></div>
</td>
<tr><td style="padding-bottom:5px; padding-right:5px;">

<div class="cPeopleShort">

<?php $this->assign('isPFirst', true); ?>
<?php $_from = $this->_tpl_vars['cur']['people']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curp']):
?>
	<?php if ($this->_tpl_vars['isPFirst'] != true): ?><div id="line">&nbsp;</div><?php else: ?><?php $this->assign('isPFirst', false); ?><?php endif; ?>
	<?php echo $this->_tpl_vars['curp']['fio']; ?>
<?php if ($this->_tpl_vars['curp']['phone'] != ""): ?>, <?php echo $this->_tpl_vars['curp']['phone']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['curp']['email'] != ""): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['curp']['email'])) ? $this->_run_mod_handler('many_emails', true, $_tmp) : smarty_modifier_many_emails($_tmp)); ?>
<?php endif; ?>
	<?php if ($this->_tpl_vars['curp']['comment'] != ""): ?>, <?php echo $this->_tpl_vars['curp']['comment']; ?>
<?php endif; ?><br><div style="height:5px; font-size:5px;"></div>	
<?php endforeach; endif; unset($_from); ?>


</div>
</td></tr>
<?php endif; ?>
<tr><td valign="bottom">


<?php if (sizeof ( $this->_tpl_vars['cur']['labels'] ) > 0): ?>
<div class="cLabelShort">
<?php $this->assign('isFirst', true); ?>
<?php $_from = $this->_tpl_vars['cur']['labels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curl']):
?>
<?php if (! $this->_tpl_vars['isFirst']): ?>, <?php endif; ?><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/<?php echo $this->_tpl_vars['controller']; ?>
?mode=label&mparam=<?php echo $this->_tpl_vars['curl']['id']; ?>
&page=1" class="cLink3"><?php echo $this->_tpl_vars['curl']['name']; ?>
</a><?php $this->assign('isFirst', false); ?>
<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>

<div id="clear"></div>

</td></tr>
</table>

<div style="position:relative; z-index:1;">
<div class="cHistoryBtn" onclick="showHistoryWnd(<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
)" id="historyWndBtn<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ист.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
</div>

<div style="position:relative; z-index:2;">
<div class="cHistoryShadow" id="historyWnd<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
">
<div class="cHistoryPopup" id="na">


<span class="hisTxt" id="t"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>История:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
<input type="text" id="name<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
" tabindex="1" class="hisFld">
<input type="button" value="Добавить" class="hisBtn" tabindex="3" id="t2" onclick="addHistoryReq(<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
)"><br>
<textarea id="comment<?php echo $this->_tpl_vars['cur']['prop']['id']; ?>
" wrap="on" tabindex="2" class="hisCom"></textarea>

</div>
</div>
</div>

</div>
</div>


<?php else: ?> <div class="companyBriefWrap" style="background-image:none">
<div class="companyBriefShort">
<b class="cNameShortLink"><?php echo $this->_tpl_vars['cur']['prop']['name']; ?>
</b><br>
<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Копанию ведет менеджер:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <b><?php echo $this->_tpl_vars['cur']['manager']; ?>
</b><br>
<div style="height:5px; font-size:0px">&nbsp</div>
</div>
</div>
<?php endif; ?>

<?php endforeach; endif; unset($_from); ?>


<?php echo '
<script language="JavaScript" type="text/javascript">
  
  var formSlide = new Array();
  var formSlide_id = new Array();  
  for (i=0; i < grCompanies.length; i++) {
	try{
  	formSlide[i] = new Fx.Slide(\'reminderPoolForm\'+grCompanies[i]);
  	formSlide[i].hide();
  	formSlide_id[i] = grCompanies[i];
  	$(\'reminderPoolForm\'+grCompanies[i]).style.display = \'block\';
	} catch(e) {}
  }
  
</script>
'; ?>





<div style="margin-left:23px">

<?php if (isset ( $this->_tpl_vars['pages'] ) && $this->_tpl_vars['pages'] > 1): ?>
<div style="margin-left:23px">
<div class="pages">
	
<?php if ($this->_tpl_vars['pages'] > 20): ?>

<script src="<?php echo $this->_tpl_vars['siteurl']; ?>
/js/navigator2.js"></script>

<table cellspacing=0 cellpadding=0 border=0>
<tr>
  <td></td>
  <td width=510 height=2 style="background-repeat: no-repeat;" id="tdMark2">
    <div id="divPos2" style="filter: alpha(opacity=65); -moz-opacity: 0.65; height: 2px; position: relative; left: 0px; top: 0px; background-color: #AAAAAA;"><img src="blank.gif" width=50 height=1></div>
  </td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td></td>
  <td style="background-color: #EFEFEF; padding: 5px 0px 5px 0px;">
    <div id="divPages2" style="width: 510px; overflow: hidden;"
         onmousemove="moveScrolling2(event)" onmouseover="startScrolling2()">
      <script type="text/javascript">document.write(getPages(pFrom, pTo))</script>
    </div>
  </td> 
  <td colspan="2" nowrap>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/selectCompanyNotFound?company=<?php echo $this->_tpl_vars['company']; ?>
" class="pagesAllList" onclick="if (<?php echo $this->_tpl_vars['pages']; ?>
>50 && !confirm('<?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Вывод всех данных может выполняться долго!\nВы уверены?<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>')) return false;"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>весь список<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a> 
  </td>
</tr>
<tr>
  <td><a href="javascript: setPages2(-25)" class="arr">&lt;&lt;</a></td>
  <td class="stat"><div id="divStat2"></div></td>
  <td><a href="javascript: setPages2(25)" class="arr">&gt;&gt;</a></td>
   <td></td>
</tr>
</table>

<?php else: ?>
	<?php unset($this->_sections['name']);
$this->_sections['name']['name'] = 'name';
$this->_sections['name']['start'] = (int)1;
$this->_sections['name']['loop'] = is_array($_loop=$this->_tpl_vars['pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['name']['show'] = true;
$this->_sections['name']['max'] = $this->_sections['name']['loop'];
$this->_sections['name']['step'] = 1;
if ($this->_sections['name']['start'] < 0)
    $this->_sections['name']['start'] = max($this->_sections['name']['step'] > 0 ? 0 : -1, $this->_sections['name']['loop'] + $this->_sections['name']['start']);
else
    $this->_sections['name']['start'] = min($this->_sections['name']['start'], $this->_sections['name']['step'] > 0 ? $this->_sections['name']['loop'] : $this->_sections['name']['loop']-1);
if ($this->_sections['name']['show']) {
    $this->_sections['name']['total'] = min(ceil(($this->_sections['name']['step'] > 0 ? $this->_sections['name']['loop'] - $this->_sections['name']['start'] : $this->_sections['name']['start']+1)/abs($this->_sections['name']['step'])), $this->_sections['name']['max']);
    if ($this->_sections['name']['total'] == 0)
        $this->_sections['name']['show'] = false;
} else
    $this->_sections['name']['total'] = 0;
if ($this->_sections['name']['show']):

            for ($this->_sections['name']['index'] = $this->_sections['name']['start'], $this->_sections['name']['iteration'] = 1;
                 $this->_sections['name']['iteration'] <= $this->_sections['name']['total'];
                 $this->_sections['name']['index'] += $this->_sections['name']['step'], $this->_sections['name']['iteration']++):
$this->_sections['name']['rownum'] = $this->_sections['name']['iteration'];
$this->_sections['name']['index_prev'] = $this->_sections['name']['index'] - $this->_sections['name']['step'];
$this->_sections['name']['index_next'] = $this->_sections['name']['index'] + $this->_sections['name']['step'];
$this->_sections['name']['first']      = ($this->_sections['name']['iteration'] == 1);
$this->_sections['name']['last']       = ($this->_sections['name']['iteration'] == $this->_sections['name']['total']);
?>
	<?php if ($this->_sections['name']['index'] == $this->_tpl_vars['page']): ?> 
		<span class="pageActive"><?php echo $this->_sections['name']['index']; ?>
</span>
		<?php else: ?>
		<span class="pageInactive"><a href="/main/selectCompanyNotFound?company=<?php echo $this->_tpl_vars['company']; ?>
&page=<?php echo $this->_sections['name']['index']; ?>
" class="pageInactiveLink"><?php echo $this->_sections['name']['index']; ?>
</a></span>
		<?php endif; ?>
	<?php endfor; endif; ?>
	&nbsp;&nbsp;&nbsp;
	<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/main/selectCompanyNotFound?company=<?php echo $this->_tpl_vars['company']; ?>
" class="pagesAllList"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>весь список<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
<?php endif; ?>
		
</div>	
</div>
<?php endif; ?>
</div>

</td>
<td valign="top">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main/rightBlock.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</td>
</table>