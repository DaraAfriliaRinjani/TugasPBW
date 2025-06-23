<?php
include 'koneksi_db.php';
include 'nav.php';

$buku_result = $conn->query("SELECT ID, Judul FROM Buku");
$pelanggan_result = $conn->query("SELECT ID, Nama FROM Pelanggan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buat Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Buat Pesanan Baru</h2>
    <form method="post" action="proses_transaksi.php">
        <div class="mb-3">
            <label class="form-label">Pilih Pelanggan</label>
            <select class="form-select" name="pelanggan_id" required>
                <option value="">Pilih Pelanggan</option>
                <?php while ($row = $pelanggan_result->fetch_assoc()): ?>
                    <option value="<?= $row['ID'] ?>"><?= $row['Nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Pilih Buku</label>
            <select class="form-select" name="buku[1][id]" required>
                <option value="">Pilih Buku</option>
                <?php while ($row = $buku_result->fetch_assoc()): ?>
                    <option value="<?= $row['ID'] ?>"><?= $row['Judul'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah Buku</label>
            <input type="number" class="form-control" name="buku[1][kuantitas]" required>
        </div>
        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
    </form>
</div>
</body>
</html>
