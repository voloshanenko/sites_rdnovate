<div class="photos-private-box">
    <?php foreach($this->photos as $photo) { $pictureUrl = $photo->getWebPath('small'); ?>
        <div class="photo-item<?php if(!(boolean)$photo->published) { ?> quiet<?php } ?>">
            <?=trim(CHtml::image($pictureUrl, $photo->name, array('width'=>70, 'title'=>$photo->name, 'height'=>70, 'trueimage'=>$photo->getWebPath('orig')))); ?>
            <?=$photo->name?><br />
            <small>
                Просмотров: <?=$photo->views?>, рейтинг: <?=$photo->rating?><br />
                <?php if((boolean)$photo->discarded) { ?>
                    <div class="hot">Не принято администрацией!<br />Причина: <?=$photo->discarded_reason?></div>
                <?php } ?>
                <a href="<?=Yii::app()->createUrl('photos/item/update', array('id'=>$photo->id))?>">Редактировать</a> или
                <a parent="photo-item" dialog="dialog-remove-photo" title="Вы уверены, что хотите удалить эту фотографию?" onclick="return confirm('Вы уверены?')" href="<?=Yii::app()->createUrl('photos/item/delete', array('id'=>$photo->id)); ?>">удалить</a>
            </small>
        </div>
    <?php } ?>
</div>