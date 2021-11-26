<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Admin extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('Admin_model','model');
    }
    function index(){
        $this->load->view('admin');
    }
    public function showAllUser(){
$result = $this->model->showAllUser();
echo json_encode($result);
    }
    public function addUser(){
        $result = $this->model->addUser();
        $msg['success']=false;
        $msg['type'] = 'add';
        if ($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
public function editUser(){
    $result = $this->model->editUser();
    echo json_encode($result);

}
public function updateUser(){
    $result = $this->model->updateUser();
    $msg['success'] = false;
    $msg['type'] = 'update';
    if($result){
        $msg['success'] = true;
    }
    echo json_encode($msg);
}

public function deleteUser(){
    $result = $this->model->deleteUser();
    $msg['success'] = false;
    if ($result){
        $msg['success'] = true;
      
    }
    echo json_encode($msg);

}
}