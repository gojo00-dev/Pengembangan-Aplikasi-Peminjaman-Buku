<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan Sekolah Digital</title>
    <!-- Memuat Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100 justify-content-center">
            
            <!-- Pilihan Login Admin -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm p-4 text-center h-100">
                    <div class="card-body">
                        <div class="mb-3 fs-1 text-primary">👨‍💻</div>
                        <h4 class="card-title mb-3">Login Admin</h4>
                        <p class="card-text text-muted small">Masuk sebagai pengelola perpustakaan untuk mengelola data buku dan transaksi.</p>
                        <!-- Ganti "admin/login_admin.php" sesuai dengan nama file login admin kamu yang sebenarnya -->
                       <a href="login-admin.php" class="btn btn-primary w-100 mt-3">Masuk Admin</a>
                    </div>
                </div>
            </div>

            <!-- Pilihan Login Anggota -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm p-4 text-center h-100">
                    <div class="card-body">
                        <div class="mb-3 fs-1 text-success">👤</div>
                        <h4 class="card-title mb-3">Login Anggota</h4>
                        <p class="card-text text-muted small">Masuk sebagai anggota untuk mencari buku, meminjam, dan melihat riwayat.</p>
                        <a href="login_anggota.php" class="btn btn-success w-100 mt-3">Masuk Anggota</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>