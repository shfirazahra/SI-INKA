<?php

class Dashboardku extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'pegawai' && $this->session->login['role'] != 'admin' && $this->session->login['role'] != 'pimpinan') {
			redirect();
		}
		
		
		$this->data['aktif'] = 'dashboardku';
		$this->load->model('M_barangc', 'm_barangc');
		$this->load->model('M_peminjamku', 'm_peminjamku');
		$this->load->model('M_supplierku', 'm_supplierku');
		$this->load->model('M_pegawai', 'm_pegawai');
		$this->load->model('M_pimpinan', 'm_pimpinan');
		$this->load->model('M_pengeluaran', 'm_pengeluaran');
		$this->load->model('M_penerimaanku', 'm_penerimaanku');
		$this->load->model('M_pengguna', 'm_pengguna');
		$this->load->model('M_toko', 'm_toko');
		$this->load->model('M_laporan', 'm_laporan');
	}

	public function index(){
		$this->data['title'] = 'Halaman Dashboard';
		$this->data['jumlah_barangc'] = $this->m_barangc->jumlah();
		$this->data['jumlah_peminjamku'] = $this->m_peminjamku->jumlah();
		$this->data['jumlah_supplierku'] = $this->m_supplierku->jumlah();
		$this->data['jumlah_pegawai'] = $this->m_pegawai->jumlah();
		$this->data['jumlah_pimpinan'] = $this->m_pimpinan->jumlah();
		$this->data['jumlah_pengeluaran'] = $this->m_pengeluaran->jumlah();
		$this->data['jumlah_penerimaanku'] = $this->m_penerimaanku->jumlah();
		$this->data['jumlah_pengguna'] = $this->m_pengguna->jumlah();
		$this->data['toko'] = $this->m_toko->lihat();
		$this->data['laporan'] = $this->m_laporan->lihat();
		$this->load->view('dashboardku', $this->data);
	}
}