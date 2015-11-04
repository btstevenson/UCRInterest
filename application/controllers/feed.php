<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');
class Feed extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->data['meta_title'] = "Feed";
	}

	public function index()
	{
		$this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);

		$this->load->model('feed_model');
		 
		$fulldata = $this->feed_model->load_feed();
		$imgs = $fulldata[0];
		$titles = $fulldata[1];
		$contents = $fulldata[2];
		$first_name = $fulldata[3];
		$last_name = $fulldata[4];

		$data = array("imgs" => $imgs, "titles" => $titles, "contents" => $contents, "first_name" => $first_name, "last_name" => $last_name);
		$this->load->view('feed_view', $data);
		
		$this->load->view('template/footer');
	}
}