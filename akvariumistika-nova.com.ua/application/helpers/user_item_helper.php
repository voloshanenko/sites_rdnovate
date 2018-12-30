<?php
function get_init_data($key_val)
{
	return array(
		'table'	=> 'users',
		'key'	=> 'id',
		'value'	=> $key_val
	);
}

function page_item_fields()
{
	return array(
		'id'			=> array('hidden', 'Id'),
		'name'			=> array('text', 'Имя человека'),
		'login'			=> array('text', 'Логин'),
		'password'		=> array('password', 'Пароль', NULL, TRUE),
		'email'			=> array('text', 'E-mail клиента'),
		'phone'			=> array('text', 'Контактный тел.'),
		'line'			=> array('text', 'Клиент о себе'),
		'user_from'		=> array('text', 'Клиент из...'),
		'reg_date'		=> array('text', 'Дата регистрации'),
		'delivery_index'	=> array('text', 'Индекс'),
		'delivery_addr'		=> array('text', 'Адрес доставки'),
		'activated'		=> array('radio', 'Активирован ли клиент')
	);
}

function generate_data($form, $data = NULL)
{
	if($data !== NULL)
	{
		return array(
			'meta_title' => $data['name'].' - Редактирование - Администрирование',
			'meta_description' => $data['name'].' - Редактирование - Администрирование',
			'meta_keywords' => '',
			'page_h1' => $data['name'].' - Редактирование - Администрирование',
			'css' => array('common', 'admin'),
			'form' => $form
		);
	}
	return array(
		'meta_title' => 'Добавить клиента - Администрирование',
		'meta_description' => 'Добавить клиента - Администрирование',
		'meta_keywords' => '',
		'page_h1' => 'Добавить клиента - Администрирование',
		'css' => array('common', 'admin'),
		'form' => $form
	);
}

function get_save_data()
{
	return array(
		'redirect_url' => '/admin/items/users/',
		'table_to_save' => 'users',
		'filed_for_where' => 'id'
	);
}

function get_remove_url()
{
	return '/admin/delete/users/';
}