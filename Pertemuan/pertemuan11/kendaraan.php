<?php include 'menu.php'; ?>

<h2>Switch Case: Jenis Kendaraan</h2>

<?php
$roda = 4;

switch ($roda) {
    case 2:
        echo "Jenis kendaraan: Motor";
        break;
    case 3:
        echo "Jenis kendaraan: Bajaj";
        break;
    case 4:
        echo "Jenis kendaraan: Mobil";
        break;
    default:
        echo "Jenis kendaraan tidak diketahui";
}
?>
