<?php 

// no direct access
defined('_JEXEC') or die('Restricted access');
if ( $items ) {
?>
<table border="0" cellpadding="5" cellspacing="0" width="100%">
<?php if ( $params->get('showheader') ) { ?>
  <tr>
    <?php if ( $params->get('showleaderboard') ) { ?>
	<td class="sectiontableheader<?php echo $params->get( 'pageclass_sfx' ); ?>" width="10%"><div align="center">#</div></th>
	<?php } ?>
	
    <td class="sectiontableheader<?php echo $params->get( 'pageclass_sfx' ); ?>"><div align="left"><?php echo JText::_('LABEL_TITLE'); ?></div></th>
    
    <?php if ( $params->get('showsection') ) { ?>
    <td class="sectiontableheader<?php echo $params->get( 'pageclass_sfx' ); ?>" width="15%"><div align="left"><?php echo JText::_('LABEL_SECTION'); ?></div></th>
    <?php } ?>
    
    <?php if ( $params->get('showcategory') ) { ?>
    <td class="sectiontableheader<?php echo $params->get( 'pageclass_sfx' ); ?>" width="15%"><div align="left"><?php echo JText::_('LABEL_CATEGORY'); ?></div></th>
    <?php } ?>
    
    <?php if ( $params->get('showauthor') ) { ?>
    <td class="sectiontableheader<?php echo $params->get( 'pageclass_sfx' ); ?>" width="15%"><div align="left"><?php echo JText::_('LABEL_AUTHOR'); ?></div></th>
    <?php } ?>
  </tr>
<?php } ?>
<?php
	$i = 1;
    $k = 0;
	foreach ($items as $item) { ?>
	<tr>
		<?php if ( $params->get('showleaderboard') ) { ?>
		<td class="sectiontableentry<?php echo $k; ?>" width="10%"><div align="center"><?php echo $i; ?></div></td>
		<?php } ?>
		<td align="left">
			<a href="<?php echo $item->href; ?>">
				<?php echo $item->title; ?>
			</a>
		</td>
		<?php if ( $params->get('showsection') ) { ?>
		<td align="left">
			<?php echo $item->section; ?>
		</td>
		<?php } ?>
		<?php if ( $params->get('showcategory') ) { ?>
		<td align="left">
			<?php echo $item->category; ?>
		</td>
		<?php } ?>
		<?php if ( $params->get('showauthor') ) { ?>
		<td align="left">
			<?php echo $item->author; ?>
		</td>
		<?php } ?>
	</tr>
<?php
		$i++;
        $k = 1 - $k;
 	 }
?>
</table>
<?php
} 
?>