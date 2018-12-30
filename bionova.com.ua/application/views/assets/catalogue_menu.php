<?php
function get_menu($arr)
{
	_print_ul(_prep_array($arr));
}

function clb_sort($a, $b)
{
	return strcmp($a['title'], $b['title']);
}

function _print_ul($menu_arr)
{
	usort($menu_arr, "clb_sort");
	echo '<ul class="menu_tree">';
	foreach($menu_arr as $k)
	{
		echo '<li><a href="/'.$k['url'].'">'.$k['title']."</a>";
		if( isset($k['childs']))
		{
			_print_ul($k['childs']);
		}
		echo "</li>";
	}
	echo "</ul>";
}

function _prep_array($table)
{
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
?>

<div id="catalogue-menu">
	<?php get_menu($cat_menu_arr); ?>
</div>