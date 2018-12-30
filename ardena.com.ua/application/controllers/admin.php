<?php
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->check_auth();
		$this->load->library('pagecomposer');
		$this->load->model('admin_model');
	}

	public function index()
	{
		if( $_POST )
		{
			$this->save_config($_POST);
		}
		$data = array(
			'meta_title' => 'Администрирование',
			'meta_description' => 'Администрирование',
			'meta_keywords' => '',
			'page_h1' => 'Администрирование',
			'content' => '',
			'css' => array('common', 'admin', 'start/jquery-ui'),
			'js' => array('jquery.min', 'jquery-ui', 'ckeditor/ckeditor', 'ckfinder/ckfinder', 'tinymce.init', 'admin')
		);
		$this->pagecomposer->compose_page('admin/index', $data);
	}

	/**
	 * Функция выводит список элементов, взятых из БД. Параметр $context определяет
	 * что именно будет выводиться. Данные берутся из файла по имени $context.'_list'
	 * из папки helpers. В этих файлах описана схема данных.
	 *
	 * Функция generate_content описывает таблицу в админке.
	 *
	 * Функция get_initdb_data возвращает данные для инициализации.
	 * Если задан параметр Type, то вид будет соответсвовать параметру, иначе, если не задан,
	 * то таблица.
	 *
	 * @param string $context
	 */
	public function items($context, $offset = 0, $filters_string = '')
	{
		$this->load->helper('admin_filters');
		$this->load->helper($context.'_list');
		$init = get_initdb_data();
        $basic = get_basic_data();
		if( isset($init['type']) AND $init['type'] == 'tree' )
		{
			$content = $this->admin_model->get_fields_from_table($init, $offset, $filters_string, FALSE); // false - is used for remove limits, load all rows from table
			$data = array_merge($basic, generate_content($content));
			$data['context'] = $context;
			$this->pagecomposer->compose_page('admin/items_tree', $data);
		}
		else if ( ! isset($init['type']) )
		{
            $total_records = $this->admin_model->get_num_recs($init, $filters_string);;
			$content = $this->admin_model->get_fields_from_table($init, $offset, $filters_string);
			$data = array_merge($basic, generate_content($content));
// Pagination -------------------------------------------------------
			$this->load->library('pagination');
			$config['base_url'] = '/admin/items/'.$context.'/';
			$config['total_rows'] = $total_records;
			$config['per_page'] = '50';
			$config['uri_segment'] = 4;
			$config['num_links'] = 20;
			$this->pagination->initialize($config);
			$data['pagination_links'] = $this->pagination->create_links();
// END of Pagination ------------------------------------------------
			$data['context'] = $context;
            $data['total_records'] = $total_records;
			$this->pagecomposer->compose_page('admin/items_list', $data);
			$data = array_merge($basic, generate_content($content));
		}

	}

	/**
	 *
	 * Функция добавляет запись в БД или создает форму для этого.
	 *
	 * Описания для формы берутся из файла application/helpers/<$context>_item_helper.php
	 *
	 * ест ПОСТ-данных нет, то генерится форма. С Хелпере tools есть функция tools_make_array_form,
	 * которая по описанию из функции page_item_fields (хелпер, опис. выше) выдает массив,
	 * по которому функция generate_data() создает уже саму форму.
	 *
	 * т.е., для тупых: все что нужно будет в будущем, это описывать поля БД в хелпере и все.
	 *
	 * Когда приходят данные, process_input_data запускает библиотеку dataprocessor, которая очищает данные от
	 * попыток взлома и, если надо, производит модификации с входящими данными (например, пароль шифрует).
	 *
	 * Там же, если загружены файлы, смотрим на описание соответствующего поля и делаем соотв. движения.
	 *
	 * @param string $context параметр, передающийся в url для определения хеопера с описанием таблицы БД
	 */
	public function add($context = '', $offset = 0, $filter = '')
	{
		if($_POST)
		{
			$action = $_POST['action'];
			unset($_POST['action']);

			$this->load->helper($context.'_item');
			$data = get_save_data();

			if($action == 'cancel')
			{
				redirect($data['redirect_url']."$offset/$filter");
				return;
			}

			$input = $this->process_post_data($context, $_POST);
			$idx = $this->admin_model->add_record($data['table_to_save'], $data['filed_for_where'], $input);
			$this->process_input_files($context, $input, $idx);
			if($action == 'save')
			{
				redirect($data['redirect_url']."$offset/$filter");
			}
			else if($action == 'save_new')
			{
				redirect('/admin/add/'.$context."/$offset/$filter");
			}
		}
		else
		{
			$this->load->helper($context.'_item');
			$this->load->helper('tools');
			$data = generate_data(tools_make_array_form(page_item_fields()));
			$this->pagecomposer->compose_page('admin/item_edit', $data);
		}
	}

	public function edit($context = '', $key = '', $offset = 0, $filter = '')
	{
		if($_POST)
		{
			$action = $_POST['action'];
			unset($_POST['action']);

			$this->load->helper($context.'_item');
			$data = get_save_data();

			if($action == 'cancel')
			{
				redirect($data['redirect_url']."$offset/$filter");
				return;
			}

			$input = $this->process_post_data($context, $_POST);
			$idx = $this->admin_model->update_record($data['table_to_save'], $data['filed_for_where'], $input);
			$input[$data['filed_for_where']] = $idx;
			$this->process_input_files($context, $input, $idx);
			if($action == 'save')
				redirect($data['redirect_url']."$offset/$filter");
			else if($action == 'save_new')
				redirect('/admin/add/'.$context."/$offset/$filter");
		}
		else
		{
			$this->load->helper($context.'_item');
			$this->load->helper('tools');
			$item_data = $this->admin_model->get_item(get_init_data($key));
			$data =
			generate_data (
				tools_make_array_form(
						page_item_fields(),
						$item_data
				),
				$item_data
			);
			$data['js'] = array('jquery.min', 'jquery-ui', 'ckeditor/ckeditor', 'ckfinder/ckfinder', 'tinymce.init', 'admin');
			$data['del_button_url'] = get_remove_url() . $key . '/' . $offset . '/' . $filter;
			$this->pagecomposer->compose_page('admin/item_edit', $data);
		}
	}

	public function delete($context, $key)
	{
		$this->load->helper($context.'_item');
		$data = get_save_data();
		$this->admin_model->del_record($data['table_to_save'], $data['filed_for_where'], $key);
		if(isset($_POST['back']) && $_POST['back'] = 'true')
		{
			echo $data['redirect_url'].'0/';
		}
		else
		{
			echo '1';
		}
	}

	public function search()
	{
		$this->load->helper($_POST['context'].'_list');
		$cnt = generate_content('');
		$data = array(
			'context' => $this->uri->segment(3),
			'word' => $this->unhtmlentities($_POST['word']),
			'table' => $cnt['search']['table'],
			'fields' => $cnt['search']['fields'],
			'orderby' => $cnt['search']['orderby']
		);
		$results['fields'] = $cnt['search']['fields'];
		$results['link_field'] = $cnt['search']['link_field'];
		$results['key'] = $cnt['search']['key'];
		$results['link'] = $cnt['search']['link'];
		$results['s4'] = $_POST['s4'];
		$results['s5'] = $_POST['s5'];
		$results['items'] = $this->admin_model->search($data);
		echo $this->load->view('admin/search_results', $results, TRUE);
	}

	/**
	 * Handler for jQuery UI sorting
	 */
	public function sort_table()
	{
		$cntr = 1;
		$context = $_POST['context'];
		unset($_POST['context']);
		$this->load->helper($context.'_list');
		$init = get_initdb_data();

		foreach($_POST['id'] as $id) {
			$this->admin_model->reorder($init['table'], $init['key_field'], $id, $cntr);
			$cntr++;
		}
	}

	/*
	 * CSV Export / Import
	 * -----------------------------------------------------------------------------*/
	function get_csv($type = 'goods')
	{
		$action = $type . '_to_csv';
		$this->load->helper('download');
		$data = $this->admin_model->$action();
		$name = 'export_'.$type.'_'.date('d-m-Y_H:i:s').'.csv';
		force_download($name, $data);
	}

	public function upload_csv()
	{
		$config['upload_path'] = './uploadfiles/';
		$config['max_size']	= '100000';
		$config['allowed_types'] = 'csv|txt';
		$config['overwrite'] = TRUE;
		$config['file_name'] = 'import_'.date('d-m-Y_H:i:s').'.csv';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			echo "<script>alert('Ошибка при загрузке файла: ".$this->upload->display_errors()."'); window.location.href = '/admin';</script>";
		}
		else
		{
			$this->admin_model->apply_csv($this->upload->data());
		}
	}

	// -----------------------------------------------------------------------------

	public function autocomplete()
	{
		$this->load->helper('security');
		$data = xss_clean($_POST);

		echo $this->admin_model->{'search_'.$data['where'].'_by_'.$data['column']}( $data['param'] );
	}

	public function save_file()
	{
		$filename = getcwd().'/textblocks/'.$_POST['file'].'.php';
		if( ! file_exists($filename) )
		{
			echo "File not exists";
		}
		if( ! is_writable($filename) )
		{
			echo "File not writable.";
		}
		file_put_contents($filename, $_POST['content']);
		echo "Сохранено!";
	}

	private function process_post_data($context, $post_data)
	{
		$this->load->helper($context.'_item');
		//$input = $this->clean_input($post_data);
		$input = $post_data;
		$this->load->library('dataprocessor');
		$fields_data = page_item_fields();
		$init_data = get_init_data(1);
		foreach ($input as $k=>$v)
		{
			if(isset($fields_data[$k][3]) AND $fields_data[$k][3] === TRUE)
			{
				$val = $this->dataprocessor->run($fields_data[$k], $input[$k]);
				if($val)
				{
					$input[$k] = $val;
				}
				else
				{
					unset($input[$k]);
				}
			}
		}
		return $input;
	}

	private function save_config($data)
	{
		$this->load->helper('array_to_string');
		$path = getcwd().'/application/config/site.php';
		$file = fopen($path, 'w+') or die('1: Configuration file is now writeable!');
		fwrite($file,"<?php\r\n");
		set_array_to_file($file,$data,"\$config");
		fclose($file);
	}

	private function unhtmlentities ($string)
	{
	   $trans_tbl = get_html_translation_table(HTML_ENTITIES);
	   $trans_tbl = array_flip ($trans_tbl);
	   $ret = strtr ($string, $trans_tbl);
	   return  preg_replace('/\&\#([0-9]+)\;/me', "chr('\\1')",$ret);
	}

	private function clean_input($data)
	{
		$this->load->helper('security');
		return xss_clean($data);
	}

	private function process_input_files($context, $post_data, $idx)
	{
		$this->load->helper($context.'_item');
		$input = array();
		$this->load->library('dataprocessor');
		$fields_data = page_item_fields();
		$init_data = get_init_data(1);
		if($_FILES)
		{
			foreach ($_FILES as $iname => $ival)
			{
				if($_FILES[$iname]['tmp_name'])
				{
					$row = $this->admin_model->get_row($init_data['table'], $init_data['key'], $idx);
					$this->dataprocessor->process_oldfiles($iname, $row);
					$input[$iname] = $this->dataprocessor->process_files($fields_data[$iname], $idx);
					$this->admin_model->update_row($init_data['table'], $init_data['key'], $idx, $input);
				}
			}
		}
	}

	private function check_auth()
	{
		if( $this->session->userdata('r') == FALSE )
		{
			redirect('/');
		}
	}

}