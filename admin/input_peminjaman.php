<?php
include '../koneksi.php';
$anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
$buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE status='tersedia'");
?>

<h3>Input Peminjaman Buku</h3>
<hr>
<form action="proses_tambah_peminjaman.php" method="POST">
    <div class="mb-3">
        <label>Nama Anggota</label>
        <select name="id_anggota" class="form-control" required>
            <option value="">-- Pilih Anggota --</option>
            <?php foreach ($anggota as $a) { ?>
                <option value="<?php echo $a['id_anggota']; ?>"><?php echo $a['nama_anggota']; ?> (NIS: <?php echo $a['nis']; ?>)</option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Judul Buku</label>
        <select name="id_buku" class="form-control" required>
            <option value="">-- Pilih Buku --</option>
            <?php foreach ($buku as $b) { ?>
                <option value="<?php echo $b['id_buku']; ?>"><?php echo $b['judul_buku']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Tanggal Pinjam</label>
        <input type="datetime-local" name="tgl_pinjam" class="form-control" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
    <a href="dashboard.php?halaman=data_peminjaman" class="btn btn-secondary">Kembali</a>
</form>