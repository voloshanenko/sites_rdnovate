<div class="container">
	<h1>{page_h1}</h1>
	<div style="text-align: right"><a href="/" target="_blank">Перейти на сайт</a></div>
	<div class="tools-bar">
		<a href="/admin/">Главная страница "админки"</a>
		<?php
			$superadmin = $this->session->userdata('r') == 'superadmin';
			$admin = $this->session->userdata('r') == 'admin';

			$this->load->config('acl');

			$acl = $this->config->item( 'acl_' . $this->session->userdata('r') );
			$acl_arr = explode(',', $acl);
			
			$pages = $this->config->item('acl_pages');
			$pgs_arr = explode(',', $pages);
			
			foreach($acl_arr as $possible)
			{
				if( in_array($possible, $pgs_arr) )
				{
					$label = $this->config->item( 'mt_' . $possible );
					echo ' | <a href="/admin/items/' . $possible . '/0/">' . $label . '</a>';
				}
			}
		?>
	</div>
	<div class="tools-bar">
		<div class="tools-button" id="add">
			<a href="<?=$add_button_url?>">Добавить</a>
		</div>
		<div class="tools-button" id="back">
			<a href="/admin">На главную</a>
		</div>
		<?php if ( isset($filters) ) { ?>
		<div id="filters">
			<?php show_filters($filters); ?>
		</div>
		<?php } ?>
		<?php if ( isset($search) ) { ?>
		<div id="seach-box">
			Поиск:
			<input type="text" id="search-word" />
			<input type="hidden" id="context" value="<?=$this->uri->segment(3)?>" />
			<input type="hidden" id="s4" value="<?=$this->uri->segment(4)?>" />
			<input type="hidden" id="s5" value="<?=$this->uri->segment(5)?>" />
			<button id="go-search">Давай!</button>
			<div id="search-overlay">
				<div id="search-title"><a href="">Закрыть</a></div>
				<div id="search-content"></div>
			</div>
		</div>
		<?php } ?>
	</div>
	<div id="admin_tree_wrapper">
		<?php get_menu($content_table, $id, $edit_button_url, $del_button_url); ?>
	</div>
</div>
<?php
function get_menu($arr, $id, $edit_url, $del_url)
{
	_print_ul(_prep_array($arr), $id, $edit_url, $del_url);
}

function cb_sort($a, $b)
{
	return strcmp($a['title'], $b['title']);
}

function _print_ul($menu_arr, $id, $edit_url, $del_url)
{
	usort($menu_arr, "cb_sort");
	echo '<ul>';
	foreach($menu_arr as $k)
	{
		echo '<li><a href="'.str_replace('(id)', $k[$id], $edit_url).'">'.$k['title'].'</a>';
		echo '&nbsp;&nbsp;<span><a href="'.str_replace('(id)', $k[$id], $del_url).'" class="del_link">[удалить]</a></span>';
		if( isset($k['childs']))
		{
			_print_ul($k['childs'], $id, $edit_url, $del_url);
		}
		echo "</li>";
	}
	echo "</ul>";
}

function _prep_array($table)
{
	$tree=array(0=>array('id'=>0, 'parent_id'=>0, 'title'=>'root'));
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