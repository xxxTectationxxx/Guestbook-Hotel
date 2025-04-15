<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../config/config.php");

if (!isset($_GET['id'])) {
    header("Location: entries.php");
    exit();
}

$id = $_GET['id'];

if(isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_kamar = $_POST['no_kamar'];
    $tgl_checkin = $_POST['tgl_checkin'];
    $tgl_checkout = $_POST['tgl_checkout'];
    $pesan = $_POST['pesan'];

    $sql = "UPDATE tamu SET nama = '$nama', email = '$email', no_kamar = '$no_kamar', tgl_checkin = '$tgl_checkin', tgl_checkout = '$tgl_checkout', pesan = '$pesan' WHERE id = '$id'";
    if($conn -> query($sql) === TRUE) {
        header("Location: entries.php");
        exit();
    } else {
        $error = "Gagal memperbarui entri!";
    }
}

$sql = "SELECT * FROM tamu WHERE id = '$id'";
$result = $conn -> query($sql);
$entry = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entri Tamu</title>
    <link rel="stylesheet" href="../assets/css/admin/edit.css">
</head>
<body>
    <h2>Edit Entri Data Tamu</h2>
    <form action="" method="POST">
        Nama: <input type="text" name="nama" value="<?= $entry['nama']; ?>" required> <br><br>
        Email: <input type="email" name="email" value="<?= $entry['email'] ?>" required> <br><br>
        No Kamar: <input type="text" name="no_kamar" value="<?= $entry['no_kamar']; ?>" required> <br><br>
        Tanggal Check-In: <input type="date" name="tgl_checkin" value="<?= $entry['tgl_checkin']; ?>" required> <br><br>
        Tanggal Check-Out: <input type="date" name="tgl_checkout" value="<?= $entry['tgl_checkout']; ?>" required> <br><br>
        Pesan: <br>
        <textarea name="pesan" rows="5" cols="40" required>
            <?= $entry['pesan']; ?>
        </textarea>
        <br>
        <br>
        <input type="submit" name="update" value="Update">
    </form>
    <?php 
    if(isset($error)) {
        echo "<p style='color:red;'> $error</p>";
    }
    ?>
    <br>
    <a href="entries.php">Kembali ke Daftar Entri Tamu</a>
</body>
</html>