<?php
function get_initdb_data()
{
	return array(
		'table'					=> 'suppliers',
		'fields'				=> 'id, name, info',
		'orderby'				=> 'name',
		'key_field'				=> 'id'
	);
}

function get_basic_data()
{
	$ci =& get_instance();
	$seg4 = $ci->uri->segment(4);
	$seg5 = $ci->uri->segment(5);
	return array(
		'meta_title'			=> 'Поставщики - Администрирование',
		'meta_description'		=> 'Поставщики - Администрирование',
		'meta_keywords'			=> '',
		'css'					=> array('common', 'admin', 'start/jquery-ui'),
		'page_h1'				=> 'Поставщики - Администрирование',
		'add_button_url'		=> '/admin/add/supplier/'.$seg4.'/'.$seg5,
		'edit_button_url'		=> '/admin/edit/supplier/(id)/'.$seg4.'/'.$seg5,
		'del_button_url'		=> '/admin/delete/supplier/(id)/'.$seg4.'/'.$seg5,
		'js'					=> array('jquery.min','jquery-ui','user', 'admin')
	);
}

function generate_content($content)
{
	return array(
		'table_classes'			=> '',
		'content_table_titles'	=> array('Название', 'Инфо'),
		'content_table'			=> $content,
		'table_fields'			=> array('name', 'info'),
		'id'					=> 'id',
		'search'				=> array(
			'table'		=> 'suppliers',
			'fields'	=> 'id,name,info',
			'orderby'	=> 'name',
			'key'		=> 'id',
			'link_field' => 'name',
			'link'		=> '/admin/edit/supplier/%1$s/%2$s/%3$s'
		)
	);
}