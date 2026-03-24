<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {
       
   function get_all(){
        $this->db->select('berita.*,kategori.nama_kategori,kategori.url');
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'left');
        $this->db->order_by('kode_berita', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function read($url){
        $this->db->select('kategori.*,berita.nama_berita,berita.foto, berita.kode_berita, tb_berita.kode_berita');
        $this->db->from('kategori');
        $this->db->join('berita', 'berita.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('kategori.url',$url);
        $this->db->order_by('kode_berita', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function listing_kategori(){
        $this->db->select('berita.*,kategori.nama_kategori,kategori.url');
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'left');
        $this->db->group_by('berita.id_kategori');
        $this->db->order_by('kode_berita', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    function tambah($data){
        $this->db->insert('berita', $data);
    }
    
    function update_berita($data){
        $this->db->where('kode_berita', $data['kode_berita']);
        return $this->db->update('berita', $data);
    }
    
    public function detail($kode_berita) {

        $this->db->select('berita.*, kategori.url');
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'left');
        $this->db->where('kode_berita', $kode_berita);
        $this->db->order_by('kode_berita', 'desc');
        $query = $this->db->get();
        
        return $query->row();
    }

    public function getbyid($kode_berita) {

        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('kode_berita', $kode_berita);
        $this->db->order_by('kode_berita', 'desc');
        $query = $this->db->get();
        
        return $query->row();
    }

    public function get($kode_berita) {

        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('kode_berita', $kode_berita);
        $this->db->order_by('kode_berita', 'desc');
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
        $this->db->where('kode_berita', $data['kode_berita']);
        $this->db->delete('berita', $data);
    }
    function nav_berita(){
        $this->db->select('berita.*,
                kategori.nama_kategori,
                kategori.url');
        $this->db->from('berita');
        $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'left');
        $this->db->group_by('berita.id_kategori');
        $this->db->order_by('kategori.urutan', 'asc');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function getBerita($limit = null, $kode_berita = null, $range = null)
    {
        $this->db->select('*');
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($kode_berita != null) {
            $this->db->where('kode_berita', $id_user);
        }
        if ($range != null) {
            $this->db->where('tanggal_daftar' . ' >=', $range['mulai']);
            $this->db->where('tanggal_daftar' . ' <=', $range['akhir']);
        }
        $this->db->order_by('kode_berita', 'DESC');
        return $this->db->get('berita')->result_array();
    }
    
    function total_berita(){
        $this->db->select('COUNT(*)');
        $this->db->from('berita');
        $this->db->where('berita', 'kode_berita');
        $query = $this->db->get();
        return $query->row();
    }        
}