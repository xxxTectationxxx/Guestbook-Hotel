<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <h2>Selamat Datang, Admin</h2>
    <link rel="stylesheet" href="../assets/css/admin/dashboard.css">
    <ul>
        <li><a href="entries.php">Lihat Entri Data</a></li>
        <li><a href="report.php">Laporan Entri</a></li>
        <li><a href="user.php">Manajemen User</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>