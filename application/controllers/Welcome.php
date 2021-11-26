<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->load->model('pic_model');

		$data['picture_list'] = $this->pic_model->get_all_pics();
		$this->load->view('upload/picture_list', $data);
	}
}
