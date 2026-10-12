<h3>Data Buku</h3>
<hr>
<!-- Tombol untuk menuju ke halaman tambah buku -->
<a href="dashboard.php?halaman=tambah_buku" class="btn btn-primary mb-3">+ Tambah Buku</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../koneksi.php';
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM buku"); // Sesuaikan nama tabel di database kamu
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['judul_buku']; ?></td>
                <td><?php echo $data['penulis']; ?></td>
                <td><?php echo $data['penerbit']; ?></td>
                <td><?php echo $data['tahun_terbit']; ?></td>
                <td>
                    <!-- Tombol Edit dan Hapus dengan membawa ID buku -->
                    <a href="dashboard.php?halaman=edit_buku&id=<?php echo $data['id_buku']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="proses_hapus_buku.php?id=<?php echo $data['id_buku']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>