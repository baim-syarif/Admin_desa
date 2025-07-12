<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Surat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="top-bar">
        <div class="top-bar-left">
            <h1>Buat Surat</h1>
        </div>
        <div class="top-bar-right">
            <a href="dashboard.php">← Kembali</a>
        </div>
    </header>

    <main class="container">
        <div class="card">
            <h3>Formulir Surat</h3>
            <form action="proses_surat.php" method="POST">
                <label for="jenis">Jenis Surat</label>
                <select name="jenis" id="jenis" required>
                    <option value="">-- Pilih Jenis Surat --</option>
                    <option value="Domisili">Surat Keterangan Domisili</option>
                    <option value="Usaha">Surat Keterangan Usaha</option>
                    <option value="Pengantar">Surat Pengantar RT/RW</option>
                </select>

                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" required>

                <label for="keterangan">Keterangan Tambahan</label>
                <textarea name="keterangan" id="keterangan" rows="4"></textarea>

                <button type="submit" class="btn-primary">Kirim Permintaan</button>
            </form>
        </div>
    </main>
</body>
</html>
