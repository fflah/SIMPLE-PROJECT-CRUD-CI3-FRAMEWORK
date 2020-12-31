<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_transaksi extends CI_Model{
 
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
		return $this->db->query('select tgl_pinjam, nim_anggota, nama_anggota, isbn_buku, judul_buku, kembali from meminjam join anggota join buku on nim=nim_anggota and isbn=isbn_buku where kembali=0');
	}

	public function viewDataPengembalian()
	{
		return $this->db->query('select tgl_kembali, nim_anggota, nama_anggota, isbn_buku, judul_buku, kembali from meminjam join anggota join buku on nim=nim_anggota and isbn=isbn_buku where kembali=1;
		');
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

	public function updatePengembalian($tgl_kembali, $isbn_buku, $nim_anggota)
	{
        return $this->db->query("update meminjam set kembali = 0, tgl_kembali ='$tgl_kembali' where isbn_buku='$isbn_buku' and nim_anggota='$nim_anggota'");
	}

	public function getDataNim($nim)
	{
		return $this->db->query("select nim from anggota where nim = '$nim'");
	}

	public function getDataIsbn($isbn)
	{
		return $this->db->query("select isbn from buku where isbn = '$isbn'");
	}

}