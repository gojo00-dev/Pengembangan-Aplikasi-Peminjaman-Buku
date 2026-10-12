<?php
include '../koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi='$id'");

if ($query) {
    echo "<script>alert('Data transaksi berhasil dihapus!'); window.location.assign('dashboard.php?halaman=data_peminjaman');</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location.assign('dashboard.php?halaman=data_peminjaman');</script>";
}
?>