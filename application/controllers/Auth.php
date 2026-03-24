<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function index()
	{
            if ($this->session->userdata('email')){
                redirect('admin/dashboard');
            }
        
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
                'required' => 'Email harus diisi!',
                'valid_email' => 'Email tidak valid!'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|trim', [
                'required' => 'Password harus diisi!',
            ]);
            
            if($this->form_validation->run() == FALSE){
            $data['title'] = 'Sistem Informasi Kantor Wilayah ATR/BPN Jawa Tengah';
            $this->load->view('admin/nav_admin', $data, FALSE);
            $this->load->view('login', $data, FALSE);
            $this->load->view('admin/foot_admin', $data, FALSE);
            }else{
                //validasi sukses
                $this->_login();
            }
        }
        
        public function proses_login(){
		if($this->input->post('role') === 'pegawai') $this->_proses_login_pegawai($this->input->post('username'));
		elseif($this->input->post('role') === 'pimpinan') $this->_proses_login_admin($this->input->post('pimpinan'));
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
	$get_pimpinan = $this->m_pengguna->lihat_username($username);
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

}