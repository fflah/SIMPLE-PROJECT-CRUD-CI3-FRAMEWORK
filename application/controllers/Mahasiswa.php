<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        // $this->output->enable_profiler(TRUE);
                
    }
    public function index()
    {  
        
        $data['mahasiswa'] = $this->m_mahasiswa->viewData()->result_array();    
        $data['title'] = 'Daftar Mahasiswa';  
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');

    }

    public function addData()
    {
        $this->form_validation->set_rules('nim', 'Nim', 'required|is_unique[anggota.nim]');

        if($this->form_validation->run()== true){
            
            $data = [
                'nama_anggota' => htmlspecialchars($this->input->post('nama_anggota', true)),
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'ttl_anggota' => $this->input->post('ttl_anggota', true),
                'status_anggota' => htmlspecialchars($this->input->post('status_anggota', true))
    
            ];        
    
            $this->m_mahasiswa->inputData('anggota', $data);
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Menambahkan data</div>');                    
            redirect('mahasiswa');

        }else{
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-warning" role="alert">Data yang anda masukan sudah terdaftar</div>');                    
            redirect('mahasiswa');

        }
    }

    public function deleteData($nim)
    {
        $where = array('nim' => $nim);
		$this->m_mahasiswa->deleteData($where, 'anggota');
        redirect('mahasiswa');
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Mengapus data </div>');                    
    }

    public function editData($nim)
    {
        $where = array('nim' => $nim);
        $data['mahasiswa'] = $this->m_mahasiswa->editData($where,'anggota')->result_array();


    }

    public function updateData()
    {
        $data = [
            'nama_anggota' => htmlspecialchars($this->input->post('nama_anggota', true)),
            'nim' => htmlspecialchars($this->input->post('nim', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'ttl_anggota' => $this->input->post('ttl_anggota', true),
            'status_anggota' => htmlspecialchars($this->input->post('status_anggota', true))

        ];  
        

        $id = $this->input->post('nim', true);

        $where = array(
            'nim' => $id
        );
        

        $this->m_mahasiswa->updateData($where, $data, 'anggota');
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Mengupdate data </div>');                    
        redirect('mahasiswa');

        
        
    }

}


