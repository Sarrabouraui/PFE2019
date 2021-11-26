<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Displays extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('dis_model','model');
    }
    function index(){
        $this->load->view('displays/dis');
    }
    public function showAllDisplay(){
$result = $this->model->showAllDisplay();
echo json_encode($result);
    }
    public function refresh(){

        $result = $this->model->refresh();
    echo ($result);
    
    redirect('displays','refresh');
            }
    public function addDisplay(){
        $result = $this->model->addDisplay();
        $msg['success']=false;
        $msg['type'] = 'add';
        if ($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
public function editDisplay(){
    $result = $this->model->editDisplay();
    echo json_encode($result);

}
public function updateDisplay(){
    $result = $this->model->updateDisplay();
    $msg['success'] = false;
    $msg['type'] = 'update';
    if($result){
        $msg['success'] = true;
    }
    echo json_encode($msg);
}

public function deleteDisplay(){
    $result = $this->model->deleteDisplay();
    $msg['success'] = false;
    if ($result){
        $msg['success'] = true;
      
    }
    echo json_encode($msg);

}
}