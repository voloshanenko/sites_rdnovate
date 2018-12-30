<?php
function get_init_data($key_val)
{
	return array(
		'table'	=> 'facts',
		'key'	=> 'id',
		'value'	=> $key_val
	);
}

function page_item_fields()
{
	return array(
		'id'			=> array('hidden', 'Идентификатор'),
		'title'			=> array('text', 'Заголовок', 'mandatory'=>TRUE),
		'meta_title'	=> array('text', 'Заголовок (МЕТА)', 'mandatory'=>TRUE),
		'keywords'		=> array('text', 'Ключыевые слова (МЕТА)', 'mandatory'=>TRUE),
		'description'	=> array('text', 'Описание (МЕТА)', 'mandatory'=>TRUE),
		'text'			=> array('editor', 'Текст', 'mandatory'=>TRUE)
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
			'js' => array('jquery.min', 'tiny_mce/tiny_mce', 'tinymce.init', 'admin'),
			'form' => $form
		);
	}
	return array(
		'meta_title' => 'Добавить факт - Администрирование',
		'meta_description' => 'Добавить факт - Администрирование',
		'meta_keywords' => '',
		'page_h1' => 'Добавить факт - Администрирование',
		'css' => array('common', 'admin'),
		'js' => array('jquery.min', 'jquery-ui', 'ckeditor/ckeditor', 'ckfinder/ckfinder', 'tinymce.init', 'admin'),
		'form' => $form
	);
}

function get_save_data()
{
	return array(
		'redirect_url' => '/admin/items/fact/',
		'table_to_save' => 'facts',
		'filed_for_where' => 'id'
	);
}

function get_remove_url()
{
	return '/admin/delete/fact/';
}