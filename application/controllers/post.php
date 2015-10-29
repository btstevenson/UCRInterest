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

	public function upload_file()
	{
		$status = "" ;
		$msg = "";
		$filename = "pic_dir";

		if (empty($_POST['title']))
		{
			$status = "error";
			$msg = "Please enter a title";
		}

		if ($status  != "error")
		{
			$config['upload_path'] = 'assets/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 1024 * 8;
			$config['encrypt_name'] = true;

			$this ->load->library('upload',$config);

			if(!$this->upload->do_upload($filename))
			{
				$status = "error";
				$msg = $this->upload->display_errors('','');

			}
			else
			{
				$this->load->model('file_model');
				$data = $this->upload->data();
				$file_id = $this->file_model->insert_file($data['file_name'], $_POST['title'], $_POST['content']);
				if($file_id)
				{
					redirect('Post/index');
				}
				else
				{
					unlink($data['full_path']);
					$status = "error";
					$msg = "Please Try Again";
				}
			}
			@unlink($_FILES[$filename]);
		}
		echo json_encode(array('status'=> $status,'msg'=>$msg));
	}
}