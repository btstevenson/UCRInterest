<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = "Profile";
		$this->is_logged_in();
	}

	public function index()
	{
		$this->load->view('template/main_layout', $this->data);
		$this->load->view('profile_view');
	}

	public function display()
	{

	}

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in !== true)
		{
			echo 'You are not logged in. Please login or register';
			redirect('Login');
		}
	}
}