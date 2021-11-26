<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Layout extends CI_Controller
{
	public $data;

	function __construct()
	{
		parent:: __construct();
		$this->load->model('lay_model', 'model');
		$this->load->model('Pic_model', 'picture');
		$this->load->library('session');
	}

	function index()
	{
		$data['list'] = $this->model->slide();
		$this->load->view('lay/lay', $data);
	}

	function slider()
	{
//		$aDoor = $this->input->post('');
//		if (empty($aDoor)) {
//			echo("You didn't select any buildings.");
//		} else {
//			$N = count($aDoor);
//			for ($i = 0; $i < $N; $i++) {
//				$data = $aDoor[$i];
//				//$d = $this->input('img');
//				$result = $this->cr_model->add($data/*,$d*/);
//			}
//		}
//		$result = $this->model->slide();
//		$output = print_r($result, 1);
//		log_message('error', $output);
//		echo json_encode($result);


	}

	public function showAllLayout()
	{
		$result = $this->model->showAllLayout();
		$output = print_r($result,1);
		log_message('error', $output);

		echo json_encode($result);
	}

	public function getLayout()
	{
		$result = $this->picture->getPicsByLayout();
		echo json_encode($result);
	}

	public function addLayout()
	{
		$result = $this->model->addLayout();
		$this->model->event();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if ($result) {
			$msg['success'] = true;
			$msg['layoutid'] = $result;
		}
		echo json_encode($msg);
	}

	public function editLayout()
	{
		$result = $this->model->editLayout();
		echo json_encode($result);
	}

	function updateLayout()
	{
		$result = $this->model->updateLayout();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteLayout()
	{
		$result = $this->model->deleteLayout();
		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);

	}


	public function addOrDeleteWeather(){
		$enabled = $this->input->post('enabled');
		$pfile = $this->input->post('pfile');
		$this->model->addOrDeleteWeather($pfile, $enabled);
	}


	public function addOrDeleteTime(){
		$enabled = $this->input->post('enabled');
		$pfile = $this->input->post('pfile');
		$this->model->addOrDeleteTime($pfile, $enabled);
	}
}
