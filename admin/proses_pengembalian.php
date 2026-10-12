<?php
include '../koneksi.php';

date_default_timezone_set('Asia/Jakarta');
$id          = $_GET['id'];
$id_buku     = $_GET['buku'];
$tgl_kembali = date('Y-m-d H:i:s');

// Update status transaksi menjadi 'pengembalian' dan isi tanggal kembali
$query = mysqli_query($koneksi, "UPDATE transaksi SET status_transaksi='pengembalian', tgl_kembali='$tgl_kembali' WHERE id_transaksi='$id'");

// Update status buku kembali menjadi 'tersedia'
mysqli_query($koneksi, "UPDATE buku SET status='tersedia' WHERE id_buku='$id_buku'");

if ($query) {
    echo "<script>alert('Buku berhasil dikembalikan!'); window.location.assign('dashboard.php?halaman=data_peminjaman');</script>";
} else {
    echo "<script>alert('Gagal memproses pengembalian!'); window.location.assign('dashboard.php?halaman=data_peminjaman');</script>";
}
?>