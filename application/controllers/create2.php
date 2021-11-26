
<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Create2 extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('cr_model');
        $this->load->model('lay_model');
        $this->load->helper('url');

    }
    function index(){
        $data['picture_list'] = $this->cr_model->get_all_pics();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->view('lay/create2',$data);
    }
   
    public function add(){
       
        $aDoor = $this->input->post('txtId[]');
        if(empty($aDoor)) 
        {
          echo("You didn't select any buildings.");
        } 
        else 
        {

          $N = count($aDoor);
          for($i=0; $i < $N; $i++)
          {
              $data = $aDoor[$i];
            
          $result = $this->cr_model->add($data);
          }
        }
        $msg['success']=false;
        $msg['type'] = 'add';
        if ($result){
            $msg['success'] = true;
            
        }
        echo json_encode($msg);  
    }



}
