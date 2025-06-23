<?php include 'menu.php'; ?>

<h2>Switch Case: Hari</h2>

<?php
$hari = "Jum'at";

switch ($hari) {
    case "Senin":
        echo "Mari masuk kampus dengan mata kuliah Statistika Probabilitas";
        break;
    case "Selasa":
        echo "Mari masuk kuliah dengan mata kuliah Sistem Operasi";
        break;
    case "Rabu":
        echo "Mari masuk kuliah dengan mata kuliah Kecerdasan Buata";
        break;
    case "Kamis":
        echo "Mari masuk kuliah dengan mata kuliah Rekayasa Perangkat Lunak";
        break;
    case "Jum'at":
        echo "Mari masuk kuliah dengan mata kuliah Pemograman Berbasis Web ";
        break;
    default:
        echo "Hari biasa.";
}
?>
