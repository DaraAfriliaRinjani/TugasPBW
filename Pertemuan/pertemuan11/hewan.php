<?php include 'menu.php'; ?>

<h2>Foreach: Daftar Nama Hewan</h2>

<?php
$hewan = ["Kucing", "Anjing", "Kelinci", "Burung"];

foreach ($hewan as $nama) {
    echo "$nama <br>";
}
?>