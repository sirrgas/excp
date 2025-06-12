<?php
session_start();
$x = isset($_GET['x']) ? $_GET['x'] : 'home';

switch ($x) {
    case 'home':
        $page = "home.php";
        break;
    case 'menu':
        $page = "menu.php";
        break;
    case 'order':
        $page = "order.php";
        break;
    case 'user':
        $page = ($_SESSION['level_kopisop'] == 1) ? "user.php" : "home.php";
        break;
    case 'customer':
        $page = "customer.php";
        break;
    case 'report':
        $page = ($_SESSION['level_kopisop'] == 1) ? "report.php" : "home.php";
        break;
    case 'login':
        include "login.php";
        exit;
    case 'logout':
        include "proses/proses_logout.php";
        exit;
    default:
        $page = "404.php";
}

include "main.php";