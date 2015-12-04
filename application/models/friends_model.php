<?php

class friends_model extends CI_Model
{
	
	function __construct(){
	}
	
    //== ALREADY FRIENDS === 
	public function load_friends()
	{
		$amigos = array();
        
		$res = $this->db->query("SELECT F.fid, U2.first_name, U2.last_name, U2.profile_pic FROM friends F, users U, users U2 WHERE F.status ='accepted' AND ((F.user = U.uid AND F.following = U2.uid) OR (U.uid = F.following AND U2.uid = F.user)) AND U.email='".$this->session->userdata("email")."'");
		$shuffled = $res->result();
		//shuffle($shuffled);
		
		foreach ($shuffled as $row){
			array_push($amigos, $row);
		}
				
		return $amigos;
	}
	
    //=== WHO SENT A REQUEST =====
    public function load_in_requests()
	{
		$pending = array();
        
		$res = $this->db->query("SELECT F.fid, U2.first_name, U2.last_name, U2.profile_pic FROM friends F, users U, users U2 WHERE F.status ='pending' AND F.following = U.uid AND F.user = U2.uid AND U.email='".$this->session->userdata("email")."'");
		$shuffled = $res->result();
		
		foreach ($shuffled as $row)
        {
			array_push($pending, $row);
        }
				
		return $pending;
	}
    //======== SEARCHING FUNCTION ==============
    public function get_search($match)
    {
        $username = array();
        $first_name = array();
        $last_name = array();
        $pic_dir = array();
        $uid = array();
        
        $fuid = array();
        $fid = array();
        $fstatus = array();
        $frespond = array();
        $fsent = array();

        $this->db->like('first_name',$match);
        $this->db->or_like('last_name',$match);
        $this->db->or_like('username',$match);
        $this->db->or_where('email=', $match);
        $query = $this->db->get('users');
        $query = $query->result();
        
        //=== QUERY WILL GET PEOPLE THAT MIGHT BE FRIENDS
        $res = $this->db->query("SELECT F.fid, U2.uid, F.status FROM friends F, users U, users U2 WHERE ((F.user = U.uid AND F.following = U2.uid) OR (U.uid = F.following AND U2.uid = F.user)) AND ((F.status = 'accepted' OR F.status = 'declined')) AND U.email='".$this->session->userdata("email")."'");
		$res = $res->result();
        foreach($res as $r)
        {
            array_push($fuid, $r->uid);
            array_push($fstatus, $r->status);
            array_push($fid, $r->fid);
        }
        
        //=== ONLY STATUSES YOU NEED TO RESPOND TOO
        $res = $this->db->query("SELECT F.fid, U2.uid, F.status FROM friends F, users U, users U2 WHERE U.uid = F.following AND U2.uid = F.user AND F.status = 'pending' AND U.email='".$this->session->userdata("email")."'");
		$res = $res->result();
        foreach($res as $r)
        {
            array_push($frespond, $r->uid);
        }
        //=== ONLY STATUSES YOU NEED SENT TO TOO
        $res = $this->db->query("SELECT F.fid, U2.uid, F.status FROM friends F, users U, users U2 WHERE U2.uid = F.following AND U.uid = F.user AND F.status = 'pending' AND U.email='".$this->session->userdata("email")."'");
		$res = $res->result();
        foreach($res as $r)
        {
            array_push($fsent, $r->uid);
        }
        
        
        foreach($query as $row)
        {
            if ($row->email != $this->session->userdata("email"))
            {
                array_push($username, $row->username);
                array_push($first_name, $row->first_name);
                array_push($last_name, $row->last_name);
                array_push($pic_dir, $row->profile_pic);
                array_push($uid, $row->uid);
            }
        }
        $search_data = array($uid, $username, $first_name, $last_name, $pic_dir, $fuid, $fstatus, $fid, $frespond, $fsent);
        return $search_data;        
    }

    public function accept_friend($fid)
    {
        $res = $this->db->query("SELECT * FROM friends WHERE fid=".$fid);
        $res = $res->row();
        $this->db->set("status", "accepted");
        $this->db->where("fid", $fid);
        $this->db->update("friends");

        $data = array
        (
            'nid'       => "",
            'from'      => $res->following,
            'to'        => $res->user,
            'type'      => "accepted_friend_req",
            'pin_id'    => "",
            'content'   => ""
        );
        $this->db->insert('notifications', $data); 
    }

    public function decline_friend($fid)
    {
        $this->db->set("status", "declined");
        $this->db->where("fid", $fid);
        $this->db->update("friends");
    }
    
    public function send_friend($uid)
    {
        $q = $this->db->query("SELECT uid FROM users WHERE email='".$this->session->userdata("email")."'");
        $q = $q->row();
        
        $data = array(
            'user' => $q->uid,
            'following' => $uid ,
            'status' => 'pending'
        );

        $this->db->insert('friends', $data);

        $data = array
        (
            'nid'       => "",
            'from'      => $q->uid,
            'to'        => $uid,
            'type'      => "friend_req",
            'pin_id'    => "",
            'content'   => ""
        );
        $this->db->insert('notifications', $data); 
    }
}

?>