<?php

class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'pegawai' && $this->session->login['role'] != 'admin' && $this->session->login['role'] != 'pimpinan') {
			redirect();
		}
		
		
		$this->data['aktif'] = 'dashboard';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_peminjam', 'm_peminjam');
		$this->load->model('M_supplier', 'm_supplier');
		$this->load->model('M_pegawai', 'm_pegawai');
		$this->load->model('M_pimpinan', 'm_pimpinan');
		$this->load->model('M_pengeluaran', 'm_pengeluaran');
		$this->load->model('M_penerimaan', 'm_penerimaan');
		$this->load->model('M_pengguna', 'm_pengguna');
		$this->load->model('M_toko', 'm_toko');
		$this->load->model('M_laporan', 'm_laporan');
	}

	public function index(){
		$this->data['title'] = 'Halaman Dashboard';
		$this->data['jumlah_barang'] = $this->m_barang->jumlah();
		$this->data['jumlah_peminjam'] = $this->m_peminjam->jumlah();
		$this->data['jumlah_supplier'] = $this->m_supplier->jumlah();
		$this->data['jumlah_pegawai'] = $this->m_pegawai->jumlah();
		$this->data['jumlah_pimpinan'] = $this->m_pimpinan->jumlah();
		$this->data['jumlah_pengeluaran'] = $this->m_pengeluaran->jumlah();
		$this->data['jumlah_penerimaan'] = $this->m_penerimaan->jumlah();
		$this->data['jumlah_pengguna'] = $this->m_pengguna->jumlah();
		$this->data['toko'] = $this->m_toko->lihat();
		$this->data['laporan'] = $this->m_laporan->lihat();
		$this->load->view('dashboard', $this->data);
	}
}