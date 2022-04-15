<?php

include_once("../../config/connection_database.php");

$order_id = $_GET['order_id'];

$sql = "UPDATE `orders` SET `status` = 'on_process' WHERE `orders`.`id` = '$order_id';";
$query = mysqli_query($mysqli, $sql);

$sqlSelect = "SELECT * FROM `order_details` WHERE `order_id` = '$order_id';";
$querySelect = mysqli_query($mysqli, $sqlSelect);
while ($orderDetail = mysqli_fetch_array($querySelect)) {
    $sqlItem = "SELECT * FROM `items` WHERE `items`.`id` = '$orderDetail[item_id]';";
    $queryItem = mysqli_query($mysqli, $sqlItem);
    $item = mysqli_fetch_array($queryItem);
    $last_stock = $item['stock'] - $orderDetail['qty'];
    if ($last_stock < 0) {
        $last_stock = 0;
    }
    $sqlStock = "UPDATE `items` SET `stock` = '$last_stock' WHERE `items`.`id` = '$orderDetail[item_id]';";
    $queryStock = mysqli_query($mysqli, $sqlStock);
}

if ($query) {
    header('Location: ../index.php?page=transaction_detail&status=successs&id=' . $order_id);
} else {
    header('Location: ../index.php?page=category&status=failure');
}
