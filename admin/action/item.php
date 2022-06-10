<?php

include_once("../../config/connection_database.php");

if (isset($_POST['save'])) {
    $item_name = $_POST['item_name'];
    $category_id = $_POST['category_id'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];

    $fileName = $_FILES['thumbnail']['name'];
    $fileNameTemp = $_FILES['thumbnail']['tmp_name'];
    $dirUpload = "thumbnail/";
    $imageFileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $uploadProcess = move_uploaded_file($fileNameTemp, $dirUpload.$item_name.".".$imageFileType);
    $fileNameToDb = $item_name.".".$imageFileType;
    $sql = "INSERT INTO `items` (`id`, `item_name`, `category_id`, `price`, `stock`, `thumbnail`) VALUES (NULL, '$item_name', '$category_id', '$stock', '$price', '$fileNameToDb')";
    $query = mysqli_query($mysqli, $sql);

    if( $query ) {
        header('Location: ../index.php?page=item_add&status=success');
    } else {
        header('Location: ../index.php?page=item_add&status=failure');
    }
} if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $item_name = $_POST['item_name'];
    $category_id = $_POST['category_id'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];

    if ($_FILES['thumbnail']['name'] != "") {
        $fileName = $_FILES['thumbnail']['name'];
        $fileNameTemp = $_FILES['thumbnail']['tmp_name'];
        $dirUpload = "thumbnail/";
        $imageFileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $uploadProcess = move_uploaded_file($fileNameTemp, $dirUpload.$item_name.".".$imageFileType);
        $fileNameToDb = $item_name.".".$imageFileType;
        $sql = "UPDATE `items` SET `item_name` = '$item_name', `category_id` = '$category_id', `price` = '$price', `stock` = '$stock', `thumbnail` = '$fileNameToDb' WHERE `items`.`id` = '$id';";
        $query = mysqli_query($mysqli, $sql);
    } else {
        $sql = "UPDATE `items` SET `item_name` = '$item_name', `category_id` = '$category_id', `price` = '$price', `stock` = '$stock' WHERE `items`.`id` = '$id';";
        $query = mysqli_query($mysqli, $sql);
    }

    if( $query ) {
        header('Location: ../index.php?page=item_edit&status=success&id='.$id);
    } else {
        header('Location: ../index.php?page=item_edit&status=failure&id='.$id);
    }
} if (isset($_GET['action'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `items` WHERE `items`.`id` = '$id' ";
    $query = mysqli_query($mysqli, $sql);

    if( $query ) {
        header('Location: ../index.php?page=item&status=success');
    } else {
        header('Location: ../index.php?page=item&status=failure');
    }
}
 