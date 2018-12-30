<div class="contest-wall">
    <div class="contest-wall-wrapper">
        <?php foreach($this->photos as $photo) {
            $voteable = $photo->isVoteable();
            $pictureUrl = $photo->getWebPath('small'); ?>
        <div class="contest-image">
            <div class="photo-item">
            	<a href="/photos/item/view/id/<?=$photo->id?>">
                <?php echo trim(CHtml::image($pictureUrl, $photo->name, array(
                    'width'=>70,
                    'height'=>70,
                    'title'=>$photo->name.", просмотров: ".$photo->views,
                    'id'=>$photo->id,
                    'trueimage'=>$photo->getWebPath('orig')
                ))); ?>
                </a>
                <div class="photo-item-votes">
                    <span class="photo-item-votes-up"></span>
                    <span class="photo-item-votes-counter"><?php echo $photo->rating ?></span>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>