<?php 
class Pages extends CI_Controller{
    public function view ($page ='home'){
        $this->load->helper('url');

        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }

        
        $this->load->view('pages/home');

        $this->load->helper('url');

    }
   
}
