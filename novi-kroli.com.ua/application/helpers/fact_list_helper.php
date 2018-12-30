<?php
function get_initdb_data()
{
	return array(
		'table'					=> 'facts',
		'fields'				=> 'id, title, text',
		'orderby'				=> 'title',
		'key_field'				=> 'id'
	);
}

function get_basic_data()
{
	$ci =& get_instance();
	$seg4 = $ci->uri->segment(4);
	$seg5 = $ci->uri->segment(5);
	return array(
		'meta_title'			=> 'Факты - Администрирование',
		'meta_description'		=> 'Факты - Администрирование',
		'meta_keywords'			=> '',
		'css'					=> array('common', 'admin', 'start/jquery-ui'),
		'page_h1'				=> 'Факты - Администрирование',
		'add_button_url'		=> '/admin/add/fact/'.$seg4.'/'.$seg5,
		'edit_button_url'		=> '/admin/edit/fact/(id)/'.$seg4.'/'.$seg5,
		'del_button_url'		=> '/admin/delete/fact/(id)/'.$seg4.'/'.$seg5,
		'js'					=> array('jquery.min','jquery-ui','user', 'admin')
	);
}

function generate_content($content)
{
	return array(
		'table_classes'			=> '',
		'content_table_titles'	=> array('Заголовок', 'Описание'),
		'content_table'			=> $content,
		'table_fields'			=> array('title', 'text'),
		'id'					=> 'id',
		'search'				=> array(
			'table'		=> 'facts',
			'fields'	=> 'id,title,text',
			'orderby'	=> 'title',
			'key'		=> 'id',
			'link_field' => 'title',
			'link'		=> '/admin/edit/fact/%1$s/%2$s/%3$s'
		)
	);
}