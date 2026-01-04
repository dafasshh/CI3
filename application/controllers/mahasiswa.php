<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller { 

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa_model');
    }

    public function index() 
    {
        $this->load->helper('url'); 
        $this->load->view('form_mahasiswa');
    } 
        


    public function simpan() 
    {
        $data = array(
            'nim'     => $this->input->post('nim'),
            'nama'    => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan')
        );

        $this->mahasiswa_model->simpan_data($data);
        redirect('mahasiswa');
    }

} 