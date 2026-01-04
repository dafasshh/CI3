<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata_model extends CI_Model { // Perhatikan: Ini extends CI_Model

    // 1. Ambil Semua Data Wisata (Untuk Beranda)
    // 1. Ambil Data Wisata (Bisa Semua, Bisa Pencarian)
    public function get_all_wisata($keyword = null)
    {
        if ($keyword) {
            // Jika ada keyword, cari berdasarkan Nama ATAU Lokasi
            $this->db->like('nama', $keyword);
            $this->db->or_like('lokasi', $keyword);
            $this->db->or_like('kategori', $keyword);
        }
        
        // Urutkan dari yang terbaru (opsional)
        // $this->db->order_by('id', 'DESC'); 
        
        return $this->db->get('destinasi')->result_array();
    }

    // 2. Ambil Detail Wisata per ID (Untuk Halaman Pesan/Edit)
    public function get_detail($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('destinasi')->row_array();
    }

    // 3. Simpan Pesanan Baru (Dari User)
    public function simpan_pesanan($data)
    {
        $this->db->insert('pemesanan', $data);
    }

    // 4. Tambah Wisata Baru (Dari Admin)
    public function tambah_wisata($data)
    {
        $this->db->insert('destinasi', $data);
    }

    // 5. Hapus Wisata
    public function hapus_wisata($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('destinasi');
    }

    // 6. Update Wisata
    public function update_wisata($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('destinasi', $data);
    }

    // --- BAGIAN KHUSUS ADMIN ---

    // 7. Ambil Semua Pesanan (Untuk Admin Verifikasi)
    public function get_all_pesanan()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('pemesanan')->result_array();
    }

    // 8. Update Status Pesanan (Setujui/Tolak)
    public function update_status_pesanan($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('pemesanan', ['status' => $status]);
    }
}