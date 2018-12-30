<?php /* Smarty version 2.6.18, created on 2010-12-21 16:24:47
         compiled from journal/day.tpl */ ?>

  
  <script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/libs/jscalendar/calendar.js"></script>
  <script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/libs/jscalendar/lang/calendar-<?php echo $this->_tpl_vars['lang']; ?>
.js"></script>
  <script type="text/javascript" src="<?php echo $this->_tpl_vars['siteurl']; ?>
/libs/jscalendar/calendar-setup.js"></script>


<div id="calendar-wrapper"><div id="calendar-container"></div></div>

<?php echo '
<script type="text/javascript">
  function dateChanged(calendar) {   
    if (calendar.dateClicked) {
      '; ?>

      var manager = <?php echo $this->_tpl_vars['manager']; ?>
;
      <?php echo '
      var y = calendar.date.getFullYear();
      var m = calendar.date.getMonth();     // integer, 0..11
      var d = calendar.date.getDate();      // integer, 1..31      
 	  window.location = window.siteurl+"/journal?scale=1&y=" + y + "&m=" + m + "&d=" + d + "&manager=" + manager;
    }
  };

	
  var JSONObject = {"bind": '; ?>

  <?php echo $this->_tpl_vars['json']; ?>

  <?php echo '
  };
		  
	var today = (new Date().getDate()) + "." + (new Date().getMonth()+1) + "." + (new Date().getFullYear());

	function dateStatus(date, y, m, d) {			
		var temp = y + "-" + (m + 1) + "-" + d;						 
		var temp2 = d + "." + (m + 1) + "." + y;						 
	
		if (temp2==today) { return false; }
	
		if (!JSONObject.bind.contains(temp2) && new Date(y,m,d) <= new Date()) {
			return \'special\';
		}			
		
		if (new Date(y,m,d) > new Date()) return true; else
		return false;
	}

  Calendar.setup(
    {
      flat         : "calendar-container", // ID of the parent element
      flatCallback : dateChanged,           // our callback function
      weekNumbers  : false,
      dateStatusFunc : dateStatus,
      date : new Date('; ?>
<?php echo $this->_tpl_vars['y']; ?>
,<?php echo $this->_tpl_vars['m']; ?>
,<?php echo $this->_tpl_vars['d']; ?>
<?php echo ')
    }
  );
 
</script>
'; ?>