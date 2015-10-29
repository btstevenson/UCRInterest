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

	}
	private function upload_file()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim');

		if($this->form_validation->run())
		{
			$type = explode('.', $_FILES["pic_dir"]["name"]);
			$type = $type[count($type)-1];
			$url = "./assets/img/".uniqid(rand()).'.'.$type;
			if (in_array($type, array("jpg","jpeg", "gif", "png")))
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
			else
			{
				//PRINT ERROR SINCE IT WAS NOT A VALID IMG FILE	
			}
			redirect('profile/');
		}

		else
		{
			echo "ERROR";
		}

	}




/* ========================= WORKING WITHOUT CODEIGNITERS FORM VALIDATION =======================================
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
		*/
}