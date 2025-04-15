<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include("../config/config.php");

// Proses persetujuan user
if(isset($_GET['action']) && $_GET['action'] == 'approve' && isset($_GET['id'])){
    $user_id = $_GET['id'];
    $sql = "UPDATE user SET is_approved = 1 WHERE id='$user_id'";
    $conn->query($sql);
    header("Location: user.php");
    exit();
}

// Proses penghapusan user
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])){
    $user_id = $_GET['id'];
    $sql = "DELETE FROM user WHERE id='$user_id'";
    $conn->query($sql);
    header("Location: user.php");
    exit();
}

// Ambil seluruh data user
$sql = "SELECT * FROM user ORDER BY id ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kelola User</title>
    <link rel="stylesheet" href="../assets/css/admin/user.css">
</head>
<body>
    <h2>Kelola User</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = $result->fetch_assoc()){ 
            $status = ($row['is_approved'] == 1) ? "Disetujui" : "Pending";
        ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['password'];?></td>
            <td><?= $status; ?></td>
            <td>
                <?php if($row['is_approved'] == 0){ ?>
                    <a href="?action=approve&id=<?= $row['id']; ?>" onclick="return confirm('Setujui akun ini?');">Setujui</a>
                <?php } ?>
                <a href="?action=delete&id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus user ini?');">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>
