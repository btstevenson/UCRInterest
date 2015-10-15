<?php

class login_model extends CI_Model
{
	function __construct()
	{}

	public function login_user()
	{
		//Check Email and Password that is entered

		$email = $this->input->post('email');
		$passwd = $this->input->post('password');
		$q = $this 
					->db
					->where ('email', $email)
					->where ('password', $passwd)
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
			echo 'SOMETHING WRONG';
		}
	}
}

?>