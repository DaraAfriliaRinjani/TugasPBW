<!DOCTYPE html>
<html>
<head>
    <title>Latihan Praktikum PHP</title>
</head>
<body>
    <?php
    if (isset($_GET['page'])) {
        include $_GET['page'] . ".php";
    } else {
        include 'menu.php';
        echo "<h3>Silakan pilih menu di atas.</h3>";
    }
    ?>
</body>
</html>