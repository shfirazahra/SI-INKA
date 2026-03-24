<!DOCTYPE html>
<html>
<head>
    <title>Data Laporan</title>
</head>
<body>
    <h1>Data Laporan</h1>
   
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Kondisi</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($laporan as $lap): ?>
        <tr>
            <td><?= $lap->id_laporan ?></td>
            <td><?= $lap->nama_barang ?></td>
            <td><?= $lap->kondisi_barang ?></td>
            <td><?= $lap->checkin ?></td>
            <td><?= $lap->checkout ?></td>
            <td>
                <a href="<?= base_url('laporan/hapus/' . $lap->id_laporan) ?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
