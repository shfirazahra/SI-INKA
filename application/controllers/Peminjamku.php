<?php

use Dompdf\Dompdf;

class Peminjamku extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'petugas' && $this->session->login['role'] != 'admin' && $this->session->login['role'] != 'pimpinan') redirect();
		$this->load->model('M_peminjamku', 'm_peminjamku');
		$this->data['aktif'] = 'peminjamku';
	}

	public function index(){
		$this->data['title'] = 'Data Peminjam';
		$this->data['all_peminjam'] = $this->m_peminjamku->lihat();
		$this->data['no'] = 1;

		$this->load->view('peminjamku/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Peminjam';

		$this->load->view('customer/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
		];

		if($this->m_peminjam->tambah($data)){
			$this->session->set_flashdata('success', 'Data Peminjam <strong>Berhasil</strong> Ditambahkan!');
			redirect('peminjam');
		} else {
			$this->session->set_flashdata('error', 'Data Peminjam <strong>Gagal</strong> Ditambahkan!');
			redirect('peminjam');
		}
	}

	public function ubah($kode){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Peminjam';
		$this->data['peminjam'] = $this->m_customer->lihat_id($kode);

		$this->load->view('peminjam/ubah', $this->data);
	}

	public function proses_ubah($kode){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
		];

		if($this->m_peminjam->ubah($data, $kode)){
			$this->session->set_flashdata('success', 'Data Peminjam <strong>Berhasil</strong> Diubah!');
			redirect('peminjam');
		} else {
			$this->session->set_flashdata('error', 'Data Peminjam <strong>Gagal</strong> Diubah!');
			redirect('peminjam');
		}
	}

	public function hapus($kode){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}
		
		if($this->m_peminjam->hapus($kode)){
			$this->session->set_flashdata('success', 'Data Peminjam <strong>Berhasil</strong> Dihapus!');
			redirect('peminjam');
		} else {
			$this->session->set_flashdata('error', 'Data Peminjam <strong>Gagal</strong> Dihapus!');
			redirect('peminjam');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		$this->data['all_peminjam'] = $this->m_peminjam->lihat();
		$this->data['title'] = 'Laporan Data Peminjam';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('peminjam/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Peminjam Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}