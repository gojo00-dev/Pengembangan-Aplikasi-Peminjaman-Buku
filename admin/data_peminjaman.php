<h3>Data Peminjaman Buku</h3>
<hr>
<a href="dashboard.php?halaman=input_peminjaman" class="btn btn-primary mb-3">+ Tambah Peminjaman</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../koneksi.php';
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM transaksi, buku, anggota WHERE buku.id_buku = transaksi.id_buku AND anggota.id_anggota = transaksi.id_anggota AND transaksi.status_transaksi = 'peminjaman' ORDER BY transaksi.id_transaksi DESC");
        while ($peminjam = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $peminjam['nis']; ?></td>
                <td><?php echo $peminjam['nama_anggota']; ?></td>
                <td><?php echo $peminjam['judul_buku']; ?></td>
                <td><?php echo $peminjam['tgl_pinjam']; ?></td>
                <td>
                    <a href="proses_pengembalian.php?id=<?php echo $peminjam['id_transaksi']; ?>&buku=<?php echo $peminjam['id_buku']; ?>" class="btn btn-success btn-sm" onclick="return confirm('Kembalikan buku ini?')">Pengembalian</a>
                    <a href="hapus_peminjaman.php?id=<?php echo $peminjam['id_transaksi']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<hr class="mt-5">
<h3>Data Pengembalian Buku</h3>
<hr>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no2 = 1;
        $query2 = mysqli_query($koneksi, "SELECT * FROM transaksi, buku, anggota WHERE buku.id_buku = transaksi.id_buku AND anggota.id_anggota = transaksi.id_anggota AND transaksi.status_transaksi = 'pengembalian' ORDER BY transaksi.id_transaksi DESC");
        while ($kembali = mysqli_fetch_array($query2)) {
        ?>
            <tr>
                <td><?php echo $no2++; ?></td>
                <td><?php echo $kembali['nis']; ?></td>
                <td><?php echo $kembali['nama_anggota']; ?></td>
                <td><?php echo $kembali['judul_buku']; ?></td>
                <td><?php echo $kembali['tgl_pinjam']; ?></td>
                <td><?php echo $kembali['tgl_kembali']; ?></td>
                <td>
                    <a href="hapus_peminjaman.php?id=<?php echo $kembali['id_transaksi']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>