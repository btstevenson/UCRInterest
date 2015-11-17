<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class Friends extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = "Friends";
	}

	public function index()
	{
        $this->load->model('friends_model');
		 
		$friends_list = $this->friends_model->load_friends();
		$friends_list = $this->friends_model->load_in_requests();
        
        
        $this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
		$this->load->view('friends_view', $friends_list);
		$this->load->view('template/footer');
	}
}

