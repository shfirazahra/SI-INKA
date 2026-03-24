<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {
    
       //function get_all(){
            
            //$this->db->select('*');
            //$this->db->from('tb_guru');
           // $this->db->order_by('id_guru', 'desc');
			//$query = $this->db->get();
           // return $query->result();
        //}
		function get_all(){
			$this->db->select('tb_guru.*, tb_databarang.nama_bimbel');
			$this->db->from('tb_guru');
			$this->db->join('tb_databarang', 'tb_guru.nama_guru = tb_databarang.nama_guru', 'left');
			$this->db->order_by('id_guru', 'desc');
			$query = $this->db->get();
			return $query->result();
		}
        
        function tambah_guru($data) {
            // Menambahkan data guru ke tabel "tb_guru"
            $this->db->insert('tb_guru', $data);
        
            // Menambahkan data bimbel ke tabel "tb_bimbel"
            $data = array(
                'nama_guru' => $data['nama_guru'],
                'nama_bimbel' => $data['nama_bimbel']
                // Tambahkan kolom-kolom lain yang sesuai dengan struktur tabel "tb_bimbel"
            );
            $this->db->insert('tb_databarang', $data);
        }
        
        
        
        
        function update_guru($data){
            $this->db->where('nama_guru', $data['nama_guru']);
            return $this->db->update('tb_guru', $data);
        }
        
        function detail($id_guru) {
            $this->db->select('*');
            $this->db->from('tb_guru');
            $this->db->where('id_guru', $id_guru);
            $this->db->order_by('id_guru', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function hapus($data){
            $this->db->where('id_guru', $data['id_guru']);
            $this->db->delete('tb_guru', $data);
        }
}