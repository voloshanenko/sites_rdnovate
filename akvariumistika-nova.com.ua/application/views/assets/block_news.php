<?php $ci =& get_instance(); $ci->load->helper('tools'); foreach ($data as $i) { ?>
	<strong><a href="/page/<?=$i['url']?>"><?=$i['title']?></a></strong>
	<?=$i['intro']?>
	<br />
<?php } ?>