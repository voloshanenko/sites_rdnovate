<?php // no direct access
// Litchfield Morris add echo intro
defined('_JEXEC') or die('Restricted access'); ?>
<ul class="latestnews<?php echo $params->get('moduleclass_sfx'); ?>">
<?php foreach ($list as $item) :  ?>
	<li class="latestnews<?php echo $params->get('moduleclass_sfx'); ?>">
		<a href="<?php echo $item->link; ?>" class="latestnews<?php echo $params->get('moduleclass_sfx'); ?>"><?php echo $item->text; ?><br /><?php echo $item->intro; ?></a>
	</li>
<?php endforeach; ?>
</ul>