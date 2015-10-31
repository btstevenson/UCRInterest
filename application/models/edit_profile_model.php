<?php

class edit_profile_model extends CI_Model
{
	function __construct()
	{}

	public function get_user_info()
	{
		//Check Email and Password that is entered

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
			echo ' SOMETHING WRONG ';
		}
	}
}

?>