<?php
function get_initdb_data()
{
	return array(
		'table'					=> 'pages',
		'fields'				=> 'id, url, title, ordering',
		'key_field'				=> 'id',
		'orderby'				=> 'title'
	);
}

function get_basic_data()
{
	$ci =& get_instance();
	$seg4 = $ci->uri->segment(4);
	$seg5 = $ci->uri->segment(5);
	return array(
		'meta_title'			=> 'Страницы сайта - Администрирование',
		'meta_description'		=> 'Страницы сайта - Администрирование',
		'meta_keywords'			=> '',
		'css'					=> array('common', 'admin'),
		'js'					=> array('jquery.min','jquery-ui','user', 'admin'),
		'page_h1'				=> 'Страницы сайта - Администрирование',
		'add_button_url'		=> '/admin/add/page/'.$seg4.'/'.$seg5,
		'edit_button_url'		=> '/admin/edit/page/(id)/'.$seg4.'/'.$seg5,
		'del_button_url'		=> '/admin/delete/page/(id)/'.$seg4.'/'.$seg5
	);
}

function generate_content($content)
{
	return array(
		'content_table_titles'	=> array('ID', 'Адрес', 'Заголовок'),
		'content_table'			=> $content,
		'table_fields'			=> array('id', 'url', 'title'),
		'id'					=> 'id',
		'filters'				=> array(
			array(
				'type' => 'list',
				'caption' => 'Категория',
				'param_name' => 'category_id',
				'table' => 'pages_categories',
				'key' => 'id',
				'value' => 'caption',
				'ordering' => 'caption'
			)
		),
		'search'				=> array(
			'table'		=> 'pages',
			'fields'	=> 'title,intro,fulltext',
			'orderby'	=> 'title',
			'key'		=> 'id',
			'link_field' => 'title',
			'link'		=> '/admin/edit/page/%1$s/%2$s/%3$s'
		)
	);
}