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
		$this->load->model('profile_model');
		$hold = array();
		$boards = array();
		$hold['user_record'] = $this->profile_model->get_user_info();
		$boards['board_record'] = $this->profile_model->get_boards();
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
		$this->load->model('profile_model');
		$hold = array();
		$boards = array();
		$hold['user_record'] = $this->profile_model->get_user_info();
		$boards['board_record'] = $this->profile_model->get_boards();
		$this->load->view('user/profile_view', $hold, $this->data);
		$this->load->view('user/board_view', $boards);
		$this->load->view('template/footer');
	}

	public function pins()
	{
		$this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
		$this->load->model('profile_model');
		$hold = array();
		$pins = array();
		$hold['user_record'] = $this->profile_model->get_user_info();
		$pins['pin_record'] = $this->profile_model->get_posts();
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

	function edit_board()
	{
		$this->load->model('profile_model');
		$this->profile_model->update_board();
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

	function delete_board()
	{
		$this->load->model('profile_model');
		$this->profile_model->remove_board();
		redirect('profile/board');
	}
}