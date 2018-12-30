<?php
function get_init_data($key_val)
{
	return array(
		'table'	=> 'pages',
		'key'	=> 'id',
		'value'	=> $key_val
	);
}

function page_item_fields()
{
	return array(
		'id' => array('hidden', 'ID'),
		'url' => array('text', 'Адрес страницы', 'mandatory'=>TRUE),
		'title' => array('text', 'Заголовок страницы (МЕТА)', 'mandatory'=>TRUE),
		'keywords' => array('text', 'Ключевые слова (МЕТА)', 'mandatory'=>TRUE),
		'description' => array('text', 'Описание страницы (МЕТА)', 'mandatory'=>TRUE),
		'in_scroll' => array('radio', 'Показывать в прокрутке'),
		'show_onmain' => array('radio', 'Показывать на главной'),
		'need_comments' => array('radio', 'Включить комментарии для этой страницы?'),
		'category_id' => array('dropdown', 'Категория', array(
			'source' => 'pages_categories',
			'value' => 'id',
			'option' => 'caption',
			'orderby' => 'caption')
		),
		'tags' => array('text', 'Метки страницы (теги)'),
		'on_mainpage' => array('radio', 'Показывать как новость на главной'),
		'intro' => array('editor', 'Вводная часть'),
		'fulltext' => array('editor', 'Полная версия страницы')
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
			'js' => array('jquery.min', 'jquery-ui', 'ckeditor/ckeditor', 'ckfinder/ckfinder', 'tinymce.init', 'admin'),
			'form' => $form
		);
	}
	return array(
		'meta_title' => 'Добавить страницу - Администрирование',
		'meta_description' => 'Добавить страницу - Администрирование',
		'meta_keywords' => '',
		'page_h1' => 'Добавить страницу - Администрирование',
		'css' => array('common', 'admin'),
		'js' => array('jquery.min', 'jquery-ui', 'ckeditor/ckeditor', 'ckfinder/ckfinder', 'tinymce.init', 'admin'),
		'form' => $form
	);
}

function get_save_data()
{
	return array(
		'redirect_url' => '/admin/items/pages/',
		'table_to_save' => 'pages',
		'filed_for_where' => 'id'
	);
}

function get_remove_url()
{
	return '/admin/delete/page/';
}