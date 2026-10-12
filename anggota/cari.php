<?php
session_start();
include '../koneksi.php';

// Cek apakah form pencarian disubmit
$kunci = isset($_POST['kunci']) ? $_POST['kunci'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Buku - Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <a href="dashboard.php" class="btn btn-secondary mb-3">&larr; Kembali ke Dashboard</a>
        
        <!-- Form Pencarian Ulang -->
        <form action="cari.php" method="POST" class="mb-4">
            <div class="input-group">
                <input type="text" name="kunci" class="form-control" value="<?php echo htmlspecialchars($kunci); ?>" placeholder="Masukkan judul buku..." required>
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <h3 class="mb-3">Pencarian Buku: "<?php echo htmlspecialchars($kunci); ?>"</h3>
        <hr>

        <div class="row">
            <?php
            // Query pencarian berdasarkan judul buku
            $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul_buku LIKE '%$kunci%'");
            
            if (mysqli_num_rows($query) > 0) {
                while ($data = mysqli_fetch_array($query)) {
            ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary"><?php echo $data['judul_buku']; ?></h5>
                            <p class="card-text mb-1"><strong>Penulis:</strong> <?php echo $data['penulis']; ?></p>
                            <p class="card-text mb-1"><strong>Penerbit:</strong> <?php echo $data['penerbit']; ?></p>
                            <p class="card-text mb-3"><strong>Tahun:</strong> <?php echo $data['tahun_terbit']; ?></p>
                            
                            <a href="#" onclick="pinjam('Apakah Anda yakin ingin meminjam buku <?php echo $data['judul_buku']; ?>?', '<?php echo $data['id_buku']; ?>')" class="btn btn-success btn-sm w-100">Pinjam Buku Ini</a>
                        </div>
                    </div>
                </div>
            <?php 
                }
            } else {
            ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center">Buku dengan kata kunci tersebut tidak ditemukan.</div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
    function pinjam(pesan, id_buku) {
        if (confirm(pesan)) {
            window.location.href = "../proses_pinjam.php?id=" + id_buku;
        }
    }
    </script>
</body>
</html>