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

	}
	public function save()
	{
		$this->upload_file();
        echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';

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
			$url = "./assets/img/".uniqid(rand()).'.'.$type;
			if (in_array($type, array("jpg","jpeg", "gif", "png", "bmp")))
			{
				if(is_uploaded_file($_FILES["pic_dir"]["tmp_name"]))
				{
					if (move_uploaded_file($_FILES["pic_dir"]["tmp_name"], $url))
					{
						$this->load->model('post_model');
						$this->post_model->insert_file($url);
					}
				}
			}
//			redirect('profile/');
		}
		else
        {
           
        }
	}
}