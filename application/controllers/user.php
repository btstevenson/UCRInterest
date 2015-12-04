<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = "UCRInterest";
		
		$this->load->model("notif_model");
		$global_notifs = $this->notif_model->load_global();
		if(count($global_notifs[0]) > 0)
			$this->session->set_userdata("global_notif", true);
		else
			$this->session->set_userdata("global_notif", false);

		$friend_notifs = $this->notif_model->load_friends_notifs();
		if(count($friend_notifs[0]) > 0)
			$this->session->set_userdata("friend_notif", true);
		else
			$this->session->set_userdata("friend_notif", false);
	}

	function login()
	{

		if($this->is_logged_in())
		{
			redirect('feed');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_username_check');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run())
		{
			$profile_pic_dir = $this->get_pic_dir();
			$data = array(
						'email' => $this->input->post('email'),
						'profile_pic' => $profile_pic_dir,
						'is_logged_in' => true
					);
			$this->session->set_userdata($data);
			redirect('feed');
		}

		$this->data['subview'] = 'user/login_view';
		$this->load->view('template/modal_layout', $this->data);
	}

	function register()
	{
		/**TODO:
		 *Have to check if session is still good. If it is then proceed to next page.
		 */
		if($this->is_logged_in())
		{
			redirect('feed');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('DOB', 'DOB', 'required');

		if($this->form_validation->run())
		{
			$this->load->model('user_model');
			$this->user_model->register_user();
			$profile_pic_dir = $this->get_pic_dir();
			$data = array(
						'email' => $this->input->post('email'),
						'profile_pic' => $profile_pic_dir,
						'is_logged_in' => true
					);
			$this->session->set_userdata($data);
			redirect('feed');
		}
		
		$this->data['subview'] = 'user/registration_view';
		$this->load->view('template/modal_layout', $this->data);
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('Welcome');
	}

	//This is used for the log in form validation
	function username_check()
	{
		$this->load->model('user_model');
		$result = $this->user_model->login();
		if($result)
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('username_check', 'You have entered an incorrect username or password');
			return false;
		}
	}
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in !== true)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	//Search Funtionality: Works with multiple key words entered. Returns any posts that have either key
	//                     word in them. Is case-sensitive. Duplicates some of the feed code, so changes to
	//					   the feed will also need to be applied here or the model.
	function search()
	{
		$terms = $this->input->post('search_terms'); //get search terms from search box
		$terms_arr = array();
		$terms_arr = preg_split("/[\s,]+/", $terms); //split terms by spaces into array

		$keyword_arr = array();
		$this->load->model('user_model'); 
		$keyword_arr = $this->user_model->get_keywords(); //returns array of (p(ost)id => key words)

		//get the pid of relevant posts
		$pid_arr = array();
		$pid_arr = $this->user_model->find_matches($terms_arr, $keyword_arr);

		$fulldata = $this->user_model->load_feed($pid_arr); //only load pins that are in the pid_arr

		$pid = $fulldata[0];
		$imgs = $fulldata[1];
		$titles = $fulldata[2];
		$contents = $fulldata[3];
		$first_name = $fulldata[4];
		$last_name = $fulldata[5];
		$uid = $fulldata[6];
		$label = $fulldata[7];
		$boards = $fulldata[8];

		$this->load->model('feed_model');
		$pins = $this->feed_model->get_pins();
		$my_uid = $this->feed_model->get_my_uid();
		$likes = $this->feed_model->get_likes();

		$this->data = array("this_pid" => $pid, "imgs" => $imgs, "titles" => $titles, "contents" => $contents, "first_name" => $first_name, "last_name" => $last_name, "pins" => $pins, "uid" => $uid, "my_uid" => $my_uid, "label" => $label, "boards" => $boards, "likes" => $likes, "this_likes" => $likes);		
		$this->data['meta_title'] = 'Search Results'; //Set page title

		$this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
		$this->load->view('user/search_view', $this->data);
		$this->load->view('template/footer', $this->data);
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
		$this->load->model('user_model');
		return $this->user_model->get_pic_dir();
	}
}