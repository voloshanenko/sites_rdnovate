<?php
function get_init_data($key_val)
{
	return array(
		'table'	=> 'pages_categories',
		'key'	=> 'id',
		'value'	=> $key_val
	);
}

function page_item_fields()
{
	return array(
		'id'		=> array('hidden', 'ID'),
		'caption'	=> array('text', 'Название категории', 'mandatory'=>TRUE),
	);
}

function generate_data($form, $data = NULL)
{
	if($data !== NULL)
	{
		return array(
			'meta_title' => $data['caption'].' - Редактирование - Администрирование',
			'meta_description' => $data['caption'].' - Редактирование - Администрирование',
			'meta_keywords' => '',
			'page_h1' => $data['caption'].' - Редактирование - Администрирование',
			'css' => array('common', 'admin'),
			'form' => $form
		);
	}
	return array(
		'meta_title' => 'Добавить категорию - Администрирование',
		'meta_description' => 'Добавить категорию - Администрирование',
		'meta_keywords' => '',
		'page_h1' => 'Добавить категорию - Администрирование',
		'css' => array('common', 'admin'),
		'form' => $form
	);
}

function get_save_data()
{
	return array(
		'redirect_url' => '/admin/items/pc/',
		'table_to_save' => 'pages_categories',
		'filed_for_where' => 'id'
	);
}

function get_remove_url()
{
	return '/admin/delete/pc/';
}