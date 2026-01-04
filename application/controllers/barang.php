<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class barang extends CI_Controller { 

    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_model');
    }

    public function index() 
    {
        $this->load->helper('url'); 
        $this->load->view('form_barang');
    } 
        


    public function simpan() 
    {
        $data = array(
            'kd_barang'   => $this->input->post('kd_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'harga'       => $this->input->post('harga'),
            'satuan'      => $this->input->post('satuan')
        );

        $this->barang_model->simpan_data($data);
        redirect('barang');
    }

} 