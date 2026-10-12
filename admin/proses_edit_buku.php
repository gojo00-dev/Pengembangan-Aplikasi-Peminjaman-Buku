<?php
include '../koneksi.php';

if (isset($_POST['update'])) {
    $id       = $_POST['id_buku'];
    $judul    = $_POST['judul_buku'];
    $penulis  = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun    = $_POST['tahun_terbit'];

    // Query update data buku berdasarkan ID
    $query = mysqli_query($koneksi, "UPDATE buku SET judul_buku='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun' WHERE id_buku='$id'");

    if ($query) {
        echo "<script>alert('Data buku berhasil diupdate!'); window.location.assign('dashboard.php?halaman=data_buku');</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data!'); window.location.assign('dashboard.php?halaman=data_buku');</script>";
    }
}
?>