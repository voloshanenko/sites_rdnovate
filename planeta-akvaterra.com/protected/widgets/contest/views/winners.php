<div class="contest-winners to-left">
    <?php
    $i = 0; $place = ''; $count = count($this->photos);

    foreach ($this->photos as $photo)
    {
        $voteable = $photo->isVoteable();
        echo '<div class="contest-image">';
        $pictureUrl = '';
        $pictureAttr = array(
            'title'=>$photo->name.", просмотров: ".$photo->views,
            'id'=>$photo->id,
            'rating' => $photo->rating,
            'trueimage'=>$photo->getWebPath('orig')
        );
        switch(++$i)
        {
            case 1: $pictureUrl=$photo->getWebPath('big'); $pictureAttr['width']="200"; $pictureAttr['height']="200"; $place = 'I'; break;
            case 2:	$pictureUrl=$photo->getWebPath('middle'); $pictureAttr['width']="130"; $pictureAttr['height']="130"; $place = 'II'; break;
            case 3: $pictureUrl=$photo->getWebPath('small'); $pictureAttr['width']="70"; $pictureAttr['height']="70"; $place = 'III'; break;
        }
        $title = $place.' место';
    ?>
        <strong><?=$title?></strong><br />
        <div class="photo-item">
        	<a href="/photos/item/view/id/<?=$photo->id?>">
            <?php echo CHtml::image($pictureUrl, $photo->name, $pictureAttr); ?>
            </a>
            <div class="photo-item-votes">
                <span class="photo-item-votes-up"></span>
                <span class="photo-item-votes-counter"><?php echo $photo->rating ?></span>
            </div>
        </div>
    </div>
<?php } ?>
</div>