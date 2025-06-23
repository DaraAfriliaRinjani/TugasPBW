<?php
include 'cek_login.php';
include 'koneksi_db.php';

// Pastikan ID dikirim lewat GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Hapus dulu data di detail_pesanan yang terhubung dengan pesanan milik pelanggan ini
    mysqli_query($conn, "DELETE FROM detail_pesanan WHERE Pesanan_ID IN (
        SELECT ID FROM pesanan WHERE Pelanggan_ID = $id
    )");

    // Hapus data pesanan milik pelanggan
    mysqli_query($conn, "DELETE FROM pesanan WHERE Pelanggan_ID = $id");

    // Hapus data pelanggan
    $delete = mysqli_query($conn, "DELETE FROM pelanggan WHERE ID = $id");

    // Cek apakah berhasil
    if ($delete) {
        header("Location: pelanggan.php?status=hapus_sukses");
        exit;
    } else {
        echo "Gagal menghapus pelanggan: " . mysqli_error($conn);
    }
} else {
    echo "ID pelanggan tidak valid.";
}
?>