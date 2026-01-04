<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    // 1. Menampilkan Halaman Login (UPDATED)
    public function index()
    {
        // Jika sudah login, cek role-nya
        if($this->session->userdata('status') == "login"){
            if($this->session->userdata('role') == 'admin'){
                redirect('admin');
            } else {
                redirect('wisata');
            }
        }
        $this->load->view('login_view');
    }

    // 2. Proses Cek Password (Auth)
    public function auth()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        // Cek ke tabel 'users'
        $cek_user = $this->db->get_where('users', ['username' => $user])->row_array();

        if($cek_user) {
            // Jika username ada, cek password
            if($pass == $cek_user['password']) {
                
                // Simpan data diri ke session
                $data_session = array(
                    'nama'   => $user,
                    'role'   => $cek_user['role'], 
                    'status' => "login"
                );
                $this->session->set_userdata($data_session);

                // LOGIKA PEMISAH (Router) berdasarkan Role
                if($cek_user['role'] == 'admin'){
                    redirect('admin'); // Admin masuk ke Dashboard
                } else {
                    redirect('wisata'); // User biasa masuk ke Wisata
                }

            } else {
                // Password Salah
                $this->session->set_flashdata('pesan', 'Password Salah!');
                redirect('login');
            }
        } else {
            // Username Tidak Ditemukan
            $this->session->set_flashdata('pesan', 'Username tidak terdaftar!');
            redirect('login');
        }
    }

    // 3. Fungsi Logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}