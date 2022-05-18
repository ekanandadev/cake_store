<?php

include_once("../../config/connection_database.php");

if (isset($_POST['save'])) {
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO `categories` (`id`, `category_name`) VALUES (NULL, '$category_name')";
    $query = mysqli_query($mysqli, $sql);

    if( $query ) {
        header('Location: ../index.php?page=category&status=success');
    } else {
        header('Location: ../index.php?page=category&status=failure');
    }
} if (isset($_GET['action'])) {
    $category_id = $_GET['id'];

    $sql = "DELETE FROM `categories` WHERE `categories`.`id` = '$category_id' ";
    $query = mysqli_query($mysqli, $sql);

    if( $query ) {
        header('Location: ../index.php?page=category&status=success');
    } else {
        header('Location: ../index.php?page=category&status=failure');
    }
}
