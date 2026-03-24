<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Update Kategori</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/produk/update_produk/'.$produk->kode_bimbel); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-3">
                        <label>Nama Kategori</label>
                        <input type="hidden" class="form-control" name="kode_bimbel" value="<?php echo $produk->kode_bimbel ?>">
                        <input type="text" class="form-control" name="nama_bimbel" value="<?php echo $produk->nama_bimbel ?>">
                      
                        <?php echo form_error('nama', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group my-2">
                        <label>Kategori Barang</label>
                        <select name="id_kategori" class="form-control">
                            <?php foreach ($kategori as $kategori) { ?>
                            <option value="<?= $kategori->id_kategori ?>" <?php if($produk->id_kategori==$kategori->id_kategori){ echo "selected"; } ?>> <?= $kategori->nama_kategori ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    
                    
                   
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="5" name="deskripsi"><?php echo $produk->deskripsi ?></textarea>
                        <?php echo form_error('deskripsi', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="my-3 mx-2">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="<?= base_url('assets/admin/foto/').$produk->foto; ?>" width="250">
                                </div>
                            </div>
                        </div>
                        <input type="file" class="form-control" name="gambar">
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