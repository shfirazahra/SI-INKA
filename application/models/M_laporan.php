<?php
class M_laporan extends CI_Model {
    protected $_table = 'laporan';

    public function lihat() {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function tambah($data) {
        return $this->db->insert($this->_table, $data);
    }

    public function hapus($id) {
        return $this->db->delete($this->_table, ['id_laporan' => $id]);
    }
}
