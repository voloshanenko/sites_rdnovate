<?php
function get_init_data($key_val)
{
	return array(
		'table'	=> 'goods_categories',
		'key'	=> 'id',
		'value'	=> $key_val
	);
}

function page_item_fields()
{
	return array(
		'id'			=> array('hidden', 'ID'),
		'parent_id'		=> array('tree', 'Родительская категория', array(
			'source' => 'goods_categories',
			'caption_field' => 'title',
			'key' => 'id',
			'prevent_id' => TRUE
		)),
		'url'			=> array('text', 'Адрес страницы', 'mandatory'=>TRUE),
		'title'			=> array('text', 'Заголовок категории', 'mandatory'=>TRUE),
		'keywords'		=> array('text', 'Ключевые слова', 'mandatory'=>TRUE),
		'description'	=> array('text', 'Описание', 'mandatory'=>TRUE),
		'caption'		=> array('text', 'Подпись в меню', 'mandatory'=>TRUE),
		'cat_description'=> array('editor', 'Описание категории')
	);
}

function generate_data($form, $data = NULL)
{
	if($data !== NULL)
	{
		return array(
			'meta_title' => 'Категории товаров - Редактирование - Администрирование',
			'meta_description' => 'Категории товаров - Редактирование - Администрирование',
			'meta_keywords' => '',
			'page_h1' => 'Категории товаров - Редактирование - Администрирование',
			'css' => array('common', 'admin'),
			'js' => array('jquery.min', 'tiny_mce/tiny_mce', 'tinymce.init', 'admin'),
			'form' => $form
		);
	}
	return array(
		'meta_title' => 'Добавить категорию - Администрирование',
		'meta_description' => 'Добавить категорию - Администрирование',
		'meta_keywords' => '',
		'page_h1' => 'Добавить категорию - Администрирование',
		'css' => array('common', 'admin'),
		'js' => array('jquery.min', 'jquery-ui', 'ckeditor/ckeditor', 'ckfinder/ckfinder', 'tinymce.init', 'admin'),
		'form' => $form
	);
}

function get_save_data()
{
	return array(
		'redirect_url' => '/admin/items/gc/',
		'table_to_save' => 'goods_categories',
		'filed_for_where' => 'id'
	);
}

function get_remove_url()
{
	return '/admin/delete/gc/';
}