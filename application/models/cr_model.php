<?php

class Cr_model extends CI_Model
{

	function get_all_pics()
	{
		$all_pics = $this->db->get('pictures');
		return $all_pics->result();
	}

	public function add($data)
	{
		$this->db->select_max('lay_id', 'max');
		$query = $this->db->get('layouts');
		$max = $query->row()->max;

		$d = $this->db->get_where('pictures', array('pic_id' => $data))->result();

		$insert_data['lay'] = $max;
		$insert_data['pic'] = $data;
		$insert_data['pic_file'] = $d[0]->pic_file;

		$this->db->insert('lay_cont', $insert_data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


}

