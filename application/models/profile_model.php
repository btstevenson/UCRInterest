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

}
?>