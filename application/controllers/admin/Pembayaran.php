<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth/');
        }
        $this->load->model('pembayaran_model');
        $this->load->model('produk_model');
    }
    
    public function index(){
            $pembayaran = $this->pembayaran_model->get_all();
            $data= array('title'=> 'Data Pembayaran', 'pembayaran'=>$pembayaran);
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/pembayaran', $data);
            $this->load->view('admin/foot');
            
        }
    public function hapus_pembayaran($id_transaksi){
        $data = array('id_transaksi' => $id_transaksi);
        $this->pembayaran_model->hapus_pembayaran($data);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
        redirect('admin/pembayaran', 'refresh');
    }
    public function detail_pembayaran($id_transaksi){
        $transaksi = $this->pembayaran_model->detail($id_transaksi);

        if($id_transaksi==''){
            redirect('admin/pembayaran');
        }else{
            $data = array('title'=> 'Detail Pembayaran','transaksi'=>$transaksi);
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/detail_pembayaran', $data);
            $this->load->view('admin/foot');
        }
    }
    
}