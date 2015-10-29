<?php
class file_model extends CI_Model
{
	function __construct()
	{
		parent :: __construct();
	}

	public function insert_file ($filename, $title, $content)
	{
		$data = array(
						'uid' => 3,
						'pic_dir' => $filename,
						'title' => $title,
						'content' => $content
					);

		$this->db->insert('post', $data);
		return $this->db->insert_id();
	}

}

?>