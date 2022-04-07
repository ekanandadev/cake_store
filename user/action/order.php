<?php

include_once("../../config/connection_database.php");

if (isset($_POST['order'])) {
    $user_id = $_POST['user_id'];
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
    $order_type = $_POST['order_type'];
    $total_price = $_POST['total_price'];

    $sql = "INSERT INTO `orders` (`id`, `order_date`, `user_id`, `customer_name`, `total_price`, `status`, `address`, `customer_phone`, `type`) 
            VALUES (NULL, now(), '$user_id', '$customer_name', '$total_price', 'pending_payment', '$customer_address', '$customer_phone', '$order_type');";
    $query = mysqli_query($mysqli, $sql);

    if ($query) {
        $last_id = mysqli_insert_id($mysqli);

        $sqlGet = "SELECT * FROM `carts` WHERE `user_id` = '$user_id' ";
        $queryGet = mysqli_query($mysqli, $sqlGet);
        while ($cart = mysqli_fetch_array($queryGet)) {
            $sqlItem = "SELECT *
                        FROM items
                        WHERE items.id = '$cart[item_id]' ";
            $queryItem = mysqli_query($mysqli, $sqlItem);
            $item = mysqli_fetch_array($queryItem);
            $sqlDetail = "INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `qty`, `item_price`, `total_price`) 
                            VALUES (NULL, '$last_id', '$cart[item_id]', '$cart[qty]', '$item[price]', '$cart[qty]*$item[price]');";
            $queryDetail = mysqli_query($mysqli, $sqlDetail);
            $sqlDelete = "DELETE FROM `carts` WHERE `id` = '$cart[id]' ";
            $queryDelete = mysqli_query($mysqli, $sqlDelete);
            header('Location: ../index.php?page=transaction_detail&status=successs&id='.$last_id);
        }
    } else {
        header('Location: ../index.php?page=item_detail&status=failure&item_id=' . $item_id);
    }
}
