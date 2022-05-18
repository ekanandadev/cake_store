<?php 
session_start(); 
if (!isset($_SESSION['user_id'])) {
    header("Location: ../admin/pages/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "layout/head.php"; ?>
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <?php include "layout/sidebar.php"; ?>
    <main class="main-content position-relative border-radius-lg ">
        <?php include "layout/navbar.php"; ?>
        <div class="container-fluid py-4">
            <?php include "layout/page_routes.php"; ?>
        </div>
    </main>
    <?php include "layout/script.php"; ?>
</body>

</html>