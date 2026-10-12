<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $data = mysqli_fetch_array($query);
        $_SESSION['id_anggota'] = $data['id_anggota'];
        $_SESSION['nama_anggota'] = $data['nama_anggota'];
        $_SESSION['username'] = $data['username'];

        echo "<script>alert('Login berhasil!'); window.location.assign('anggota/dashboard.php');</script>";
    } else {
        echo "<script>alert('Maaf, login gagal! Periksa kembali username dan password Anda.'); window.location.assign('login_anggota.php');</script>";
    }
}
?>