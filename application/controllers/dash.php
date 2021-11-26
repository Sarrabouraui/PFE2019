<?php 
class Dash extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('dis_model','model');
        }

        public function index()
            {
               $data['di'] = $this->model->displayOn();
               $data['dis'] = $this->model->displayOff();
             $this->load->view('dash',$data);

         }
      
    }