<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');
class Feed extends CI_Controller{

	function __construct(){
		parent::__construct();
		
		$this->load->model('feed_model');
<<<<<<< HEAD
		$this->data['meta_title'] = "Feed";
		$imgs = $this->feed_model->load_feed();
		$data = array("imgs" => $imgs);
	}

	public function index(){
		$this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
		$hold = array();
		 $sql = "SELECT * FROM users WHERE email = ?";
		 if($query = $this->db->query($sql, array($this->session->userdata('email'))))
		 {
		 	$hold['user_record'] = $query->result_array();	
		 }
		$this->load->view('feed_view', $hold);
		$this->load->view('template/footer');
=======
		$fulldata = $this->feed_model->load_feed();
		$imgs = $fulldata[0];
		$titles = $fulldata[1];
		$contents = $fulldata[2];
		$data = array("imgs" => $imgs, "titles" => $titles, "contents" => $contents, "meta_title" => "Feed");
		$this->load->view('feed_view', $data);
	}

	public function index(){
		
		
>>>>>>> refs/remotes/origin/Nathaniel's-Branch
	}


}