<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Dis_model extends CI_Model{
    public function showAllDisplay(){
       $query = $this->db->get('displays');
       if ($query->num_rows()>0){
        return $query->result();
       }else{
           return false;
       }
    }
    public function displayOn(){
        $this->db->select('count(*)');
        $this->db->from('displays'); 
        $this->db->where('logged','on');
        $query = $this->db->get();
    
        return $query->row();
     }
     public function displayOff(){
        $this->db->select('count(*)');
        $this->db->from('displays'); 
        $this->db->where('logged','off');
        $query = $this->db->get();
    
        return $query->row();
     }
     public function refresh(){
        
        $DB1 = $this->load->database('default',TRUE);
        $DB2 = $this->load->database('zabbix',TRUE);
        $data = array();
        $sql = $DB1->get('displays');
        $data = $sql->result_array();
       /*$data = $this->db->select('id')->get('displays');*/
       $d = $DB1->count_all('displays');

       for ($i=0; $i < $d/**/; $i++) { 
        $id = $data[$i];
        $query = $DB2->where('host',$id['id'])->select('error')->get('hosts');
        $query = $query->result_array();
        for ($i=0;$i<2;$i++){
        //for ($i=0;$i<$d;$i++){


        
        if ($query[$i]=/*'jhljhg'*/"Get value from agent failed : Cannot connect...") {
            $field['logged'] = "on";
        }
        else {
            $field['logged'] = "off";
        }
        $DB1->where('id', $id['id']);
        $DB1->update('displays', $field);
       } }
    }
    public function addDisplay(){
        $field = array(
            'mac'=>$this->input->post('txtMacAddress'),
            'ip'=>$this->input->post('txtIpAddress')

        );
        $this->db->insert('displays', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
public function editDisplay(){
    $id = $this->input->get('id');
    $this->db->where('id', $id);
    $query = $this->db->get('displays');
    if($query->num_rows() >0){
        return $query->row();
    }else{
        return false;
    }
}
public function updateDisplay(){
    $id= $this->input->post('txtId');
    $field = array(
        'mac'=> $this->input->post('txtMacAddress'),
        'ip'=> $this->input->post('txtIpAddress'),

    );
    $this->db->where('id', $id);
    $this->db->update('displays', $field);
    if($this->db->affected_rows() > 0){
        return true;
    }else{
        return false;
    }
}
function deleteDisplay(){
    $id = $this->input->get('id');
    $this->db->where('id', $id);
    $this->db->delete('displays');
    if($this->db->affected_rows() > 0){
        return true;
    }else{
        return false;
    }
}
}