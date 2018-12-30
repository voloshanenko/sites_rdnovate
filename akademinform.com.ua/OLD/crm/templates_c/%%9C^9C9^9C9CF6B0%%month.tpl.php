<?php /* Smarty version 2.6.18, created on 2011-01-26 18:30:01
         compiled from journal/month.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 't', 'journal/month.tpl', 106, false),)), $this); ?>

<script>
	var y = <?php echo $this->_tpl_vars['y']; ?>
;
	var sourcey = <?php echo $this->_tpl_vars['y']; ?>
;
	var sourcem = <?php echo $this->_tpl_vars['m']; ?>
;	
	var manager = <?php echo $this->_tpl_vars['manager']; ?>
;
<?php echo '	
	function nextYear(){
		y = y + 1;

		if (new Date(y,1,1).getYear() > new Date().getYear()) y = y - 1;

		removePointer();
		
		if (y != sourcey) {

			for (i = 0; i<12; i++) {			
					$(\'m\'+i).removeClass(\'monthCurrent\');
					$(\'m\'+i).addClass(\'month\');	
					$(\'m\'+i).style.backgroundColor = \'white\';								
			}
				
		} else {

			for (i = 0; i<12; i++) {
				if (i != sourcem) {
					$(\'m\'+i).removeClass(\'monthCurrent\');
					$(\'m\'+i).addClass(\'month\');	
											
				} else {
					$(\'m\'+i).removeClass(\'month\');
					$(\'m\'+i).addClass(\'monthCurrent\');	
					$(\'m\'+i).style.backgroundColor = \'#eca242\';
				}	
			}

		}
		
		$(\'curmonth\').setHTML(y);
	}
	
	function prevYear(){
		y = y - 1;
//		if (y<2000) y = 2000;
		
		removePointer();
			
		if (y != sourcey) {

			for (i = 0; i<12; i++) {			
					$(\'m\'+i).removeClass(\'monthCurrent\');
					$(\'m\'+i).addClass(\'month\');	
					$(\'m\'+i).style.backgroundColor = \'white\';								
			}						

				
		} else {

			for (i = 0; i<12; i++) {
				if (i != sourcem) {
					$(\'m\'+i).removeClass(\'monthCurrent\');
					$(\'m\'+i).addClass(\'month\');	
											
				} else {
					$(\'m\'+i).removeClass(\'month\');
					$(\'m\'+i).addClass(\'monthCurrent\');	
					$(\'m\'+i).style.backgroundColor = \'#eca242\';										
				}	
				
			}

		}
		
		$(\'curmonth\').setHTML(y);
	}		
	
	function dateChanged(month) {
		if (y == sourcey && sourcem == month) return;
		if (new Date(y,month,1)>new Date()) return;
		
		window.location = window.siteurl+"/journal?scale=3&y=" + y + "&m=" + month + "&manager=" + manager;
	}
	
	function highlight(elem,mode) {	
		if (mode==1) {
			if(elem.style.cursor == \'pointer\') elem.style.backgroundColor = \'#f6f4e6\';
		} else {
			if(elem.style.cursor == \'pointer\') elem.style.backgroundColor = \'white\';		
		}
	}
	
</script>
'; ?>


<div id="select-month">

<div id="monthcontrol">
<div id="scroolbuttonleft2" onclick="prevYear();"></div>
<div id="curmonth"><?php echo $this->_tpl_vars['y']; ?>
</div>
<div id="scroolbuttonright2" onclick="nextYear();"></div>
</div>

<br>

<div id="selmonth">
<div <?php if ($this->_tpl_vars['m'] != 0): ?>class="month"<?php else: ?>class="monthCurrent"<?php endif; ?> onclick="dateChanged(0)" id="m0" onmouseover="highlight(this,1)" onmouseout="highlight(this,2)"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Январь<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div <?php if ($this->_tpl_vars['m'] != 1): ?>class="month"<?php else: ?>class="monthCurrent"<?php endif; ?> onclick="dateChanged(1)" id="m1" onmouseover="highlight(this,1)" onmouseout="highlight(this,2)"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Февраль<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div <?php if ($this->_tpl_vars['m'] != 2): ?>class="month"<?php else: ?>class="monthCurrent"<?php endif; ?> onclick="dateChanged(2)" id="m2" onmouseover="highlight(this,1)" onmouseout="highlight(this,2)"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Март<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div <?php if ($this->_tpl_vars['m'] != 3): ?>class="month"<?php else: ?>class="monthCurrent"<?php endif; ?> onclick="dateChanged(3)" id="m3" onmouseover="highlight(this,1)" onmouseout="highlight(this,2)"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Апрель<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div <?php if ($this->_tpl_vars['m'] != 4): ?>class="month"<?php else: ?>class="monthCurrent"<?php endif; ?> onclick="dateChanged(4)" id="m4" onmouseover="highlight(this,1)" onmouseout="highlight(this,2)"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Май<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div <?php if ($this->_tpl_vars['m'] != 5): ?>class="month"<?php else: ?>class="monthCurrent"<?php endif; ?> onclick="dateChanged(5)" id="m5" onmouseover="highlight(this,1)" onmouseout="highlight(this,2)"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Июнь<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div <?php if ($this->_tpl_vars['m'] != 6): ?>class="month"<?php else: ?>class="monthCurrent"<?php endif; ?> onclick="dateChanged(6)" id="m6" onmouseover="highlight(this,1)" onmouseout="highlight(this,2)"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Июль<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div <?php if ($this->_tpl_vars['m'] != 7): ?>class="month"<?php else: ?>class="monthCurrent"<?php endif; ?> onclick="dateChanged(7)" id="m7" onmouseover="highlight(this,1)" onmouseout="highlight(this,2)"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Август<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div <?php if ($this->_tpl_vars['m'] != 8): ?>class="month"<?php else: ?>class="monthCurrent"<?php endif; ?> onclick="dateChanged(8)" id="m8" onmouseover="highlight(this,1)" onmouseout="highlight(this,2)"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Сентябрь<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div <?php if ($this->_tpl_vars['m'] != 9): ?>class="month"<?php else: ?>class="monthCurrent"<?php endif; ?> onclick="dateChanged(9)" id="m9" onmouseover="highlight(this,1)" onmouseout="highlight(this,2)"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Октябрь<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div <?php if ($this->_tpl_vars['m'] != 10): ?>class="month"<?php else: ?>class="monthCurrent"<?php endif; ?> onclick="dateChanged(10)" id="m10" onmouseover="highlight(this,1)" onmouseout="highlight(this,2)"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Ноябрь<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
<div <?php if ($this->_tpl_vars['m'] != 11): ?>class="month"<?php else: ?>class="monthCurrent"<?php endif; ?> onclick="dateChanged(11)" id="m11" onmouseover="highlight(this,1)" onmouseout="highlight(this,2)"><?php $this->_tag_stack[] = array('t', array()); $_block_repeat=true;smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Декабрь<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_t($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>

</div>

<?php echo '
<script>
  function removePointer() {
		if (new Date(y,1,1).getYear() == new Date().getYear()) {
			for (i = 0; i<12; i++) {			
				if (new Date(y,i,1).getMonth() > new Date().getMonth()) {
					$(\'m\'+i).style.cursor = \'default\';
				} else {
					if (sourcem==i){
						$(\'m\'+i).style.cursor = \'default\';
					} else {
						$(\'m\'+i).style.cursor = \'pointer\';
					}
				}
			}
		} else {	
			for (i = 0; i<12; i++) {			
				if (i!=sourcem || y!=sourcey) {
					$(\'m\'+i).style.cursor = \'pointer\';			
				} else {
					$(\'m\'+i).style.cursor = \'default\';			
				}
			}			
		}		
  }
  removePointer();
</script>
'; ?>
  
</div>