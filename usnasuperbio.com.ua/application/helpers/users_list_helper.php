<?php
function get_initdb_data()
{
	return array(
		'table'					=> 'users',
		'fields'				=> 'id, name, login, email, phone, reg_date',
		'orderby'				=> 'reg_date',
		'orderdir'				=> 'desc'
	);
}

function get_basic_data()
{
	$ci =& get_instance();
	$seg4 = $ci->uri->segment(4);
	$seg5 = $ci->uri->segment(5);
	return array(
		'meta_title'			=> 'Клиенты - Администрирование',
		'meta_description'		=> 'Клиенты - Администрирование',
		'meta_keywords'			=> '',
		'css'					=> array('common', 'admin'),
		'js'					=> array('jquery.min','jquery-ui','user', 'admin'),
		'page_h1'				=> 'Клиенты - Администрирование',
		'add_button_url'		=> '/admin/add/user/'.$seg4.'/'.$seg5,
		'edit_button_url'		=> '/admin/edit/user/(id)/'.$seg4.'/'.$seg5,
		'del_button_url'		=> '/admin/delete/user/(id)/'.$seg4.'/'.$seg5
	);
}

function generate_content($content)
{
	return array(
		'content_table_titles'	=> array('Имя', 'Логин', 'E-mail', 'Контактный тел.', 'Дата рег.'),
		'content_table'			=> $content,
		'table_fields'			=> array('name', 'login', 'email', 'phone', 'reg_date'),
		'id'					=> 'id',
		'search'				=> array(
			'table'		=> 'users',
			'fields'	=> 'id,login,name,phone,email',
			'orderby'	=> 'name',
			'key'		=> 'id',
			'link_field' => 'name',
			'link'		=> '/admin/edit/user/%1$s/%2$s/%3$s'
		)
	);
}