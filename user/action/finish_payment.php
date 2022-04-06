<?php

include_once("../../config/connection_database.php");

$order_id = $_GET['order_id'];

$sql = "UPDATE `orders` SET `status` = 'on_process' WHERE `orders`.`id` = '$order_id';";
$query = mysqli_query($mysqli, $sql);

if ($query) {
    header('Location: ../index.php?page=transaction_detail&status=successs&id='.$order_id);
} else {
    header('Location: ../index.php?page=category&status=failure');
}
