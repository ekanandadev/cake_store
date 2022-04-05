<?php
session_start();
include_once("../../config/connection_database.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = MD5($_POST['password']);

    $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' AND `role` = 'user' ";
    $query = mysqli_query($mysqli, $sql);

    if ($query->num_rows > 0) {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        header("Location: ../index.php?page=home");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
} else {
    die("Akses dilarang...");
}
