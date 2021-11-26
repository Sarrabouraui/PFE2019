<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Admin_model extends CI_Model{
    public function showAllUser(){
       $query = $this->db->get('users');
       if ($query->num_rows()>0){
        return $query->result();
       }else{
           return false;
       }
    }
    public function addUser(){
        $field = array(
            'username'=>$this->input->post('txtName'),
            'password'=>$this->input->post('txtPass')

        );
        $this->db->insert('users', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
public function editUser(){
    $id = $this->input->get('id');
    $this->db->where('id', $id);
    $query = $this->db->get('users');
    if($query->num_rows() >0){
        return $query->row();
    }else{
        return false;
    }
}
public function updateUser(){
    $id= $this->input->post('txtId');
    $field = array(
        'username'=> $this->input->post('txtName'),
        'password'=> $this->input->post('txtPass'),

    );
    $this->db->where('id', $id);
    $this->db->update('users', $field);
    if($this->db->affected_rows() > 0){
        return true;
    }else{
        return false;
    }
}
function deleteUser(){
    $id = $this->input->get('id');
    $this->db->where('id', $id);
    $this->db->delete('users');
    if($this->db->affected_rows() > 0){
        return true;
    }else{
        return false;
    }
}
}