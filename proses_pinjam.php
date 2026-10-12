<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['username']) && isset($_GET['id'])) {
    $id_buku = $_GET['id'];
    $username = $_SESSION['username'];

    $query_anggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username = '$username'");
    $data_anggota = mysqli_fetch_array($query_anggota);
    
    if ($data_anggota) {
        $id_anggota = $data_anggota['id_anggota'];
        $tanggal_pinjam = date('Y-m-d');
        $tanggal_kembali = date('Y-m-d', strtotime('+7 days'));
        $status = 'Dipinjam';

        $insert = mysqli_query($koneksi, "INSERT INTO transaksi (id_buku, id_anggota, tanggal_pinjam, tanggal_kembali, status) VALUES ('$id_buku', '$id_anggota', '$tanggal_pinjam', '$tanggal_kembali', '$status')");

        if ($insert) {
            mysqli_query($koneksi, "UPDATE buku SET status = 'Tidak Tersedia' WHERE id_buku = '$id_buku'");
            echo "<script>alert('Buku berhasil dipinjam!'); window.location='anggota/dashboard.php?halaman=riwayat_peminjaman';</script>";
        } else {
            echo "<script>alert('Gagal meminjam buku!'); window.location='anggota/dashboard.php?halaman=katalog_buku';</script>";
        }
    }
} else {
    header("location:login_anggota.php");
}
?>