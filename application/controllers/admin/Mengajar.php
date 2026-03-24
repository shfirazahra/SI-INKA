<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mengajar extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth/');
        }
        $this->load->model('mengajar_model');
        $this->load->model('produk_model');
    }
    
    public function index(){
            $mengajar = $this->mengajar_model->get_all();
            $data= array('title'=> 'Data Mengajar Guru', 'mengajar'=>$mengajar);
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/mengajar', $data);
            $this->load->view('admin/foot');
            
        }
    public function hapus_mengajar($id_transaksi){
        $data = array('id_transaksi' => $id_transaksi);
        $this->mengajar_model->hapus_mengajar($data);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
        redirect('admin/mengajar', 'refresh');
    }
    public function detail_mengajar($id_transaksi){
        $transaksi = $this->mengajar_model->detail($id_transaksi);

        if($id_transaksi==''){
            redirect('admin/mengajar');
        }else{
            $data = array('title'=> 'Detail Mengajar','transaksi'=>$transaksi);
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/detail_mengajar', $data);
            $this->load->view('admin/foot');
        }
    }
    
}