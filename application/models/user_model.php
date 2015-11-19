<?php

class User_model extends CI_Model
{
	function __construct()
	{}

	function login()
	{
		$email = $this->input->post('email');
		$passwd = $this->input->post('password');
		$q = $this 
					->db
					->where ('email', $email)
					->where ('password', md5($passwd))
					->get('users');
		//Check if it returns only one row
		if ($q->num_rows()  == 1 )
		{
			//DO SOMETHING
			return true;
		}
		//If more then there is an error
		else if ( $q->num_rows() > 1)
		{
			echo ' SOMETHING WRONG ';
		}
		else
		{
			return false;
		}
	}

	function register_user()
	{
		$data = array(
			'uid'			=>	'',
			'email'			=>	$this->input->post('email'),
			'password' 		=> 	md5($this->input->post('password')),
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

		return  $this->db->insert('users', $data);
	}

	function load_profile()
	{
		//load boards/pins/likes/etc
	}

	function edit_profile()
	{
		$data = array(
			'uid'			=>	$this->input->post('uid'),
			'email'			=>	$this->input->post('email'),
			// 'password' 		=> 	$this->input->post('password'),
			'username' 		=> 	$this->input->post('username'),
			'first_name' 	=> 	$this->input->post('first_name'),
			'last_name' 	=> 	$this->input->post('last_name'),
			'about_you' 	=> 	$this->input->post('about_you'),
			'location'		=>	$this->input->post('location'),
			'website' 		=> 	$this->input->post('website'),
			'profile_pic' 	=> 	$this->input->post('profile_pic'),
			// 'creation_date'	=>	"CURRENT_TIMESTAMP()",
			'DOB'			=>	$this->input->post('DOB'),
			'gender' 		=> 	$this->input->post('gender'),
			'nick_name' 	=> 	$this->input->post('username'));

		return  $this->db->update('users', $data);
	}

	function get_keywords() //for searching
	{
		$keyword_arr = array();
		$res = $this->db->query("SELECT pid, title, content, label FROM post");
		$res = $res->result();
		foreach ($res as $row) {
			$keyword_string = "{$row->title} {$row->content} {$row->label} "; //concatenate all keywords with spacing
			$keyword_string = preg_replace('/[^a-z0-9]+/i', ' ', $keyword_string); //remove punctuation
			$keyword_arr[$row->pid] = $keyword_string; //maps the pid to the keywords
		}
		return $keyword_arr;
	}
}

?>