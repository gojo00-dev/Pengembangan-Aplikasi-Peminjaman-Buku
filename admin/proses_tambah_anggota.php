<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $nis          = $_POST['nis'];
    $nama_anggota = $_POST['nama_anggota'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $kelas        = $_POST['kelas'];

    $query = mysqli_query($koneksi, "INSERT INTO anggota (nis, nama_anggota, username, password, kelas) VALUES ('$nis', '$nama_anggota', '$username', '$password', '$kelas')");

    if ($query) {
        echo "<script>alert('Data anggota berhasil ditambahkan!'); window.location.assign('dashboard.php?halaman=data_anggota');</script>";
    } else {
        echo "<script>alert('Gagal menambah data!'); window.location.assign('dashboard.php?halaman=tambah_anggota');</script>";
    }
}
?>