<?php
function get_init_data($key_val)
{
	return array(
		'table'	=> 'goods',
		'key'	=> 'id',
		'value'	=> $key_val
	);
}

function page_item_fields()
{
	/* Массив массивов с описанием полей.
	 1. Тип поля
	 2. Подпись
	 3. Источник, если это зависимое поле (таблица источник, значение и подпись значения в списке)
	 4. Флаг, нужен ли процессинг для поля
	 5. Параметры для процессинга. Тут, блять, ничего не поймешь...
	*/
	return array(
		'id'			=> array('hidden', 'ID страницы'),
		'url'			=> array('text', 'Адрес страницы c товаром', 'mandatory'=>TRUE),
		'title'			=> array('text', 'Название товара', 'mandatory'=>TRUE),
		'tags'			=> array('text', 'Метки товара (через запятую)'),
		'tags'			=> array('text', 'Метки товара (через запятую)'),
		'keywords'		=> array('text', 'Ключевые слова (Мета-тег)', 'mandatory'=>TRUE),
		'meta_description'=> array('text', 'Описание (Мета-тег)', 'mandatory'=>TRUE),
		'price'			=> array('money', 'Цена товара'),
		'dc_price'		=> array('money', 'Цена со скидкой'/*, array(
			'if_null' => 'ignore'), TRUE*/
		),
		'category_id'	=> array('tree', 'Категория', array(
			'source' => 'goods_categories',
			'key' => 'id',
			'caption_field' => 'title'
		), 'mandatory'=>TRUE),
		'vendor_id'		=> array('dropdown', 'Бренд', array(
			'source' => 'brands',
			'value' => 'id',
			'option' => 'title',
			'orderby' => 'title'), 'mandatory'=>TRUE),
		'supplier_id'       => array('dropdown', 'Поставщик', array(
            'source' => 'suppliers',
            'value' => 'id',
            'option' => 'name',
            'orderby' => 'name')),
        'on_export'     => array('radio', 'Товар на других сайтах?'),
		'exists'		=> array('radio', 'Товар в наличии?'),
		'special'		=> array('radio', 'Обратить внимание?'),
		'is_new'		=> array('radio', 'Это новинка?'),
		'is_sale'		=> array('radio', 'Товар в распродаже?'),
		'is_quest'		=> array('radio', 'Товар в изучении?'),
		'preorder'		=> array('radio', 'Товар по предзаказу?'),
		'code'			=> array('text', 'Код товара'),
		'image'			=> array('image', 'Изображение', NULL, TRUE, 'params' => array(
			'path' => './images/goods/',
			'thumb' => TRUE
		)),
		'short_description' => array('text', 'Краткое описание'),
		'description'	=> array('editor', 'Описание / инструкция')
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
		'redirect_url' => '/admin/items/goods/',
		'table_to_save' => 'goods',
		'filed_for_where' => 'id'
	);
}

function get_remove_url()
{
	return '/admin/delete/good/';
}