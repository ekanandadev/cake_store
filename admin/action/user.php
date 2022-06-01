<?php

include_once("../../config/connection_database.php");

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = MD5($_POST['password']);

    $sql = "INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`) VALUES (NULL, '$name', '$username', '$password', 'user');";
    $query = mysqli_query($mysqli, $sql);

    if( $query ) {
        header('Location: ../index.php?page=user_add&status=success');
    } else {
        header('Location: ../index.php?page=user_add&status=failure');
    }
}
