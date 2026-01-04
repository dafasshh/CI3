<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Wisata_model');
        $this->load->library('session');
    }

    // --- HALAMAN UTAMA (BERANDA) + PENCARIAN ---
    public function index()
    {
        // Ambil input pencarian dari user (jika ada)
        $keyword = $this->input->post('keyword');

        // Panggil model dengan membawa keyword tadi
        // Note: Pastikan kamu update juga Wisata_model->get_all_wisata() agar menerima parameter ini
        $data['wisata'] = $this->Wisata_model->get_all_wisata($keyword);
        
        // Kita kirim balik keywordnya ke view supaya teks di kotak pencarian tidak hilang
        $data['keyword'] = $keyword;

        $this->load->view('beranda_view', $data);
    }

    // --- FITUR BOOKING ---
    public function pesan($id_wisata)
    {
        if($this->session->userdata('role') == 'admin') redirect('wisata');
        $data['detail'] = $this->Wisata_model->get_detail($id_wisata);
        $this->load->view('pesan_view', $data);
    }

    public function proses_pesan()
    {
        $id_wisata = $this->input->post('id_wisata');
        $jumlah    = $this->input->post('jumlah');
        $tipe      = $this->input->post('tipe');
        $metode    = $this->input->post('metode');

        $wisata = $this->Wisata_model->get_detail($id_wisata);
        $harga_satuan = ($tipe == "Domestik") ? $wisata['harga_domestik'] : $wisata['harga_mancanegara'];
        $total_bayar = $harga_satuan * $jumlah;

        $data_input = array(
            'id_wisata'         => $id_wisata,
            'nama'              => $this->input->post('nama'), 
            'no_hp'             => $this->input->post('no_hp'),
            'jumlah'            => $jumlah, 
            'total_harga'       => $total_bayar,
            'status'            => 'Menunggu',
            'tipe'              => $tipe,
            'metode_pembayaran' => $metode
        );

        $this->Wisata_model->simpan_pesanan($data_input);
        redirect('wisata/cek_status?keyword='.$this->input->post('nama'));
    }

    // --- FITUR TAMBAH ---
    public function tambah()
    {
        if($this->session->userdata('role') != 'admin') redirect('wisata');
        $this->load->view('tambah_wisata_view');
    }

    public function proses_tambah()
    {
        if($this->session->userdata('role') != 'admin') redirect('wisata');

        $config['upload_path']   = './assets/img/';
        $config['allowed_types'] = '*'; // JURUS PINTAS
        $config['file_name']     = time() . '_' . $_FILES['gambar']['name']; 

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            $nama_gambar = $upload_data['file_name'];
        } else {
            $nama_gambar = 'default.jpg'; 
        }
        
        $data = array(
            'nama'              => $this->input->post('nama'),
            'lokasi'            => $this->input->post('lokasi'),
            'kategori'          => $this->input->post('kategori'),
            'deskripsi'         => $this->input->post('deskripsi'),
            'harga_domestik'    => $this->input->post('harga_domestik'),
            'harga_mancanegara' => $this->input->post('harga_mancanegara'),
            'parkir_motor'      => $this->input->post('parkir_motor'),
            'parkir_mobil'      => $this->input->post('parkir_mobil'),
            'gambar'            => $nama_gambar
        );

        $this->Wisata_model->tambah_wisata($data);
        redirect('wisata');
    }

    // --- FITUR EDIT ---
    public function edit($id)
    {
        if($this->session->userdata('role') != 'admin') redirect('wisata');
        $data['wisata'] = $this->Wisata_model->get_detail($id);
        $this->load->view('edit_wisata_view', $data);
    }

    // --- PROSES EDIT ---
    public function proses_edit()
    {
        if($this->session->userdata('role') != 'admin') redirect('wisata');
        
        $id = $this->input->post('id');
        
        // Data dasar
        $data = array(
            'nama'           => $this->input->post('nama'),
            'lokasi'         => $this->input->post('lokasi'),
            'kategori'       => $this->input->post('kategori'),
            'deskripsi'      => $this->input->post('deskripsi'),
            'harga_domestik' => $this->input->post('harga')
        );

        // LOGIKA GANTI GAMBAR
        if (!empty($_FILES['gambar']['name'])) {
            
            $config['upload_path']   = './assets/img/';
            $config['allowed_types'] = '*'; 
            $config['file_name']     = time() . '_' . $_FILES['gambar']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config); 

            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $data['gambar'] = $upload_data['file_name'];
            } else {
                echo "<h3>Upload Gagal!</h3>";
                echo "Pastikan folder <b>assets/img</b> sudah ada.<br><br>";
                echo $this->upload->display_errors();
                die(); 
            }
        }

        $this->Wisata_model->update_wisata($id, $data);
        redirect('wisata');
    }

    // --- FITUR LAINNYA ---
    public function hapus($id)
    {
        if($this->session->userdata('role') != 'admin') redirect('wisata');
        $this->Wisata_model->hapus_wisata($id);
        redirect('wisata');
    }

    public function cek_status()
    {
        $keyword = $this->input->get('keyword');
        $data['hasil'] = null;
        if($keyword){
            $this->db->like('nama', $keyword);
            $this->db->or_like('id', $keyword);
            $data['hasil'] = $this->db->get('pemesanan')->result_array();
        }
        $this->load->view('cek_status_view', $data);
    }
}