<?php
function get_initdb_data()
{
	return array(
		'table'					=> 'brands',
		'fields'				=> 'id, title, description',
		'orderby'				=> 'title'
	);
}

function get_basic_data()
{
	$ci =& get_instance();
	$seg4 = $ci->uri->segment(4);
	$seg5 = $ci->uri->segment(5);
	return array(
		'meta_title'			=> 'Бренды - Администрирование',
		'meta_description'		=> 'Бренды - Администрирование',
		'meta_keywords'			=> '',
		'css'					=> array('common', 'admin'),
		'js'					=> array('jquery.min','jquery-ui','user', 'admin'),
		'page_h1'				=> 'Бренды - Администрирование',
		'add_button_url'		=> '/admin/add/brand/'.$seg4.'/'.$seg5,
		'edit_button_url'		=> '/admin/edit/brand/(id)/'.$seg4.'/'.$seg5,
		'del_button_url'		=> '/admin/delete/brand/(id)/'.$seg4.'/'.$seg5
	);
}

function generate_content($content)
{
	return array(
		'content_table_titles'	=> array('Название'),
		'content_table'			=> $content,
		'table_fields'			=> array('title'),
		'id'					=> 'id',
		'search'				=> array(
			'table'		=> 'brands',
			'fields'	=> 'id,title',
			'orderby'	=> 'title',
			'key'		=> 'id',
			'link_field' => 'title',
			'link'		=> '/admin/edit/brand/%1$s/%2$s/%3$s'
		)
	);
}