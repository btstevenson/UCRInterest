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
		$res = $this->db->query("SELECT post_id FROM pins WHERE uid=".$uid);
		$res = $res->result();

		$pid_list = array();
		foreach ($res as $row) {
			
			array_push($pid_list, $row->post_id);
		}

		return $pid_list;
	}
	
	public function load_feed($currentUID) {
		$pid = array();
		$imgs = array();
		$titles = array();
		$contents = array();
		$first_name = array();
		$last_name = array();
		$uid = array();
		$who = "";
		
		$uidQ = $this->db->query("SELECT uid FROM users WHERE email='".$currentUID."'");
		$uidRes = $uidQ->row();
		
		$interestsQuery = $this->db->query("SELECT label FROM interests WHERE uid='".$uidRes->uid."'");
		$historyQuery = $this->db->query("SELECT label FROM browse_history WHERE uid='".$uidRes->uid."'");
				
		$currentUserInterests = array();
		
		foreach ( $interestsQuery->result() as $row){
		   array_push($currentUserInterests ,$row->label);
		}
		
		foreach ( $historyQuery->result() as $row){
		   array_push($currentUserInterests ,$row->label);
		}
		
		$labels = "'".implode("', '", $currentUserInterests)."'";
		
		$res = $this->db->query("SELECT pid, uid, pic_dir, title, content FROM post WHERE label IN (".$labels.")");
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
			array_push($uid, $row->uid);

			$numImagesLoaded++;
		}
		
		$data = array($pid, $imgs, $titles, $contents, $first_name, $last_name, $uid, $currentUserInterests);
		
		return $data;
	}

	public function make_pin($pid)
	{
		//gets post_idto a pin based on that post id
		$res = $this->db->query("SELECT uid FROM users WHERE email='".$this->session->userdata('email')."'");
		$res = $res->row();

		$data = array('post_id' => $pid, 'uid' => $res->uid);
		$this->db->insert('pins', $data);
	}

	public function un_pin($pid)
	{
		$res = $this->db->query("SELECT uid FROM users WHERE email='".$this->session->userdata('email')."'");
		$res = $res->row();
		$uid =  $res->uid;
		$this->db->delete('pins', array('post_id' => $pid, 'uid' => $uid)); 
	}

	function get_my_uid()
	{
		$res = $this->db->query("SELECT uid FROM users WHERE email='".$this->session->userdata('email')."'");
		$res = $res->row();
		return $res->uid;
	}
}

?>