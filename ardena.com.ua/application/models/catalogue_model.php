<?php
class Catalogue_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_category_by_url($url)
    {
        $query = $this->db->get_where('goods_categories', array('url' => $url));
        return $query->row_array();
    }
    
    function get_category_by_id($id)
    {
        $query = $this->db->get_where('goods_categories', array('id' => $id));
        return $query->row_array();
    }

    function get_items_count($url)
    {
        $this->db->where('url', $url);
        $this->db->select('id');
        $query = $this->db->get('goods_categories');
        $result = $query->result_array();
        $cat_id = $result[0]['id'];

        $this->db->where('category_id', $cat_id);
        return $this->db->count_all_results('goods');
    }

    function get_category_contents($url, $page, $limit)
    {
        $cat = $this->get_category_by_url($url);
        $result = array();
        $col = $this->session->userdata('col');
        $ord = ($this->session->userdata('ord')) ? $this->session->userdata('ord') : 'ASC';
        $ordering = '';

        if($col)
        {
            if( $col == 'price' )
            {
                $ordering = "ORDER BY goods.`dc_price` $ord, goods.`price` $ord";
            }
            else
            {
                $ordering = "ORDER BY `$col` $ord";
            }
        }
        else
        {
            $ordering = "ORDER BY `title` ASC";
        }

        $filter = ($this->session->userdata('fv')) ? $this->session->userdata('fv') : -1;
        $filtering = '';
        if($filter != -1)
        {
            $filtering = " AND vendor_id='$filter'";
        }

        $sql = "SELECT goods.*, brands.title AS `brand_name`, brands.description AS `brand_desc`
        FROM goods LEFT JOIN brands ON brands.id = goods.vendor_id WHERE goods.category_id = $cat[id] $filtering $ordering LIMIT $page, $limit";
        $items_query = $this->db->query($sql);
        $result['items'] = ($items_query->num_rows() > 0) ? $items_query->result_array() : NULL;

        $cat_query = $this->db->get_where('goods_categories', array('url' => $url));
        $result['category'] = ($cat_query->num_rows() > 0) ? $cat_query->row_array() : NULL;

        return $result;
    }

    function get_feedbacks($url)
    {
        $sql = "SELECT `goods`.title, `users`.`name` AS `user_name`, `users`.`line` AS `user_line`, `users`.`user_from` AS `user_from`, `goods_comments`.* 
        FROM `goods_comments`
            LEFT JOIN `goods` ON (`goods_comments`.good_id = `goods`.id)
            LEFT JOIN `users` ON (`goods_comments`.user_id = `users`.id)
        WHERE
            `goods_comments`.approved=1 AND `goods`.url='$url'
        ORDER BY `goods_comments`.`id` DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_vendors($id)
    {
        $sql = '
SELECT DISTINCT
  brands.id, brands.title, brands.description
FROM
  brands LEFT JOIN goods ON brands.id = goods.vendor_id
  right JOIN goods_categories ON goods.category_id = goods_categories.id
WHERE
  goods_categories.url = \''.$id.'\'
ORDER BY brands.title ASC';
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    function get_item_info($url)
    {
        
        $this->db->select('goods.*, brands.title as brand_name')
                 ->where('url', $url)
                 ->join('brands', 'brands.id = goods.vendor_id', 'left');
        $query = $this->db->get('goods');
        return $query->row_array();
    }
    
    function get_item_by_id($id)
    {
        $query = $this->db->get_where('goods', array('id' => $id));
        return $query->row_array();
    }
    
    function get_parents($cid)
    {
        $this->load->helper('tools');
        return get_parents($cid);
    }

    function get_other_items_from_cat($cat_id, $curr_item_url)
    {
        $sql = "SELECT goods.title, goods.url, goods.image, goods.price, goods_categories.url as `gcurl`
FROM goods JOIN goods_categories ON goods.category_id = goods_categories.id
WHERE goods.category_id = '".$cat_id."' AND goods.url != '".$curr_item_url."' LIMIT 8";
        $items_query = $this->db->query($sql);
        return ($items_query->num_rows() > 0) ? $items_query->result_array() : NULL;
    }

    function add_comment($data)
    {
        $data['date'] = date('Y-m-d');
        $data['approved'] = 0;
        $data['show'] = 0;
        $data['text'] = trim(htmlspecialchars(strip_tags($data['text'])));
        $this->db->insert('goods_comments', $data);
    }
    
    function update_comment($id, $text)
    {
        $this->db->where('id', $id);
        $this->db->update('goods_comments', array(
            'text' => $text
        ));
    }
}