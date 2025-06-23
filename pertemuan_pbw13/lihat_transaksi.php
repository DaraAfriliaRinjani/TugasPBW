<?php
include 'koneksi_db.php';
include 'nav.php';

$query = "
    SELECT Pesanan.ID AS Pesanan_ID, Pelanggan.Nama AS Nama_Pelanggan, Pesanan.Tanggal_Pesanan, Pesanan.Total_Harga
    FROM Pesanan
    JOIN Pelanggan ON Pesanan.Pelanggan_ID = Pelanggan.ID
";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Daftar Pesanan</h2>
    <table class="table table-striped">
        <thead>
            <tr><th>ID</th><th>Pelanggan</th><th>Tanggal</th><th>Total Harga</th></tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['Pesanan_ID'] ?></td>
                    <td><?= $row['Nama_Pelanggan'] ?></td>
                    <td><?= $row['Tanggal_Pesanan'] ?></td>
                    <td>Rp<?= number_format($row['Total_Harga'], 2) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
