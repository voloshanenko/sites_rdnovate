<?php
class Dataprocessor
{
	private $ci;

	function __construct()
	{
		$this->ci =& get_instance();
	}

	public function run($field, $value = '')
	{
		if(isset($field) AND is_array($field))
		{
			switch($field[0])
			{
				case 'password':
					if( $value ) {
						return $this->process_password($value);
						break;
					} else {
						break;
					}
				case 'money':
					return $this->process_money($value);
					break;
			}
		}
	}

	private function process_password($value)
	{
		return md5($value);
	}

	private function process_money($value)
	{
		if($value > 0)
		{
			$value = trim($value);
			$value = str_replace(',', '.', $value);
			$value = str_replace(" ", '', $value);
			return $value;
		}
		else
		{
			return NULL;
		}
	}

	public function process_files($field, $idx)
	{
		$upload_data = $this->upload_file($field, $idx);
		switch($field[0])
		{
			case 'image':
				if($field['params']['thumb'] === TRUE)
				{
					$this->prepare_image($upload_data);
				}
				return substr($field['params']['path'].$idx.'/'.$upload_data['file_name'], 1);
				break;
			case 'file':
				return substr($field['params']['path'].$idx.'/'.$upload_data['file_name'], 1);
				break;
		}
	}

	public function process_oldfiles($iname, $row)
	{
		if( $row[$iname] )
		{
			if(file_exists('.'.$row[$iname]))
			{
				unlink('.'.$row[$iname]);
			}
			$thumb = $this->gen_thumb_name('.'.$row[$iname]);
			if(file_exists($thumb))
			{
				unlink($thumb);
			}
		}
	}

	private function upload_file($field, $idx)
	{
		if( ! file_exists($field['params']['path'].$idx.'/'))
		{
			mkdir($field['params']['path'].$idx.'/',0775,TRUE);
		}
		$config['upload_path'] = $field['params']['path'].$idx.'/';
		$config['allowed_types'] = 'gif|jpg|png|xls|doc|pdf|docx|xlsx|zip|rar|ppt|pptx';
		$config['overwrite'] = TRUE;
		$config['max_size'] = '10000000';
		$config['max_width'] = '4000';
		$config['max_height'] = '4000';

		$this->ci->load->library('upload', $config);

		if ( ! $this->ci->upload->do_upload($field[0]))
		{
			$error = $this->ci->upload->display_errors();
			exit;
		}
		else
		{
			return $this->ci->upload->data();
		}
	}

	private function prepare_image($file_data)
	{
		$this->ci->load->library('image_lib');
		$this->ci->config->load('site');
		if( $file_data['image_width'] > 400 OR $file_data['image_height'] > 390 )
		{
			$config['image_library'] = 'gd2';
			$config['source_image'] = $file_data['full_path'];
			$config['maintain_ratio'] = TRUE;
			$config['width'] = $this->ci->config->item('image_width');
			$config['height'] = $this->ci->config->item('image_height');
			$this->ci->image_lib->initialize($config);
			empty( $config );
			if( !$this->ci->image_lib->resize() )
			{
				echo $this->ci->image_lib->display_errors(); exit;
			}
			$this->ci->image_lib->clear();
		}

		$path = $file_data['full_path'];
		$ext = substr($path, strlen($path) - 4, strlen($path));
		$nam = substr($path, 0, strlen($path) - 4);
		$src = $nam.'_thumb'.$ext;
		copy($path, $src);

		$config['image_library'] = 'gd2';
		$config['source_image'] = $src;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = $this->ci->config->item('thumb_image_width');
		$config['height'] = $this->ci->config->item('thumb_image_height');
		$this->ci->image_lib->initialize($config);
		empty( $config );
		if( !$this->ci->image_lib->resize() )
		{
			echo $this->ci->image_lib->display_errors(); exit;
		}

		$this->ci->image_lib->clear();
	}

	private function gen_thumb_name($path)
	{
		if($path)
		{
			$ext = substr($path, strlen($path) - 4, strlen($path));
			$nam = substr($path, 0, strlen($path) - 4);
			return $nam.'_thumb'.$ext;
		}
	}
}