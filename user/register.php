<?php
include("../config/config.php");

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Enkripsi MD5

    // Cek apakah username sudah ada
    $sql = "SELECT * FROM user WHERE username='$username' OR email ='$email'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $error = "Username atau Email sudah terdaftar!";
    } else {
        // Simpan data username dengan status pending (is_pending = 0)
        $sql = "INSERT INTO user (username, email,  password, is_approved) VALUES ('$username', '$email', '$password', 0)";
        if($conn->query($sql) === TRUE){
            $success = 'Registrasi berhasil! Tunggu persetujuan dari admin untuk bisa login';
        } else {
            $error = "Registrasi gagal!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar User</title>
    <link rel="stylesheet" href="../assets/css/user/register.css">
</head>
<body>
<h2>Daftar User</h2>
<form method="POST" action="">
    Username: <input type="text" name="username" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" name="register" value="Daftar">
</form>
    <?php 
    if(isset($success)) { echo "<p style='color:green;>$success</p>"; }
    if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } 
    ?>
    <br>
<p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</body>
</html>
