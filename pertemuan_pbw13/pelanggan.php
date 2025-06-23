<?php
include 'cek_login.php';
include 'koneksi_db.php';

$query = "SELECT * FROM pelanggan";
$result = mysqli_query($conn, $query);

// Jika query gagal, tampilkan pesan error
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <title>Data Pelanggan</title>
</head>
<body>
   <?php include 'nav.php'; ?>

   <div class="container mt-4">
       <div class="d-flex justify-content-between align-items-center mb-3">
           <h2>Data Pelanggan</h2>
           <a href="tambah_pelanggan.php" class="btn btn-primary">+ Tambah Pelanggan</a>
       </div>

       <?php if (isset($_GET['status']) && $_GET['status'] == 'hapus_sukses'): ?>
           <div class="alert alert-success">Pelanggan berhasil dihapus.</div>
       <?php endif; ?>

       <table class="table table-striped table-bordered">
           <thead class="table-dark">
               <tr>
                   <th>ID</th>
                   <th>Nama</th>
                   <th>Email</th>
                   <th>No. Telepon</th>
                   <th>Aksi</th>
               </tr>
           </thead>
           <tbody>
               <?php while($row = mysqli_fetch_assoc($result)) { ?>
               <tr>
                   <td><?= $row['ID'] ?></td>
                   <td><?= htmlspecialchars($row['Nama']) ?></td>
                   <td><?= htmlspecialchars($row['Email']) ?></td>
                   <td><?= htmlspecialchars($row['Telepon']) ?></td>
                   <td>
                       <a href="edit_pelanggan.php?id=<?= $row['ID'] ?>" class="btn btn-sm btn-warning">Edit</a>
                       <a href="hapus_pelanggan.php?id=<?= $row['ID'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                   </td>
               </tr>
               <?php } ?>
           </tbody>
       </table>
   </div>
</body>
</html>
