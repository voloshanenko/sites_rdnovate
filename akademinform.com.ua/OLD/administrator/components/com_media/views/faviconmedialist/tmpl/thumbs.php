<?php defined('_JEXEC') or die('Restricted access');?>
<form action="index.php?option=com_media&amp;tmpl=component&amp;folder=<?php echo $this->state->folder; ?>" method="post" id="mediamanager-form" name="mediamanager-form">
	<div class="manager">
		<?php 
			for ($i=0,$n=count($this->documents); $i<$n; $i++) :
			if ($this->documents[$i]->name == 'favicon.ico') {
				$this->setDoc($i);
				echo $this->loadTemplate('doc');
			}
		endfor; ?>
	</div>
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="username" value="" />
	<input type="hidden" name="password" value="" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>