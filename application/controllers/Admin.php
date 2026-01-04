<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller { // Perhatikan: Ini extends CI_Controller

    public function __construct() {
        parent::__construct();
        // Load model yang sudah kita perbaiki tadi
        $this->load->model('Wisata_model');
        $this->load->library('session');

        // Cek apakah yang login adalah admin
        if($this->session->userdata('role') != 'admin'){
            redirect('login');
        }
    }

    // --- HALAMAN DASHBOARD ADMIN ---
    public function index()
    {
        // Ambil data pesanan dari Model
        $data['pesanan'] = $this->Wisata_model->get_all_pesanan();
        
        // Tampilkan ke view
        $this->load->view('admin_view', $data);
    }

    // --- FITUR UPDATE STATUS (LUNAS/TOLAK) ---
    public function verifikasi($id_pesanan, $status)
    {
        // Panggil fungsi update di model
        $this->Wisata_model->update_status_pesanan($id_pesanan, $status);
        
        // Kembali ke dashboard
        redirect('admin');
    }
}