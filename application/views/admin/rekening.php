<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800 mx-1">Data Barang</h1>
                    <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="<?= base_url('admin/rekening/tambah_rekening'); ?>" class='btn btn-primary btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-plus'></i>
                        </span>
                        <span class='text'>Tambah Barang</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Merk</th>
                        <th>Ruangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $id_barang=1;
                    foreach($data as $rekening) :
                    ?>
                    <tr>
                        <td><?= $rekening->id_barang; ?></td>
                        <td><?= $rekening->nama_barang; ?></td>
                        <td><?= $rekening->kategori; ?></td>
                        <td><?= $rekening->merk; ?></td>
                        <td><?= $rekening->ruangan; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/rekening/hapus_rekening/<?= $rekening->id_barang; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $rekening->nama_barang ?>?')"class='btn btn-danger btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-trash'></i>
                                </span>
                                <span class='text'>Hapus</span>
                            </a>
                            <a href="<?= base_url(); ?>admin/rekening/update_rekening/<?= $rekening->id_barang; ?>"class='btn btn-warning btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-exclamation-triangle'></i>
                                </span>
                                <span class='text'>Ubah</span>
                            </a>
                        </td>
                    </tr>
                    <?php $id_barang++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>