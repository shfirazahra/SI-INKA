<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('siswa_model');
        $this->load->model('kategori_model');
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth/');
        }
    }

    public function index(){
        $siswa = $this->siswa_model->get_all('siswa');
         
        $data = array ('title'=>'Data Siswa', 
            'siswa'=>$siswa);
        $this->load->view('admin/nav', $data, FALSE);
        $this->load->view('admin/siswa', $data, FALSE);
        $this->load->view('admin/foot', $data, FALSE);
    }

    public function tambah_produk(){
        //Ambil data kategori
        $kategori = $this->kategori_model->get_all();
        
        $this->form_validation->set_rules('id_kategori', 'kategori produk', 'required|trim',[
            'required' => 'kategori produk harus diisi.'
        ]);
        $this->form_validation->set_rules('nama_bimbel', 'Nama', 'required|trim',[
            'required' => 'Nama produk harus diisi.'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim',[
            'required' => 'Harga harus diisi.'
        ]);
        $this->form_validation->set_rules('metode', 'Metode', 'required|trim',[
            'required' => 'Metode harus diisi.'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim',[
            'required' => 'Deskripsi harus diisi.'
        ]);
        
        if ($this->form_validation->run() == false){

        // Mengenerate ID Barang
        $kode_terakhir = $this->siswa_model->getMax('tb_bimbel', 'kode_bimbel');
        $kode_tambah = substr($kode_terakhir, -6, 6);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
        $kode_bimbel['kode_bimbel'] = 'KP' . $number;
        $data = array ('title' => 'Tambah Produk', 
                'kode_bimbel'=> $kode_bimbel,
                'kategori' => $kategori);
        $this->load->view('admin/nav', $data,$kode_bimbel, FALSE);
        $this->load->view('admin/tambah_produk', $kode_bimbel, $data, FALSE);
        $this->load->view('admin/foot', $data, $kode_bimbel, FALSE);
        //End validasi
    }else{
        $config['upload_path'] ='assets/admin/foto/';
        $config['allowed_types'] ='jpg|png|jpeg';
        $config['max_size'] ='2048';
        $this->load->library('upload',$config);
        
        if($this->upload->do_upload('foto')){
            
            $gbr = $this->upload->data(); 
            //proses insert
            $data = [
            'id_kategori' => $this->input->post('id_kategori', true),
            'kode_bimbel' => $this->input->post('kode_bimbel', true),
            'nama_bimbel' => htmlspecialchars($this->input->post('nama', true)),
           
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
            'tanggal_post' => $this->input->post('tanggal_post', true),
            'gambar' => $gbr['file_name']
        ];
            $this->siswa_model->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/siswa', 'refresh');
            }
        }
    }

    public function update_produk($id_produk = null){
    //Ambil data
    $produk = $this->siswa_model->getbyid($id_produk);
    $kategori = $this->kategori_model->get_all();

    if($id_produk==null){
        redirect('admin/siswa');
    }else{
    //validasi input
    $valid = $this->form_validation;
    $valid->set_rules('nama_bimbel', 'Nama Produk', 'required',
        array('required' => '%s harus diisi.'));
    
   

    $valid->set_rules('deskripsi', 'Deskripsi', 'required',
        array('required' => '%s harus diisi.'));        
    

    if($valid->run()){
        //Cek jika gambar diganti
        if(!empty($_FILES['gambar']['name'])){

        $config['upload_path'] ='./assets/admin/foto/';
        $config['allowed_types'] ='jpg|png|jpeg';
        $config['max_size'] ='2048';
        $this->load->library('upload',$config);
        
        if(!$this->upload->do_upload('gambar')){
    //end validasi

    $data = array('title' => 'Edit Data Produk : '.$produk->nama_bimbel,
                'message' => $this->upload->display_errors(),
                'produk' => $produk,
                'kategori' => $kategori);
    $this->load->view('admin/nav', $data, FALSE);
    $this->load->view('admin/update_produk', $data, FALSE);
    $this->load->view('admin/foot', $data, FALSE);
    
    //Masuk database
    }else{
          
        $gbr = array('upload_data' => $this->upload->data());
        $i = $this->input;
        $data = array('id_produk'   => $id_produk,
                    'id_kategori'   => $i->post('id_kategori'),
                    'kode_bimbel'   => $i->post('kode_bimbel'),
                    'nama_bimbel'   => $i->post('nama_bimbel'),
                   
                    'deskripsi'     => $i->post('deskripsi'),
                    'gambar'        => $gbr['upload_data']['file_name']
                    );

        $this->siswa_model->update_produk($data);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diedit.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/siswa'), 'refresh');
        }}else{
            //Edit produk tanpa mengganti gambar
            $i = $this->input;
            $data = array('id_produk'   => $id_produk,
                'id_kategori'   => $i->post('id_kategori'),
                'kode_bimbel'   => $i->post('kode_bimbel'),
                'nama_bimbel'   => $i->post('nama_bimbel'),
                
                'deskripsi'     => $i->post('deskripsi'),
                // 'gambar'        => $gbr['upload_data']['file_name']
                );

            $this->siswa_model->update_produk($data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diedit.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect(base_url('admin/siswa'), 'refresh');
        }}
            $data = array('title' => 'Edit Data Produk : '.$produk->nama_bimbel,
            'produk' => $produk,
            'kategori' => $kategori);
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/update_produk', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
        }   
    }
     
    public function detail_produk($id_produk){
        $data['produk'] = $this->siswa_model->get($id_produk);
        if($id_produk==null){
            redirect('admin/siswa');
        }else{
        $data['title'] = 'Detail Produk';
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/detail_produk', $data);
        $this->load->view('admin/foot');
        }
    }
    
    public function hapus_produk($id){
        $data = array('id_produk' => $id);
        $this->siswa_model->hapus($data, 'produk');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
        redirect('admin/siswa', 'refresh');
    }
    
}