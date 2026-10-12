<h3>Data Anggota</h3>
<hr>
<a href="dashboard.php?halaman=tambah_anggota" class="btn btn-primary mb-3">+ Tambah Anggota</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Anggota</th>
            <th>Username</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../koneksi.php';
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM anggota");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nis']; ?></td>
                <td><?php echo $data['nama_anggota']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['kelas']; ?></td>
                <td>
                    <a href="dashboard.php?halaman=edit_anggota&id=<?php echo $data['id_anggota']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="proses_hapus_anggota.php?id=<?php echo $data['id_anggota']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>