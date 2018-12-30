<?php
function get_init_data($key_val)
{
	return array(
		'table'			=> 'mainmenu',
		'key'			=> 'id',
		'value'			=> $key_val
	);
}

function page_item_fields()
{
	return array(
		'id' => array('hidden', 'ID'),
		'title' => array('text', 'Название категории', 'mandatory'=>TRUE),
		'page_url' => array('list', 'Страница', array(
			'source' => 'pages',
			'value' => 'url',
			'option' => 'title',
			'orderby' => 'title')
		),
		'category_id' => array('list', 'Группа страниц (приоритет)', array(
			'source' => 'pages_categories',
			'value' => 'id',
			'option' => 'caption',
			'orderby' => 'caption')
		),
		'ordering' => array('text', 'Порядок отображения')
	);
}

function generate_data($form, $data = NULL)
{
	if($data !== NULL)
	{
		return array(
			'meta_title' => $data['title'].' - Редактирование - Администрирование',
			'meta_description' => $data['title'].' - Редактирование - Администрирование',
			'meta_keywords' => '',
			'page_h1' => $data['title'].' - Редактирование - Администрирование',
			'css' => array('common', 'admin'),
			'form' => $form
		);
	}
	return array(
		'meta_title' => 'Добавить пункт меню - Администрирование',
		'meta_description' => 'Добавить пункт меню - Администрирование',
		'meta_keywords' => '',
		'page_h1' => 'Добавить пункт меню - Администрирование',
		'css' => array('common', 'admin'),
		'form' => $form
	);
}

function get_save_data()
{
	return array(
		'redirect_url' => '/admin/items/menu/',
		'table_to_save' => 'mainmenu',
		'filed_for_where' => 'id'
	);
}
function get_remove_url()
{
	return '/admin/delete/menu/';
}