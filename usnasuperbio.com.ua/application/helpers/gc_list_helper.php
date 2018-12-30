<?php
function get_initdb_data()
{
	return array(
		'type'					=> 'tree',
		'table'					=> 'goods_categories',
		'fields'				=> 'id, url, title, caption, parent_id',
		'orderby'				=> 'parent_id',
		'key_field'				=> 'id'
	);
}

function get_basic_data()
{
	$ci =& get_instance();
	$seg4 = $ci->uri->segment(4);
	$seg5 = $ci->uri->segment(5);
	return array(
		'meta_title'			=> 'Категории товаров - Администрирование',
		'meta_description'		=> 'Категории товаров - Администрирование',
		'meta_keywords'			=> '',
		'css'					=> array('common', 'admin'),
		'page_h1'				=> 'Категории товаров - Администрирование',
		'add_button_url'		=> '/admin/add/gc/'.$seg4.'/'.$seg5,
		'edit_button_url'		=> '/admin/edit/gc/(id)/'.$seg4.'/'.$seg5,
		'del_button_url'		=> '/admin/delete/gc/(id)/'.$seg4.'/'.$seg5,
		'js'					=> array('jquery.min','jquery-ui','user', 'admin')
	);
}

function generate_content($content)
{
	return array(
		'table_fields'			=> array('url', 'title', 'caption'),
		'content_table_titles'	=> array('Адрес', 'Заголовок', 'Подпись в меню'),
		'content_table'			=> $content,
		'id'					=> 'id'
	);
}