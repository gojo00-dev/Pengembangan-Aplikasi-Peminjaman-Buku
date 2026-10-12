<?php
include '../koneksi.php';

$username = $_SESSION['username'];
$q_anggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username = '$username'");
$dt_ang = mysqli_fetch_array($q_anggota);
$id_ang = $dt_ang['id_anggota'];
?>

<h3 class="mb-3">Riwayat Peminjaman Buku</h3>
<p class="text-muted">Daftar buku yang sedang atau pernah kamu pinjam di perpustakaan.</p>
<hr>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Harus Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query_transaksi = mysqli_query($koneksi, "
                SELECT t.*, b.judul_buku 
                FROM transaksi t 
                JOIN buku b ON t.id_buku = b.id_buku 
                WHERE t.id_anggota = '$id_ang'
            ");
            
            if (mysqli_num_rows($query_transaksi) > 0) {
                while ($t = mysqli_fetch_array($query_transaksi)) {
                    // Deteksi otomatis nama kolom tanggal dan status di database
                    $tgl_pinjam = $t['tanggal_pinjam'] ?? ($t['tgl_pinjam'] ?? '-');
                    $tgl_kembali = $t['tanggal_kembali'] ?? ($t['tgl_kembali'] ?? '-');
                    $status_buku = $t['status'] ?? ($t['status_peminjaman'] ?? 'Dipinjam');
            ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $t['judul_buku']; ?></td>
                        <td><?php echo $tgl_pinjam; ?></td>
                        <td><?php echo $tgl_kembali; ?></td>
                        <td>
                            <span class="badge bg-<?php echo ($status_buku == 'Dipinjam') ? 'warning text-dark' : 'success'; ?>">
                                <?php echo $status_buku; ?>
                            </span>
                        </td>
                    </tr>
            <?php 
                }
            } else {
            ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada riwayat peminjaman buku.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>