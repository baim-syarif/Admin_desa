<?php
session_start();
require_once __DIR__ . '/inc/header.php';
require_once __DIR__ . '/config/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Statistik warga
$total_warga = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM warga"));

// Data warga
$data_warga = mysqli_query($conn, "SELECT * FROM warga ORDER BY nama");

// Data surat
$surat_query = mysqli_query($conn, "SELECT * FROM surat ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin Kota Katingan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="top-bar">
    <div class="top-bar-left">
        <h1>Dashboard Admin Katingan</h1>
    </div>
    <div class="top-bar-right">
        <a href="index.php">Beranda</a>
        <a href="pengaturan.php">Pengaturan</a>
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>
</header>

<main class="container">
    <?php if (isset($_GET['status']) && $_GET['status'] === 'sukses'): ?>
        <div class="card success-message">
            <p>✅ Surat berhasil diajukan.</p>
        </div>
    <?php endif; ?>

    <div class="grid">
        <div class="card">
            <h3>Statistik Penduduk</h3>
            <p><strong>Total Warga:</strong> <?= $total_warga['total']; ?></p>
        </div>

        <div class="card">
            <h3>Buat Surat</h3>
            <p>Silakan isi formulir untuk membuat surat keperluan administrasi warga.</p>
            <a href="buat_surat.php" class="btn-primary">+ Buat Surat</a>
        </div>
    </div>

    <div class="card">
        <h3>Data Penduduk</h3>
        <?php if (mysqli_num_rows($data_warga) > 0): ?>
            <table class="tabel-data">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; while ($w = mysqli_fetch_assoc($data_warga)): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= htmlspecialchars($w['nama']); ?></td>
                            <td><?= htmlspecialchars($w['nik']); ?></td>
                            <td><?= htmlspecialchars($w['alamat']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Tidak ada data penduduk.</p>
        <?php endif; ?>
    </div>

    <div class="card">
        <h3>Riwayat Pengajuan Surat</h3>
        <?php if (mysqli_num_rows($surat_query) > 0): ?>
            <table class="tabel-data">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis Surat</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while ($surat = mysqli_fetch_assoc($surat_query)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($surat['jenis']); ?></td>
                            <td><?= htmlspecialchars($surat['nama']); ?></td>
                            <td><?= htmlspecialchars($surat['keterangan']); ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($surat['tanggal'])); ?></td>
                            <td>
                                <span class="badge <?= strtolower($surat['status']) ?>">
                                    <?= htmlspecialchars($surat['status']); ?>
                                </span>
                            </td>
                            <td>
                                <?php if (!empty($surat['file']) && file_exists('uploads/' . $surat['file'])): ?>
                                    <a href="uploads/<?= htmlspecialchars($surat['file']); ?>" download target="_blank">📄 Unduh</a>
                                <?php else: ?>
                                    <span style="color:#888;">Belum Tersedia</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Belum ada surat yang diajukan.</p>
        <?php endif; ?>
    </div>
</main>
</body>
</html>
