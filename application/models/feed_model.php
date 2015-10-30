<?php

class feed_model extends CI_Model{

	var $test = 1234;
//	public $images = array();
	
	function __construct(){
	}

	public function load_feed(){
		$images = array();
		
		$res = $this->db->query("SELECT pic_dir FROM post LIMIT 4");
		$tableCount = 0;
		$numImagesLoaded = 0;
		$shuffled = $res->result();
		shuffle($shuffled);
		
		foreach ($shuffled as $row){
			array_push($images, $row->pic_dir);
			$numImagesLoaded++;
		}
		
		return $images;
		
	}
}

?>