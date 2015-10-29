<<<<<<< HEAD
<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = "Profile";
		$this->is_logged_in();
	}

	public function index()
	{
		$this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
		$hold = array();
		// $sql = "SELECT * FROM users WHERE username = ?";
		// if($query = $this->db->query($sql, array($this->session->userdata('username'))))
		// {
		// 	$hold['user_record'] = $query->result_array();	
		// }
		$this->load->view('user/profile_view', $hold);
		$this->load->view('template/footer');

		
	}

	public function display()
	{

	}

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in !== true)
		{
			redirect('user/login');
		}
	}
=======
<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = "Profile";
		$this->is_logged_in();
	}

	public function index()
	{
		$this->load->view('template/header', $this->data);
		$this->load->view('template/main_layout', $this->data);
		$this->load->view('user/profile_view');
		$this->load->view('template/footer');
		$hold = array();
		$sql = "SELECT * FROM users WHERE username = ?";
		if($query = $this->db->query($sql, array($this->session->userdata('username'))))
		{
			$hold['user_record'] = $query->result_array();	
		}
		
	}

	public function display()
	{

	}

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in !== true)
		{
			echo 'You are not logged in. Please login or register';
			redirect('Login');
		}
	}
>>>>>>> origin/master
}