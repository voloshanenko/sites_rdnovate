<?php
function get_initdb_data()
{
	return array(
		'table'					=> 'mainmenu',
		'fields'				=> 'id, title, ordering',
		'orderby'				=> 'ordering',
		'key_field'				=> 'id'
	);
}

function get_basic_data()
{
	$ci =& get_instance();
	$seg4 = $ci->uri->segment(4);
	$seg5 = $ci->uri->segment(5);
	return array(
		'meta_title'			=> 'Меню - Администрирование',
		'meta_description'		=> 'Меню - Администрирование',
		'meta_keywords'			=> '',
		'css'					=> array('common', 'admin'),
		'page_h1'				=> 'Меню - Администрирование',
		'add_button_url'		=> '/admin/add/menu/'.$seg4.'/'.$seg5,
		'edit_button_url'		=> '/admin/edit/menu/(id)/'.$seg4.'/'.$seg5,
		'del_button_url'		=> '/admin/delete/menu/(id)/'.$seg4.'/'.$seg5,
		'js'					=> array('jquery.min','jquery-ui','user', 'admin')
	);
}

function generate_content($content)
{
	return array(
		'table_classes'			=> 'admin_sortable',
		'content_table_titles'	=> array('Название'),
		'content_table'			=> $content,
		'table_fields'			=> array('title'),
		'id'					=> 'id'
	);
}