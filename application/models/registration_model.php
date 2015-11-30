<?php

class registration_model extends CI_Model
{
	function __construct()
	{}

	public function register_user()
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
			'nick_name' 	=> 	$this->input->post('username'),
			'interests'		=>	$this->input->post('interests'));

		return  $this->db->insert('users', $data);
	}
}

?>