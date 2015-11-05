<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class edit_profile extends CI_Controller
 {
 	function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = "Edit Profile";
	}

	public function index()
	{
		$email = $this->session->userdata('email');
		$this->load->model('edit_profile_model');
		$user_data = $this->edit_profile_model->get_user_info($email);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('pic_dir', 'Picture', 'callback_upload_pic');

		if($user_data->email != $this->input->post('email'))
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_unique');

		if($user_data->username != $this->input->post('username'))
			$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_unique');

		if($user_data->first_name != $this->input->post('first_name'))
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');

		if($user_data->last_name != $this->input->post('last_name'))
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');

		if($user_data->DOB != $this->input->post('DOB'))
			$this->form_validation->set_rules('DOB', 'DOB', 'required');


		if($this->form_validation->run())
		{
			$this->edit_profile_model->edit_info();
			redirect('edit_profile');
		}

		$this->load->view('template/header');
		$this->load->view('template/main_layout', $this->data);
		$this->load->view('user/edit_profile_view', $user_data);
		$this->load->view('template/footer');

	}

	function check_unique()
	{
		$result = $this->edit_profile_model->is_unique();
		if($result == 'email')
		{
			$this->form_validation->set_message('check_unique', 'That email is associated with a different account.');
			return false;
		}
		if($result == 'username')
		{
			$this->form_validation->set_message('check_unique', 'That username is associated with a different account.');
			return false;
		}
		return true;
	}

	function upload_pic()
	{
		if (isset($_FILES['upload_field_name']) && is_uploaded_file($_FILES['upload_field_name']['tmp_name']))
		{
			$config['upload_path'] = 'assets/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = uniqid(rand());
			// echo $this->input->post('pic_dir');
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('pic_dir'))
			{
				// echo $this->upload->display_errors();
				$this->form_validation->set_message('upload_pic', $this->upload->display_errors());
				return false;
			}
			else
			{
				$this->load->model('edit_profile_model');
				$this->edit_profile_model->upload_pic($this->upload->data('file_name'));
			}
		}
		return true;
	}	
}