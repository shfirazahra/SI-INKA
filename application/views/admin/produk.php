<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800 mx-1">Data Kategori</h1>
              <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="<?= base_url('admin/produk/tambah_produk'); ?>" class='btn btn-primary btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-plus'></i>
                        </span>
                        <span class='text'>Tambah Barang</span>
                    </a>

                    <a href="<?= base_url('admin/laporan/data_produk'); ?>" target="_blank" class='btn btn-success btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-print'></i>
                        </span>
                        <span class='text'>Cetak Barang</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id_barang</th>
						
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        
                      
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $nomor=1;
                    foreach($produk as $tb_databarang) {
                    ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $tb_databarang->kode_bimbel ?></td>
						
                        <td><?= $tb_databarang->nama_bimbel ?></td>
                        <td><?= $tb_databarang->id_kategori ?></td>
                       
                       
                        <td>
                            <img src="<?= base_url(); ?>assets/admin/foto/<?= $tb_databarang->foto ?>" width="100">
                        </td>
                       
                       
                        <td>
                            <a href="<?= base_url(); ?>admin/produk/hapus_produk/<?= $tb_databarang->kode_bimbel; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $tb_databarang->nama_bimbel ?>?')" class='btn btn-danger btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-trash'></i>
                                </span>
                            </a>

                            <a href="<?= base_url(); ?>admin/produk/update_produk/<?= $tb_databarang->kode_bimbel; ?>" class='btn btn-warning btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-exclamation-triangle'></i>
                                </span>
                            </a>

                            <a href="<?= base_url(); ?>admin/produk/detail_produk/<?= $tb_databarang->kode_bimbel; ?>" class='btn btn-info btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-eye'></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>