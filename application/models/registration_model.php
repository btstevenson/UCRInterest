<?php

class registration_model extends CI_Model
{
	function __construct()
	{}

	public function register_user()
	{
		$data = array(
			// 'UID'			=>	'NULL',
			'username' 		=> 	$this->input->post('username'),
			'password' 		=> 	$this->input->post('password'));
			// 'first_name' 	=> 	$this->input->post('first_name'),
			// 'last_name' 	=> 	$this->input->post('last_name'),
			// 'DOB'			=>	$this->input->post('DOB'),
			// 'creation_date'	=>	'CURRENT_TIMESTAMP');

		return  $this->db->insert('users', $data);
	}
}

?>