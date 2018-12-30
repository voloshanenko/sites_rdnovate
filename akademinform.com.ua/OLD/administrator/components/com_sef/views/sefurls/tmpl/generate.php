<?php
/**
 * SEF component for Joomla! 1.5
 *
 * @author      ARTIO s.r.o.
 * @copyright   ARTIO s.r.o., http://www.artio.cz
 * @package     JoomSEF
 * @version     3.1.0
 * @license     GNU/GPLv3 http://www.gnu.org/copyleft/gpl.html
 */
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
?>
<script type="text/javascript">
/* <![CDATA[ */
window.addEvent('domready', function() { sefStartGenerate(); });

var sefAjaxGenerate = null;
var sefAjaxStatus = null;
var sefTimer = null;

function sefCreateAjax() {
    if (sefAjaxGenerate && sefAjaxStatus) {
        return;
    }
    
    try {
    	sefAjaxGenerate = new XMLHttpRequest();
    	sefAjaxStatus = new XMLHttpRequest();
    }
    catch (e) {
        try {
        	sefAjaxGenerate = new ActiveXObject("Microsoft.XMLHttp");
        	sefAjaxStatus = new ActiveXObject("Microsoft.XMLHttp");
        }
        catch (e) {
        }
    }
}

function sefStartGenerate()
{
    sefCreateAjax();
    setTimeout('sefStatus();', 1000);
    sefGenerate();
}

function sefGenerate()
{
    if (!sefAjaxGenerate) {
        return;
    }
    
    try {
    	sefAjaxGenerate.open('POST', 'index.php', true);
    	sefAjaxGenerate.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    	sefAjaxGenerate.onreadystatechange = sefHandleGenerate;
    	sefAjaxGenerate.send('option=com_sef&controller=sefurls&task=generateNext&tmpl=component');
    }
    catch (e) {
    }
}

function sefStatus()
{
    if (!sefAjaxStatus) {
        return;
    }
    
    try {
    	sefAjaxStatus.open('POST', 'index.php', true);
    	sefAjaxStatus.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
    	sefAjaxStatus.onreadystatechange = sefHandleStatus;
    	sefAjaxStatus.send('option=com_sef&controller=sefurls&task=generateStatus&tmpl=component');
    }
    catch (e) {
    }
}

function sefHandleGenerate()
{
    if (sefAjaxGenerate.readyState == 4) {
        if (sefAjaxGenerate.status == 200) {
            try {
                // Create the response object from JSON syntax
                var response = eval('(' + sefAjaxGenerate.responseText + ')');
                
                if (response.type == 'complete') {
                    sefShowProgress(response);
                    alert('Done');
                }
                else if (response.type == 'generate') {
                    sefGenerate();
                }
            }
            catch (e){
                alert(sefAjaxGenerate.responseText);
                return;
            }
        }
    }
}

function sefHandleStatus()
{
    if (sefAjaxStatus.readyState == 4) {
        if (sefAjaxStatus.status == 200) {
            try {
                // Create the response object from JSON syntax
                var response = eval('(' + sefAjaxStatus.responseText + ')');
                
                if (response.type == 'status') {
                    sefShowProgress(response);
                    setTimeout('sefStatus();', 2000);
                }
            }
            catch (e){
                alert(sefAjaxStatus.responseText);
                return;
            }
        }
    }
}

function sefShowProgress(response)
{
	document.getElementById('urls_searched').innerHTML = response.searched;
	document.getElementById('urls_left').innerHTML = response.left;
	document.getElementById('urls_total').innerHTML = response.total;
}
/* ]]> */
</script>

<form action="index.php" method="post" name="adminForm">
<fieldset class="adminform">
<legend><?php echo JText::_('URLs Generation Report'); ?></legend>
<table class="adminform">
<tr>
    <th colspan="2">
        <?php echo JText::_('URLs Generation in progress...'); ?>
    </th>
</tr>
<tr>
    <td width="100"><?php echo JText::_('URLs searched'); ?>:</td>
    <td id="urls_searched">0</td>
</tr>
<tr>
    <td width="100"><?php echo JText::_('URLs left to search'); ?>:</td>
    <td id="urls_left">0</td>
</tr>
<tr>
    <td width="100"><?php echo JText::_('URLs in database'); ?>:</td>
    <td id="urls_total">0</td>
</tr>
</table>
</fieldset>

<input type="hidden" name="option" value="com_sef" />
<input type="hidden" name="task" value="" />
</form>