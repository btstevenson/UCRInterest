<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run())
		{
			$this->load->model('login_model');
			$result = $this->login_model->login_user();
			if ($result)
			{
				$data = array(
						'username' => $this->input->post('username'),
						'is_logged_in' => true
					);
				$this->session->set_userdata($data);
				redirect('Profile');
			}
			else
			{
				echo "Wrong username or password\r\n";
				echo "Forgot password? Too bad.\r\n";
				$this->load->view('login_view');
			}

		}
		else
		{
			$this->load->view('login_view');
		}


	}
}