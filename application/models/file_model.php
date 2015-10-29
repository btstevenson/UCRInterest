<?php
class file_model extends CI_Model
{
	function __construct()
	{
		parent :: __construct();
	}

	// public function insert_file ($filename, $title, $content) 
	public function insert_file ($url)
	{
		$data = array(
						'uid' => 3,
						'pic_dir' => $url	,
						'title' => $this->input->post('title'),
						'content' => $this->input->post('content')
					);

		$this->db->insert('post', $data);
		return $this->db->insert_id();
	}

}

?>