<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pic_model');
		$this->load->library('form_validation');
	}


	public function save()
	{

		$this->form_validation->set_rules('pic_title', 'pic_title', 'required');
		$this->form_validation->set_rules('pic_file', 'pic_file', 'required');


		if (!$this->form_validation->run() == FALSE) {
			log_message('error', 'Error form validation.');
			redirect('welcome/index/picture_list');
		} else {

			log_message('debug', 'get the form values');
			$data['pic_title'] = $this->input->post('pic_title');
			$data['pic_dur'] = $this->input->post('pic_dur');
			$data['pic_blob'] = $this->input->post(file_get_contents($_FILES['pic_file']['tmp_name']));

			log_message('debug', 'set file upload settings');
			$this->load->helper('file');
			$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|mp4|avi';
			$config['max_size'] = 0;

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('pic_file')) {
				$error = array('error' => $this->upload->display_errors());
				redirect('welcome/index/picture_list');
			} else {
				log_message('debug', 'file is uploaded successfully.');
				$upload_data = $this->upload->data();
				$data['pic_file'] = $upload_data['file_name'];

				log_message('debug', 'store pic data to the db.');
				$this->pic_model->store_pic_data($data);

				$data['picture_list'] = $this->pic_model->get_all_pics();
				redirect('welcome/index/picture_list');
			}
		}
	}

	public function delete()
	{
		$data = $this->uri->segment(3);
		$this->pic_model->delete_pic_data($data);
		redirect('welcome/index/picture_list');
	}

}


