<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');
class Feed extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('feed_model');

		$imgs = $this->feed_model->load_feed();
		$data = array("imgs" => $imgs);
		$this->load->view('feed_view', $data);
	}

	public function index(){
		
	}


}