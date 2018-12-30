<?php if(!empty($this->banners_array)) { foreach($this->banners_array as $bnr) { ?>
	<div class="plbbnr">
		<?php if(!Yii::app()->user->isGuest && Yii::app()->user->role=='admin') { ?>
			<div class="plbbnr-edit">
				<a href="/banner/update/<?=$bnr->id?>">[ред]</a>
			</div>
		<?php } ?>
		<a href="<?=$bnr->url?>" rel="nofollow" target="_blank">
			<img src="<?=$bnr->image?>" border="0" alt="<?=$bnr->title?>" title="<?=$bnr->title?>" />
		</a>
	</div>
<?php } } ?>