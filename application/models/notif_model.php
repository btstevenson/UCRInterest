<?php

class notif_model extends CI_Model
{
	function __construct(){
	}
    //== GET ALL NOTIFICATIONS FOR CURRENT USER === 
	public function load_global()
	{
		$notifs = array();
        
        //==== POSTS AFFECTED BY CURRENT NOTIFICATIONS ======
        $posts = array();
        //=== PERSONS WHO CAUSED THESE NOTIFICATIONS
        $people = array();
        
        
        //GETTING NOTIFICATIONS THAT DO NOT INVOLVE FRIENDS ====================
		$res = $this->db->query("SELECT * FROM notifications N, users U WHERE N.to = U.uid AND (N.type='like' OR N.type='comment') AND U.email='".$this->session->userdata("email")."'");
		$shuffled = $res->result();
		
		foreach ($shuffled as $row){
			array_push($notifs, $row);
		}			
        
        //===== GETTING POSTS ============================
        $res = $this->db->query("SELECT P.pic_dir, P.title FROM notifications N, users U, post P WHERE N.to = U.uid AND (N.pin_id = P.pid) AND U.email='".$this->session->userdata("email")."'");
		$shuffled = $res->result();
        foreach ($shuffled as $row){
			array_push($posts, $row);
		}	
        
        $global_notifs = array($notifs, $posts);
		return $global_notifs;
	}
}

?>