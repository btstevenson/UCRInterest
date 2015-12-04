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
        
        //===== GETTING USERS ============================
        $res = $this->db->query("SELECT U.first_name, U.last_name FROM notifications N, users U, users U2, post P WHERE N.from = U.uid AND (N.pin_id = P.pid) AND U2.email='".$this->session->userdata("email")."'");
		$shuffled = $res->result();
        foreach ($shuffled as $row){
			array_push($people, $row);
		}
        
        $global_notifs = array($notifs, $posts, $people);
		return $global_notifs;
	}
    //===================================================================================================================================
    //========== GET ALL NOTIFICATIONS THAT ARE RELATED TO PEOPLE==========================================================================
    public function load_friends_notifs()
	{
		$notifs = array();
        //=== PERSONS WHO CAUSED THESE NOTIFICATIONS
        $people = array();
        
        
        //GETTING NOTIFICATIONS THAT DO NOT INVOLVE FRIENDS ====================
		$res = $this->db->query("SELECT * FROM notifications N, users U WHERE N.to = U.uid AND (N.type!='like' OR N.type!='comment') AND U.email='".$this->session->userdata("email")."'");
		$shuffled = $res->result();
		
		foreach ($shuffled as $row){
			array_push($notifs, $row);
		}			
    
        //===== GETTING USERS ============================
        $res = $this->db->query("SELECT U.first_name, U.last_name FROM notifications N, users U, users U2, post P WHERE N.from = U.uid AND (N.pin_id = P.pid) AND U2.email='".$this->session->userdata("email")."'");
		$shuffled = $res->result();
        foreach ($shuffled as $row){
			array_push($people, $row);
		}
        
        $global_notifs = array($notifs, $people);
		return $global_notifs;
	}

	public function clear_global_notif()
	{
		$uid = $this->db->query("SELECT uid FROM users WHERE email='".$this->session->userdata("email")."'");
		$uid = $uid->row();
		$uid = $uid->uid;

		$this->db->where('type', 'like');
		$this->db->or_where('type', 'comment');
		$this->db->where('to', $uid);
		$this->db->delete('notifications');
	}
    
    public function clear_friend_notif()
	{
		$uid = $this->db->query("SELECT uid FROM users WHERE email='".$this->session->userdata("email")."'");
		$uid = $uid->row();
		$uid = $uid->uid;

		$this->db->where('type', 'accepted_friend_req');
		$this->db->or_where('type', 'comment');
		$this->db->where('to', $uid);
		$this->db->delete('notifications');
	}
}

?>