<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {
    case 'home':
        include "pages/dashboard.php";
        break;

    case 'category':
        include "pages/category.php";
        break;

    case 'item':
        include "pages/item.php";
        break;

    case 'item_add':
        include "pages/item_add.php";
        break;

    case 'item_edit':
        include "pages/item_edit.php";
        break;

    case 'users':
        include "pages/user.php";
        break;

    default:
        include "pages/dashboard.php";
}
