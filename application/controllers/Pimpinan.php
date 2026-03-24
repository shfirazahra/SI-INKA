<?php

use Dompdf\Dompdf;

class Pimpinan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'pimpinan' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'pimpinan';
		$this->load->model('M_pimpinan', 'm_pimpinan');
	}

	public function index(){
		$this->data['title'] = 'Data Kepala Kantor';
		$this->data['all_pimpinan'] = $this->m_pimpinan->lihat();
		$this->data['no'] = 1;

		$this->load->view('pimpinan/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'pimpinan'){
			
		}

		$this->data['title'] = 'Tambah Kepala Kantor';

		$this->load->view('pimpinan/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'pimpinan'){
			
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if($this->m_pimpinan->tambah($data)){
			$this->session->set_flashdata('success', 'Data Kepala Kantor <strong>Berhasil</strong> Ditambahkan!');
			redirect('pimpinan');
		} else {
			$this->session->set_flashdata('error', 'Data Kepala Kantor <strong>Gagal</strong> Ditambahkan!');
			redirect('pimpinan');
		}
	}

	public function ubah($id){
		if ($this->session->login['role'] == 'pimpinan'){
			
		}

		$this->data['title'] = 'Ubah Kepala Kantor';
		$this->data['pimpinan'] = $this->m_pimpinan->lihat_id($id);

		$this->load->view('pimpinan/ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['role'] == 'pimpinan'){
			
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		];

		if($this->m_pimpinan->ubah($data, $id)){
			$this->session->set_flashdata('success', 'Data Kepala Kantor <strong>Berhasil</strong> Diubah!');
			redirect('pimpinan');
		} else {
			$this->session->set_flashdata('error', 'Data Kepala Kantor <strong>Gagal</strong> Diubah!');
			redirect('pimpinan');
		}
	}

	public function hapus($id){
		if ($this->session->login['role'] == 'pimpinan'){
			
		}

		if($this->m_pimpinan->hapus($id)){
			$this->session->set_flashdata('success', 'Data Kepala Kantor <strong>Berhasil</strong> Dihapus!');
			redirect('pimpinan');
		} else {
			$this->session->set_flashdata('error', 'Data Kepala Kantor <strong>Gagal</strong> Dihapus!');
			redirect('pimpinan');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_pimpinan'] = $this->m_pimpinan->lihat();
		$this->data['title'] = 'Laporan Data Kepala Kantor';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('pimpinan/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Kepala Kantor Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}