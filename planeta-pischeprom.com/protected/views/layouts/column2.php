<?php $this->beginContent('//layouts/main'); ?>
<div class="container underlined">
	<div class="span-20">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
    <?php if(!Yii::app()->user->isGuest && (Yii::app()->user->role=='admin' || Yii::app()->user->role=='manager')) { ?>
	<div class="span-5 last">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Действия',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		</div><!-- sidebar -->
	</div>
    <?php } ?>
</div>
<?php $this->endContent(); ?>