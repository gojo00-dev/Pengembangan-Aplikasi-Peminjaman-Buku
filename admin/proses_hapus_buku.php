<?php
include '../koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Query hapus data
$query = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku='$id'");

if ($query) {
    echo "<script>alert('Data buku berhasil dihapus!'); window.location.assign('dashboard.php?halaman=data_buku');</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location.assign('dashboard.php?halaman=data_buku');</script>";
}
?>