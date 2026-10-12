<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Aplikasi Perpustakaan Sekolah Digital</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="vh-100 row justify-content-center align-content-center">
        <form method="post" action="" class="col-md-3 border p-4 bg-white rounded-4">
            <h4 class="text-center">Login Admin</h4>
            <h5 class="text-center mb-3">Aplikasi Perpustakaan Sekolah Digital</h5>
            <input type="text" name="username" class="form-control mb-3" placeholder="Masukan Username" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Masukan Password" required>
            <!-- Diperbaiki: hanya menggunakan name="tombol" -->
            <button type="submit" name="tombol" class="btn btn-success w-100 mb-2">Login</button>
            <a href="login-anggota.php" class="text-decoration-none">Login Sebagai Anggota</a> 
        </form>
    </div>
</body>
</html>

<?php
// Diperbaiki: menggunakan huruf kecil 'tombol' agar sama persis dengan form HTML
if(isset($_POST['tombol'])) {
    include 'koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $data = mysqli_query($koneksi, $query);
    
    if(mysqli_num_rows($data) > 0){
        $row = mysqli_fetch_array($data);
        session_start();
        $_SESSION['id_admin'] = $row['id_admin'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama_lengkap'] = $row['nama_lengkap'];
        header("Location: admin/dashboard.php");
        exit();
    } else {
        // Notifikasi gagal login akan muncul di sini
        echo "<script>alert('❌ Maaf login gagal, username atau password salah'); window.location.assign('login-admin.php');</script>";
    }
}   
?>