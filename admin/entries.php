<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../config/config.php");
$sql = "SELECT * FROM tamu ORDER BY waktu_input DESC";
$result = $conn -> query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entri Tamu</title>
    <link rel="stylesheet" href="../assets/css/admin/entries.css">
</head>
<body>
    <h2>Daftar Etri Tamu</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Kamar</th>
            <th>Check-In</th>
            <th>Check-Out</th>
            <th>Pesan</th>
            <th>Waktu Input</th>
            <th>Aksi</th>
        </tr>

        <?php while($row = $result -> fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['no_kamar'] ?></td>
            <td><?= $row['tgl_checkin'] ?></td>
            <td><?= $row['tgl_checkout'] ?></td>
            <td><?= $row['pesan'] ?></td>
            <td><?= $row['waktu_input'] ?></td>
            <td>
                <a href="edit.php? id= <?= $row['id']; ?>">Edit</a>
                <br><br>
                <a href="delete.php? id= <?= $row['id']; ?>"onclick = "return confirm('Yakin hapus entri ini?');">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>