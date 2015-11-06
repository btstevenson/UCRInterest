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
        $data_1 = array(
                        'uid' => $this->profile_model->get_user_id(),
                        'name' => $this->input->post('name'),
                        'description' => $this->input->post('description')
                    );

        return $this->db->insert('boards', $data_1);
    }

    public function get_pin_ids()
    {
        $uid = $this->get_user_id();
        return $this->db->query("SELECT post_id FROM pins WHERE uid =" .$uid);
    }

    public function get_posts()
    {
        $pins = array();
        $pinid = $this->get_pin_ids();
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

}
?>