<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Tambah Produk</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/produk/tambah_produk'); ?>" method="POST" enctype="multipart/form-data">
                    
					<div class="form-group my-3">
                        <label>Kode Bimbel</label>
                        <input type="number" class="form-control" name="kode_bimbel" value="<?php echo set_value('kode_bimbel'); ?>">
                        <?php echo form_error('kode_bimbel', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group my-3">
                        <label>Nama Bimbel</label>
                        <input type="text" class="form-control" name="nama_bimbel" value="<?php echo set_value('nama_bimbel'); ?>">
                        <?php echo form_error('nama_bimbel', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group my-2">
                        
                        <label>Kategori Bimbel</label>
                        <input type="text" class="form-control" name="id_kategori" value="<?php echo set_value('id_kategori'); ?>">
                        <?php echo form_error('id_kategori', '<small class="text-danger" pl-3">', '</small>'); ?>
                        </div>
                    
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="10" name="deskripsi" value=""><?php echo set_value('deskripsi'); ?></textarea>
                        <?php echo form_error('deskripsi', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto" required>
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