<?php

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if($this->session->login) {
			$role = $this->session->login['role'];
			switch ($role) {
				case 'pegawai':
					redirect('dashboard');
					break;
				case 'admin':
					redirect('dashboard');
					break;
				case 'pimpinan':
					redirect('dashboardku');
					break;
				default:
					redirect('login'); // Atau halaman lain jika peran tidak dikenali
					break;
			}
		}
		
		$this->load->model('M_pimpinan', 'm_pimpinan');
		$this->load->model('M_pegawai', 'm_pegawai');
		$this->load->model('M_pengguna', 'm_pengguna');
		
	}


	public function proses_login(){
		if($this->input->post('role') === 'pimpinan') $this->_proses_login_pimpinan($this->input->post('username'));
		elseif($this->input->post('role') === 'pegawai') $this->_proses_login_pegawai($this->input->post('username'));
		elseif($this->input->post('role') === 'admin') $this->_proses_login_admin($this->input->post('username'));
		else {
			?>
			<script>
				alert('role tidak tersedia!')
			</script>
			<?php
		}
	}

	protected function _proses_login_pegawai($username){
		$get_pegawai = $this->m_pegawai->lihat_username($username);
		if($get_pegawai){
			if($get_pegawai->password == $this->input->post('password')){
				$session = [
					'kode' => $get_pegawai->kode,
					'nama' => $get_pegawai->nama,
					'username' => $get_pegawai->username,
					'password' => $get_pegawai->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
				$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}
	protected function _proses_login_pimpinan($username){
		$get_pimpinan = $this->m_pimpinan->lihat_username($username);
		if($get_pimpinan){
			if($get_pimpinan->password == $this->input->post('password')){
				$session = [
					'kode' => $get_pimpinan->kode,
					'nama' => $get_pimpinan->nama,
					'username' => $get_pimpinan->username,
					'password' => $get_pimpinan->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
				$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('dashboardku');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}
	

	protected function _proses_login_admin($username){
		$get_pengguna = $this->m_pengguna->lihat_username($username);
		if($get_pengguna){
			if($get_pengguna->password == $this->input->post('password')){
				$session = [
					'kode' => $get_pengguna->kode,
					'nama' => $get_pengguna->nama,
					'username' => $get_pengguna->username,
					'password' => $get_pengguna->password,
					'role' => $this->input->post('role'),
					'jam_masuk' => date('H:i:s')
				];

				$this->session->set_userdata('login', $session);
				$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('dashboard');
				$this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
				redirect('dashboardku');
			} else {
				$this->session->set_flashdata('error', 'Password Salah!');
				redirect();
			}
		} else {
			$this->session->set_flashdata('error', 'Username Salah!');
			redirect();
		}
	}
}