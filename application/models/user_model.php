<?php

class User_model extends CI_Model
{
	function __construct()
	{}

	function login()
	{
		$email = $this->input->post('email');
		$passwd = $this->input->post('password');
		$q = $this 
					->db
					->where ('email', $email)
					->where ('password', md5($passwd))
					->get('users');
		//Check if it returns only one row
		if ($q->num_rows()  == 1 )
		{
			//DO SOMETHING
			return true;
		}
		//If more then there is an error
		else if ( $q->num_rows() > 1)
		{
			echo ' SOMETHING WRONG ';
		}
		else
		{
			return false;
		}
	}

	function register_user(){
		$data = array(
			'uid'			=>	'',
			'email'			=>	$this->input->post('email'),
			'password' 		=> 	md5($this->input->post('password')),
			'username' 		=> 	$this->input->post('username'),
			'first_name' 	=> 	$this->input->post('first_name'),
			'last_name' 	=> 	$this->input->post('last_name'),
			'about_you' 	=> 	"",
			'location'		=>	"",
			'website' 		=> 	"",
			'profile_pic' 	=> 	"assets/img/default.jpg",
			// 'creation_date'	=>	"CURRENT_TIMESTAMP()",
			'DOB'			=>	$this->input->post('DOB'),
			'gender' 		=> 	"",
			'nick_name' 	=> 	$this->input->post('username'));

		$this->db->insert('users', $data);
		
		$query = $this->db->query("SELECT uid FROM users WHERE email='".($this->input->post('email'))."'" );
		$row = $query->row();
		
		$selectedInterests = $this->input->post('interests');
		
		for($i=0; $i<count($selectedInterests); $i++){
			$interestData = array(
				'uid' => $row->uid,
				'label' => $selectedInterests[$i]
			);
		
			$this->db->insert('interests', $interestData);
		}
	}

	function load_profile()
	{
		//load boards/pins/likes/etc
	}

	function edit_profile()
	{
		$data = array(
			'uid'			=>	$this->input->post('uid'),
			'email'			=>	$this->input->post('email'),
			// 'password' 		=> 	$this->input->post('password'),
			'username' 		=> 	$this->input->post('username'),
			'first_name' 	=> 	$this->input->post('first_name'),
			'last_name' 	=> 	$this->input->post('last_name'),
			'about_you' 	=> 	$this->input->post('about_you'),
			'location'		=>	$this->input->post('location'),
			'website' 		=> 	$this->input->post('website'),
			'profile_pic' 	=> 	$this->input->post('profile_pic'),
			// 'creation_date'	=>	"CURRENT_TIMESTAMP()",
			'DOB'			=>	$this->input->post('DOB'),
			'gender' 		=> 	$this->input->post('gender'),
			'nick_name' 	=> 	$this->input->post('username'));

		return  $this->db->update('users', $data);
	}

	function get_keywords() //for search functionality
	{
		$keyword_arr = array();
		$res = $this->db->query("SELECT pid, title, content, label FROM post");
		$res = $res->result();
		foreach ($res as $row) {
			$keyword_string = "{$row->title} {$row->content} {$row->label} "; //concatenate all keywords with spacing
			$keyword_string = preg_replace('/[^a-z0-9]+/i', ' ', $keyword_string); //remove punctuation
			$keyword_arr[$row->pid] = $keyword_string; //maps the pid to the keywords
		}
		return $keyword_arr;
	}

	function find_matches($terms_arr, $keyword_arr){ //for search functionality
		$pid_arr = array();
		foreach($keyword_arr as $key => $value){
			$value_arr = preg_split("/[\s,]+/", $value); //turn keywords into array
			foreach($value_arr as $word1){
				foreach($terms_arr as $word2){
					if($word1 == $word2){ //make these lowercase if you want to get rid of case-matching
						array_push($pid_arr, $key);
						break 2; //break twice
					}
				}
			}
		}
		return $pid_arr; 
	}

	public function get_name($uid) //for search functionality
	{
		$res = $this->db->query("SELECT first_name, last_name FROM users WHERE uid= ".$uid);
		return $res->row();
	}

	function load_feed($pid_arr){ //for search functionality
		$pid = array();
		$imgs = array();
		$titles = array();
		$contents = array();
		$first_name = array();
		$last_name = array();
		$uid = array();
		$label = array();
		$who = "";
		///////////////////////////FIXME//////////////////////////
		//need to check if pid is in $pid_arr in this query for better time complexity
		//currently grabs all posts
		$res = $this->db->query("SELECT pid, uid, pic_dir, title, content, label FROM post");//WHERE in_array(pid, pid_array) 

		$tableCount = 0;
		$numImagesLoaded = 0;
		$shuffled = $res->result();
		
		foreach ($shuffled as $row){
			if(in_array($row->pid, $pid_arr)){
				array_push($pid, $row->pid);
				array_push($imgs, $row->pic_dir);
				array_push($titles, $row->title);
				array_push($contents, $row->content);

				$name = $this->get_name($row->uid);

				array_push($first_name, $name->first_name);
				array_push($last_name, $name->last_name);
				array_push($uid, $row->uid);
				array_push($label, $row->label);

				$numImagesLoaded++;
			}
		}
		
		//board query
		$this->load->model('feed_model');
		$my_uid = $this->feed_model->get_my_uid();
		$b_result = $this->db->query("SELECT name FROM boards WHERE uid='".$my_uid."'");
		$boards = $b_result->result_array();

		$data = array($pid, $imgs, $titles, $contents, $first_name, $last_name, $uid, $label, $boards);
		
		return $data;
	}

	function search_add_like()
	{
		$pid = $this->uri->segment(3);
		$this->load->model('profile_model');
		$uid = $this->profile_model->get_user_id();
        $sql = "INSERT INTO likes (uid, post_id) VALUES ($uid, $pid)";
        $query = $this->db->query($sql);
        $this->profile_model->send_like($pid);

        redirect('user/search');
	}

	function search_un_like()
	{
		$pid = $this->uri->segment(3);
		$this->load->model('feed_model');
		$this->load->model('profile_model');
		$uid = $this->profile_model->get_user_id();
        $this->feed_model->un_like($pid);

        redirect('user/search');
	}

	public function get_pic_dir()
	{
		$pic_dir = $this->db->query("SELECT profile_pic FROM users WHERE email='".$this->input->post('email')."'");
		$pic_dir = $pic_dir->row();
		return $pic_dir->profile_pic;
	}
}

?>