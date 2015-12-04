<?php
class profile_model extends CI_Model
{
    function __construct()
    {
        parent :: __construct();
    }

    public function get_user_id()
    {
        $email = $this->session->userdata('email');
        $q = $this 
                    ->db
                    ->where ('email', $email)
                    ->get('users');
        if($q->num_rows() > 0)
        {
            foreach($q->result() as $row)
            {
                return $row->uid;
            }
        }
    }

    public function insert_board()
    {
        $this->load->model('profile_model');
        $checked = $this->input->post('privacy');
        $private = 0;
        if((int) $checked == 1)
        {
            $private = 1;
        }
        $data_1 = array(
                        'uid' => $this->profile_model->get_user_id(),
                        'name' => $this->input->post('name'),
                        'description' => $this->input->post('description'),
                        'private' => $private
                    );
        $boards = $this->get_boards();
        foreach ($boards as $row)
        {
            if($row['name'] == $data_1['name'])
            {
                return false;
            }
        }       
        return $this->db->insert('boards', $data_1);
    }

    public function get_pin_ids($board)
    {
        $uid = $this->get_user_id();
        if($board == '')
        {
            $sql = "SELECT post_id FROM pins WHERE uid = ?";
            $query = $this->db->query($sql, array($uid));
            return $query;
        }
        {
            $sql = "SELECT post_id FROM pins WHERE uid = ? AND b_name = ?";
            $query = $this->db->query($sql, array($uid, urldecode($board)));
            return $query;
        }
    }

    public function get_posts($board)
    {
        $pins = array();
        $pinid = $this->get_pin_ids($board);
        foreach($pinid->result() as $row)
        {
                $res = $this->db->query("SELECT title, pic_dir, content FROM post WHERE pid =" .$row->post_id);
                array_push($pins, $res->result_array());
        }   
        return $pins; 
    }

    public function get_boards()
    {
        $uid = $this->get_user_id();
        $sql = "SELECT name, description FROM boards WHERE uid =".$uid;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function update_board()
    {
        $new_name = $this->input->post('name');
        $new_description = $this->input->post('description');
        $uid = $this->get_user_id();
        $name = $this->input->post('boards');
        $sql = "UPDATE boards SET name = ?, description = ? WHERE uid = ? AND name = ?";
        $query = $this->db->query($sql, array($new_name, $new_description, $uid, $name));
    }

    public function get_user_info()
    {
        $sql = "SELECT uid, first_name, last_name FROM users WHERE email = ?";
        $query = $this->db->query($sql, array($this->session->userdata('email')));
        return $query->result_array();
    }

    public function remove_board()
    {
        $sql = "DELETE FROM boards WHERE uid = ? AND name = ?";
        $query = $this->db->query($sql, array($this->get_user_id(), $this->input->post('boards')));
    }

    public function get_friend_info($uid)
    {
        $sql = "SELECT first_name, last_name, profile_pic, gender FROM users WHERE uid= ?";
        $query = $this->db->query($sql, array($uid));
        return $query->result_array(); 
    }

    public function get_friend_boards($uid)
    {
        $sql = "SELECT name, description FROM boards WHERE uid = ? AND private = ?";
        $query = $this->db->query($sql, array($uid, 0));
        return $query->result_array();
    }

    public function get_friend_post($board, $uid)
    {
        $pins = array();
        $pinid = $this->get_friend_pins($board, $uid);
        foreach($pinid->result() as $row)
        {
                $res = $this->db->query("SELECT title, pic_dir, content FROM post WHERE pid =" .$row->post_id);
                array_push($pins, $res->result_array());
        }   
        return $pins;
    }

    public function get_friend_pins($board, $uid)
    {
        $sql = "SELECT post_id FROM pins WHERE uid = ? AND b_name = ?";
        $query = $this->db->query($sql, array($uid, $board));
        return $query;
    }

    public function get_likes_post_id()
    {
        $uid = $this->get_user_id();
        //sql call
        $sql = "SELECT post_id FROM likes WHERE uid =".$uid;
        return $this->db->query($sql);
    }

    public function get_likes()
    {
        $likes = array();
        $postid = $this->get_likes_post_id();
        foreach($postid->result() as $row)
        {
                $res = $this->db->query("SELECT title, pic_dir, content FROM post WHERE pid =" .$row->post_id);
                array_push($likes, $res->result_array());
        }   
        return $likes;
    }   

    public function send_like($pid)
    {
        $q = $this->db->query("SELECT uid FROM users WHERE email='".$this->session->userdata("email")."'");
        $q = $q->row();
        
        $p = $this->db->query("SELECT uid FROM post WHERE pid=".$pid);
        $p = $p->row();
/*
        $data = array(
            'user' => $q->uid,
            'following' => $uid ,
            'status' => 'pending'
        );

        $this->db->insert('friends', $data);
*/
        $data = array
        (
            'nid'       => "",
            'from'      => $q->uid,
            'to'        => $p->uid,
            'type'      => "like",
            'pin_id'    => $pid,
            'content'   => ""
        );
        $this->db->insert('notifications', $data); 
    }
}
?>