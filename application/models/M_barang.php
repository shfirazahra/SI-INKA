<?php
class M_barang extends CI_Model {
    protected $_table = 'barang';

    public function lihat(){
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function jumlah($nama_barang = null){
        if ($nama_barang) {
            $this->db->select('jumlah');
            $this->db->where('nama_barang', $nama_barang);
            $query = $this->db->get($this->_table);
            $row = $query->row();
            return $row ? $row->jumlah : 0;
        } else {
            return $this->db->count_all($this->_table);
        }
    }

    public function lihat_id($id_barang){
        $query = $this->db->get_where($this->_table, ['id_barang' => $id_barang]);
        return $query->row();
    }

    public function lihat_nama_barang($nama_barang){
        $this->db->where('nama_barang', $nama_barang);
        $query = $this->db->get($this->_table);
        return $query->row();
    }

    public function tambah($data){
        return $this->db->insert($this->_table, $data);
    }

    public function plus_stok($jumlah, $nama_barang){
        $this->db->set('jumlah', 'jumlah + ' . (int)$jumlah, FALSE);
        $this->db->where('nama_barang', $nama_barang);
        return $this->db->update($this->_table);
    }

    public function min_stok($jumlah, $nama_barang){
        $this->db->set('jumlah', 'jumlah - ' . (int)$jumlah, FALSE);
        $this->db->where('nama_barang', $nama_barang);
        return $this->db->update($this->_table);
    }

    public function ubah($data, $id_barang){
        $this->db->where('id_barang', $id_barang);
        return $this->db->update($this->_table, $data);
    }

    public function hapus($id_barang){
        return $this->db->delete($this->_table, ['id_barang' => $id_barang]);
    }

    // Tambahan fungsi untuk kondisi dan ruangan

    public function lihat_kondisi($kondisi){
        $this->db->where('kondisi', $kondisi);
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function lihat_ruangan($ruangan){
        $this->db->where('ruangan', $ruangan);
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function ubah_kondisi($id_barang, $kondisi){
        $this->db->set('kondisi', $kondisi);
        $this->db->where('id_barang', $id_barang);
        return $this->db->update($this->_table);
    }

    public function ubah_ruangan($id_barang, $ruangan){
        $this->db->set('ruangan', $ruangan);
        $this->db->where('id_barang', $id_barang);
        return $this->db->update($this->_table);
    }
}
