<?php

class feed_model extends CI_Model
{
	
	function __construct(){
	}

	public function get_name($uid)
	{
		$res = $this->db->query("SELECT first_name, last_name FROM users WHERE uid= ".$uid);
		return $res->row();
	}

	public function get_pins()
	{
		$res = $this->db->query("SELECT uid FROM users WHERE email='".$this->session->userdata('email')."'");
		$res = $res->row();
		$uid = $res->uid;

		echo $uid;

		$res = $this->db->query("SELECT post_id FROM pins WHERE uid=".$uid);
		$res = $res->result();

		return $res;
	}
	
	public function load_feed()
	{
		$pid = array();
		$imgs = array();
		$titles = array();
		$contents = array();
		$first_name = array();
		$last_name = array();
		$who = "";
		
		$res = $this->db->query("SELECT pid, uid, pic_dir, title, content FROM post ");
		$tableCount = 0;
		$numImagesLoaded = 0;
		$shuffled = $res->result();
		//shuffle($shuffled);
		
		foreach ($shuffled as $row){
			array_push($pid, $row->pid);
			array_push($imgs, $row->pic_dir);
			array_push($titles, $row->title);
			array_push($contents, $row->content);

			$name = $this->get_name($row->uid);

			array_push($first_name, $name->first_name);
			array_push($last_name, $name->last_name);

			$numImagesLoaded++;
		}
		
		$data = array($pid, $imgs, $titles, $contents, $first_name, $last_name);
		
		return $data;
	}

}

?>