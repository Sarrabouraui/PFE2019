<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Slider extends CI_Controller {

    Public $data;
    Public function __construct()
    {
    //Core controller constructor
    parent::__construct();
    $this->load->model('slider_model');
    $this->load->library('form_validation');
    $this->load->library("pagination");
    
    }

    public function file_data(){
        //validate the form data
         
        $this->form_validation->set_rules('slider_title', 'Slider Title', 'required');
         
                if ($this->form_validation->run() == FALSE){
        $this->load->view('slider');
        }else{
        //get the form values
        $data['slider_title'] = $this->input->post('slider_title');
        $data['slider_type'] = $this->input->post('slider_type');
         
        //get the uploaded file name
        $data['slider_file'] = $upload_data['file_name'];
         
        //store pic data to the db
        $this->slider_model->store_slider_data($data);
        
        redirect('/slider/slider_list');
        
        
        }
        $this->load->view('slider/footer');
        }
        
        
public function index()
{
   
    $data['slider'] = $this->slider_model->get_all_sliders();

$this->load->view('slider/header');
$this->load->view('slider/slider_list',$data);
$this->load->view('slider/footer');

}
}