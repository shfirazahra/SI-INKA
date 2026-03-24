<?php

use Dompdf\Dompdf;

class Pegawai extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'pegawai' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'pegawai';
		$this->load->model('M_pegawai', 'm_pegawai');
	}

	public function index(){
		if ($this->session->login['role'] == 'pegawai'){
			$this->session->set_flashdata('error', 'Managemen Pegawai hanya untuk pegawai!');
			redirect('dashboard');
		}
		$this->data['title'] = 'Data Pegawai';
		$this->data['all_pegawai'] = $this->m_pegawai->lihat();
		$this->data['no'] = 1;

		$this->load->view('pegawai/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'pegawai'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin & pegawai!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Pegawai';

		$this->load->view('pegawai/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'pegawai'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin & pegawai!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if($this->m_petugas->tambah($data)){
			$this->session->set_flashdata('success', 'Data Pegawai <strong>Berhasil</strong> Ditambahkan!');
			redirect('pegawai');
		} else {
			$this->session->set_flashdata('error', 'Data Pegawai <strong>Gagal</strong> Ditambahkan!');
			redirect('pegawai');
		}
	}

	public function ubah($id){
		if ($this->session->login['role'] == 'pegawai'){
			
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Pegawai';
		$this->data['pegawai'] = $this->m_pegawai->lihat_id($id);

		$this->load->view('pegawai/ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['role'] == 'pegawai'){
			
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if($this->m_pegawai->ubah($data, $id)){
			$this->session->set_flashdata('success', 'Data Pegawai <strong>Berhasil</strong> Diubah!');
			redirect('pegawai');
		} else {
			$this->session->set_flashdata('error', 'Data Pegawai <strong>Gagal</strong> Diubah!');
			redirect('pegawai');
		}
	}

	public function hapus($id){
		if ($this->session->login['role'] == 'pegawai'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}

		if($this->m_pegawai->hapus($id)){
			$this->session->set_flashdata('success', 'Data Pegawai <strong>Berhasil</strong> Dihapus!');
			redirect('pegawai');
		} else {
			$this->session->set_flashdata('error', 'Data Pegawai <strong>Gagal</strong> Dihapus!');
			redirect('pegawai');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_pegawai'] = $this->m_pegawai->lihat();
		$this->data['title'] = 'Laporan Data Pegawai';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('pegawai/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Pegawai Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}