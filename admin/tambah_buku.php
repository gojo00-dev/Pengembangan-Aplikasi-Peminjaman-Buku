<h3>Tambah Data Buku</h3>
<hr>
<form action="proses_tambah_buku.php" method="POST">
    <div class="mb-3">
        <label>Judul Buku</label>
        <input type="text" name="judul_buku" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Penulis</label>
        <input type="text" name="penulis" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Penerbit</label>
        <input type="text" name="penerbit" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" class="form-control" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
    <a href="dashboard.php?halaman=data_buku" class="btn btn-secondary">Kembali</a>
</form>