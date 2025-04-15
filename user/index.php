<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include("../config/config.php");

if(isset($_POST['submit_entry'])) {
    $nama        = $_POST['nama'];
    $email       = $_POST['email'];
    $no_kamar    = $_POST['no_kamar'];
    $tgl_checkin = $_POST['tgl_checkin'];
    $tgl_checkout= $_POST['tgl_checkout'];
    $pesan       = $_POST['pesan'];
    $user_id     = $_SESSION['user_id'];

    $sql = "INSERT INTO tamu (user_id, nama, email, no_kamar, tgl_checkin, tgl_checkout, pesan)
            VALUES ('$user_id', '$nama', '$email', '$no_kamar', '$tgl_checkin', '$tgl_checkout', '$pesan')";
    if($conn->query($sql) === TRUE) {
        $success = "Entri berhasil ditambahkan!";
    } else {
        $error = "Gagal menambahkan entri!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Entri Tamu</title>
    <link rel="stylesheet" href="../assets/css/user/style.css">
</head>
<body>
<h2>Selamat datang, <?= $_SESSION['username']; ?></h2>
<h3>Isi Data Tamu</h3>
<form method="POST" action="">
    Nama: <input type="text" name="nama" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    No Kamar: <input type="text" name="no_kamar" required><br><br>
    Tanggal Check-In: <input type="date" name="tgl_checkin" required><br><br>
    Tanggal Check-Out: <input type="date" name="tgl_checkout" required><br><br>
    Pesan: <br>
    <textarea name="pesan" rows="5" cols="40" required></textarea><br><br>
    <input type="submit" name="submit_entry" value="Kirim Entri">
</form>
<?php 
if(isset($success)) { echo "<p style='color:green;'>$success</p>"; } 
if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } 
?>
<br>
<a href="logout.php">Logout</a>
</body>
</html>
