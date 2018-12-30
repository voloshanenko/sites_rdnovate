<?php /* Smarty version 2.6.18, created on 2010-12-23 14:43:34
         compiled from pda/pages.tpl */ ?>
<?php if (isset ( $this->_tpl_vars['pages'] )): ?>

<?php if (isset ( $_GET['mode'] )): ?>
	<?php $this->assign('temp', $_GET['mode']); ?>
	<?php $this->assign('forwardMode', "&mode=".($this->_tpl_vars['temp'])); ?>	
<?php else: ?>	
	<?php $this->assign('forwardMode', ""); ?>
<?php endif; ?>

<?php if (isset ( $_GET['mparam'] )): ?>
	<?php $this->assign('temp', $_GET['mparam']); ?>
	<?php $this->assign('forwardMparam', "&mparam=".($this->_tpl_vars['temp'])); ?>	
<?php else: ?>	
	<?php $this->assign('forwardMparam', ""); ?>
<?php endif; ?>


<?php 
	$pages = $this->get_template_vars('pages');
	$page = $this->get_template_vars('page');	
	$temp = floor($pages / 20) * 20;
	$this->assign('lastpagestart',$temp);
	$this->assign('prev',$temp - 1);
	$this->assign('start',$temp);
	$this->assign('end',$pages + 1);
	
//	$temp = ( floor($pages / 20) - floor($page / 20) ) * 20;
	$temp = ( floor($page / 20) ) * 20;
	$this->assign('start2',$temp );
	$this->assign('end2',$temp + 20);
	$this->assign('prev2',$temp - 1);
	$this->assign('next2',$temp + 20);
	
 ?>

<?php if ($this->_tpl_vars['pages'] > 1 && $this->_tpl_vars['pages'] <= 20): ?>
<div class="pages">
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
/<?php echo $this->_tpl_vars['controllerName']; ?>
/<?php echo $this->_tpl_vars['actionName']; ?>
?page=<?php echo $this->_sections['name']['index']; ?>
<?php echo $this->_tpl_vars['forwardMode']; ?>
<?php echo $this->_tpl_vars['forwardMparam']; ?>
" class="pageInactiveLink"><?php echo $this->_sections['name']['index']; ?>
</a></span>
		<?php endif; ?>
<?php endfor; endif; ?>
		
</div>

<?php elseif ($this->_tpl_vars['pages'] > 20 && $this->_tpl_vars['page'] < 20): ?> <div class="pages">
	<table border=0 style="font-size:100%">
	<tr>
	<td>

<?php $this->assign('pre', true); ?>
<?php unset($this->_sections['name']);
$this->_sections['name']['name'] = 'name';
$this->_sections['name']['start'] = (int)1;
$this->_sections['name']['loop'] = is_array($_loop=20) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<?php $this->assign('pre', false); ?>
		<span class="pageActive"><?php echo $this->_sections['name']['index']; ?>
</span>
	<?php else: ?>
		<span class="pageInactive"><a href="/<?php echo $this->_tpl_vars['controllerName']; ?>
/<?php echo $this->_tpl_vars['actionName']; ?>
?page=<?php echo $this->_sections['name']['index']; ?>
<?php echo $this->_tpl_vars['forwardMode']; ?>
<?php echo $this->_tpl_vars['forwardMparam']; ?>
" class="pageInactiveLink"><?php echo $this->_sections['name']['index']; ?>
</a></span>
	<?php endif; ?>		
<?php endfor; endif; ?>
	
	</td>
	<td>
	<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/<?php echo $this->_tpl_vars['controllerName']; ?>
/<?php echo $this->_tpl_vars['actionName']; ?>
?page=20<?php echo $this->_tpl_vars['forwardMode']; ?>
<?php echo $this->_tpl_vars['forwardMparam']; ?>
"><img src="<?php echo $this->_tpl_vars['siteurl']; ?>
/images/pointer3.gif" /></a>
	</td>
	<td>......</td>
	<td>
	<span class="pageInactive"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/<?php echo $this->_tpl_vars['controllerName']; ?>
/<?php echo $this->_tpl_vars['actionName']; ?>
?page=<?php echo $this->_tpl_vars['pages']; ?>
<?php echo $this->_tpl_vars['forwardMode']; ?>
<?php echo $this->_tpl_vars['forwardMparam']; ?>
" class="pageInactiveLink"><?php echo $this->_tpl_vars['pages']; ?>
</a></span>
	</td>
	</tr>
	</table>
</div>
<?php elseif ($this->_tpl_vars['pages'] > 20 && $this->_tpl_vars['page'] >= $this->_tpl_vars['lastpagestart']): ?>	<div class="pages">
	
	<table border=0 style="font-size:100%">
	<tr>
	<td>
	<span class="pageInactive"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/<?php echo $this->_tpl_vars['controllerName']; ?>
/<?php echo $this->_tpl_vars['actionName']; ?>
?page=1<?php echo $this->_tpl_vars['forwardMode']; ?>
<?php echo $this->_tpl_vars['forwardMparam']; ?>
" class="pageInactiveLink">1</a></span>	

	</td>
	<td>......</td>
	<td>
	<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/<?php echo $this->_tpl_vars['controllerName']; ?>
/<?php echo $this->_tpl_vars['actionName']; ?>
?page=<?php echo $this->_tpl_vars['prev']; ?>
<?php echo $this->_tpl_vars['forwardMode']; ?>
<?php echo $this->_tpl_vars['forwardMparam']; ?>
"><img src="/images/pointer3_3.gif" /></a>
	</td>
	<td>
		
		<?php $this->assign('pre', true); ?>
		<?php unset($this->_sections['name']);
$this->_sections['name']['name'] = 'name';
$this->_sections['name']['start'] = (int)$this->_tpl_vars['start'];
$this->_sections['name']['loop'] = is_array($_loop=$this->_tpl_vars['end']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<?php $this->assign('pre', false); ?>
				<span class="pageActive"><?php echo $this->_sections['name']['index']; ?>
</span>
			<?php else: ?>
				<span class="pageInactive"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/<?php echo $this->_tpl_vars['controllerName']; ?>
/<?php echo $this->_tpl_vars['actionName']; ?>
?page=<?php echo $this->_sections['name']['index']; ?>
<?php echo $this->_tpl_vars['forwardMode']; ?>
<?php echo $this->_tpl_vars['forwardMparam']; ?>
" class="pageInactiveLink"><?php echo $this->_sections['name']['index']; ?>
</a></span>
			<?php endif; ?>		
		<?php endfor; endif; ?>	
	</td>
	</tr>
	</table>
	
</div>	

<?php elseif ($this->_tpl_vars['pages'] > 20 && $this->_tpl_vars['page'] < $this->_tpl_vars['lastpagestart']): ?>		
<div class="pages">
	
	<table border=0 style="font-size:100%">
	<tr>
	<td>
	<span class="pageInactive"><a href="/<?php echo $this->_tpl_vars['controllerName']; ?>
/<?php echo $this->_tpl_vars['actionName']; ?>
?page=1<?php echo $this->_tpl_vars['forwardMode']; ?>
<?php echo $this->_tpl_vars['forwardMparam']; ?>
" class="pageInactiveLink">1</a></span>	

	</td>
	<td>......</td>
	<td>
	<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/<?php echo $this->_tpl_vars['controllerName']; ?>
/<?php echo $this->_tpl_vars['actionName']; ?>
?page=<?php echo $this->_tpl_vars['prev2']; ?>
<?php echo $this->_tpl_vars['forwardMode']; ?>
<?php echo $this->_tpl_vars['forwardMparam']; ?>
"><img src="/images/pointer3_3.gif" /></a>
	</td>
	<td>
		
		<?php $this->assign('pre', true); ?>
		<?php unset($this->_sections['name']);
$this->_sections['name']['name'] = 'name';
$this->_sections['name']['start'] = (int)$this->_tpl_vars['start2'];
$this->_sections['name']['loop'] = is_array($_loop=$this->_tpl_vars['end2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<?php $this->assign('pre', false); ?>
				<span class="pageActive"><?php echo $this->_sections['name']['index']; ?>
</span>
			<?php else: ?>
				<span class="pageInactive"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/<?php echo $this->_tpl_vars['controllerName']; ?>
/<?php echo $this->_tpl_vars['actionName']; ?>
?page=<?php echo $this->_sections['name']['index']; ?>
<?php echo $this->_tpl_vars['forwardMode']; ?>
<?php echo $this->_tpl_vars['forwardMparam']; ?>
" class="pageInactiveLink"><?php echo $this->_sections['name']['index']; ?>
</a></span>
			<?php endif; ?>		
		<?php endfor; endif; ?>	
		
	</td>
	<td>
	<a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/<?php echo $this->_tpl_vars['controllerName']; ?>
/<?php echo $this->_tpl_vars['actionName']; ?>
?page=<?php echo $this->_tpl_vars['next2']; ?>
<?php echo $this->_tpl_vars['forwardMode']; ?>
<?php echo $this->_tpl_vars['forwardMparam']; ?>
"><img src="/images/pointer3.gif" /></a>
	</td>
	<td>......</td>
	<td>
	<span class="pageInactive"><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/<?php echo $this->_tpl_vars['controllerName']; ?>
/<?php echo $this->_tpl_vars['actionName']; ?>
?page=<?php echo $this->_tpl_vars['pages']; ?>
<?php echo $this->_tpl_vars['forwardMode']; ?>
<?php echo $this->_tpl_vars['forwardMparam']; ?>
" class="pageInactiveLink"><?php echo $this->_tpl_vars['pages']; ?>
</a></span>
	</td>
	</tr>
	</table>
	
</div>	
	
<?php endif; ?>


<?php endif; ?>