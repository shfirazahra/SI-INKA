<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('app');
    }
    
    public function index(){
        
            $data['title'] = 'Sistem Informasi Inventaris Kantor Wilayah ATR/BPN Jawa Tengah';
            $this->load->view('templates/navbar', $data);
            
            $this->load->view('about', $data);
            $this->load->view('templates/footer');
    }
    
}
