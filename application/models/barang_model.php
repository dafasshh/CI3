<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class barang_model extends CI_Model {

    public function simpan_data($data)
    {
        return $this->db->insert('barang_latihan', $data);
    }
}