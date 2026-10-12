<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    // Perhatikan tanda petik satu (') di dalam query SQL ini
    $query = mysqli_query($koneksi, "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES ('$judul_buku', '$penulis', '$penerbit', '$tahun_terbit')");

    if ($query) {
        echo "<script>alert('Data buku berhasil ditambahkan!'); window.location.assign('dashboard.php?halaman=data_buku');</script>";
    } else {
        echo "<script>alert('Gagal menambah data!'); window.location.assign('dashboard.php?halaman=tambah_buku');</script>";
    }
}
?>