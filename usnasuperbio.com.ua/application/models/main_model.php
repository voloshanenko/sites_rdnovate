<?php
class Main_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function get_feedbacks($numb, $onmain=TRUE)
	{
		$data = array();
		$data = array_merge($this->get_goods_feedbacks($onmain), $this->get_pages_comments($onmain));
		shuffle($data);
		return $data;
	}

	public function get_goods_feedbacks($onmain)
	{
		$sql = "SELECT `goods`.title, `goods`.url, `users`.`name` AS `user_name`, `gc`.url AS `gcurl`, `users`.`line` AS `user_line`, `users`.`user_from` AS `user_from`, `goods_comments`.* 
		FROM `goods_comments`
			LEFT JOIN `goods` ON (`goods_comments`.good_id = `goods`.id)
			LEFT JOIN `users` ON (`goods_comments`.user_id = `users`.id)
			LEFT JOIN `goods_categories` AS `gc` ON (`goods`.category_id = `gc`.id)
		WHERE
			`goods_comments`.approved=1 ";
		if($onmain) $sql .= " AND `goods_comments`.show=1 ";
		$sql .= " ORDER BY 
			`goods_comments`.`id` DESC";
		$query = $this->db->query($sql);
		$data = $query->result_array();
		$res = array(); $i=0;
		foreach ($data as $c)
		{
			$i++;
			$c['c_type'] = 'fb';
			$res[$i] = $c;
		}
		return $res;
	}

	private function get_pages_comments($onmain)
	{
		$sql = "SELECT `pages`.title, `page_comments`.*, `users`.`name` AS `user_name`, `users`.`line` AS `user_line`, `users`.`user_from` AS `user_from` 
		FROM `page_comments` 
			LEFT JOIN `users` ON (`page_comments`.user_id = `users`.id)
			LEFT JOIN `pages` ON (`pages`.url = `page_comments`.`page_url`)
		WHERE `page_comments`.approved=1 ";
		if($onmain) $sql .= " AND `page_comments`.show=1 ";
		$sql .= " ORDER BY `page_comments`.`id` DESC";
		$query = $this->db->query($sql);
		$data = $query->result_array();
		$res = array(); $i=0;
		foreach ($data as $c)
		{
			$i++;
			$c['c_type'] = 'cm';
			$res[$i] = $c;
		}
		return $res;
	}
	
	/**
	 * Function `get_ads` return ads (pages) from specified category
	 *
	 * integer $category id of category ads are assigned to
	 * integer $ads_count how many ads will function return
	 */
	public function get_ads($category, $ads_count)
	{
		$this->db->select('url, title, intro');
		$this->db->where('category_id', $category);
		$this->db->where('in_scroll', '1');
		$query = $this->db->get('pages');
		$data = $query->result_array();
		shuffle($data);
		return array_slice($data, 0, $ads_count);
	}

	public function get_main_page_articles()
	{
		$pages = $this->db->get_where('pages', array('show_onmain' => 1));
		return $pages->result_array();
	}
	
	public function get_new_goods($num)
	{
		$sql = "SELECT goods.*, goods_categories.url as `gcurl` FROM goods JOIN goods_categories ON goods.category_id = goods_categories.id WHERE goods.is_new=1";
		$query = $this->db->query($sql);
		$list = $query->result_array();
		return $this->process_array($list, $num);
	}
	
	public function get_recommended_goods($num)
	{
		$sql = "SELECT goods.*, goods_categories.url as `gcurl` FROM goods JOIN goods_categories ON goods.category_id = goods_categories.id WHERE goods.special=1";
		$query = $this->db->query($sql);
		$list = $query->result_array();
		return $this->process_array($list, $num);
	}
	
	public function get_discounted_goods($num)
	{
		$sql = "SELECT goods.*, goods_categories.url as `gcurl` FROM goods JOIN goods_categories ON goods.category_id = goods_categories.id WHERE goods.dc_price>0 AND goods.is_sale=0";
		$query = $this->db->query($sql);
		$list = $query->result_array();
		return $this->process_array($list, $num);
	}
	
	public function get_sale_goods($num)
	{
		$sql = "SELECT goods.*, goods_categories.url as `gcurl` FROM goods JOIN goods_categories ON goods.category_id = goods_categories.id WHERE goods.is_sale=1";
		$query = $this->db->query($sql);
		$list = $query->result_array();
		return $this->process_array($list, $num);
	}
	
	public function get_marteking_goods($num)
	{
		$sql = "SELECT goods.*, goods_categories.url as `gcurl` FROM goods JOIN goods_categories ON goods.category_id = goods_categories.id WHERE goods.is_quest=1";
		$query = $this->db->query($sql);
		$list = $query->result_array();
		return $this->process_array($list, $num);
	}
    
    public function get_exported_goods()
    {
        // Добавить джойн для категории
        $this->db
            ->select('goods.url as url, goods_categories.url as curl, goods.title as gtitle, goods.price, dc_price, goods.short_description as sd, image')
            ->from('goods')
            ->join('goods_categories', 'goods_categories.id = goods.category_id')
            ->where('goods.on_export',1);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	private function process_array($list, $num)
	{
		$result = array();
		$check = array();
		$i = 1;
		if ( $num > count($list) ) { $num = count($list); }
		while ($i <= $num)
		{
			$idx = mt_rand(0, count($list)-1);
			if( ! in_array($list[$idx]['id'], $check))
			{
				$result[] = $list[$idx];
				array_push($check, $list[$idx]['id']);
				$i++;
			}
		}
		return $result;
	}
}