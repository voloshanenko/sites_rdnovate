<?php
function get_init_data($key_val)
{
	return array(
		'table'	=> 'suppliers',
		'key'	=> 'id',
		'value'	=> $key_val
	);
}

function page_item_fields()
{
	return array(
		'id'			=> array('hidden', 'Идентификатор'),
		'name'			=> array('text', 'Название', 'mandatory'=>TRUE),
		'info'			=> array('text', 'Инфо', 'mandatory'=>FALSE)
	);
}

function generate_data($form, $data = NULL)
{
	if($data !== NULL)
	{
		return array(
			'meta_title' => 'Поставщики - Редактирование - Администрирование',
			'meta_description' => 'Поставщики - Редактирование - Администрирование',
			'meta_keywords' => '',
			'page_h1' => 'Поставщики - Редактирование - Администрирование',
			'css' => array('common', 'admin'),
			'js' => array('jquery.min', 'tiny_mce/tiny_mce', 'tinymce.init', 'admin'),
			'form' => $form
		);
	}
	return array(
		'meta_title' => 'Добавить поставщика - Администрирование',
		'meta_description' => 'Добавить поставщика - Администрирование',
		'meta_keywords' => '',
		'page_h1' => 'Добавить поставщика - Администрирование',
		'css' => array('common', 'admin'),
		'js' => array('jquery.min', 'jquery-ui', 'ckeditor/ckeditor', 'ckfinder/ckfinder', 'tinymce.init', 'admin'),
		'form' => $form
	);
}

function get_save_data()
{
	return array(
		'redirect_url' => '/admin/items/suppliers/',
		'table_to_save' => 'suppliers',
		'filed_for_where' => 'id'
	);
}

function get_remove_url()
{
	return '/admin/delete/suppliers/';
}