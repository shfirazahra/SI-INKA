<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 mx-1">Data Pembayaran Bimbel</h1>
  <?= $this->session->flashdata('message'); ?>
  <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/laporan/penjualan'); ?>" target="_blank" class='btn btn-success btn-icon-split'>
                <span class='icon text-white-50'>
                  <i class='fas fa-print'></i>
                </span>
                <span class='text'>Cetak Laporan</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
				<th>Tgl. Transaksi</th>
				<th>ID Transaksi</th>
				<th>ID Siswa</th>
                <th>Nama Siswa</th>
                <th>Kode Bimbel</th>
				<th>Total Bayar</th>
				<th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
       
        <tbody>
            <?php $nomor=1;
            foreach($pembayaran as $data) {
            ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $data->tanggal_transaksi; ?></td>
                <td><?= $data->id_transaksi; ?></td>
				<td><?= $data->id_user; ?></td>
				<td><?= $data->nama; ?></td>
				<td><?= $data->kode_bimbel; ?></td>
				<td><?= $data->total_harga; ?></td>
				<td><?= $data->status; ?></td>
                <td>
                    <a href="<?= base_url(); ?>admin/pembayaran/hapus_pembelian/<?= $data->id_transaksi; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $data->nama ?>?')" class='btn btn-danger btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-trash'></i>
                        </span>
                        <span class='text'>Hapus</span>
                    </a><hr>
                    <a href="<?= base_url(); ?>admin/pembayaran/detail_pembayaran/<?= $data->id_transaksi; ?>"class='btn btn-primary btn-icon-split'>
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