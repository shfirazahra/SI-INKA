<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800 mx-1">Daftar Nama Barang</h1>
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
                        <span class='text'>Cetak Data Barang</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
						<th>ID Siswa</th>
                        <th>Nama Siswa</th>
						<th>Email Siswa</th>
                        <th>Alamat Siswa</th>
                        <th>Telepon Orangtua</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $nomor=1;
                    foreach($siswa as $users) {
                    ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $users->id_user ?></td>
						<td><?= $users->nama ?></td>
                        <td><?= $users->email ?></td>
                        <td><?= $users->alamat ?></td>
						<td><?= $users->telepon ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/siswa/hapus_produk/<?= $users->id_user; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $users->id_user ?>?')" class='btn btn-danger btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-trash'></i>
                                </span>
                            </a>

                            <a href="<?= base_url(); ?>admin/siswa/update_produk/<?= $users->id_user; ?>" class='btn btn-warning btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-exclamation-triangle'></i>
                                </span>
                            </a>

                            <a href="<?= base_url(); ?>admin/produk/detail_produk/<?= $users->id_user; ?>" class='btn btn-info btn-icon-split'>
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