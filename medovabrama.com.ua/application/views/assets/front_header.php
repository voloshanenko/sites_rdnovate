<?php echo '<?xml version="1.0" encoding="UTF-8"?>'."\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html version="-//W3C//DTD XHTML 1.1//EN"
      xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.w3.org/1999/xhtml
                          http://www.w3.org/MarkUp/SCHEMA/xhtml11.xsd"
>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>{meta_title}</title>
		<meta name="keywords" content="{meta_keywords}" />
		<meta name="description" content="{meta_description}" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<?php if(isset($css)) { foreach($css as $file) { ?>
			<link rel="stylesheet" href="/css/<?=$file?>.css?<?=mktime()?>" />
		<?php } } ?>
	</head>
	<body>
	<div id="wrapper">