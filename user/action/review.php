<?php

include_once("../../config/connection_database.php");

if (isset($_POST['save'])) {
    $review = $_POST['review'];
    $order_id = $_POST['order_id'];

    $sql = "INSERT INTO `reviews` (`id`, `order_id`, `description`) VALUES (NULL, '$order_id', '$review');";
    $query = mysqli_query($mysqli, $sql);

    if ($query) {
        header('Location: ../index.php?page=transaction_detail&status=Review berhasil&id='.$order_id);
    } else {
        header('Location: ../index.php?page=transaction_detail&error=Review Gagal&id='.$order_id);
    }
}
