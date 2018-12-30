<?php
    $this->load->helper('tools');
    $domain = $_SERVER['HTTP_HOST'];
?>
<style>
    #usb_export {
        width: 100%;
        float: left;
        height: 147px;
        font-size: 11px;
        background: #f9f9f9;
        background: #E0EFFF;
        background: #E9F7C3;
	    border-radius: 4px 4px 4px 4px;
	    box-shadow: 0 0 5px 2px #DDDDDD inset;
	    font-family: Arial, serif;
	    font-size: 11px;
    }
    #usb_export a {
        text-decoration: none;
    }
    #usb_export a:visited {
        color: #0365C6;
    }
    #usb_export_title {
        border-bottom: solid 1px #ccc;
        margin: 3px 5px;
        padding: 3px 0;
    }
    #usb_items_wrapper {
    	overflow: auto;
    	height: 119px;
    }
    .usb_export_item {
        float: left;
	    margin: 3px 5px;
	    text-align: center;
	    width: 124px;
	    border-bottom: 1px dotted #CCCCCC;
	    height: 130px;
    }
    .usb_export_item a span {
        display: block;
        height: 44px;
        overflow: hidden;
    }
</style>
<div id="usb_export">
    <div id="usb_export_title">
        <strong><a href="http://<?=$domain?>/" target="_blank"><?=$title?></a></strong>
    </div>
    <div id="usb_items_wrapper">
    	<?php shuffle($items); ?>
        <?php foreach($items as $item) { ?>
            <div class="usb_export_item">
                <a target="_blank" title="<?=$item['sd']?>" href="http://<?=$domain?>/<?=$item['curl']?>/prod/<?=$item['url']?>">
                	<span><?=$item['gtitle']?></span>      
	                <img src="http://<?=$domain?>/<?=_gen_thumb_img_name($item['image'])?>" border="0" alt="<?=$item['gtitle']?>" title="<?=$item['gtitle']?>" />
                </a>
                <br /><?=product_price($item);?>
            </div>
        <?php } ?>
    </div>
</div>