<?php

include_once("../../config/connection_database.php");

if (isset($_POST['finish'])) {
    $order_id = $_POST['order_id'];

    $sql = "UPDATE `orders` SET `status` = 'completed' WHERE `orders`.`id` = '$order_id';";
    $query = mysqli_query($mysqli, $sql);

    if ($query) {
        header('Location: ../index.php?page=transaction_detail&status=success&id=' . $order_id);
    } else {
        header('Location: ../index.php?page=transaction_detail&status=failure&id=' . $order_id);
    }
}
