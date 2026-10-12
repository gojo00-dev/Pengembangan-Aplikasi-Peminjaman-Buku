<h3>Tambah Data Anggota</h3>
<hr>
<form action="proses_tambah_anggota.php" method="POST">
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
    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
    <a href="dashboard.php?halaman=data_anggota" class="btn btn-secondary">Kembali</a>
</form>