<?php 
class Auth extends CI_Controller{
    public function login ($page ='login'){
        $this->load->helper('url');

        if(!file_exists(APPPATH.'views/'.$page.'.php')){
            show_404();
        }
        if(isset($_POST['password'])){

        
        $this->load->model('auth_model');
   
        $this->load->helper('url');
        if($this->auth_model->login($_POST['username'],$_POST['password'])){
            redirect('pages/view/home');
        }else{
            redirect('login');
        }
        }
        $this->load->view('login');

    }
   
}