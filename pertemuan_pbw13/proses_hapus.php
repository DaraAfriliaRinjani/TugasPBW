<?php
include 'koneksi_db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM Buku WHERE ID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('ID tidak valid'); window.history.back();</script>";
}
?>
