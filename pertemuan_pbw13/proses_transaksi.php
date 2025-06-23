<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn->begin_transaction();
    try {
        $pelanggan_id = $_POST['pelanggan_id'];
        $tanggal = date('Y-m-d');
        $total = 0;

        $stmt = $conn->prepare("INSERT INTO Pesanan (Tanggal_Pesanan, Pelanggan_ID, Total_Harga) VALUES (?, ?, ?)");
        $stmt->bind_param("sid", $tanggal, $pelanggan_id, $total);
        $stmt->execute();
        $pesanan_id = $conn->insert_id;

        foreach ($_POST['buku'] as $buku) {
            $buku_id = $buku['id'];
            $kuantitas = $buku['kuantitas'];

            $stmt = $conn->prepare("SELECT Harga, Stok FROM Buku WHERE ID = ?");
            $stmt->bind_param("i", $buku_id);
            $stmt->execute();
            $stmt->bind_result($harga, $stok);
            $stmt->fetch();
            $stmt->close();

            if ($stok < $kuantitas) throw new Exception("Stok tidak cukup");

            $stmt = $conn->prepare("INSERT INTO Detail_Pesanan (Pesanan_ID, Buku_ID, Kuantitas, Harga_Per_Satuan) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiid", $pesanan_id, $buku_id, $kuantitas, $harga);
            $stmt->execute();

            $total += $kuantitas * $harga;

            $stmt = $conn->prepare("UPDATE Buku SET Stok = Stok - ? WHERE ID = ?");
            $stmt->bind_param("ii", $kuantitas, $buku_id);
            $stmt->execute();
        }

        $stmt = $conn->prepare("UPDATE Pesanan SET Total_Harga = ? WHERE ID = ?");
        $stmt->bind_param("di", $total, $pesanan_id);
        $stmt->execute();

        $conn->commit();
        header("Location: transaksi.php?message=Pesanan berhasil");
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}
?>
