<?php
session_start();
include("../config/config.php");

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Enkripsi MD5

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Jika aku belum disetujui, tolak login
        if($row['is_approved'] == 0) {
            $error = "Akun belum disetujui oleh admin, Mohon tunggu persetujuan.";
        } else {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: index.php");
            exit();
        }
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login User</title>
    <link rel="stylesheet" href="../assets/css/user/login.css">
</head>
<body>
<h2>Login User</h2>
<form method="POST" action="">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" name="login" value="Login">
</form>
<?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
<br>
<p>Belum punya akun? <a href="register.php"> Daftar di sini</a></p>
</body>
</html>
