<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
    
   public function __construct() {
        parent::__construct();
        
        $this->load->model('berita_model');
    }
    public function index(){
        $berita_listing  = $this->berita_model->nav_berita();
        $listing_kategori = $this->berita_model->listing_kategori();
        $data['berita'] = $this->berita_model->get_all();
        
        $data = array('title'=>'Sistem Informasi Inventaris Kantor WilayahATR/BPN Jawa Tengah ',
            'berita_listing'=>$berita_listing,'listing_kategori'=>$listing_kategori,
            //'produk'=>$produk,
            //'pagin'=> $this->pagination->create_links()
            );
        $this->load->view('templates/navbar', $data);
        $this->load->view('member/berita', $data);
        $this->load->view('templates/footer');
    }

    public function detail($kode_berita) {

        if($kode_berita==null){
            redirect('berita');
        }else{
            $berita = $this->berita_model->detail($kode_berita);
            $listing_kategori = $this->berita_model->listing_kategori();
            
            $data = array('title'=>'Detail : Berita', 
                'berita'=> $berita,
                'listing_kategori'=> $listing_kategori);
            $this->load->view('templates/navbar', $data);
            $this->load->view('member/detail', $data);
            $this->load->view('templates/footer');
        }
    }

    public function kategori($url) {

        if($url==null){
            redirect('berita');
        }else{
            $perkategori = $this->berita_model->read($url);
            
            $data = array('title'=>'Kategori : Barang', 
                'perkategori'=> $perkategori);
            $this->load->view('templates/navbar', $data);
            $this->load->view('member/kategori', $data);
            $this->load->view('templates/footer');
        }
    }
}