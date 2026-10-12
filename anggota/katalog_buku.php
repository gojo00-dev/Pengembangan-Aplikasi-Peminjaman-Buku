<?php
include '../koneksi.php';
?>

<h3 class="mb-3">Katalog Buku Perpustakaan</h3>
<p class="text-muted">Berikut adalah daftar buku yang tersedia di perpustakaan.</p>
<hr>

<div class="row">
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM buku");
    while ($data = mysqli_fetch_array($query)) {
    ?>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary"><?php echo $data['judul_buku']; ?></h5>
                    <p class="card-text mb-1"><strong>Penulis:</strong> <?php echo $data['penulis']; ?></p>
                    <p class="card-text mb-1"><strong>Penerbit:</strong> <?php echo $data['penerbit']; ?></p>
                    <p class="card-text mb-3"><strong>Tahun:</strong> <?php echo $data['tahun_terbit']; ?></p>
                    
                    <!-- Tombol Pinjam yang memanggil fungsi JavaScript -->
                    <a href="#" onclick="pinjam('Apakah Anda yakin ingin meminjam buku <?php echo $data['judul_buku']; ?>?', '<?php echo $data['id_buku']; ?>')" class="btn btn-success btn-sm w-100">Pinjam Buku Ini</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<script>
function pinjam(pesan, id_buku) {
    if (confirm(pesan)) {
        window.location.href = "../proses_pinjam.php?id=" + id_buku;
    }
}
</script>