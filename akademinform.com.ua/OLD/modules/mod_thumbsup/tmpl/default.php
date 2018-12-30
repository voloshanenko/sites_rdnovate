<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<div width="100%">
<?php
if(@$list[1]->disposition=="h")
$i=0;
foreach ($list as $item) :  
$order=explode("-",$item->ordering);
$cntorder=count($order);

if(@$i < $item->count_pic) { 

if(@$list[1]->disposition=="v"||!@$list[1]->disposition) ?><div  valign="top" class="thumbsup-image<?php echo $item->css?>"><?php 
		if($item->front) {
			if($item->show_thumb) {
				if($item->link_thumb)
				echo "<a href=\"".$item->link."\">";
				
				echo $item->imgbig;
			
				if($item->link_thumb)
				echo "</a>";
			}
			
			for($j=0;$j<$cntorder;$j++){
			
			if($order[$j]=="t"&&$item->show_title) {
				if($item->link_title)
				echo "<a href=\"".$item->link."\" class=\"thumbsup-title".$item->css."\">";
				
				echo "<H1>";
				echo "<div class=\"thumbsup-title".$item->css."\">".$item->title."</div>";
				echo "</H1>";
				
				if($item->link_title)
				echo "</a>";
			}
			if($order[$j]=="i"&&$item->show_intro){
				
				if($item->link_intro)
				echo "<a href=\"".$item->link."\" class=\"thumbsup-intro".$item->css."\">";
				echo $item->introtext;
				
				if($item->link_intro)
				echo "</a>";
				
				if($item->show_readmore){
 					echo "<br />";
					echo "<a href=\"".$item->link."\" class=\"thumbsup-readmore\">";
					echo 'Детальнiше...';
					echo "</a>";
				}
			}
			if($order[$j]=="d"&&$item->show_date) {
				echo "<div class=\"thumbsup-date".$item->css."\">".JHTML::_('date', $item->created, $item->date_f)."</div>";
			}
			if($order[$j]=="a"&&$item->show_author) {
				echo "<div class=\"thumbsup-author".$item->css."\">";
				JText::printf('Written by',$item->author);
				echo "</div>";
			}
			if($order[$j]=="h"&&$item->show_hits) {
				echo "<div class=\"thumbsup-hits".$item->css."\">";
				JText::printf('Hits',$item->hits); 
				echo " ".$item->hits;
				echo "</div>";
			}
		}
		
		} else {
			if($item->show_thumb){
				
				if($item->link_thumb)
				echo "<a href=\"".$item->link."\" class=\"thumbsup-thumb".$item->css."\">";
				
				echo $item->imgsmall." ";
				
				if($item->link_thumb)
				echo "</a>";
			
			}
			
			if($item->imgcolumn)
			print "</td><td valign=\"top\" class=\"thumbsup-text".$item->css."\">";
		
		for($j=0;$j<$cntorder;$j++){
			
			if($order[$j]=="t"&&$item->show_title) {
				echo "<div class=\"thumbsup-title".$item->css."\">";
				
				if($item->link_title)
				echo "<a href=\"".$item->link."\" class=\"thumbsup-title".$item->css."\">";
				
				echo $item->title;
				
				if($item->link_title)
				echo "</a>";
				
				echo "</div>";
			}
			
			if($order[$j]=="i"&&$item->show_intro){
				echo "<div class=\"thumbsup-intro".$item->css."\">";
				
				if($item->link_intro)
				echo "<a href=\"".$item->link."\" class=\"thumbsup-intro".$item->css."\">";
				
				echo $item->introtext;
				
				if($item->link_intro)
				echo "</a>";
				
				if($item->show_readmore) {
					echo "<br />";
					echo "<a href=\"".$item->link."\"  class=\"thumbsup-readmore\">";
					echo 'Детальнiше...';
					echo "</a>";
				}
				echo "</div>";
			}
			
			if($order[$j]=="d"&&$item->show_date) {
				echo "<div class=\"thumbsup-date".$item->css."\">".JHTML::_('date', $item->created, $item->date_f)."</div>";
			}
			
			if($order[$j]=="a"&&$item->show_author) {
				echo "<div class=\"thumbsup-author".$item->css."\">";
				JText::printf('Written by',$item->author);
				echo "</div>";
			}
			
			if($order[$j]=="h"&&$item->show_hits) {
				echo "<div class=\"thumbsup-hits".$item->css."\">";
				JText::printf('Hits',$item->hits); 
				echo " ".$item->hits;
				echo "</div>";
			}
		}
	}	?>
	
	</div>
	
<?php	if(@$list[1]->disposition=="v"||!@$list[1]->disposition)
//		print "</tr>";
?>
	
<?php  } else { 
	if(@$list[1]->disposition=="v"||!@$list[1]->disposition)
//	print "<tr>";
?>
	<td valign="top" class="thumbsup-text<?php echo $item->css?>">
		<?php 
		for($j=0;$j<$cntorder;$j++){
			
			if($order[$j]=="t"&&$item->show_title) {
				echo "<div class=\"thumbsup-title".$item->css."\">";
				
				if($item->link_title)
				echo "<a href=\"".$item->link."\" class=\"thumbsup-title".$item->css."\">";
				
				if($item->front) echo "<H1>";
				echo $item->title;
				if($item->front) echo "</H1>";
				
				if($item->link_title)
				echo "</a>";
				
				echo "</div>";
			}
			
			if($order[$j]=="i"&&$item->show_intro){
				echo "<div class=\"thumbsup-intro".$item->css."\">";
				
				if($item->link_intro)
				echo "<a href=\"".$item->link."\" class=\"thumbsup-intro".$item->css."\">";
				
				echo $item->introtext;
				
				if($item->link_intro)
				echo "</a>";
				
				if($item->show_readmore) { echo "<br />"; echo JText::_('more'); }
				echo "</div>";
			}
			
			if($order[$j]=="d"&&$item->show_date) {
				echo "<div class=\"thumbsup-date".$item->css."\">".JHTML::_('date', $item->created, $item->date_f)."</div>";
			}
			
			if($order[$j]=="a"&&$item->show_author) {
				echo "<div class=\"thumbsup-author".$item->css."\">";
				JText::printf('Written by',$item->author);
				echo "</div>";
			}
			
			if($order[$j]=="h"&&$item->show_hits) {
				echo "<div class=\"thumbsup-hits".$item->css."\">";
				JText::printf('Hits',$item->hits); 
				echo " ".$item->hits;
				echo "</div>";
			}
		}
		?>
	</td>
	<?php if($list[1]->disposition=="v"||!$list[1]->disposition)
	//	print "</tr>";
	?>
<?php } ?>
<?php @$i++; endforeach; 
 
 if(@$list[1]->disposition=="h")
//	print "</tr>";
?>
</div>