<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota - Aplikasi Perpustakaan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 500px;">
        <div class="card p-4 shadow">
            <h3 class="text-center mb-3">Pendaftaran Anggota</h3>
            <form action="proses_pendaftaran.php" method="POST">
                <div class="mb-3">
                    <label>NIS</label>
                    <input type="text" name="nis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama Anggota</label>
                    <input type="text" name="nama_anggota" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control" required>
                </div>
                <button type="submit" name="daftar" class="btn btn-success w-100">Daftar</button>
            </form>
            <div class="text-center mt-3">
                <p>Sudah punya akun? <a href="login_anggota.php">Login di sini</a></p>
                <a href="login-admin.php">Login Sebagai Admin</a>
            </div>
        </div>
    </div>
</body>
</html>