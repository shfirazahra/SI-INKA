<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Update Kategori</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/guru/update_guru/'.$guru->id_guru); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-3">
                        
                        
                        
                       
                    </div>
                    <div class="form-group mt-3">
                        <label>Nama Guru</label>
                        <input type="text" class="form-control" name="nama_guru" value="<?php echo $guru->nama_guru ?>">
                        
                        
                       
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