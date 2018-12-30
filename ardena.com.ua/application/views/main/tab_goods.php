<?php $ci =& get_instance(); $ci->load->helper('tools'); foreach ($data as $i) { ?>
	<div class="item-box">
		<strong><a href="<?='/'.$i['gcurl'].'/prod/'.$i['url']?>"><?=$i['title']?></a></strong><br />
		<a class="item-box-img" href="/<?=$i['gcurl'].'/prod/'.$i['url']?>">
			<img src="<?php echo _gen_thumb_img_name($i['image']); ?>" alt="<?=$i['title']?>" />
		</a>
		<small><?=product_price($i)?></small>
		<div class="item-thumb-description">
			<?php echo $i['short_description'] ?>
		</div>
	</div>
<?php } ?>