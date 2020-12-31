<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_buku extends CI_Model{
 
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
		return $this->db->get('kategori');
    }
    public function viewDataBuku()
	{

		return $this->db->query('select distinct id_buku, isbn, judul_buku, pengarang, penerbit, id_kategori, nama_kategori, status_id from buku join kategori  on kategori_id= id_kategori ORDER BY id_buku ASC');
		
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