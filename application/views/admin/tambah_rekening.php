<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Tambah Barang</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/rekening/tambah_rekening'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" value="<?php echo set_value('nama_bank'); ?>"required>
                        </div>
                    <div class="form-group my-3">
                        <label>Kode Barang</label>
                        <input type="number" class="form-control" name="id_barang" value="<?php echo set_value('id_barang'); ?>"required>
                    </div>
                    <div class="form-group my-3">
                        <label>Kategori</label>
                        <input type="text" class="form-control" name="kategori" value="<?php echo set_value('nama_pemilik'); ?>"required>
                    </div>
                    <div class="form-group my-3">
                        <label>Merk</label>
                        <input type="text" class="form-control" name="merk" value="<?php echo set_value('nama_pemilik'); ?>"required>
                    </div>
                    <div class="form-group my-3">
                        <label>Ruangan</label>
                        <input type="text" class="form-control" name="ruangan" value="<?php echo set_value('nama_pemilik'); ?>"required>
                    </div>
                        <a href="#" class="btn btn-secondary mb-3 btn-icon-split" onclick="window.history.go(-1)">
                            <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                        <button type="submit" name="submit" value="Submit" class="btn btn-primary mb-3 btn-icon-split">
                            <span class="icon text-white-50">
                            <i class="fas fa-download"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
                </form>               
            </div>
        </div>
    </div>
</div>