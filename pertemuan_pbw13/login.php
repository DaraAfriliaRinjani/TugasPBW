<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Masuk ke Sistem</h2>
    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-warning"><?= htmlspecialchars($_GET['message']) ?></div>
    <?php endif; ?>

    <form method="post" action="proses_login.php">
        <div class="mb-3">
            <label>Nama Pengguna:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kata Sandi:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</body>
</html>
