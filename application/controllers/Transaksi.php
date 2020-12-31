    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->output->enable_profiler(TRUE);
                
    }

    public function peminjaman()
    {  
        $data['pinjam'] = $this->m_transaksi->viewData()->result_array();
        $data['title'] = 'Peminjaman';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');

    }

    public function addDataPinjaman()
    {   
        $nim = $this->input->post('nim', true);        
        $isbn = $this->input->post('isbn', true);

        $ceknim = $this->m_transaksi->getDataNim($nim)->row_array();
        $cekisbn = $this->m_transaksi->getDataIsbn($isbn)->row_array();

        $this->form_validation->set_rules('isbn', 'Isbn','required');       
        $this->form_validation->set_rules('nim', 'Nim','required');           

        if ($ceknim > 0 && $cekisbn >0 && $this->form_validation->run()== true) {        
            $data = [
                'tgl_pinjam' => time(),
                'nim_anggota' => htmlspecialchars($this->input->post('nim', true)),
                'isbn_buku' => htmlspecialchars($this->input->post('isbn', true)),
            ];        
    
            $this->m_transaksi->inputData('meminjam', $data);
            //udate tb buku status id            
            $this->db->set('status_id', 0);
    
            $this->db->where('isbn', $isbn);
            $this->db->update('buku');

            $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Menambahkan data</div>');                    
            redirect('transaksi/peminjaman');
            
        }else{
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-warning" role="alert">ISBN atau NIM belum terdaftar</div>');                    
            redirect('transaksi/peminjaman');
            
        }         
    }

    



    public function pengembalian()
    {  
        $data['pengembalian'] = $this->m_transaksi->viewDataPengembalian()->result_array();
        $data['title'] = 'Pengembalian';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/pengembalian', $data);
        $this->load->view('templates/footer');

    }

    public function addDataPengembalian()
    {

        $isbn_buku = $this->input->post('isbn_buku');
        $nim_anggota = $this->input->post('nim_anggota');
        $tgl_kembali = time();

        $ceknim = $this->m_transaksi->getDataNim($nim_anggota)->row_array();
        $cekisbn = $this->m_transaksi->getDataIsbn($isbn_buku)->row_array();

        $this->form_validation->set_rules('isbn_buku', 'Isbn','required');       
        $this->form_validation->set_rules('nim_anggota', 'Nim','required'); 
        if ($ceknim > 0 && $cekisbn >0 && $this->form_validation->run()== true) {
            $this->m_transaksi->updatePengembalian($tgl_kembali, $isbn_buku, $nim_anggota);
            $this->db->set('kembali', 1);
    
            $this->db->where('isbn_buku', $isbn_buku);
            $this->db->update('meminjam');


            $this->db->set('status_id', 1);
    
            $this->db->where('isbn', $isbn_buku);
            $this->db->update('buku');
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Berhasil Menambahkan data</div>');                    
            redirect('transaksi/pengembalian');

        }else{
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-warning" role="alert">ISBN atau NIM belum terdaftar</div>');                    
            redirect('transaksi/pengembalian');
            
        }         

    }

    

}