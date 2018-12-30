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
    <?php } else { ?>
        <h4 class="no-photos-msg text-to-center">В этом фотоконкурсе пока нет фото. Загрузите свое!</h4>
    <?php } ?>
</div>