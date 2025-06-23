<?php
include 'cek_login.php';
include 'koneksi_db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Kalau TIDAK ada tabel detail_pesanan, baris ini boleh dihapus:
    // mysqli_query($conn, "DELETE FROM detail_pesanan WHERE Buku_ID = $id");

    // Hapus data dari tabel buku
    $delete = mysqli_query($conn, "DELETE FROM buku WHERE ID = $id");

    if ($delete) {
        header("Location: index.php?status=hapus_sukses");
        exit;
    } else {
        echo "Gagal menghapus buku: " . mysqli_error($conn);
    }
} else {
    echo "ID buku tidak valid.";
}
?>
