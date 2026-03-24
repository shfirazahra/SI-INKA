<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('guru_model');
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth/');
        }
    }
	
    public function index()
	{
            $data['title'] = 'Daftar Guru';
			$data['data'] = $this->guru_model->get_all();
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/guru', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
    }

    public function tambah_guru(){
    $this->form_validation->set_rules('id_guru', 'Id Guru', 'required|trim',[
            'required' => 'Id Guru harus diisi.'
        ]);
    $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required|trim',[
        'required' => 'Nama Guru harus diisi.',
        'is_unique' => 'Nama Guru Sudah Ada. Buat nama guru baru!'
    ]);
    $this->form_validation->set_rules('nama_bimbel', 'Nama Bimbel', 'required|trim',[
        'required' => 'Nama Bimbel harus diisi.'
    ]);

    if ($this->form_validation->run() == false){
        $data['title'] = 'Gobel : Guru';
        $this->load->view('admin/nav', $data, FALSE);
        $this->load->view('admin/tambah_guru', $data, FALSE);
        $this->load->view('admin/foot', $data, FALSE);
    }else{
        $input = $this->input;

        // Tambahkan data ke tabel tb_guru
        $url = url_title($this->input->post('id_guru'), 'dash', true);
        $data = [
            'nama_guru' => $input->post('nama_guru', true),
           'id_guru' => $input->post('id_guru', true),
            //'url' => $url
        ];
        $guru_id = $this->guru_model->tambah_guru($data);

        // Tambahkan data ke tabel tb_bimbel
        $url = url_title($this->input->post('kode_bimbel'), 'dash', true);
        $data = [
            'nama_bimbel' => $input->post('nama_bimbel', true),
            'kode_bimbel' => $input->post('kode_bimbel', true),
           // 'nama_guru' => $input->post('nama_guru', true),
                    ];
        $this->guru_model->tambah_guru($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect(base_url('admin/guru'), 'refresh');
    }
}

    public function update_guru($id_guru){
            
        if($id_guru==null){
            redirect('admin/guru');
        }else{
           
            $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required|trim',[
                    'required' => 'Nama Guru harus diisi.'
                ]);
                
            if ($this->form_validation->run() == false){
            $guru = $this->guru_model->detail($id_guru);
            $data = array ('title' => 'Update Guru : '.$guru->nama_guru, 
                'guru' => $guru);
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/update_guru', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
            //kalau tidak ada error
            }else{
                $input = $this->input;
                
                $slug = url_title($this->input->post('nama_guru'), 'dash', true);
                $data = [
                'id_guru' => $id_guru,
                'nama_guru' => $input->post('nama_guru', true),
                
                
            ];
            $this->guru_model->update_guru($data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diupdate.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect(base_url('admin/guru'), 'refresh');
            }
        }
    }
    
    public function hapus_guru($id){
        $data = array('id_guru' => $id);
        $this->guru_model->hapus($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/guru', 'refresh');
    }
    
}