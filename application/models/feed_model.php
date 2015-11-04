<?php

class feed_model extends CI_Model{

	var $test = 1234;
//	public $images = array();
	
	function __construct(){
	}

	public function get_name($uid)
	{
		$res = $this->db->query("SELECT first_name, last_name FROM users WHERE uid= ".$uid);
		return $res->row();
	}

	public function load_feed()
	{
		$imgs = array();
		$titles = array();
		$contents = array();
		$first_name = array();
		$last_name = array();
		$who = "";
		
		$res = $this->db->query("SELECT uid, pic_dir, title, content FROM post ");
		$tableCount = 0;
		$numImagesLoaded = 0;
		$shuffled = $res->result();
		//shuffle($shuffled);
		
		foreach ($shuffled as $row){

			array_push($imgs, $row->pic_dir);
			array_push($titles, $row->title);
			array_push($contents, $row->content);

			$name = $this->get_name($row->uid);

			array_push($first_name, $name->first_name);
			array_push($last_name, $name->last_name);

			$numImagesLoaded++;
		}
		
		$data = array($imgs, $titles, $contents, $first_name, $last_name);
		
		return $data;
	}

}

?>