<?php
session_start();
include 'koneksi.php';

if (isset($_POST['daftar'])) {
    $nis          = $_POST['nis'];
    $nama_anggota = $_POST['nama_anggota'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $kelas        = $_POST['kelas'];

    $query = mysqli_query($koneksi, "INSERT INTO anggota (nis, nama_anggota, username, password, kelas) VALUES ('$nis', '$nama_anggota', '$username', '$password', '$kelas')");

    if ($query) {
        // Ambil ID anggota yang baru saja mendaftar
        $_SESSION['id_anggota'] = mysqli_insert_id($koneksi);
        $_SESSION['nama_anggota'] = $nama_anggota;
        $_SESSION['username'] = $username;

        echo "<script>alert('Pendaftaran berhasil!'); window.location.assign('anggota/dashboard.php');</script>";
    } else {
        echo "<script>alert('Pendaftaran gagal!'); window.location.assign('pendaftaran_anggota.php');</script>";
    }
}
?>