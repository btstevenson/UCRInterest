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
		$data = array(
			'uid'			=>	'',
			'email'			=>	$this->input->post('email'),
			'password' 		=> 	$this->input->post('password'),
			'username' 		=> 	$this->input->post('username'),
			'first_name' 	=> 	$this->input->post('first_name'),
			'last_name' 	=> 	$this->input->post('last_name'),
			'about_you' 	=> 	"",
			'location'		=>	"",
			'website' 		=> 	"",
			'profile_pic' 	=> 	"",
			// 'creation_date'	=>	"CURRENT_TIMESTAMP()",
			'DOB'			=>	$this->input->post('DOB'),
			'gender' 		=> 	"",
			'nick_name' 	=> 	$this->input->post('username'));

		$this->db->update('users', $data);
		
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
}

?>