<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>{meta_title}</title>
		<meta name="keywords" content="{meta_keywords}" />
		<meta name="description" content="{meta_description}" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<?php if(isset($css)) { foreach($css as $file) { ?>
			<link rel="stylesheet" href="/css/<?=$file?>.css?<?=mktime()?>>" />
		<?php } } ?>
	</head>
	<body>