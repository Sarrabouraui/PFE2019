<?php
 
class Slider_model extends CI_Model{
   
     public function __construct()
     {
     parent:: __construct();
     
     }
     
//fetch all pictures from db
function get_all_sliders(){
    $all_sliders = $this->db->get('sliders');
    return $all_sliders->result();
    }
     
    //save picture data to db
    function store_slider_data($data){
    $insert_data['slider_title'] = $data['slider_title'];
    $insert_data['slider_type'] = $data['slider_type'];
    $insert_data['slider_file'] = $data['slider_file'];
     
    $query = $this->db->insert('sliders', $insert_data);
    }
    
    //delete by SARRA
    function delete_slider_data($data){
        $this->db->where('slider_id', $data);
        $this->db->delete('sliders');
        }
    
    



    //slider of new launches
     public function new_launch_slide_articles()
     {
           $this->db->select('*');
                      $this->db->from('sliders');
                      $this->db->order_by('slider_id', 'DESC');
           return  $query = $this->db->get();
         
     }
    }
    