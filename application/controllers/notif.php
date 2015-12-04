<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class Notif extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = "Notifications";
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
        $this->load->model('notif_model');
        $this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
        //====== GETTING ALL THE NOTIFICATIONS FROM THE TABLE THAT PERTAION TO YOU ==============================
        $this->load->model('notif_model');
        $global_list = $this->notif_model->load_global();
        $this->notif_model->clear_global_notif();
        $this->data = array("global_list" => $global_list[0], "post_list" => $global_list[1], "user_list" => $global_list[2]);
		$this->load->view('notif_view', $this->data);
        $this->load->view('template/footer');
	}
}

