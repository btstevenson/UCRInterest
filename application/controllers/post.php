<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = "Make a post";
		$this->load->model("notif_model");
		$global_notifs = $this->notif_model->load_global();
		if(count($global_notifs[0]) > 0)
			$this->session->set_userdata("global_notif", true);
		else
			$this->session->set_userdata("global_notif", false);
	}

	public function index()
	{

	}
    //=============== INSERTING A POST ===========================
	public function save()
	{
		$this->upload_file();
	}
	private function upload_file()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim');

		if($this->form_validation->run() == TRUE)
		{
			$type = explode('.', $_FILES["pic_dir"]["name"]);
			$type = $type[count($type)-1];
			$url = "/assets/img/".uniqid(rand()).'.'.$type;
			if (in_array($type, array("jpg","jpeg", "gif", "png", "bmp")))
			{
				if(is_uploaded_file($_FILES["pic_dir"]["tmp_name"]))
				{
					if (move_uploaded_file($_FILES["pic_dir"]["tmp_name"], ".".$url))
					{
						$this->load->model('post_model');
						$this->post_model->insert_file($url);
					}
				}
			}
			redirect('feed');
		}
		else
        {
           
        }
	}

	function edit_post()
	{
		$data['meta_title'] = "Edit Post";

		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim');
		$pid = $this->uri->segment(3);

		$this->load->model('post_model');

		$post_data = $this->post_model->get_post_info($pid);
		// array_push($post_data, $pid);
		if($this->input->post("edit_post") == "Delete Post")
		{
			$this->delete_post($pid);
			redirect('profile');
		}
		else
		{
			if($this->form_validation->run() == TRUE)
			{
				$this->load->model('post_model');
				$this->post_model->change_post($pid);
				redirect('feed');
			}

		}
		
		$this->load->view('template/header');
		$this->load->view('template/main_layout', $data);
		$this->load->view('edit_post_view', $post_data);
		$this->load->view('template/footer');
	}
	
	public function delete_post($pid)
	{
		$this->load->model("post_model");
		$this->post_model->delete_post($pid);
	}
	
}