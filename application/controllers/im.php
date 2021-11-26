<?php

class Im extends CI_Controller
{
//    private $upload_path= 'uploads/'; ;
	public function view($page = 'image')
	{
//		$this->load->helper('url');
//
//		if (!file_exists(APPPATH . 'views/uplo/' . $page . '.php')) {
//			show_404();
//		}
//
//
//		$this->load->view('uplo/image');
//
//		$this->load->helper('url');

	}

	public function upload()
	{
//        if ( ! empty($_FILES))
//        {
//            $config["upload_path"]   = $this->upload_path;
//            $config["allowed_types"] = "gif|jpg|png";
//            $this->load->library('upload' , $config);
//            if (! $this->upload->do_upload("file")) {
//                echo "failed to upload file(s)";
//            }

//        }
	}

	public function remove()
	{
//        $file = $this->input->post("file");
//        if ($file && file_exists($this->upload_path . "/" .$file)) {
//            unlink ($this->upload_path . "/" .$file);
//        }
	}

	public function list_files()
	{
		$this->load->helper("file");
		$files = get_filenames($this->upload_path);
		foreach ($files as &$file) {
			$file = array(
				'name' => $file,
				'size' => filesize($this->upload_path . "/" . $file)
			);
		}
		header("content-type: text/json");
		header("content-type: application/json");
		echo json_encode($files);
	}
}
   

