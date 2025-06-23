<?php
include 'cek_login.php';
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $query = "INSERT INTO pelanggan (Nama, Alamat, Email, Telepon) VALUES ('$nama', '$alamat', '$email', '$telepon')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: pelanggan.php");
        exit;
    } else {
        $error = "Gagal menambahkan pelanggan: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container mt-4">
        <h2>Tambah Pelanggan</h2>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">No. Telepon</label>
                <input type="text" name="telepon" id="telepon" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="pelanggan.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>