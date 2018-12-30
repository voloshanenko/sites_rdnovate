<?php
function get_init_data($key_val)
{
	return array(
		'table'	=> 'brands',
		'key'	=> 'id',
		'value'	=> $key_val
	);
}

function page_item_fields()
{
	return array(
		'id'			=> array('hidden', 'id'),
		'title'			=> array('text', 'Название бренда', 'mandatory'=>TRUE),
		'description'	=> array('editor', 'Пару слов о бренде...'),
	);
}

function generate_data($form, $data = NULL)
{
	if($data !== NULL)
	{
		return array(
			'meta_title' => $data['title'].' - Редактирование бренда - Администрирование',
			'meta_description' => $data['title'].' - Редактирование бренда - Администрирование',
			'meta_keywords' => '',
			'page_h1' => $data['title'].' - Редактирование бренда - Администрирование',
			'css' => array('common', 'admin'),
			'js' => array('jquery.min', 'jquery-ui', 'ckeditor/ckeditor', 'ckfinder/ckfinder', 'tinymce.init', 'admin'),
			'form' => $form
		);
	}
	return array(
		'meta_title' => 'Добавить бренд - Администрирование',
		'meta_description' => 'Добавить бренд - Администрирование',
		'meta_keywords' => '',
		'page_h1' => 'Добавить бренд - Администрирование',
		'css' => array('common', 'admin'),
		'js' => array('jquery.min', 'jquery-ui', 'ckeditor/ckeditor', 'ckfinder/ckfinder', 'tinymce.init', 'admin'),
		'form' => $form
	);
}

function get_save_data()
{
	return array(
		'redirect_url' => '/admin/items/brands/',
		'table_to_save' => 'brands',
		'filed_for_where' => 'id'
	);
}

function get_remove_url()
{
	return '/admin/delete/brand/';
}