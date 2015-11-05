<?php

class edit_profile_model extends CI_Model
{
	function __construct()
	{}

	public function get_user_info($email)
	{
		//Check Email and Password that is entered

		$q = $this 
					->db
					->where ('email', $email)
					->get('users');

		$user_info = $q->row();
		return $user_info;
	}

	public function edit_info()
	{

		$this->db->set('email', $this->input->post('email'));
		$this->db->set('password', $this->input->post('password'));
		$this->db->set('username', $this->input->post('username'));
		$this->db->set('first_name', $this->input->post('first_name'));
		$this->db->set('last_name', $this->input->post('last_name'));
		$this->db->set('about_you', $this->input->post('about_you'));
		$this->db->set('location', $this->input->post('location'));
		$this->db->set('website', $this->input->post('website'));
		$this->db->set('DOB', $this->input->post('DOB'));
		$this->db->set('gender', $this->input->post('gender'));
		$this->db->set('nick_name', $this->input->post('nick_name'));

		$this->db->where('email', $this->session->userdata('email'));
		$this->db->update('users');
		$this->session->set_userdata(array(
						'email' => $this->input->post('email'),
						'is_logged_in' => true
					));
		
	}

	public function is_unique()
	{
		if($this->session->userdata('email') != $this->input->post('email'))
		{
			$q = $this 
					->db
					->where ('email', $this->input->post('email'))
					->get('users');
			if($q->num_rows() > 0)
			{
				return 'email';
			}

		}
		if($this->session->userdata('username') != $this->input->post('username'))
		{
			$q = $this 
					->db
					->where ('username', $this->input->post('username'))
					->get('users');
			if($q->num_rows() > 0)
			{
				return 'username';
			}
		}
		return 'none';
	}

	function upload_pic($pic_name)
	{
		$this->db->set('profile_pic', "assets/img/".$pic_name);
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->update('users');
	}

	function check_password()
	{
		$res = $this->db->where('email', $this->session->userdata('email'))->get('users');
		$res = $res->row();
		if($res->password == md5($this->input->post('old_password')))
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	function change_password()
	{
		$this->db->set('password', md5($this->input->post('new_password')));
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->update('users');
	}
}
?>