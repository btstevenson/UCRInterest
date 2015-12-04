<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');
class Feed extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->data['meta_title'] = "Feed";
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
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in !== true)
		{
			redirect('user/login');
		}

		$this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);

		$this->load->model('feed_model');
		 
		$currentEmail = $this->session->userdata('email');

		$fulldata = $this->feed_model->load_feed($currentEmail);

		$pid = $fulldata[0];
		$imgs = $fulldata[1];
		$titles = $fulldata[2];
		$contents = $fulldata[3];
		$first_name = $fulldata[4];
		$last_name = $fulldata[5];
		$uid = $fulldata[6];
		$label = $fulldata[7];
		$boards = $fulldata[8];
		$comments = $fulldata[9];
        $who_comm = $fulldata[10];
        
		$pins = $this->feed_model->get_pins();
		$my_uid = $this->feed_model->get_my_uid();
		$likes = $this->feed_model->get_likes();

		$this->data = array("this_pid" => $pid, "imgs" => $imgs, "titles" => $titles, "contents" => $contents, "first_name" => $first_name, "last_name" => $last_name, "pins" => $pins, "uid" => $uid, "my_uid" => $my_uid, "label" => $label, "boards" => $boards, "likes" => $likes, "this_likes" => $likes, "comments" => $comments, "who_comm" => $who_comm);

		$this->load->view('feed_view', $this->data);
		
		$this->load->view('template/footer');
	}

	public function make_pin()
	{
		$pid = $this->uri->segment(3);
		$this->load->model('feed_model');
		$this->feed_model->make_pin($pid);

		redirect('feed');
	}

	public function un_pin()
	{
		$pid = $this->uri->segment(3);
		$this->load->model('feed_model');
		$this->feed_model->un_pin($pid);

		redirect('feed');

	}

	public function pin_to_board()
	{
		$this->load->model('feed_model');
		$this->feed_model->pin_to_board();
		redirect('feed');
	}

	public function add_like()
	{
		$pid = $this->uri->segment(3);
		$this->load->model('profile_model');
		$uid = $this->profile_model->get_user_id();
        $sql = "INSERT INTO likes (uid, post_id) VALUES ($uid, $pid)";
        $query = $this->db->query($sql);
        $this->profile_model->send_like($pid);

        redirect('feed');
	}

	public function un_like()
	{
		$pid = $this->uri->segment(3);
		$this->load->model('feed_model');
		$this->load->model('profile_model');
		$uid = $this->profile_model->get_user_id();
        $this->feed_model->un_like($pid);

        redirect('feed');
	}
}