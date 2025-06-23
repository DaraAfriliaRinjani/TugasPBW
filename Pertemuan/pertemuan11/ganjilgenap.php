<?php include 'menu.php'; ?>

<h2>Ternary Operator: Cek Ganjil atau Genap</h2>

<?php
$angka = 9;
$hasil = ($angka % 2 == 0) ? "Genap" : "Ganjil";

echo "Angka $angka adalah $hasil";
?>