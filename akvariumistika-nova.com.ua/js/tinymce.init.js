tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		language: "ru",
		media_strict: false,
		plugins : "safari,pagebreak,style,layer,table,advhr,advimage,advlink,insertdatetime,media,contextmenu,paste,fullscreen,noneditable,nonbreaking,template,imagemanager",
		//file_browser_callback : "mcImageManager.filebrowserCallBack",
		relative_urls: false,
		cleanup : false,
		cleanup_on_startup : false,
		valid_elements : "**",
		extended_valid_elements : 'span[class|align|style]',

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect,|,removeformat,cleanup",
		theme_advanced_buttons2 : "pastetext,pasteword,|,bullist,numlist,|,outdent,indent,|,link,unlink,anchor,image,media,code,|,insertdate,inserttime,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,visualaid,|,sub,sup,|,fullscreen,visualchars,template",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		
		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "/js/tinymce/lists/template_list.js",
		external_link_list_url : "/js/tinymce/lists/link_list.js",
		external_image_list_url : "/admin/images-upload/list",
		media_external_list_url : "/js/tinymce/lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {},
		style_formats : [
		                 {title : 'Яркий красный текст', inline : 'span', styles : {color : '#ff0000', backgroundColor : '#ffff00', fontWeight : 'bold'}},
		             ]
});