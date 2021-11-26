<?php

class Lay_model extends CI_Model
{
	function __construct(){
		parent:: __construct();
	}

//fetch all pictures from db
	function get_all_pics()
	{
		$all_pics = $this->db->get('pictures');
		return $all_pics->result();
	}

	public function showAllLayout()
	{
		$query = $this->db->get('layouts');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}


	public function addLayout()
	{
		$field = array(
			'lay_title' => $this->input->post('txtName'),
			'lay_desc' => $this->input->post('txtFrom'),
		);
		$this->db->insert('layouts', $field);
		$result = $this->db->insert_id();
		if ($this->db->affected_rows() > 0) {

			return $result;
		} else {
			return false;
		}
	}

	public function editLayout()
	{
		$lay_id = $this->input->get('lay_id');
		$this->db->where('lay_id', $lay_id);
		$query = $this->db->get('layouts');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function updateLayout()
	{
		$lay_id = $this->input->post('txtId');
		$field = array(
			'lay_title' => $this->input->post('txtName'),
			'lay_desc' => $this->input->post('txtFrom'),
		);
		$this->db->where('lay_id', $lay_id);
		$this->db->update('layouts', $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function deleteLayout()
	{
		$lay_id = $this->input->get('lay_id');
		$this->db->where('lay_id', $lay_id);
		$this->db->delete('layouts');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function slide()
	{
		$lay_id = $this->input->get('lay_id');
		/*$query = $this->db->query("SELECT P.pic_file FROM pictures P, lay_cont LA, layouts L
        WHERE LA.pic = P.pic_id AND LA.lay = $lay_id ;");*/
		$this->db->select('pic_file');
		$this->db->from('pictures');
		$this->db->join('lay_cont', 'lay_cont.pic = pictures.pic_id ');
		//$this->db->where('lay_cont.lay', $lay_id);
		//$this->db->join("l.lay = '$lay_id'");
		$query = $this->db->get();
		//return $query->result();

	}

	public function event()
	{
		$field = array(
			'title' => $this->input->post('txtName'),
			'date' => $this->input->post('txtDate'),
			'start' => $this->input->post('txtFrom'),
			'end' => $this->input->post('txtTo')
		);
		$this->db->insert('events', $field);
	}

	public function addOrDeleteWeather($pfile, $enabled)
	{
		$field = array(
			'lay_weather' => $enabled,
		);
		$this->db->where('lay_id', $pfile);
		$this->db->update('layouts', $field);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function addOrDeleteTime($pfile, $enabled)
	{
		$field = array(
			'lay_time' => $enabled,
		);
		$this->db->where('lay_id', $pfile);
		$this->db->update('layouts', $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

}
