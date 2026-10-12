<?php
session_start();
session_destroy(); // Menghapus semua session yang aktif
header("Location: ../login-admin.php"); // Mengarahkan kembali ke halaman login admin
exit();
?>