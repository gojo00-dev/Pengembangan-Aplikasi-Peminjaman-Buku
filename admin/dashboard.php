<?php
session_start();
// Hak akses: jika belum login, tendang kembali ke halaman login
if (!isset($_SESSION['id_admin'])) {
    header("Location: ../login-admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Aplikasi Perpustakaan Sekolah Digital</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-3 mb-3">
        <h4>Halaman Admin - Aplikasi Perpustakaan Sekolah Digital</h4>
        <hr>
        <!-- Tombol Navigasi Menu -->
        <a href="dashboard.php" class="btn btn-success text-white mb-2">Dashboard</a>
        <a href="dashboard.php?halaman=data_buku" class="btn btn-success text-white mb-2">Buku</a>
        <a href="dashboard.php?halaman=data_anggota" class="btn btn-success text-white mb-2">Anggota</a>
        <a href="dashboard.php?halaman=data_peminjaman" class="btn btn-success text-white mb-2">Peminjaman</a>
        <a href="logout.php" class="btn btn-danger text-white mb-2">Logout</a>
    </div>

    <div class="container">
        <div class="card p-3 mt-3">
            <?php
            // Sistem web dinamis untuk memuat halaman lain
            $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : "";
            
            if ($halaman != "") {
                if (file_exists("$halaman.php")) {
                    include "$halaman.php";
                } else {
                    echo "<h4 class='text-center text-muted'>Halaman tidak ditemukan</h4>";
                }
            } else {
            ?>
                <!-- Tampilan Default Dashboard (Halaman Utama) -->
                <h4>Selamat Datang, <?php echo $_SESSION['nama_lengkap']; ?> 👋</h4>
                <p class="text-muted text-justify">
                    Aplikasi perpustakaan sekolah digital merupakan sistem berbasis web yang dirancang untuk membantu pengelolaan data buku, data anggota, dan data peminjaman secara terorganisir dan cepat.
                </p>
            <?php 
            } 
            ?>
        </div>
    </div>

</body>
</html>