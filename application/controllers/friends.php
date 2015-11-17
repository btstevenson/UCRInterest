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
        $this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
        
        $friends_list = $this->friends_model->load_friends();
		$pending_list = $this->friends_model->load_in_requests();
        $this->data = array("friends_list" => $friends_list, "pending_list" => $pending_list);
        
		$this->load->view('friends_view', $this->data);
		
        $this->load->view('template/footer');
	}
    public function search()
    {
        $data['query'] = $this->friends_model->get_search();
        $this ->load->view('friends', $data);
    }
}

