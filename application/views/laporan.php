<!DOCTYPE html>
<html>
<head>
    <title>Data Laporan</title>
</head>
<body>
    <h1>Data Laporan</h1>
    <a href="<?= base_url('laporan/tambah') ?>">Tambah Laporan</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($laporan as $lap): ?>
        <tr>
            <td><?= $lap->id_laporan ?></td>
            <td><?= $lap->judul ?></td>
            <td><?= $lap->isi ?></td>
            <td><?= $lap->tanggal ?></td>
            <td>
                <a href="<?= base_url('laporan/hapus/' . $lap->id) ?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
