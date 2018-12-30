<?php
function get_initdb_data()
{
    return array(
        'table' => 'goods as g',
        'fields' => 'g.id as gid, g.url, g.title, g.price, g.exists, g.code, g.special, g.preorder, g.ordering',
        'orderby' => 'title',
        'relations' => array(
            array(
                'table' => 'suppliers as supp',
                'fields' => 'supp.name as supplier_name, supp.id as supplier_id',
                'on' => 'g.supplier_id = supp.id'
            ),
            array(
                'table' => 'goods_categories as gc',
                'fields' => 'gc.title as cat_title, gc.id as cat_id',
                'on' => 'g.category_id = gc.id'
            )
        ),
        'fields_decoration' => array(
            'supplier_name' => array(
                'pattern' => 'supplier_id: <a target="_blank" href="/admin/edit/supplier/supplier_id">supplier_name</a>',
                'replace' => array('supplier_id', 'supplier_name')
            ),
            'cat_title' => array(
                'pattern' => 'cat_id: <a target="_blank" href="/admin/edit/gc/cat_id">cat_title</a>',
                'replace' => array('cat_id', 'cat_title')
            )
        ),
        'key_field' => 'gid'
    );
}

function get_basic_data()
{
    $ci =& get_instance();
    $seg4 = $ci->uri->segment(4);
    $seg5 = $ci->uri->segment(5);
    return array(
        'meta_title'            => 'Товары - Администрирование',
        'meta_description'      => 'Товары - Администрирование',
        'meta_keywords'         => '',
        'css'                   => array('common', 'admin', 'start/jquery-ui'),
        'page_h1'               => 'Товары - Администрирование',
        'add_button_url'        => '/admin/add/good/'.$seg4.'/'.$seg5,
        'edit_button_url'       => '/admin/edit/good/(id)/'.$seg4.'/'.$seg5,
        'del_button_url'        => '/admin/delete/good/(id)/'.$seg4.'/'.$seg5,
        'js'                    => array('jquery.min','jquery-ui','user', 'admin')
    );
}

function generate_content($content)
{
    return array(
        'table_classes'         => '',
        'content_table_titles'  => array('Адрес', 'Заголовок', 'Цена', 'Наличие', 'Категория', 'Поставщик', 'Код ', 'Спец.', 'Предзаказ'),
        'content_table'         => $content,
        'table_fields'          => array('url', 'title', 'price', 'exists', 'cat_title', 'supplier_name', 'code', 'special', 'preorder'),
        'id'                    => 'gid',
        'filters'               => array(
            array(
                'type' => 'list',
                'caption' => 'Производитель',
                'param_name' => 'vendor_id',
                'table' => 'brands',
                'key' => 'id',
                'value' => 'title',
                'ordering' => 'title'
            ),
            array(
                'type' => 'list',
                'caption' => 'Поставщик',
                'param_name' => 'supplier_id',
                'table' => 'suppliers',
                'key' => 'id',
                'value' => 'name',
                'ordering' => 'name'
            ),
            array(
                'type' => 'tree',
                'caption' => 'Категория',
                'param_name' => 'category_id',
                'table' => 'goods_categories',
                'key' => 'id',
                'value' => 'title',
                'ordering' => 'parent_id'
            )
        ),
        'search'                => array(
            'table'     => 'goods',
            'fields'    => 'title,short_description',
            'orderby'   => 'title',
            'key'       => 'id',
            'link_field' => 'title',
            'link'      => '/admin/edit/good/%1$s/%2$s/%3$s'
        )
    );
}