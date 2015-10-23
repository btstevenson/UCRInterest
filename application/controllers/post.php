<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('pic', 'Picture', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim');

		if($this->form_validation->run())
		{
			$this->load->model('post_model');
			$this->registration_model->register_user();
		}
	}
}