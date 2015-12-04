<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public $friend_uid = 0;
	function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = "Profile";
		$this->is_logged_in();
		
		$this->load->model("notif_model");
		$global_notifs = $this->notif_model->load_global();
		if(count($global_notifs[0]) > 0)
			$this->session->set_userdata("global_notif", true);
		else
			$this->session->set_userdata("global_notif", false);

		$friend_notifs = $this->notif_model->load_friends_notifs();
		if(count($friend_notifs[0]) > 0)
			$this->session->set_userdata("friend_notif", true);
		else
			$this->session->set_userdata("friend_notif", false);
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
		$board =$this->uri->segment(3);
		$hold = array();
		$pins = array();
		$pins['pin_record'] = $this->profile_model->get_posts($board);
		$hold['user_record'] = $this->profile_model->get_user_info();
		$this->load->view('user/profile_view', $hold, $this->data);
		$this->load->view('user/pins_view', $pins);
		$this->load->view('template/footer');
	}

	public function likes()
	{ 
		$this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
		$this->load->model('profile_model');
		$hold = array();
		$likes = array();
		$hold['user_record'] = $this->profile_model->get_user_info();
		$likes['likes_record'] = $this->profile_model->get_likes();
		$this->load->view('user/profile_view', $hold, $this->data);
		$this->load->view('user/likes_view', $likes);
		$this->load->view('template/footer');

	}

	public function friends_boards($uid)
	{
		$this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
		$this->load->model('profile_model');
		$this->friend_uid = $uid;
		$hold = array();
		$boards = array();
		$hold['user_record'] = $this->profile_model->get_friend_info($uid);
		$boards['board_record'] = $this->profile_model->get_friend_boards($uid);
		$boards['uid'] = $uid;
		$this->load->view('user/profile_view', $hold, $this->data);
		$this->load->view('user/board_view', $boards);
		$this->load->view('template/footer');
	}

	public function friends_pins()
	{
		$this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
		$this->load->model('profile_model');
		$board =$this->uri->segment(3);
		$uid = $this->friend_uid;
		$hold = array();
		$pins = array();
		$pins['pin_record'] = $this->profile_model->get_friend_post($board, $uid);
		$hold['user_record'] = $this->profile_model->get_friend_info($uid);
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