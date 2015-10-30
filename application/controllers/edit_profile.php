<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class edit_profile extends CI_Controller {

<<<<<<< HEAD
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

=======
>>>>>>> Williams-branch
	public function index()
	{
		$data = array();
		$this->load->view('template/header');
		$this->load->view('user/edit_profile_view');
		$this->load->view('template/footer');

		$data['email'] = $this->session->userdata('email');
		$this->load->model('edit_profile_model');
		$this->edit_profile_model->get_user_info($data);
	}
}