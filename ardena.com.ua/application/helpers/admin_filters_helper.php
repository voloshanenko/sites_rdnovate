<?php
function show_filters($filters)
{
	foreach ($filters as $filter)
	{
		echo '<div class="filter"><span style="float: left;">'.$filter['caption'].'</span>';
		switch ($filter['type'])
		{
			case 'list':
				build_dropdown_list($filter);
				break;
			case 'tree':
				build_tree_list($filter);
				break;
		}
		echo "</div>";
	}
}

function get_filter_value($key)
{
	$ci =& get_instance();
	$uri = $ci->uri->segment(5);
	if( !$uri ) {
		return NULL;
	}
	$start = strpos($uri, $key);
	if($start === FALSE)
	{
		return NULL;
	}
	else
	{
		$ns = str_replace(':', '', substr($uri, $start, strpos($uri, ':', $start)));
		$arr = explode('=', $ns);
		return $arr[1];
	}
}

function build_dropdown_list($data)
{
	$ev = get_filter_value($data['param_name']);
	echo '<select onchange="set_filter_url(\''.$data['param_name'].'\');" name="' .$data['param_name']. '" id="' .$data['param_name']. '">';
	$ci =& get_instance();
	$ci->load->model('admin_model');
	$values = $ci->admin_model->get_table($data['table'], $data['key'].', '.$data['value'], $data['ordering']);
	echo '<option value="-1">- Не имеет значения -</option>';
	foreach ($values as $v)
	{
		echo '<option value="'.$v[$data['key']].'"';
		if ($ev != NULL && $ev == $v[$data['key']]) { echo ' selected="selected"'; }
		echo'>'.$v[$data['value']].'</option>';
	}
	unset($ev);
	echo '</select>';
}

function build_tree_list($data)
{
	$ci =& get_instance();
	$ci->load->helper('tools');
	$evb = get_filter_value($data['param_name']);
	$selected = '';
	$path = get_parents($evb);
		if($path) {
			foreach($path as $a) {
				$selected .= $a['title']." / ";
		}
	}
	$cell = ($selected) ? $selected : '- не выбрано -';
	$table = $ci->admin_model->get_table($data['table'], $data['key'].', '.$data['value'].', parent_id', $data['ordering'], '', '');

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
	$array = $tree[0]['childs'];

	echo '<div class="filter_tree"><span class="parent-selected">'.$cell.'</span>'; unset($ev);
	echo '<input type="hidden" id="'.$data['param_name'].'" name="' .$data['param_name']. '" value="0">';
	echo '<br /><a href="" onclick="set_value(this, \''.$data['param_name'].'\', \'-1\', \'- Не выбрано -\'); set_filter_url(\''.$data['param_name'].'\'); return false;">- Не фильтровать -</a>';
	_arr_ul($data['param_name'], $array);
	echo '</div>';
}

function cab_sort($a, $b)
{
	return strcmp($a['title'], $b['title']);
}

function _arr_ul($elem, $arr)
{
	usort($arr, "cab_sort");
	echo '<ul class="admin_tree">';
	foreach($arr as $k)
	{
		echo '<li><a href=""';
		if( ! isset($k['childs']))
		{
			echo ' onclick="set_value(this, \''.$elem.'\', \''.$k['id'].'\', \''.str_replace("'", "\'", $k['title']).'\'); set_filter_url(\''.$elem.'\'); return false;"';
		}
		echo '>'.$k['title']."</a>";
		if( isset($k['childs']))
		{
			echo " <strong>+</strong>";
			_arr_ul($elem, $k['childs']);
		}
		echo "</li>";
	}
	echo "</ul>";
}