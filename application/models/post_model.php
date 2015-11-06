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
				return $row->uid;
			}
		}

	}
	public function insert_file ($url)
	{
		$this->load->model('post_model');
		$data_1 = array(
						'uid' => $this->post_model->get_user_id(),
						'pic_dir' => $url,
						'title' => $this->input->post('title'),
						'content' => $this->input->post('content')
					);

		$this->db->insert('post', $data_1);
	}

	function get_post_info($pid)
	{
		$q = $this 
					->db
					->where ('pid', $pid)
					->get('post');

		$res = $q->row();
		
		$data = array('title' => $res->title, 'pic_dir' => $res->pic_dir, 'content' => $res->content, 'pid' => $pid);

		return $data;
	}

	function change_post($pid)
	{
		$this->db->set('title', $this->input->post('title'));
		$this->db->set('content', $this->input->post('content'));

		$this->db->where('pid', $pid);
		$this->db->update('post');
	}

    public function delete_post($pid)
    {
        $q = "DELETE FROM post WHERE pid=".$pid;
		$this->db->query($q);
    }
}

?>