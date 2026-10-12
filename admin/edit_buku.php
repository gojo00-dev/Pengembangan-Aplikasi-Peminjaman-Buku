<?php
include '../koneksi.php';

// Ambil ID buku dari URL
$id = $_GET['id'];

// Ambil data buku yang lama berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
$data = mysqli_fetch_array($query);
?>

<h3>Edit Data Buku</h3>
<hr>
<!-- Form edit mengarah ke proses update -->
<form action="proses_edit_buku.php" method="POST">
    <!-- Input hidden untuk menyimpan ID agar terbawa saat disimpan -->
    <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">

    <div class="mb-3">
        <label>Judul Buku</label>
        <input type="text" name="judul_buku" value="<?php echo $data['judul_buku']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Penulis</label>
        <input type="text" name="penulis" value="<?php echo $data['penulis']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Penerbit</label>
        <input type="text" name="penerbit" value="<?php echo $data['penerbit']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>" class="form-control" required>
    </div>
    <button type="submit" name="update" class="btn btn-success">Update</button>
    <a href="dashboard.php?halaman=data_buku" class="btn btn-secondary">Kembali</a>
</form> 