<?php

class Pic_model extends CI_Model
{

	function get_all_pics() //fetch all pictures from db
	{
		$all_pics = $this->db->get('pictures');
//		$lay_pics = $this->lay_cont->get('lay_cont');
		return $all_pics->result();
	}

	function getPicsByLayout()
	{
		$lay_id = $this->input->get('lay_id');
		$result = $this->db->get_where('lay_cont', array('lay' => $lay_id))->result();
		$output = print_r($result,1);
		log_message('error', $output);
		return $result;
	}


	function store_pic_data($data) //save picture data to db
	{
		$insert_data['pic_title'] = $data['pic_title'];
		$insert_data['pic_dur'] = $data['pic_dur'];
		$insert_data['pic_file'] = $data['pic_file'];

		$query = $this->db->insert('pictures', $insert_data);
	}


	function delete_pic_data($data) //delete by SARRA
	{
		$this->db->where('pic_id', $data);
		$this->db->delete('pictures');
	}


//	function update_pic_data($data)
//	{
//		$this->db->where('pic_id', $data);
//		$this->db->update('pictures');
//	}

}
