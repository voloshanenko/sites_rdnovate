<?php
class Search_model extends CI_Model
{
  private $goods_categories_array = array();

  function __construct()
  {
    $this->load->helper('tools');
    $this->get_goods_cats();
    parent::__construct();
  }

  private function get_goods_cats()
  {
    $this->db->select('id, parent_id, url, title');
    $q = $this->db->get('goods_categories');
    $this->goods_categories_array = $q->result_array();
  }

  function find_goods_by_word($word)
  {
    if( ! $word ) return NULL;
    $result = array();

    $sql = "SELECT goods.*, goods_categories.url as `gcurl`, brands.title as `brand_name`
FROM goods JOIN goods_categories ON goods.category_id = goods_categories.id left join brands on brands.id = goods.vendor_id
WHERE goods.title like '%$word%' OR goods.code='$word' OR goods.id='$word' OR goods.short_description LIKE '%$word%' ORDER BY goods.title";
    $query = $this->db->query($sql);
    $items = $query->result_array();

    foreach ($items as $item)
    {
      $item['path'] = get_parents($item['category_id'], $this->goods_categories_array);
      $result[] = $item;
    }

    return $result;
  }

  function find_goods_by_letter($letter)
  {
    $result = array();
    $letter = $this->unhtmlentities($letter);

    $sql = "SELECT goods.*, goods_categories.url as `gcurl`, brands.title as `brand_name`
FROM goods JOIN goods_categories ON goods.category_id = goods_categories.id left join brands on brands.id = goods.vendor_id
WHERE goods.title LIKE '".$letter."%' ORDER BY goods.title";
    $query = $this->db->query($sql);
    $items = $query->result_array();
    
    foreach ($items as $item)
    {
      $item['path'] = get_parents($item['category_id'], $this->goods_categories_array);
      $result[] = $item;
    }
    
    return $result;
  }

  function search_by_tag($tag)
  {
    $result = array();
    $sql = "SELECT goods.*, goods_categories.url as `gcurl`, brands.title as `brand_name`
FROM goods JOIN goods_categories ON goods.category_id = goods_categories.id left join brands on brands.id = goods.vendor_id
WHERE goods.tags LIKE '%".$tag."%' ORDER BY goods.title";
    $query = $this->db->query($sql);
    $items = $query->result_array();
    
    foreach ($items as $item)
    {
      $item['path'] = get_parents($item['category_id'], $this->goods_categories_array);
      $result[] = $item;
    }
    
    return $result;
  }

  private function unhtmlentities ($string)
  {
     $trans_tbl = get_html_translation_table(HTML_ENTITIES);
     $trans_tbl = array_flip ($trans_tbl);
     $ret = strtr ($string, $trans_tbl);
     return  preg_replace('/\&\#([0-9]+)\;/me', "chr('\\1')",$ret);
  }
}