<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        // echo $email = $this->session->userdata('email');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        } 

    }
    public function index()
    {   
        $data['laporan_buku'] = $this->db->count_all('buku');
        $data['laporan_anggota'] = $this->db->count_all('anggota');
        $data['laporan_peminjam'] = $this->db->query('select count(kembali) from meminjam where kembali=1')->row_array();
        $data['laporan_pengembalian'] = $this->db->query('select count(kembali) from meminjam where kembali=0')->row_array();


        $data['title'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');

    }

}