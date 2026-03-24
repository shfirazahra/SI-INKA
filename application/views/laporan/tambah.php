<!DOCTYPE html>
<html>
<head>
    <title>Tambah Laporan</title>
</head>
<body>
    <h1>Tambah Laporan</h1>
    <form action="<?= base_url('laporan/tambah') ?>" method="post">
        <p>
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" required>
        </p>
        <p>
            <label for="isi">Isi:</label>
            <textarea name="isi" id="isi" required></textarea>
        </p>
        <p>
            <button type="submit">Simpan</button>
        </p>
    </form>
</body>
</html>
