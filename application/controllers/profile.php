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
		$boards = array();
		 $sql = "SELECT uid, first_name, last_name FROM users WHERE email = ?";
		 if($query = $this->db->query($sql, array($this->session->userdata('email'))))
		 {
		 	$hold['user_record'] = $query->result_array();
		 	$row = $query->row();
		 	$sql = "SELECT name, description FROM boards WHERE uid = ?";
		 	if($query = $this->db->query($sql, $row->uid))
		 	{
		 		$boards['board_record'] = $query->result_array();	
		 	}
		 }
		$this->load->view('user/profile_view', $hold, $this->data);
		$this->load->view('user/board_view', $boards);
		$this->load->view('template/footer');	
	}

	public function display()
	{

	}

	public function board()
	{
		$this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
		$hold = array();
		$boards = array();
		 $sql = "SELECT uid, first_name, last_name FROM users WHERE email = ?";
		 if($query = $this->db->query($sql, array($this->session->userdata('email'))))
		 {
		 	$hold['user_record'] = $query->result_array();
		 	$row = $query->row();
		 	$sql = "SELECT name, description FROM boards WHERE uid = ?";
		 	if($query = $this->db->query($sql, $row->uid))
		 	{
		 		$boards['board_record'] = $query->result_array();	
		 	}
		 }
		$this->load->view('user/profile_view', $hold, $this->data);
		$this->load->view('user/board_view', $boards);
		$this->load->view('template/footer');
	}

	public function pins()
	{
		$this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
		$hold = array();
		$pins = array();
		 $sql = "SELECT uid, first_name, last_name FROM users WHERE email = ?";
		 if($query = $this->db->query($sql, array($this->session->userdata('email'))))
		 {
		 	$hold['user_record'] = $query->result_array();
		 	$this->load->model('profile_model');
		 	$pins['pin_record'] = $this->profile_model->get_posts();
		 }
		$this->load->view('user/profile_view', $hold, $this->data);
		$this->load->view('user/pins_view', $pins);
		$this->load->view('template/footer');
	}

	function create_board()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|is_unique[boards.name]');
		$this->form_validation->set_rules('description', 'Description', 'trim');

		if($this->form_validation->run())
		{
			$this->load->model('profile_model');
			$this->profile_model->insert_board();
			redirect('profile/board');
		}
		redirect('profile/board');
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