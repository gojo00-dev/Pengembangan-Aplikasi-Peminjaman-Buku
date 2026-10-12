<?php
include '../koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota='$id'");

if ($query) {
    echo "<script>alert('Data anggota berhasil dihapus!'); window.location.assign('dashboard.php?halaman=data_anggota');</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location.assign('dashboard.php?halaman=data_anggota');</script>";
}
?>