<?php defined('_JEXEC') or die('Restricted access');?>
<form action="index.php?option=com_media&amp;tmpl=component&amp;folder=<?php echo $this->state->folder; ?>" method="post" id="mediamanager-form" name="mediamanager-form">
	<div class="manager">
	<table width="100%" cellspacing="0">
	<thead>
		<tr>
			<th><?php echo JText::_( 'Preview' ); ?></th>
			<th><?php echo JText::_( 'Name' ); ?></th>
			<th><?php echo JText::_( 'Dimensions' ); ?></th>
			<th><?php echo JText::_( 'Size' ); ?></th>
			<th><?php echo JText::_( 'Delete' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php 
			for ($i=0,$n=count($this->documents); $i<$n; $i++) :
			if ($this->documents[$i]->name == 'favicon.ico') {
				$this->setDoc($i);
				echo $this->loadTemplate('doc');
			}
		endfor; ?>

	</tbody>
	</table>
	</div>
	<input type="hidden" name="task" value="list" />
	<input type="hidden" name="username" value="" />
	<input type="hidden" name="password" value="" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>