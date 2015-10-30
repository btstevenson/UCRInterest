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
		$this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
		$hold = array();
		 $sql = "SELECT * FROM users WHERE email = ?";
		 if($query = $this->db->query($sql, array($this->session->userdata('email'))))
		 {
		 	$hold['user_record'] = $query->result_array();	
		 }
		$this->load->view('user/profile_view', $hold);
		$this->load->view('template/footer');

		
	}

	public function display()
	{

	}

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in !== true)
		{
			redirect('user/login');
		}
	}
}