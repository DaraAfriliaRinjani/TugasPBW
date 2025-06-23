<?php
include 'cek_login.php';
include 'koneksi_db.php';

// Validasi ID dari URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID tidak valid.";
    exit;
}

$id = (int)$_GET['id'];

// Ambil data pelanggan dari database
$query = "SELECT * FROM pelanggan WHERE ID = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data pelanggan tidak ditemukan.";
    exit;
}

// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);

    $update = mysqli_query($conn, "UPDATE pelanggan SET 
        Nama='$nama',
        Alamat='$alamat',
        Email='$email',
        Telepon='$telepon'
        WHERE ID=$id");

    if ($update) {
        header("Location: pelanggan.php");
        exit;
    } else {
        $error = "Gagal memperbarui data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container mt-4">
    <h2>Edit Pelanggan</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($data['Nama']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required><?= htmlspecialchars($data['Alamat']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($data['Email']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">No. Telepon</label>
            <input type="text" name="telepon" id="telepon" class="form-control" value="<?= htmlspecialchars($data['Telepon']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="pelanggan.php" class="btn btn-secondary">Batal</a>
    </form> 
</div>
</body>
</html>

