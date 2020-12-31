<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Buku extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_buku');
        // $this->output->enable_profiler(TRUE);
                
    }

    public function daftarBuku()
    {   $data['dataBuku'] = $this->m_buku->viewDataBuku()->result_array();
        $data['kategori'] = $this->m_buku->viewData()->result_array();
        $data['title'] = 'Daftar Buku';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('buku/index', $data); //kontent
        $this->load->view('templates/footer');

    }

    public function categori()
    {  
        $data['buku'] = $this->m_buku->viewData()->result_array();
        $data['title'] = 'Categori';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('buku/categori', $data);
        $this->load->view('templates/footer');

    }

    public function addDataKategori()
    {
        $data = [
            'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true))

        ];        

        $this->m_buku->inputData('kategori', $data);
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Menambahkan data</div>');                    
        redirect('buku/categori');
    }

    public function addDataBuku()
    {
        $data = [
            'isbn' => htmlspecialchars($this->input->post('isbn', true)),
            'judul_buku' => htmlspecialchars($this->input->post('judul_buku', true)),
            'kategori_id' => htmlspecialchars($this->input->post('kategori_id', true)),
            'pengarang' => htmlspecialchars($this->input->post('pengarang', true)),
            'penerbit' => htmlspecialchars($this->input->post('penerbit', true)),
            'status_id' => 1

        ];        

        
        $this->m_buku->inputData('buku', $data);
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Menambahkan data</div>');                    
        redirect('buku/daftarBuku');
    }

    public function deleteDataKategori($id_kategori)
    {
        $where = array('id_kategori' => $id_kategori);
		$this->m_mahasiswa->deleteData($where, 'kategori');
		redirect('buku/categori');
    }
    
    public function deleteDataBuku($id_buku)
    {
        $where = array('id_buku' => $id_buku);
		$this->m_mahasiswa->deleteData($where, 'buku');
		redirect('buku/daftarBUku');
    }


    public function editCategori()
    {
        $where = array('id_$id_kategori' => $id_kategori);
        $data['buku'] = $this->m_buku->editData($where,'kategori')->result_array();
    }

    public function updateDataKategori()
    {
        $data = [
            'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true))

        ];  
        
        $id = $this->input->post('id_kategori', true);
        $where = array(
            'id_kategori' => $id
        );
        
        $this->m_buku->updateData($where, $data, 'kategori');
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Mengupdate data</div>');                    
        redirect('buku/categori');
    }

    public function updateDataBuku()
    {
        $data = [
            'isbn' => htmlspecialchars($this->input->post('isbn', true)),
            'judul_buku' => htmlspecialchars($this->input->post('judul_buku', true)),
            'pengarang' => htmlspecialchars($this->input->post('pengarang', true)),
            'penerbit' => htmlspecialchars($this->input->post('penerbit', true)),
            'kategori_id' => htmlspecialchars($this->input->post('kategori_id', true))

        ];  
        
        print_r($this->input->post());
        $id = $this->input->post('id_buku', true);
        $where = array(
            'id_buku' => $id
        );
        

        $this->m_buku->updateData($where, $data, 'buku');
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Mengupdate data</div>');                    
        redirect('buku/daftarBuku');
        
        
    }

}