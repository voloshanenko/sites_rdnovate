<?php
function tools_make_array_form($fields, $values = NULL)
{
	$data = array();
	foreach ($fields as $key => $vl)
	{
		if($vl[0] != 'tree')
		{
			$data[$key]['type'] = $vl[0];
			$data[$key]['caption'] = $vl[1];
			if ( isset($vl['mandatory']) AND $vl['mandatory'] === TRUE ) {
				$data[$key]['mandatory'] = TRUE;
			}
			$data[$key]['value'] = ($values !== NULL)?$values[$key]:'';
			if(isset($vl[2]))
			{
				if( isset($vl[2]['source']) )
				{
					$data[$key]['rel_data'] = tools_get_related_data($vl[2]);
				}
			}
		}
		else if($vl[0] == 'tree')
		{
			$data[$key]['type'] = $vl[0];
			$data[$key]['caption'] = $vl[1];
			if ( isset($vl['mandatory']) AND $vl['mandatory'] === TRUE ) {
				$data[$key]['mandatory'] = TRUE;
			}
			$data[$key]['value'] = ($values !== NULL) ? $values[$key] : '';
			$data[$key]['rel_data'] = $vl[2];
		}
	}
	return $data;
}

function tools_get_related_data($data)
{
		$i = 0;
		$result = array();
		$ci =& get_instance();
		$ci->load->model('admin_model');
		$query = $ci->admin_model->get_table($data['source'], $data['value'].', '.$data['option'], $data['orderby']);
		foreach ($query as $row)
		{
			$i++;
			$result[$i]['v'] = $row[$data['value']];
			$result[$i]['o'] = $row[$data['option']];
		}
		return $result; 
}
/**
 *
 * В зависимости от типа поля выдает его html код и заполняет значением.
 * Вызывается уже в view.
 * @param string $k строка с именем поля
 * @param array $field массив, в кот. поле описано.
 */
function make_form_element($k, $field)
{
	$fltr = parse_filter_string();
	if( ! empty($fltr) AND empty($field['value']) AND array_key_exists($k, $fltr) )
	{
		echo '<input type="hidden" value="';
		echo $field['value'] ? $field['value'] : $fltr[$k];
		echo '" name="'.$k.'" />';
	}
	else
	{
		if( isset($field['mandatory']) AND $field['mandatory'] === TRUE ) {
			echo '<td class="item_edit_field required-field">'.$field['caption'].':</td><td>';
		} else {
			echo '<td class="item_edit_field">'.$field['caption'].':</td><td>';
		}
		switch ($field['type']) {
			case 'text':
				echo '<input value="'.$field['value'].'" type="text" name="'.$k.'"/>';
				break;
			case 'money':
				echo '<input value="';
				echo $field['value'] ? $field['value'] : '0.00';
				echo '" tyle="text" name="'.$k.'" style="text-align: right" /> грн';
				break;
			case 'list':
				echo '<select name="'.$k.'" size="15">';
				echo '<option value="-1">-- не указано --</option>';
				foreach ($field['rel_data'] as $opt)
				{
					echo '<option';
					echo ($opt['v'] == $field['value'])?' selected="selected"':'';
					echo ' value="'.$opt['v'].'">'.$opt['o'].'</option>';
				}
				echo "</select>";
				break;
			case 'dropdown':
				echo '<select name="'.$k.'" size="1">';
				echo '<option value="-1">-- не указано --</option>';
				foreach ($field['rel_data'] as $opt)
				{
					echo '<option';
					echo ($opt['v'] == $field['value']) ? ' selected="selected"' : '';
					echo ' value="'.$opt['v'].'">'.$opt['o'].'</option>';
				}
				echo "</select>";
				break;
			case 'file':
				echo '<input type="file" name="'.$k.'"/>';
				break;
			case 'image':
				echo '<input type="file" name="'.$k.'" />';
				echo ($field['value'] != '') ? '<br /><a href="'.$field['value'].'" target="_blank"><img src="'._gen_thumb_img_name($field['value']).'" alt="" /></a>' : '';
				break;
			case 'radio':
				echo '<input type="radio" name="'.$k.'" value="1" ';
				echo ($field['value'] == 1) ? ' checked="checked"' : '';
				echo' /> Да, <input type="radio" name="'.$k.'" ';
				echo ($field['value'] == 0) ? ' checked="checked"' : '';
				echo' value="0" /> Нет';
				break;
			case 'editor':
				echo '<textarea class="ckeditor" id="'.$k.'" name="'.$k.'">'.$field['value'].'</textarea>';
				break;
			case 'password':
				echo '<input type="password" name="'.$k.'" />';
				break;
			case 'hidden':
				echo '<input type="hidden" value="'.$field['value'].'" name="'.$k.'" />'.$field['value'];
				break;
			case 'tree':
				$ci =& get_instance();
				if( $field['value'] )
				{
					$selected = '';
					$path = get_parents($field['value']);
					if($path) {
						foreach($path as $a) {
							$selected .= $a['title']." / ";
						}
					}
					//$selected = $ci->admin_model->get_cell($field['rel_data']['source'], $field['rel_data']['key'], $field['value'], $field['rel_data']['caption_field']);
				}
				echo '<input type="hidden" name="'.$k.'" id="pid-'.$k.'" value="'.$field['value'].'" /><span class="parent-selected">'.(isset($selected)?'Выбрано: '.$selected:'').'</span><br /><a href="" onclick="set_value(this, \'pid-parent_id\', \'0\', \'В Корень\'); return false;">Самый верхний уровень</a>';
				echo generate_tree_from_array("pid-".$k, $field['rel_data'], $ci->uri->segment('4'));
				break;
		}
		echo '</td>';
	}
}

function parse_filter_string()
{
	$ci =& get_instance();
	$act = $ci->uri->segment(2);
	if($act == 'add')
	{
		$string = $ci->uri->segment(5);
	}
	else if($act == 'edit')
	{
		$string = $ci->uri->segment(6);
	}
	if($string)
	{
		$string = substr($string, 0, strlen($string)-1);
		$arr = array();
		$pairs = explode(':', $string);
		foreach ($pairs as $pair)
		{
			$kv = explode('=', $pair);
			$arr[$kv[0]] = $kv[1];
		}
		return $arr;
	}
}

function _gen_thumb_img_name($path)
{
	if($path)
	{
    	   $ext = substr($path, strlen($path) - 4, strlen($path));
    	   $nam = substr($path, 0, strlen($path) - 4);
    	   return $nam.'_thumb'.$ext;
	}
	else
	{
		echo "/images/noimage.gif";
	}
}

function product_price($item)
{
	if($item['dc_price'] > 0)
	{
		echo '<span class="old-price">'.number_format($item['price'], 2, '.', ' ').' грн.</span><br /><span class="new-price">'.number_format($item['dc_price'], 2, '.', ' ').'</span> грн.';
	}
	else
	{
		echo '<span class="product-price">'.number_format($item['price'], 2, '.', ' ').'</span> грн';
	}
}

/**
 * generate_tree_from_array
 * Эта функция выполняет две функции, которые строят дерево.
 * @param string $elem имя hidden-input-элемента, в который будет записан id-выбранного элемента дерева.
 * @param array $init массив, в котором есть имя таблицы с деревом.
 */
function generate_tree_from_array($elem, $init, $value = -1)
{
	$arr = _get_array_from_table( $init['source'], isset($init['prevent_id']), $value );
	 _arr2ul($elem, $arr);
}

function cllb_sort($a, $b)
{
	return strcmp($a['title'], $b['title']);
}

/**
 * _arr2ul
 * Эта рекурсивная функция пишет на прямую ul-li дерево, основываясь на массив, который построен из таблицы БД по parent_id
 * @param string $elem Это параметр определяет имя hidden-input-элемента, в который будет записан id
 * выбранного в дереве пункта.
 * @param array $arr массив с деревом. 
 */ 
function _arr2ul($elem, $arr)
{
	usort($arr, "cllb_sort");
	echo '<ul class="admin_tree">';
	foreach($arr as $k)
	{
		echo '<li><a href=""';
		echo ' onclick="set_value(this, \''.$elem.'\', \''.$k['id'].'\', \''.str_replace("'", "\'", $k['title']).'\'); return false;"';
		echo '>'.$k['title']."</a>";
		if( isset($k['childs']))
		{
			echo " <strong>+</strong>";
			_arr2ul($elem, $k['childs']);
		}
		echo "</li>";
	}
	echo "</ul>";
}

/**
 * _get_array_from_table
 * Эта функция строит массив из считанной таблицы с деревом.
 * @param string $table имя таблицы, из которой надо считывать.
 */
function _get_array_from_table($table, $prevent, $value = -1)
{
	$ci =& get_instance();
	$ci->load->model('admin_model');
	$table = $ci->admin_model->get_table($table, 'id, parent_id, title', 'parent_id', $prevent, $value);

	$tree=array(0=>array('id'=>0, 'parent_id'=>0, 'value'=>'root'));
	$temp=array(0=>&$tree[0]);

	foreach ($table as $val)
	{
	    $parent = &$temp[ $val['parent_id'] ];
	    if (!isset($parent['childs'])) { $parent['childs'] = array(); }
	    $parent['childs'][$val['id']] = $val;
	    $temp[$val['id']] = &$parent['childs'][$val['id']];
	}
	unset($rs,$temp,$val,$parent);
	return $tree[0]['childs'];
}

/* Get path
 ---------------------------------------------------------------------------- */
function get_parents($cid, $array=NULL)
{
	$path_array = array();
	$table = $array;
	if($array == NULL)
	{
		$ci =& get_instance();
		$ci->db->select('id, parent_id, url, title');
		$q = $ci->db->get('goods_categories');
		$table = $q->result_array();
	}
	$branch = find_tree_branch($cid, $table);
	$path_array[] = $branch;
	while ( $branch['parent_id'] != 0 )
	{
		$branch = find_tree_branch($branch['parent_id'], $table);
		$path_array[] = $branch;
	}
	return array_reverse($path_array);
}
	
function find_tree_branch($current_id, $array)
{
	foreach ($array as $a)
	{
		if( $a['id'] == $current_id )
		{
			return $a;
		}
	}
}