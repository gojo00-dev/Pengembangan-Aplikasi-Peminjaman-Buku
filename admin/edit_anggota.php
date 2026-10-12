<?php
include '../koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data anggota berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id'");
$data = mysqli_fetch_array($query);
?>

<h3>Edit Data Anggota</h3>
<hr>
<form action="proses_edit_anggota.php" method="POST">
    <!-- Input hidden untuk membawa ID saat di-update -->
    <input type="hidden" name="id_anggota" value="<?php echo $data['id_anggota']; ?>">

    <div class="mb-3">
        <label>NIS</label>
        <input type="text" name="nis" value="<?php echo $data['nis']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Nama Anggota</label>
        <input type="text" name="nama_anggota" value="<?php echo $data['nama_anggota']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $data['username']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $data['password']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kelas</label>
        <input type="text" name="kelas" value="<?php echo $data['kelas']; ?>" class="form-control" required>
    </div>
    <button type="submit" name="update" class="btn btn-success">Update</button>
    <a href="dashboard.php?halaman=data_anggota" class="btn btn-secondary">Kembali</a>
</form>