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
//            echo $row->first_name;
//            echo $row->last_name;

			//array_push($amigos, $row->first_name." ".$row->last_name);
			array_push($amigos, $row);

            
        //======= PUSH THEIR PICUTRE TOO
		}
				
		return $amigos;
	}
	
    //=== WHO SENT A REQUEST =====
    public function load_in_requests()
	{
		$pending = array();
        
		$res = $this->db->query("SELECT F.fid, U2.first_name, U2.last_name, U2.profile_pic FROM friends F, users U, users U2 WHERE F.status ='pending' AND F.following = U.uid AND F.user = U2.uid AND U.email='".$this->session->userdata("email")."'");
		$shuffled = $res->result();
		
		foreach ($shuffled as $row){
//            echo $row->first_name;
//            echo $row->last_name;

			//array_push($pending, $row->first_name." ".$row->last_name);
			array_push($pending, $row);
            
            //=================== PUSH THEIR PICTURE TOO    
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
        $fstatus = array();

        $this->db->like('first_name',$match);
        $this->db->or_like('last_name',$match);
        $this->db->or_like('username',$match);
        $this->db->or_like('email',$match);
        $query = $this->db->get('users');
        $query = $query->result();
        
        //=== QUERY WILL GET PEOPLE THAT MIGHT BE FRIENDS
        $res = $this->db->query("SELECT U2.uid, F.status FROM friends F, users U, users U2 WHERE ((F.user = U.uid AND F.following = U2.uid) OR (U.uid = F.following AND U2.uid = F.user)) AND U.email='".$this->session->userdata("email")."'");
		$res = $res->result();
        foreach($res as $r)
        {
            // echo $r->uid;
            // echo $r->status;
            array_push($fuid, $r->uid);
            if ($r->status == "")
            {
                array_push($fstatus, "NONE");
                echo "none";
            }
            array_push($fstatus, $r->status);
        }
        
        
        foreach($query as $row)
        {
            array_push($username, $row->username);
            array_push($first_name, $row->first_name);
            array_push($last_name, $row->last_name);
            array_push($pic_dir, $row->profile_pic);
            array_push($uid, $row->uid);
        }
        $search_data = array($uid, $username, $first_name, $last_name, $pic_dir, $fuid, $fstatus);
        return $search_data;        
    }

    public function accept_friend($fid)
    {
        $this->db->set("status", "accepted");
        $this->db->where("fid", $fid);
        $this->db->update("friends");
    }

    public function decline_friend($fid)
    {
        $this->db->set("status", "declined");
        $this->db->where("fid", $fid);
        $this->db->update("friends");
    }
}

?>