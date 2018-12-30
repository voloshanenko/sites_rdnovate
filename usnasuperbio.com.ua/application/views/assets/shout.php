<marquee behavior="scroll" direction="up" truespeed="truespeed" scrolldelay="85" scrollamount="1" style="width:100%;height:250px;border-bottom:solid 1px #ccc;" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 1, 0);">
<?php $this->load->helper('text'); ?>
<?php foreach ($items as $fact) { ?>
	<div>
		<strong><a href="/facts/<?=$fact['id']?>"><?=$fact['title']?></a></strong>
		<i><?=word_limiter($fact['text'], 10);?></i>
	</div>
<?php } ?>
</marquee>