<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun_terbit'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = $conn->prepare("INSERT INTO Buku (Judul, Penulis, Tahun_Terbit, Harga, stok) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiii", $judul, $penulis, $tahun, $harga, $stok);

    if ($stmt->execute()) {
        echo "<script>alert('Buku berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan buku'); window.history.back();</script>";
    }
}
?>
