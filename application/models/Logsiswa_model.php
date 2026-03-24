<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logsiswa_model extends CI_Model {
       
   function get_all(){
            
            $this->db->select('*');
            $this->db->from('users');
            $this->db->order_by('id_user', 'desc');
            $query = $this->db->get();
            return $query->result();
        }
    //function read($url){
       // $this->db->select('tb_katbimbel.*,tb_bimbel.nama_bimbel,tb_bimbel.foto, tb_bimbel.harga, tb_bimbel.kode_bimbel, tb_bimbel.kode_bimbel');
        //$this->db->from('tb_katbimbel');
       // $this->db->join('tb_bimbel', 'tb_bimbel.id_kategori = tb_katbimbel.id_kategori', 'left');
       // $this->db->where('tb_katbimbel.url',$url);
       // $this->db->order_by('kode_bimbel', 'desc');
       // $query = $this->db->get();
       // return $query->result();
   // }
   // function listing_kategori(){
    //    $this->db->select('tb_bimbel.*,tb_katbimbel.nama_kategori,tb_katbimbel.url');
      //  $this->db->from('tb_bimbel');
        //$this->db->join('tb_katbimbel', 'tb_katbimbel.id_kategori = tb_bimbel.id_kategori', 'left');
       // $this->db->group_by('tb_bimbel.id_kategori');
     //   $this->db->order_by('kode_bimbel', 'desc');
       // $query = $this->db->get();
       // return $query->result();
   // }
    
    function tambah($data){
        $this->db->insert('tb_bimbel', $data);
    }
    
    function update_produk($data){
        $this->db->where('kode_bimbel', $data['kode_bimbel']);
        return $this->db->update('tb_bimbel', $data);
    }
    
    public function detail($kode_bimbel) {

        $this->db->select('tb_bimbel.*, tb_katbimbel.url');
        $this->db->from('tb_bimbel');
        $this->db->join('tb_katbimbel', 'tb_katbimbel.id_kategori = tb_bimbel.id_kategori', 'left');
        $this->db->where('kode_bimbel', $kode_bimbel);
        $this->db->order_by('kode_bimbel', 'desc');
        $query = $this->db->get();
        
        return $query->row();
    }

    public function getbyid($kode_bimbel) {

        $this->db->select('*');
        $this->db->from('tb_bimbel');
        $this->db->where('kode_bimbel', $kode_bimbel);
        $this->db->order_by('kode_bimbel', 'desc');
        $query = $this->db->get();
        
        return $query->row();
    }

    public function get($kode_bimbel) {

        $this->db->select('*');
        $this->db->from('tb_bimbel');
        $this->db->where('kode_bimbel', $kode_bimbel);
        $this->db->order_by('kode_bimbel', 'desc');
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }
    
    function hapus($data){
        $this->db->where('kode_bimbel', $data['kode_bimbel']);
        $this->db->delete('tb_bimbel', $data);
    }
    function nav_produk(){
        $this->db->select('tb_bimbel.*,
                tb_katbimbel.nama_kategori,
                tb_katbimbel.url');
        $this->db->from('tb_bimbel');
        $this->db->join('tb_katbimbel', 'tb_katbimbel.id_kategori = tb_bimbel.id_kategori', 'left');
        $this->db->group_by('tb_bimbel.id_kategori');
        $this->db->order_by('tb_katbimbel.urutan', 'asc');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function getProduk($limit = null, $kode_bimbel = null, $range = null)
    {
        $this->db->select('*');
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($kode_bimbel != null) {
            $this->db->where('kode_bimbel', $id_user);
        }
        if ($range != null) {
            $this->db->where('tanggal_daftar' . ' >=', $range['mulai']);
            $this->db->where('tanggal_daftar' . ' <=', $range['akhir']);
        }
        $this->db->order_by('kode_bimbel', 'DESC');
        return $this->db->get('tb_bimbel')->result_array();
    }
    
    function total_produk(){
        $this->db->select('COUNT(*)');
        $this->db->from('tb_bimbel');
        $this->db->where('tb_bimbel', 'kode_bimbel');
        $query = $this->db->get();
        return $query->row();
    }        
}