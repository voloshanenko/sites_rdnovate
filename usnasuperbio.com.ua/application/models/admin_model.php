<?php
class Admin_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function search_products_by_title($param)
	{
		$this->db->select('id, title')->from('goods')->like('title', $param);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return json_encode($query->result_array());
		}
		return '';
	}

	public function search_pages_by_title($param)
	{
		$this->db->select('id, title')->from('pages')->like('title', $param);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return json_encode($query->result_array());
		}
		return '';
	}

	public function goods_to_csv()
	{
		$this->db->query('set names utf8');

		//Prepare query for transform it to CSV
		$SQL = 'SELECT
		g.id, g.title, g.code, g.price, g.dc_price, g.exists, g.special, g.preorder, b.title as `brand`, gs.name as `supplier`, gc.title as `category`, g.tags
		FROM `goods` as `g`
		LEFT JOIN `goods_categories` as `gc` ON g.category_id = gc.id
		LEFT JOIN `brands` as `b` ON g.vendor_id = b.id
		LEFT JOIN `suppliers` as `gs` ON g.supplier_id = gs.id
        ORDER BY `g`.`title`';
		$query = $this->db->query($SQL);

		//Transforming query to CSV
		$this->load->dbutil();
		return $this->dbutil->csv_from_result($query, ';');
	}

	public function orders_to_csv()
	{
		$this->db->query('set names utf8');
		$query = $this->db->get('orders');
		$result = $query->result_array();

		$eol = (PHP_EOL == "\r\n") ? "\n" : "\r\n";
		$csv = '"id";"date";"client_name";"client_email";"client_mobile";"products";"total";"delivery";"postal_code";"delivery_address";"payment";"comments"'."\n";

		foreach($result as $row)
		{
			$products = unserialize($row['products']);
			$new_products = '';
			foreach($products as $prod)
				$new_products .= "$prod[name] ($prod[qty] x $prod[price] грн), ";

			$user = unserialize($row['user']);

			$row['delivery'] = (isset($row['delivery']) ? $row['delivery'] : 'н/у');
			$row['delivery_addr'] = (isset($user['delivery_addr']) ? $user['delivery_addr'] : 'н/у');
            $row['postal_code'] = (isset($user['delivery_index']) ? $user['delivery_index'] : 'н/у');
			$row['payment'] = (isset($row['payment']) ? $row['payment'] : 'н/у');
			
			$user['name'] = (isset($user['name']) && $user['name']) ? $user['name'] : '-Не указано-';
			$user['email'] = (isset($user['email']) && $user['email']) ? $user['email'] : '-Не указано-';
			$user['phone'] = (isset($user['phone']) && $user['phone']) ? $user['phone'] : '-Не указано-';
			
			$temp = array($row['id'], $row['date'], $user['name'], $user['email'], $user['phone'], $new_products, $row['summ'], $row['delivery'], $row['postal_code'], $row['delivery_addr'], $row['payment'], $row['comments']);

			$csv .= $this->array2csv_line($temp);
		}
		return $csv; // $this->Utf8ToWin($csv); //@iconv( "UTF-8", "CP1251//TRANSLIT", $csv);
	}

    private function Utf8ToWin($fcontents) {
        $out = $c1 = '';
        $byte2 = false;
        for ($c = 0;$c < strlen($fcontents);$c++) {
            $i = ord($fcontents[$c]);
            if ($i <= 127) {
                $out .= $fcontents[$c];
            }
            if ($byte2) {
                $new_c2 = ($c1 & 3) * 64 + ($i & 63);
                $new_c1 = ($c1 >> 2) & 5;
                $new_i = $new_c1 * 256 + $new_c2;
                if ($new_i == 1025) {
                    $out_i = 168;
                } else {
                    if ($new_i == 1105) {
                        $out_i = 184;
                    } else {
                        $out_i = $new_i - 848;
                    }
                }
                // UKRAINIAN fix
                switch ($out_i){
                    case 262: $out_i=179;break;// і
                    case 182: $out_i=178;break;// І
                    case 260: $out_i=186;break;// є
                    case 180: $out_i=170;break;// Є
                    case 263: $out_i=191;break;// ї
                    case 183: $out_i=175;break;// Ї
                    case 321: $out_i=180;break;// ґ
                    case 320: $out_i=165;break;// Ґ
                }
                $out .= chr($out_i);
               
                $byte2 = false;
            }
            if ( ( $i >> 5) == 6) {
                $c1 = $i;
                $byte2 = true;
            }
        }
        return $out;
    }

	public function comments_to_csv() // exporting comments for products
	{
		$this->db->query('set names utf8');
//Prepare query for transform it to CSV
		$SQL = 'SELECT gc.id, gc.date, g.title, gc.text FROM `goods_comments` as `gc` LEFT JOIN `goods` as `g` ON gc.good_id = g.id';
		$query = $this->db->query($SQL);
//Transforming query to CSV
		$this->load->dbutil();
		return $this->dbutil->csv_from_result($query, ';'); // iconv( "UTF-8", "CP1251", $this->dbutil->csv_from_result($query, ';') );
	}

	public function feedbacks_to_csv() // exporting comments for pages
	{
		$this->db->query('set names utf8');
//Prepare query for transform it to CSV
		$SQL = 'SELECT f.id, f.date, pc.caption as `page_category`, p.title as `page_title`, f.text FROM `page_comments` as `f` LEFT JOIN `pages` as `p` ON f.page_url = p.url LEFT JOIN `pages_categories` as `pc` ON p.category_id = pc.id';
		$query = $this->db->query($SQL);
//Transforming query to CSV
		$this->load->dbutil();
		return $this->dbutil->csv_from_result($query, ';'); // iconv( "UTF-8", "CP1251", $this->dbutil->csv_from_result($query, ';') );
	}

	public function pages_to_csv()
	{
		$this->db->query('set names utf8');
//Prepare query for transform it to CSV
		$SQL = 'SELECT
		p.id, p.`url`, pc.caption as `page_category`, p.title, p.tags, p.keywords, p.description, p.need_comments
		FROM `pages` as `p`
		LEFT JOIN `pages_categories` as `pc` ON p.category_id = pc.id';
		$query = $this->db->query($SQL);
//Transforming query to CSV
		$this->load->dbutil();
		return $this->dbutil->csv_from_result($query, ';'); // iconv( "UTF-8", "CP1251", $this->dbutil->csv_from_result($query, ';') );
	}

	public function apply_csv($data)
	{
		echo "<h3>Проводится импорт товаров на сайт.</h3>";
		echo '<a href="/admin/items/goods/0">Перейти в товары</a> или <a href="/admin">перейти в админку</a>.<br />';
		echo "<p>Ниже приводится процесс импорта:</p><br /><pre>";

		$file = iconv( "CP1251", "UTF-8", trim(file_get_contents($data['full_path'])) );
		unlink($data['full_path']);

		$lines = explode("\n", $file);

		$keys = explode(";", str_replace('"', "", trim($lines[0])) );
        unset($lines[0]); // remove line with column titles

		$iteration = 1;
        $this->db->trans_start();
		foreach ($lines as $line)
		{
			$values = explode(";", trim($line));

			$val = array();
			foreach($values as $v)
			{
				if( (substr($v, 0, 1) == '"') AND (substr($v, -1, 1) == '"') )
				{
					$val[] = trim(substr($v, 1, strlen($v)-2));
				}
				else
				{
					$val[] = trim($v);
				}
			}

			$row = array_combine($keys, $val);
            $this->db->where('id', $row['id']);
            unset($row['id']); unset($row['brand']); unset($row['category']); unset($row['']);

			echo "Iteration $iteration:\n"; print_r($row); echo "\n"; $iteration++;

			$this->db->update('goods', $row);
		}
        $this->db->trans_complete();

		echo "</pre><h3>Импорт успешно выполнен.</h3>";
	}

	public function get_table($table, $fields = '', $order = '', $prevent = FALSE, $value = NULL)
	{
		if($fields)
		{
			$this->db->select($fields);
		}
		if($order)
		{
			$this->db->order_by($order, 'ASC');
		}
		if($prevent AND $value > -1)
		{
			$this->db->where('id != ', $value);
		}
		$query = $this->db->get($table);
		return $query->result_array();
	}

	public function get_num_recs($init, $filters_string)
	{
		if($filters_string != '')
		{
			$where = $this->parse_filter_string($filters_string);
			$this->db->where($where);
		}
		$query = $this->db->get($init['table']);
		return $query->num_rows();
	}

	public function get_fields_from_table($init, $offset = 0, $filters_string = '', $limit = TRUE)
	{
		$data = array();

		if($filters_string != '')
		{
			$where = $this->parse_filter_string($filters_string);
			$this->db->where($where);
		}

		$this->db->select($init['fields']);
        
        

		if(isset($init['orderby']))
			$this->db->order_by($init['orderby'], isset($init['orderdir'])?$init['orderdir']:'ASC');
		
        if(isset($init['relations']))
            foreach($init['relations'] as $res)
               $this->db->join($res['table'], $res['on'], 'left')->select($res['fields']);

		if($limit)
			$query = $this->db->get($init['table'], 50, $offset);
		else
			$query = $this->db->get($init['table']);

        $data = array_values($query->result_array());

        if(isset($init['fields_decoration'])) {
            foreach($data as &$row) {
                foreach ($init['fields_decoration'] as $fieldName => $decor) {
                    if($row[$fieldName]) {
                        $str = $decor['pattern'];
                        foreach ($decor['replace'] as $search) {
                            $str = str_replace($search, $row[$search], $str);
                        }
                        $row[$fieldName] = $str;
                    } else {
                        $row[$fieldName] = '-';
                    }
                }
                unset($row);
            }
        }
        
		return $data;
	}

	public function get_row($t, $k, $v)
	{
		$query = $this->db->get_where($t, array($k => $v));
		return $query->row_array();
	}

	public function get_item($data)
	{
		$query = $this->db->get_where($data['table'], array($data['key'] => $data['value']));
		return $query->row_array();
	}

	public function get_cell($table, $key, $val, $cell)
	{
		$query = $this->db->get_where($table, array($key => $val));
		$arr = $query->row_array();
		return $arr[$cell];
	}

	/**
	 * update_record
	 *
	 * Функция, которая обновляет запись в БД
	 * @param string $table Строка с названием таблицы
	 * @param string $key Стркоа с названием ключевого поля
	 * @param array $data Массив данных
	 */
	public function update_record($table, $key, $data)
	{
		$idx =  $data[$key];
		unset($data[$key]);
		$this->db->where($key, $idx);
		$this->db->update($table, $data);
		return $idx;
	}

	public function update_row($table, $key, $val, $data)
	{
		$this->db->where($key, $val);
		$this->db->update($table, $data);
		return $val;
	}

	public function add_record($table, $key, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function del_record($table, $key, $value)
	{
		$this->db->where($key, $value);
		$this->db->delete($table);
	}

	public function reorder($table, $key_field, $kf_val, $ordr)
	{
		$this->db->where($key_field, $kf_val);
		$this->db->update($table, array(
			'ordering' => $ordr
		));
	}

	public function search($data)
	{
	    $sql = 'SELECT * FROM (`' . $data['table'] . '`) WHERE `id`=' . intval($data['word']) . ' OR ';
		$i = 1;
		$fields = explode(',', $data['fields']);
		foreach($fields as $v)
		{
			$sql .= " `$v` LIKE '%$data[word]%' ";
            if($i++ < count($fields)) {
                $sql .= ' OR ';
            }
		}
        $sql .= ' ORDER BY `' . $data['orderby'] . '` ASC';

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	 * В фильтр входит строка типа field1=value1:field2=value2
	 * Функция преобразовывает строку в массив вида array('field1' => 'value1', ...);
	 * @param unknown_type $string
	 */
	private function parse_filter_string($string)
	{
		$string = substr($string, 0, strlen($string)-1);
		$arr = array();
		$pairs = explode(':', $string);
		foreach ($pairs as $pair)
		{
			$kv = explode('=', $pair);
			$arr["$kv[0]"] = $kv[1];
		}
		return $arr;
	}

	private function array2csv_line($array, $delimiter = ';', $eclosure = '"')
	{
		$string = '';
		$array_len = count($array) - 1;
		foreach ($array as $key => $value)
		{
			$string .= $eclosure.$value.$eclosure;
			if( $key < $array_len)
				$string .= $delimiter;
		}
		return $string."\n";
	}
}