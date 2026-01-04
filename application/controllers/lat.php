<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lat extends CI_Controller {

    public function index()
    {$data['mahasiswa'] = [
        ['nim' => '20001', 'nama' => 'rani',  'jurusan' => 'SI'],
        ['nim' => '20002', 'nama' => 'Budi',  'jurusan' => 'TI'],
        ['nim' => '20003', 'nama' => 'janah',  'jurusan' => 'IT'],
    ];
        // Tampilkan form
        $this->load->view('tabel' , $data);
    }
}