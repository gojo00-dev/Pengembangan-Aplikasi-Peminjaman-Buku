<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $id_anggota       = $_POST['id_anggota'];
    $id_buku          = $_POST['id_buku'];
    $tgl_pinjam       = $_POST['tgl_pinjam'];
    $status_transaksi = 'peminjaman';

    // Insert ke tabel transaksi
    $query = mysqli_query($koneksi, "INSERT INTO transaksi (id_anggota, id_buku, tgl_pinjam, status_transaksi) VALUES ('$id_anggota', '$id_buku', '$tgl_pinjam', '$status_transaksi')");

    // Update status buku menjadi 'tidak tersedia'
    mysqli_query($koneksi, "UPDATE buku SET status='tidak tersedia' WHERE id_buku='$id_buku'");

    if ($query) {
        echo "<script>alert('Data peminjaman berhasil ditambah!'); window.location.assign('dashboard.php?halaman=data_peminjaman');</script>";
    } else {
        echo "<script>alert('Gagal menambah data!'); window.location.assign('dashboard.php?halaman=input_peminjaman');</script>";
    }
}
?>