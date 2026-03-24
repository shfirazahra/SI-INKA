<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800 mx-1">Data Login Admin</h1>
              <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="<?= base_url('admin/produk/tambah_produk'); ?>" class='btn btn-primary btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-plus'></i>
                        </span>
                        <span class='text'>Tambah Data</span>
                    </a>

                    <a href="<?= base_url('admin/laporan/data_produk'); ?>" target="_blank" class='btn btn-success btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-print'></i>
                        </span>
                        <span class='text'>Cetak Data Login Admin</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
						<th>ID Admin</th>
						<th>Email Admin</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $nomor=1;
                    foreach($logadmin as $users) {
                    ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $users->id ?></td>
						<td><?= $users->email ?></td>
                        <td><?= $users->password ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/logadmin/hapus_produk/<?= $users->id; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $users->id ?>?')" class='btn btn-danger btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-trash'></i>
                                </span>
                            </a>

                            <a href="<?= base_url(); ?>admin/logadmin/update_produk/<?= $users->id; ?>" class='btn btn-warning btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-exclamation-triangle'></i>
                                </span>
                            </a>

                            <a href="<?= base_url(); ?>admin/produk/detail_produk/<?= $users->id; ?>" class='btn btn-info btn-icon-split'>
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