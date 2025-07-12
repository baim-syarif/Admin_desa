<?php
session_start();
require_once __DIR__ . '/config/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
    $tanggal = date('Y-m-d H:i:s');

    $query = "INSERT INTO surat (jenis, nama, keterangan, tanggal) 
              VALUES ('$jenis', '$nama', '$keterangan', '$tanggal')";

    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php?status=sukses");
        exit;
    } else {
        echo "Gagal menyimpan data surat.";
    }
} else {
    header("Location: buat_surat.php");
    exit;
}
?>
