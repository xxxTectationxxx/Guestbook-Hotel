<?php 
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../config/config.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM entries WHERE id = '$id'";
    $conn -> query($sql);
}

header("Location: entries.php");
exit();
?>
