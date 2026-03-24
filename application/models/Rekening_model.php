<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_model extends CI_Model {
    
       function get_all(){
            
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->order_by('id_barang', 'desc');
            
            $query = $this->db->get();
            return $query->result();
        }
        function tambah($data){
            $this->db->insert('barang', $data);
        }
        
        
        function update_rekening($data){
            $this->db->where('id_barang', $data['id_barang']);
            $this->db->update('barang', $data);
        }
        
        function detail($id_barang) {
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->where('id_barang', $id_barang);
            $this->db->order_by('id_barang', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function hapus($data){
            $this->db->where('id_barang', $data['id_barang']);
            $this->db->delete('barang', $data);
        }
}