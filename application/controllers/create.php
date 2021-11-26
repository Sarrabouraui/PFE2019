<?php 
class Create extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('lay_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
         
        }

        public function index()
{

$data['picture_list'] = $this->lay_model->get_all_pics();

$this->load->view('lay/create',$data);

}

        
        public function addLayout(){
            
            $result = $this->lay_model->addLayout();
            $msg['success']=false;
            $msg['type'] = 'add';
            if ($result){
                $msg['success'] = true;
            }
            echo json_encode($msg);
        }
    
      
    }