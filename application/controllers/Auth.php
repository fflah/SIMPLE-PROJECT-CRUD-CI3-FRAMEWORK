<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        
        
    }
    public function index()
    {
        if($this->session->userdata('email')){
            redirect('admin');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run()== false) {
            $data['title'] = 'Perpusku | Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
       
        }else{
            $this->_login();
        }
        
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //jika user ada
        if ($user) {
            //jika user aktif
            if ($user['is_aktif'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    }else{
                        redirect('user');
                    }
                    
                    
                } else {
                    $this->session->set_flashdata('message','<div id="notif" class="alert alert-danger" role="alert">Password salah</div>');
                    redirect('auth');
                }


            }else {
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-danger" role="alert">Email belum diaktifasi</div>');
            redirect('auth');
            }

        }else {            
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-danger" role="alert">Email atau password yang anda masukan salah</div>');
            redirect('auth');
        }
    }


    public function registration()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'Email sudah pernah digunakan'           
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', 'min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim', 'matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Perpusku | Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        }else {
            echo "tes";
            $data = [
                'name' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'foto' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_aktif' => 1,
                'date_created' => time()

            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Registrasi berhasil, silakan login</div>');
            redirect('auth');
        }
        
    }

    public function logout()
    { 
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Anda berhasil Logout</div>');
        redirect('auth');
    }

}
