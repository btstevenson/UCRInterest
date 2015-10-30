<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class edit_profile extends CI_Controller {

	public function index()
	{
		$data = array();
		$this->load->view('template/header');
		$this->load->view('user/edit_profile_view');
		$this->load->view('template/footer');

		$data['email'] = $this->session->userdata('email');
		$this->load->model('edit_profile_model');
		$this->edit_profile_model->get_user_info($data);
	}
}