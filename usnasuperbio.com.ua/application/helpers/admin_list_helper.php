<?php
function get_initdb_data()
{
	return array(
		'table'					=> 'system_admins',
		'fields'				=> 'id, login, locked'
	);
}

function get_basic_data()
{
	$ci =& get_instance();
	$seg4 = $ci->uri->segment(4);
	$seg5 = $ci->uri->segment(5);
	return array(
		'meta_title'			=> 'Администраторы - Администрирование',
		'meta_description'		=> 'Администраторы - Администрирование',
		'meta_keywords'			=> '',
		'css'					=> array('common', 'admin'),
		'js'					=> array('jquery.min','jquery-ui', 'admin'),
		'page_h1'				=> 'Администраторы - Администрирование',
		'add_button_url'		=> '/admin/add/admin/'.$seg4.'/'.$seg5,
		'edit_button_url'		=> '/admin/edit/admin/(id)/'.$seg4.'/'.$seg5,
		'del_button_url'		=> '/admin/delete/admin/(id)/'.$seg4.'/'.$seg5
	);
}

function generate_content($content)
{
	return array(
		'content_table_titles'	=> array('id', 'Логин', 'Заблокирован?'),
		'content_table'			=> $content,
		'table_fields'			=> array('id', 'login', 'locked'),
		'id'					=> 'id'
	);
}