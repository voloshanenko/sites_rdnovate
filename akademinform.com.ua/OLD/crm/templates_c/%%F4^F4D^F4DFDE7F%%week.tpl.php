<?php /* Smarty version 2.6.18, created on 2011-01-14 15:09:54
         compiled from journal/week.tpl */ ?>

  <script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/libs/jscalendar/calendar.js"></script>
  <script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/libs/jscalendar/lang/calendar-<?php echo $this->_tpl_vars['lang']; ?>
.js"></script>
  <script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/libs/jscalendar/calendar-setup.js"></script>

  
  
<div id="calendar-wrapper"><div id="calendar-container"></div></div>

<?php echo '
<style type="text/css">
<!--
.calendar tbody .rowhilite td {
	background: #e69020; 
}
.calendar tbody td.hilite {
  border-color: #e69020;
}
-->
</style>
'; ?>


<script type="text/javascript">
var block = new Array();
	var i = 0;
	<?php $_from = $this->_tpl_vars['blokeddays']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cur']):
?>
		block[i] = "<?php echo $this->_tpl_vars['cur']; ?>
";
		i++;
	<?php endforeach; endif; unset($_from); ?>
	<?php echo '

 var JSONObject = {"bind": '; ?>

  <?php echo $this->_tpl_vars['json']; ?>

  <?php echo '
  };
		  
var today = (new Date().getDate()) + "." + (new Date().getMonth()+1) + "." + (new Date().getFullYear());


  function dateStatus(date, y, m, d) {	
	
	var temp = y + "-" + (m + 1) + "-" + d;		

	var temp2 = d + "." + (m + 1) + "." + y;						 
	
	//if (temp2==today) { return false; }
	
	if (!JSONObject.bind.contains(temp2) && (new Date(y,m,d) <= new Date()) && !block.contains(temp)) {
			return \'special\';
	}			
/*
	for (i = 0; i < 7; i++ ) {
		if (block[i] == temp)	{
			return true;
		}
	}*/
	if (block.contains(temp))  return true;

	if (new Date(y,m,d) > new Date()) return true;
	
	return false;
  }

  function dateChanged(calendar) { 
    if (calendar.dateClicked) {
      '; ?>

      var manager = <?php echo $this->_tpl_vars['manager']; ?>
;
      <?php echo '
      var y = calendar.date.getFullYear();
      var m = calendar.date.getMonth();     // integer, 0..11
      var d = calendar.date.getDate();      // integer, 1..31      
 	  window.location = window.siteurl+"/journal?scale=2&y=" + y + "&m=" + m + "&d=" + d + "&manager=" + manager;
    }
  };


  Calendar.setup(
    {
      flat         : "calendar-container", // ID of the parent element
      flatCallback : dateChanged,           // our callback function
      weekNumbers  : false,
      dateStatusFunc : dateStatus,      
      showOthers : false,
      date : new Date('; ?>
<?php echo $this->_tpl_vars['y']; ?>
,<?php echo $this->_tpl_vars['m']; ?>
,<?php echo $this->_tpl_vars['d']; ?>
<?php echo ')
    }
  );
 
</script>
'; ?>