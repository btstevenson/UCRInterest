<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = "UCRInterest";
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
			$data = array(
						'email' => $this->input->post('email'),
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
			$data = array(
						'email' => $this->input->post('email'),
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
	function search()
	{
		$this->data['meta_title'] = 'Search Results'; //Set page title

		$terms = $this->input->post('search_terms'); //get search terms from search box
		$terms_arr = array();
		$terms_arr = preg_split("/[\s,]+/", $terms); //split terms by spaces into array

		$keyword_arr = array();
		$this->load->model('user_model'); 
		$keyword_arr = $this->user_model->get_keywords(); //returns array of (p(ost)id => key words)

		//get the pid of relevant posts
		$pid_arr = array();
		$pid_arr = $this->user_model->find_matches($terms_arr, $keyword_arr);

		$this->load->view('template/header');
		$this->load->view('template/main_layout', $this->data);
		$this->load->view('user/search_view');
		$this->load->view('template/footer');
	}
}