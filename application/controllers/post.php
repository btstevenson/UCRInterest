<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = "Make a post";
	}

	public function index()
	{
		$this->load->view('template/main_layout', $this->data);

	}
}