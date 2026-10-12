<?php
session_start();
include '../koneksi.php';

// Cek apakah anggota sudah login
if (!isset($_SESSION['username'])) {
    header("location:../login_anggota.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Anggota - Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar / Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Perpustakaan Digital</a>
            <div class="ms-auto">
                <span class="text-light me-3">Halo, <strong><?php echo $_SESSION['username']; ?></strong></span>
                <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Menu Navigasi & Form Pencarian Sejajar / Berdekatan -->
        <div class="row mb-4 align-items-center">
            <div class="col-md-6 mb-2 mb-md-0">
                <a href="dashboard.php" class="btn btn-success me-1">Dashboard</a>
                <a href="dashboard.php?halaman=katalog_buku" class="btn btn-primary me-1">Katalog Buku</a>
                <a href="dashboard.php?halaman=riwayat_peminjaman" class="btn btn-warning">Riwayat Peminjaman</a>
            </div>
            <div class="col-md-6">
                <!-- Form Pencarian Buku yang Selalu Muncul -->
                <form action="cari.php" method="POST">
                    <div class="input-group">
                        <input type="text" name="kunci" class="form-control" placeholder="Cari judul buku..." required>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="card p-4 shadow-sm mb-5">
            <?php 
            if (isset($_GET['halaman'])) {
                $halaman = $_GET['halaman'];
                
                if ($halaman == 'katalog_buku') {
                    include 'katalog_buku.php';
                } elseif ($halaman == 'riwayat_peminjaman') {
                    include 'riwayat_peminjaman.php';
                } else {
                    echo "<h3 class='text-danger'>Halaman tidak ditemukan</h3>";
                }
            } else {
            ?>
                <h3 class="mb-3">Selamat Datang, <?php echo $_SESSION['username']; ?> 👋</h3>
                <p class="text-muted">Selamat datang di panel anggota Aplikasi Perpustakaan Digital. Melalui halaman ini, kamu dapat mencari buku, melihat katalog, serta memantau riwayat peminjaman.</p>
            <?php 
            } 
            ?>
        </div>
    </div>

</body>
</html>