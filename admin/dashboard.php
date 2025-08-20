<?php
session_start();

// Cek apakah pengguna sudah login atau belum
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="css/output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f5f9;
        }
        .container-dashboard {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="container-dashboard">
            <h1 class="text-center">Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p class="text-center mt-4">Ini adalah halaman dashboard. Hanya user yang telah login yang bisa mengakses halaman ini.</p>
            <p class="text-center"><a href="logout.php" class="btn btn-danger mt-3">Logout</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>