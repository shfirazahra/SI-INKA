<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 mx-1">Jadwal Bimbel Siswa</h1>
  <?= $this->session->flashdata('message'); ?>
  <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/cetak_pembelian/c_produk'); ?>" class='btn btn-success btn-icon-split'>
                <span class='icon text-white-50'>
                  <i class='fas fa-print'></i>
                </span>
                <span class='text'>Cetak Laporan Peserta</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Nama Bimbel</th>
				
				<th>Nama Guru</th>
				<th>Jadwal</th>
                <th>Aksi</th>
            </tr>
        </thead>
       
        <tbody>
            <?php $nomor=1;
            foreach($pembelian as $data) {
            ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $data->nama; ?></td>
                <td><?= $data->nama_bimbel; ?></td>
				
				<td><?= $data->nama_guru; ?></td>
				<td><?= ($data->jadwal); ?></td>
                <td>
                    <a href="<?= base_url(); ?>admin/pembelian/hapus_pembelian/<?= $data->id_transaksi; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $data->nama ?>?')" class='btn btn-danger btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-trash'></i>
                        </span>
                        <span class='text'>Hapus</span>
                    </a><hr>
                    <a href="<?= base_url(); ?>admin/pembelian/detail_pembelian/<?= $data->id_transaksi; ?>"class='btn btn-primary btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-eye'></i>
                        </span>
                        <span class='text'>Detail</span>
                    </a>
                </td>
            </tr>
            <?php $nomor++; ?>
            <?php } 
            ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>