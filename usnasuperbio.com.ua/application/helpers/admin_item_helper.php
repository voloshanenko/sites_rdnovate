<?php
function get_init_data($key_val)
{
	return array(
		'table'	=> 'system_admins',
		'key'	=> 'id',
		'value'	=> $key_val
	);
}

function page_item_fields()
{
	return array(
		'id'			=> array('hidden', 'Id'),
		'login'			=> array('text', 'Логин'),
		'password'		=> array('password', 'Пароль', NULL, TRUE),
		'locked'		=> array('radio', 'Заблокирован?'),
		'role'	=> array('dropdown', 'Роль пользователя', array(
			'source' => 'admins_roles',
			'value' => 'role_name',
			'option' => 'role_label',
			'orderby' => 'role_label')
		)
	);
}

function generate_data($form, $data = NULL)
{
	if($data !== NULL)
	{
		return array(
			'meta_title' => $data['login'].' - Редактирование - Администрирование',
			'meta_description' => $data['login'].' - Редактирование - Администрирование',
			'meta_keywords' => '',
			'page_h1' => $data['login'].' - Редактирование - Администрирование',
			'css' => array('common', 'admin'),
			'form' => $form
		);
	}
	return array(
		'meta_title' => 'Добавить Администратора',
		'meta_description' => 'Добавить Администратора',
		'meta_keywords' => '',
		'page_h1' => 'Добавить Администратора',
		'css' => array('common', 'admin'),
		'form' => $form
	);
}

function get_save_data()
{
	return array(
		'redirect_url' => '/admin/items/admin/',
		'table_to_save' => 'system_admins',
		'filed_for_where' => 'id'
	);
}
function get_remove_url()
{
	return '/admin/delete/pc/';
}