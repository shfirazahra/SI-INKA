<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_laporan');
    }

    public function index() {
        $data['laporan'] = $this->M_laporan->lihat();
        $this->load->view('laporan/index', $data);
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'tanggal' => date('Y-m-d H:i:s')
            ];

            $this->M_laporan->tambah($data);
            redirect('laporan');
        } else {
            $this->load->view('laporan/tambah');
        }
    }

    public function hapus($id) {
        $this->M_laporan->hapus($id);
        redirect('laporan');
    }
}
