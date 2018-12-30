<?php /* Smarty version 2.6.18, created on 2010-12-21 16:24:47
         compiled from journal/topday.tpl */ ?>
<td nowrap>
<?php echo '
<script>
	function showElement(elem) {
		$(elem).style.visibility = \'visible\';
	}
	
	function hideElement(elem) {
		$(elem).style.visibility = \'hidden\';
	}
	
</script>
'; ?>



<div class="hidden" id="lefttip"><?php echo $this->_tpl_vars['prevday']; ?>
</div></td>
<td><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/journal?scale=1&y=<?php echo $this->_tpl_vars['py']; ?>
&m=<?php echo $this->_tpl_vars['pm']; ?>
&d=<?php echo $this->_tpl_vars['pd']; ?>
&manager=<?php echo $this->_tpl_vars['manager']; ?>
">
<div id="scroolbuttonleft" onmouseover="showElement('lefttip')" onmouseout="hideElement('lefttip')"></div></a></td>
<td nowrap><?php echo $this->_tpl_vars['nowday']; ?>
</td>
<td><a href="<?php echo $this->_tpl_vars['siteurl']; ?>
/journal?scale=1&y=<?php echo $this->_tpl_vars['ny']; ?>
&m=<?php echo $this->_tpl_vars['nm']; ?>
&d=<?php echo $this->_tpl_vars['nd']; ?>
&manager=<?php echo $this->_tpl_vars['manager']; ?>
">
<div id="scroolbuttonright" onmouseover="showElement('righttip')" onmouseout="hideElement('righttip')" style="display: <?php if ($this->_tpl_vars['isFuture']): ?>none<?php else: ?>block<?php endif; ?>"></div></a></td>
<td nowrap><div class="hidden" id="righttip"><?php echo $this->_tpl_vars['nextday']; ?>
</div></td>
</tr>
</table>