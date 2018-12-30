<div class="container">
	<h1>{page_h1}<a href="/" target="_blank">Перейти на сайт</a></h1>
	<div class="tools-bar">
		<a href="/admin/">Главная страница "админки"</a>
		<?php
			$page = $this->uri->segment(3);
			$salesman = $this->session->userdata('r') == 'salesman';

			$allow_edit = (	($salesman == FALSE)) OR ( ($page != 'goods') AND ($salesman  == FALSE));

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
		<?php if($allow_edit) { //ACL ?>
		<a id="add" class="tools-button" href="<?=$add_button_url?>">Добавить</a>
		<?php } ?>
		<a id="back" class="tools-button" href="/admin">На главную</a>
		
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
		
		<?php if ( isset($filters) ) { ?>
		<div id="filters">
			<?php show_filters($filters); ?>
		</div>
		<?php } ?>
	</div>
	<div class="tools-bar pagination">
		Записей: <?=$total_records?>, <?=$pagination_links?>
	</div>
	<div id="admin_table">
		<table id="<?php echo $context; ?>" <?php if(isset($table_classes)) { ?>class="<?php echo $table_classes; ?>"<?php } ?>>
			<thead>
    			<tr>
    			<?php foreach ($content_table_titles as $item) { ?>
    				<th><?=$item?></th>
    			<?php } ?>
    				<th>Редактировать</th>
    			</tr>
			</thead>
			<tbody>
    			<?php foreach ($content_table as $k=>$item) { ?>
    			<tr id="id_<?=$item[$id]?>">
    				<?php foreach ($table_fields as $fn) { ?>
    				<td><?=$item[$fn]?></td>
    				<?php } ?>
    				<td>
    					<small><a title="Редактировать запись" href="<?=str_replace('(id)', $item[$id], $edit_button_url)?>">Ред</a></small>
    					<?php if($allow_edit) { //ACL ?>
    					<small><a class="tools-button red del_link" href="<?=str_replace('(id)', $item[$id], $del_button_url)?>">удал</a></small>
    					<?php } ?>
    				</td>
    			</tr>
    			<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="tools-bar pagination">
		<?=$pagination_links?>
	</div>
</div>