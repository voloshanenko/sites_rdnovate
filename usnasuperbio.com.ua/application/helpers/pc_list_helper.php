<?php
function get_initdb_data()
{
	return array(
		'table'					=> 'pages_categories',
		'fields'				=> 'id, caption'
	);
}

function get_basic_data()
{
	$ci =& get_instance();
	$seg4 = $ci->uri->segment(4);
	$seg5 = $ci->uri->segment(5);
	return array(
		'meta_title'			=> 'Категории страниц - Администрирование',
		'meta_description'		=> 'Категории страниц - Администрирование',
		'meta_keywords'			=> '',
		'css'					=> array('common', 'admin'),
		'js'					=> array('jquery.min','jquery-ui','user', 'admin'),
		'page_h1'				=> 'Категории страниц - Администрирование',
		'add_button_url'		=> '/admin/add/pc/'.$seg4.'/'.$seg5,
		'edit_button_url'		=> '/admin/edit/pc/(id)/'.$seg4.'/'.$seg5,
		'del_button_url'		=> '/admin/delete/pc/(id)/'.$seg4.'/'.$seg5
	);
}

function generate_content($content)
{
	return array(
		'content_table_titles'	=> array('Заголовок'),
		'content_table'			=> $content,
		'table_fields'			=> array('caption'),
		'id'					=> 'id'
	);
}