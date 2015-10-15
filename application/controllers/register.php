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
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('DOB', 'DOB', 'required');

		if($this->form_validation->run())
		{
			$this->load->model('registration_model');
			$this->registration_model->register_user();
			redirect('Welcome');
		}
		else
		{
			$this->load->view('registration_view');
		}


	}
}