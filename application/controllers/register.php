<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('registration_view');
	}

	public function validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('DOB', 'DOB', 'required');

		if($this->form_validation->run())
		{
			$this->load->model('registration_model');
			$this->registration_model->register_user();
			$data = array(
						'username' => $this->input->post('username'),
						'is_logged_in' => true
					);
			$this->session->set_userdata($data);
			redirect('Profile');
			$this->load->view('template/main_layout', $this->data);
		}
		else
		{
			$this->load->view('registration_view');
		}


	}
}