<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_model extends CI_Model {

    public function __construct()
	{
		
        }
        public function get_events($start, $end)
        {
            return $this->db->where("start >=", $start)->where("end <=", $end)->get("calendar_events");
            
            //return $this->db->where("date=", $date)->get("events");
        }

        public function get_layouts()
        {
            //return $this->db->get("layouts");
            $all_lays = $this->db->get('layouts');
             return $all_lays->result();
        }
        
        public function add_event($data)
        {
            $this->db->insert("calendar_events", $data);
        }
        
        public function get_event($id)
        {
            return $this->db->where("ID", $id)->get("calendar_events");
        }
        
        public function update_event($id, $data)
        {
            $this->db->where("ID", $id)->update("calendar_events", $data);
        }
        
        public function delete_event($id)
        {
            $this->db->where("ID", $id)->delete("calendar_events");
        }
        
}