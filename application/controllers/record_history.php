<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');
class Record_History extends CI_Controller{

	function __construct(){
		parent::__construct();
	}
	
	public function run(){
		$pid = $this->input->post('pid');
		$uid = $this->input->post('uid');
		$res = $this->db->query("SELECT label FROM post WHERE pid='".$pid."'");
		$res = $res->row();
		
		$data = array(
			'uid' => $uid,
			'label' => $res->label
		);
		
		$checkExists = $this->db->query("SELECT label FROM browse_history WHERE uid='".$uid."'and label='".$res->label."'");
		
		if(count($checkExists->result())==0){
			$this->db->insert('browse_history', $data);
			echo "did insert";
		}else{
			echo "didnt insert";
		}
	}
}
?>