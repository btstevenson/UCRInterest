<?php

class friends_model extends CI_Model
{
	
	function __construct(){
	}
	
    //== ALREADY FRINEDS === 
	public function load_friends()
	{
		$amigos = array();
        
		$res = $this->db->query("SELECT U2.first_name, U2.last_name FROM friends F, users U, users U2 WHERE F.status ='accepted' AND F.user = U.uid AND F.following = U2.uid AND U.email='".$this->session->userdata("email")."'");
		$shuffled = $res->result();
		//shuffle($shuffled);
		
		foreach ($shuffled as $row){
//            echo $row->first_name;
//            echo $row->last_name;

			array_push($amigos, $row->first_name." ".$row->last_name);
		}
				
		return $amigos;
	}
	
    //=== WHO SENT A REQUEST =====
    public function load_in_requests()
	{
		$pending = array();
        
		$res = $this->db->query("SELECT U2.first_name, U2.last_name FROM friends F, users U, users U2 WHERE F.status ='pending' AND F.following = U.uid AND F.user = U2.uid AND U.email='".$this->session->userdata("email")."'");
		$shuffled = $res->result();
		
		foreach ($shuffled as $row){
//            echo $row->first_name;
//            echo $row->last_name;

			array_push($pending, $row->first_name." ".$row->last_name);
		}
				
		return $pending;
	}
}

?>