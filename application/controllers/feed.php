<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');
class Feed extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->data['meta_title'] = "Feed";
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
		 
		$fulldata = $this->feed_model->load_feed();
		$pid = $fulldata[0];
		$imgs = $fulldata[1];
		$titles = $fulldata[2];
		$contents = $fulldata[3];
		$first_name = $fulldata[4];
		$last_name = $fulldata[5];

		$pins = $this->feed_model->get_pins();

		$data = array("this_pid" => $pid, "imgs" => $imgs, "titles" => $titles, "contents" => $contents, "first_name" => $first_name, "last_name" => $last_name, "pins" => $pins);

		$this->load->view('feed_view', $data);
		
		$this->load->view('template/footer');
	}

	public function make_pin()
	{
		echo "this is a test";
	}
}