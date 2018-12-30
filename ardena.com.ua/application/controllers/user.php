<?php
class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagecomposer');
		$this->load->model('user_model', 'um'); $this->load->helper('form');
	}

	function login()
	{
		$this->load->helper('security');
		$data = xss_clean($_POST);
		if( $val = $this->um->check_admin($data) )
		{
			echo $val;
		}
		else 
		{
			if($user = $this->um->check_user_by_password($data))
			{
				$this->session->set_userdata(array(
					'real_name' => $user['name'],
					'email' => $user['email'],
					'id' => $user['id']
				));
				echo "1";
			}
			else
			{
				echo "0";
			}
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}

	function registration()
	{
		$form_valid = FALSE;
		$login_exists = FALSE;
		$captcha_ok = FALSE;
		if($_POST)
		{
			if( $this->um->user_exists($_POST) )
			{
				$_POST['msg'] = 'Такие логин и e-mail уже луществуют в системе. Eсли Вы были зарегистрированы ранее, попробуйте восстановить пароль.';
				$login_exists = FALSE;
			}
			else
			{
				$login_exists = TRUE;
			}

			$expiration = time()-7200; // Two hour limit
			$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
			// Then see if a captcha exists:
			$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
			$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
			$query = $this->db->query($sql, $binds);
			$row = $query->row();
			if ($row->count == 0)
			{
			    $_POST['captcha_msg'] = 'Неверный ввод. Попробуйте, пожалуйста, снова.';
			    $captcha_ok = FALSE;
			}
			else
			{
				unset($_POST['captcha']);
				$captcha_ok = TRUE;
			}

			$this->load->library('form_validation');
			$pwd = $_POST['password'];
			$this->form_validation->set_message('required', 'Поле %s обязательно для заполнения');
			$this->form_validation->set_message('valid_email', 'Поле %s должно содержать корректный E-mail адрес');
			$this->form_validation->set_message('min_length', 'В поле %s введено слишком мало символов');
			$this->form_validation->set_message('max_length', 'В поле %s введено слишком много символов');
			$this->form_validation->set_message('alpha', 'В поле %s могут содержаться только латинские символы без пробелов и знаков подчеркивания');
			$this->form_validation->set_message('alpha_numeric', 'В поле %s могут содержаться только латинские символы и числа');

			$this->form_validation->set_rules('login', 'Логин', 'trim|alpha|required|min_length[4]|max_length[15]|xss_clean');
			$this->form_validation->set_rules('password', 'Пароль', 'trim|alpha_numeric|required|md5|min_length[4]|xss_clean');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('name', 'Имя', 'trim|required|xss_clean');
			$this->form_validation->set_rules('phone', 'Телефон', 'trim|required|xss_clean');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$form_valid = $this->form_validation->run();

			if ( ! $form_valid OR ! $login_exists OR ! $captcha_ok )
			{
				$_POST['password'] = $pwd;
				echo $this->load->view('user/registration_form', $_POST, true);
			}
			else
			{
				if( $this->um->user_exists($_POST) )
				{
					$_POST['msg'] = 'Такие логин и e-mail уже луществуют в системе. Eсли Вы были зарегистрированы ранее, попробуйте восстановить пароль.';
					echo $this->load->view('user/registration_form', $_POST, true);
				}
				else
				{
					$user_id = $this->um->add_user($_POST);
					$this->session->set_userdata(array(
						'real_name' => $_POST['name'],
						'id' => $user_id
					));
					$this->send_email_to_user($_POST['email'], $_POST['login'], $pwd);
					//$this->send_email_to_admin($_POST['login'], $_POST['password']);
					echo $this->load->view('user/reg_compl', null, true);
				}
			}
		}
		else
		{
			echo $this->load->view('user/registration_form', null, true);
		}
	}

	public function cabinet()
	{
		if( $this->session->userdata('id') )
		{
			$data = array(
				'meta_title' => 'Мой кабинет',
				'meta_keywords' => 'Мой кабинет',
				'meta_description' => 'Мой кабинет',
				'page_h1' => 'Мой кабинет',
				'css' => array('common', 'front'),
				'js' => array('jquery.min', 'jquery.cookie', 'user'),
				'user' => $this->um->get_user($this->session->userdata('id')),
				//'orders' => $this->um->get_users_orders($this->session->userdata('id'))
			);
			$this->pagecomposer->compose_frontend('user/cabinet', $data);
		}
	}

	public function update()
	{
		if($_POST)
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('login', 'Логин', 'trim|required|min_length[4]|max_length[15]');
			$this->form_validation->set_rules('password', 'Пароль', 'trim|min_length[4]');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
			$this->form_validation->set_rules('name', 'Имя', 'trim|required');
			$this->form_validation->set_rules('phone', 'Телефон', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			if ($this->form_validation->run() == FALSE)
			{
				$data = array(
					'meta_title' => 'Мой кабинет',
					'meta_keywords' => 'Мой кабинет',
					'meta_description' => 'Мой кабинет',
					'page_h1' => 'Мой кабинет',
					'css' => array('common', 'front'),
					'js' => array('jquery.min', 'jquery.cookie', 'user'),
					'user' => $this->um->get_user($this->session->userdata('id')),
					'orders' => $this->um->get_users_orders($this->session->userdata('id'))
				);
				$this->pagecomposer->compose_frontend('user/cabinet', $data);
			}
			else
			{
				$this->um->update_user($_POST);
				redirect('user/cabinet');
			}
		}
	}

	public function remind()
	{
		if($_POST)
		{
			$this->load->helper('security');
			$data = xss_clean($_POST);
			$user = $this->um->get_user_by_email($data['email']);
			if( is_array($user) )
			{
				$this->load->helper('string');
				$new_pwd = random_string('alnum', 10);
				$this->um->update_password($user['id'], $new_pwd);
				$this->send_remind_email($user['email'], $new_pwd);
				$data = array(
                    'meta_title' => 'Восстановление пароля',
                    'meta_keywords' => 'Восстановление пароля',
                    'meta_description' => 'Восстановление пароля',
                    'page_h1' => 'Восстановление пароля',
                    'success' => TRUE,
                    'useremail' => $_POST['email'],
                    'css' => array('common', 'front'),
                    'js' => array('jquery.min', 'jquery.cookie', 'user')
                );
                $this->pagecomposer->compose_frontend('user/remind_pwd', $data);
			}
            else
            {
                $data = array(
                    'meta_title' => 'Восстановление пароля',
                    'meta_keywords' => 'Восстановление пароля',
                    'meta_description' => 'Восстановление пароля',
                    'page_h1' => 'Восстановление пароля',
                    'wrongEmail' => TRUE,
                    'useremail' => $_POST['email'],
                    'css' => array('common', 'front'),
                    'js' => array('jquery.min', 'jquery.cookie', 'user')
                );
                $this->pagecomposer->compose_frontend('user/remind_pwd', $data);
            }
		}
		else
		{
			$data = array(
				'meta_title' => 'Восстановление пароля',
				'meta_keywords' => 'Восстановление пароля',
				'meta_description' => 'Восстановление пароля',
				'page_h1' => 'Восстановление пароля',
				'css' => array('common', 'front'),
				'js' => array('jquery.min', 'jquery.cookie', 'user')
			);
			$this->pagecomposer->compose_frontend('user/remind_pwd', $data);
		}
	}

	private function send_remind_email($mail, $new_pwd)
	{
		$this->config->load('site');
		$config['mailtype'] = 'html';
		$this->load->library('email', $config);

		$this->email->from($this->config->item('from_email'), $this->config->item('from_name'));
		$this->email->to($mail);

		$this->email->subject($this->config->item('from_name').': Ваш новый пароль');
		$this->email->message($this->load->view('user/new_password', array(
			'password' => $new_pwd,
			'letter_end' => $this->get_contents('legal')
		), TRUE));

		$this->email->send();
	}

	private function send_email_to_user($email, $login, $pwd)
	{
		$this->config->load('site');
		$config['mailtype'] = 'html';
		$this->load->library('email', $config);

		$this->email->from($this->config->item('from_email'), $this->config->item('from_name'));
		$this->email->to($email);

		$this->email->subject($this->config->item('from_name').': Спасибо за регистрацию!');
		$this->email->message($this->load->view('user/newuser_email', array(
			'login' => $login,
			'pwd' => $pwd,
            'letter_end' => $this->get_contents('legal')
		), TRUE));

		$this->email->send();
	}

	private function send_email_to_admin($login, $pwd)
	{
		$this->config->load('site');
		$config['mailtype'] = 'html';
		$this->load->library('email', $config);

		$this->email->from($this->config->item('from_email'), $this->config->item('from_name'));
		$this->email->to($this->config->item('spam_email'));

		$this->email->subject($this->config->item('from_name').': Новый заказ');
		$this->email->message($this->load->view('user/admin_newuser_email', array(
			'login' => $login,
			'pwd' => $pwd,
            'letter_end' => $this->get_contents('legal')
		), TRUE));

		$this->email->send();
	}
    
    private function get_contents($file)
    {
        $filename = getcwd().'/textblocks/'.$file.'.php';
        return file_get_contents($filename);
    }
}