<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class Notif extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = "Notifications";
	}

	public function index()
	{
        $this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
        //====== GETTING ALL THE NOTIFICATIONS FROM THE TABLE THAT PERTAION TO YOU ==============================
        $global_list = $this->notif_model->load_global();
        $this->data = array("global_list" => $global_list[0], "post_list" => $global_list[1], "user_list" => $global_list[2]);
		$this->load->view('notif_view', $this->data);
        $this->load->view('template/footer');
	}
}

