<?php $cont = $this->contest; ?>
<div class="contest html-box" id="<?=$cont->id?>">
    <div class="to-left contest-info">
        Фотоконкурс
        <h3 class="contest-title">"<?=$cont->title?>"</h3>
        <div class="contest-notes notes"><?=$cont->comment?></div>
        <small>
            Начало: <?php echo CString::readableDate($cont->date_start, 'd F Y'); ?>;
            окончание: <?php echo CString::readableDate($cont->date_end, 'd F Y'); ?>, через <?php echo CString::calcDaysBetweenDates(date('Y-m-d'), $cont->date_end); ?> дней.
        </small>
    </div>
    <div class="to-right text-to-right sponsor-info">
        <table>
            <tr>
                <td width="50%" colspan="2"><?php if($cont->partner) { ?>Партнер<?php } ?></td>
                <td width="50%" colspan="2"><?php if($cont->sponsor) { ?>Спонсор<?php } ?></td>
            </tr>
            <tr>
                <td class="text-info">
                    <?php if($cont->partner) { ?>
                    <h3><a href="/photos/partners/view/id/<?=$cont->partner->id?>"><?=$cont->partner->name?></a></h3>
                    <span><?=$cont->partner->slogan?></span>
                    <?php } ?>
                </td>
                <td class="sponsor-icon">
                    <?php if($cont->partner) { ?><a href="/photos/partners/view/id/<?=$cont->partner->id?>"><?=CHtml::image($cont->partner->icon, $cont->partner->name)?><?php } ?>
                </td>
                <td class="text-info">
                <?php if($cont->sponsor) { ?>
                    <h3><a href="/photos/sponsor/view/id/<?=$cont->sponsor->id?>"><?=$cont->sponsor->name?></a></h3>
                    <span><?=$cont->sponsor->slogan?></span>
                <?php } ?>
                </td>
                <td class="sponsor-icon">
                    <?php if($cont->sponsor) { ?>
                    <a href="/photos/sponsor/view/id/<?=$cont->sponsor->id?>"><?=CHtml::image($cont->sponsor->icon, $cont->sponsor->name)?>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="appeal html-box text-to-center">
        <?php if($cont->appeal) { ?>
            <big><?=$cont->appeal?></big>
        <?php } ?>
    </div>
    <?php
    if($cont->canHasWinners()) {
    	$winners = $cont->getWinners();
    	$others = $cont->getOtherParticipants();
	} else {
		$others = array_merge($cont->getWinners(), $cont->getOtherParticipants());
	}
	?>
		<?php if($winners || $others) { ?>
        <div class="html-box image-collection">
    		<?php if($cont->canHasWinners()) { ?>
            	<?php $this->widget('application.widgets.contest.winners', array('photos'=>$winners)); ?>
        	<?php } ?>
            <?php $this->widget('application.widgets.contest.wall', array('photos'=>$others)); ?>
        </div>
        <div class="contest-text-info upperlined underlined html-box">
            <?php if($cont->canHasWinners()) { ?>
            <div class="winners-listing to-left">
                <strong>Сейчас лидируют:</strong>
                <?php $i = 0; $place = '';
                foreach($winners as $photo) {
                    switch(++$i)
                    {
                        case 1: $place = "I"; break;
                        case 2: $place = "II"; break;
                        case 3: $place = "III"; break;
                    }
                    ?>
                    <div class="contest-position"><strong><?=$place?> место:</strong> <?=$photo->owner->first_name.' '.$photo->owner->last_name; ?>
                    <br /><span class="gray-font"><?=$photo->owner->address?></span></div>
                <?php }?>
                <span class="notes"><?=$cont->prize_comments?></span>
            </div>
            <?php }?>
            <div class="awarding-info"><?php echo $cont->awarding_info ?></div>
        </div>
    <?php } else { ?>
        <h4 class="no-photos-msg text-to-center">В этом фотоконкурсе пока нет фото. Загрузите свое!</h4>
    <?php } ?>
    <?php if($cont->prize1 || $cont->prize2 || $cont->prize3) { ?>
        <h4 class="html-box text-to-center">Награды</h4>
        <div class="html-box underlined upperlined prizes">
            <div class="third-width text-to-center to-left">
                <big><strong>I место</strong></big><br />
                <?php
                if($cont->prize1_url) {
                    echo CHtml::link(CHtml::image($cont->prize1, 'Приз на первое место!'), $cont->prize1_url);
                } else {
                    echo CHtml::image($cont->prize1, 'Приз на первое место!');
                } ?>
            </div>
            <div class="third-width text-to-center to-left">
                <big><strong>II место</strong></big><br />
                <?php
                if($cont->prize2_url) {
                    echo CHtml::link(CHtml::image($cont->prize2, 'Приз на второе место!'), $cont->prize2_url);
                } else {
                    echo CHtml::image($cont->prize2, 'Приз на второе место!');
                } ?>
            </div>
            <div class="third-width text-to-center to-left">
                <big><strong>III место</strong></big><br />
                <?php
                if($cont->prize3_url) {
                    echo CHtml::link(CHtml::image($cont->prize3, 'Приз на третье место!'), $cont->prize3_url);
                } else {
                    echo CHtml::image($cont->prize3, 'Приз на третье место!');
                } ?>
            </div>
        </div>
    <?php } ?>
</div>