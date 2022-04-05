<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {
    case 'home':
        include "pages/home.php";
        break;

    case 'item_detail':
        include "pages/item_detail.php";
        break;

    case 'item':
        include "pages/item.php";
        break;

    case 'carts':
        include "pages/carts.php";
        break;

    default:
        include "pages/home.php";
}
