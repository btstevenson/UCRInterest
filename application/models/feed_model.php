<?php

class feed_model extends CI_Model{

	var $test = 1234;
//	public $images = array();
	
	function __construct(){
	}

	public function load_feed(){
		$images = array();
		$titles = array();
		$contents = array();
		
		$res = $this->db->query("SELECT pic_dir, title, content FROM post ");
		$tableCount = 0;
		$numImagesLoaded = 0;
		$shuffled = $res->result();
		//shuffle($shuffled);
		
		foreach ($shuffled as $row){
			array_push($images, $row->pic_dir);
			array_push($titles, $row->title);
			array_push($contents, $row->content);						
			$numImagesLoaded++;
		}
		
		$data = array( $images, $titles, $contents );
		
		return $data;
		
	}
}

?>