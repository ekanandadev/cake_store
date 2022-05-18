<?php

include_once("../../config/connection_database.php");

if (isset($_POST['save'])) {
    $user_id = $_POST['user_id'];
    $item_id = $_POST['item_id'];
    $qty = $_POST['qty'];

    $sqlGet = "SELECT * FROM `carts` WHERE `user_id` = '$user_id' AND `item_id` = '$item_id' ";
    $queryGet = mysqli_query($mysqli, $sqlGet);

    if ($queryGet->num_rows > 0) {
        $sql = "UPDATE `carts` SET `qty` = '$qty' WHERE `user_id` = '$user_id' AND `item_id` = '$item_id' ";
        $query = mysqli_query($mysqli, $sql);
        if( $query ) {
            header('Location: ../index.php?page=item_detail&status=success&item_id='.$item_id);
        } else {
            header('Location: ../index.php?page=item_detail&status=failure&item_id='.$item_id);
        }
    } else {
        $sql = "INSERT INTO `carts` (`id`, `user_id`, `item_id`, `qty`) VALUES (NULL, '$user_id', '$item_id', '$qty')";
        $query = mysqli_query($mysqli, $sql);
        if( $query ) {
            header('Location: ../index.php?page=item_detail&status=success&item_id='.$item_id);
        } else {
            header('Location: ../index.php?page=item_detail&status=failure&item_id='.$item_id);
        }
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
