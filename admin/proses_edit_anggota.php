<?php
include '../koneksi.php';

if (isset($_POST['update'])) {
    $id_anggota   = $_POST['id_anggota'];
    $nis          = $_POST['nis'];
    $nama_anggota = $_POST['nama_anggota'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $kelas        = $_POST['kelas'];

    // Query update data anggota berdasarkan ID
    $query = mysqli_query($koneksi, "UPDATE anggota SET nis='$nis', nama_anggota='$nama_anggota', username='$username', password='$password', kelas='$kelas' WHERE id_anggota='$id_anggota'");

    if ($query) {
        echo "<script>alert('Data anggota berhasil diupdate!'); window.location.assign('dashboard.php?halaman=data_anggota');</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data!'); window.location.assign('dashboard.php?halaman=edit_anggota&id=$id_anggota');</script>";
    }
}
?>