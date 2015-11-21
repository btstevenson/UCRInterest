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
        $q = $this->input->post('Search');
        $this->load->model('friends_model');
        $fulldata = $this->friends_model->get_search($q);
        
        $uid = $fulldata[0];
		$username = $fulldata[1];
		$first_name = $fulldata[2];
		$last_name = $fulldata[3];
		$pic_dir = $fulldata[4];
        $fuid = $fulldata[5]; 
        $fstatus = $fulldata[6]; 

        $user_res = array( "pic_dir" => $pic_dir, "username" => $username, "first_name" => $first_name, "last_name" => $last_name, "uid" => $uid, "fuid" => $fuid, "fstatus" => $fstatus);
        $this->data['meta_title'] = "Friend Results";

        
        $this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
        $this->load->view('friends_search_view', $user_res);
        $this->load->view('template/footer');

    }

    public function accept_friend()
    {
        $fid = $this->uri->segment(3);
        $this->load->model("friends_model");
        $this->friends_model->accept_friend($fid);
        redirect("friends");
    }

    public function decline_friend()
    {
        $fid = $this->uri->segment(3);
        $this->load->model("friends_model");
        $this->friends_model->decline_friend($fid);
        redirect("friends");
    }
}

