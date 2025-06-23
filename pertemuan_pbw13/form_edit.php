<?php
include 'koneksi_db.php';
include 'nav.php';

$id = $_GET['id'] ?? 0;
$stmt = $conn->prepare("SELECT * FROM Buku WHERE ID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Data Buku</h2>
    <form method="post" action="proses_edit.php">
        <input type="hidden" name="id" value="<?= $row['ID'] ?>">
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($row['Judul']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Penulis</label>
            <input type="text" class="form-control" name="penulis" value="<?= htmlspecialchars($row['Penulis']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun Terbit</label>
            <input type="number" class="form-control" name="tahun_terbit" value="<?= $row['Tahun_Terbit'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" value="<?= $row['Harga'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" value="<?= $row['stok'] ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </form>
</div>
</body>
</html>
