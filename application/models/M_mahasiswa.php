<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_mahasiswa extends CI_Model{
 
	function deleteData($where,$table)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}

	public function inputData($table, $data)
	{
		 return $this->db->insert($table, $data);
	}

	public function viewData()
	{
		return $this->db->get('anggota');
	}

	public function editData($where, $table)
	{
		return $this->db->get_where($table. $where);
	}

	public function updateData($where, $data, $table)
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}
}