<?php
class post_model extends CI_Model
{
	function __construct()
	{
		parent :: __construct();
	}

	// public function insert_file ($filename, $title, $content) 

	public function get_user_id()
	{
		//$q = "SELECT FROM users.uid WHERE 'email' = '" + $this->session->userdata('email') +"'";
		// $user_info = $this->db->get_where('users', array('email' => $this->session->userdata('email')));
		$email = $this->session->userdata('email');
		$q = $this 
					->db
					->where ('email', $email)
					->get('users');
		if($q->num_rows() > 0)
		{
			foreach($q->result() as $row)
			{
                echo $row->email;
				return $row->uid;
			}
		}

	}
	public function insert_file ($url)
	{
		$this->load->model('post_model');
		$data_1 = array(
						'uid' => $this->post_model->get_user_id(),
						'pic_dir' => $url	,
						'title' => $this->input->post('title'),
						'content' => $this->input->post('content')
					);

		$this->db->insert('post', $data_1);
	}
    public function delete_post ()
    {
        
    }
}

?>