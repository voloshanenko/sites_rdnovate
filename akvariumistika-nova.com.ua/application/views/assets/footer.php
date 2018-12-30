<?php if(isset($js)) { foreach($js as $file) { ?>
	<script type="text/javascript" src="/js/<?=$file?>.js?<?=mktime()?>"></script>
<?php } } ?>
</body>
</html>