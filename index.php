            <?php
            // if (isset($_GET['x']) && $_GET['x'] == 'home') {
            //     $page = "home.php";
            //     include "main.php";
            // } elseif (isset($_GET['x']) && $_GET['x'] == 'order') {
            //     $page = "home.php";
            //     include "order.php";
            // } elseif (isset($_GET['x']) && $_GET['x'] == 'produk') {
            //     $page = "home.php";
            //     include "produk.php";
            // } elseif (isset($_GET['x']) && $_GET['x'] == 'customer') {
            //     $page = "home.php";
            //     include "customer.php";
            // } elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
            //     include "login.php";
            // } else {
            //     include "main.php";
            // }
            ?>
            <?php
            session_start();

            if (!isset($_GET['x']) || $_GET['x'] == 'home') {
                $page = "home.php";
            }  elseif ($_GET['x'] == 'menu') {
                $page = "menu.php";
            } elseif ($_GET['x'] == 'order') {
                $page = "order.php";
            } elseif ($_GET['x'] == 'user') {
                if ($_SESSION['level_kopisop'] == 1){
                    $page = "user.php";
                }else{
                    $page = "home.php";
                }
            } elseif ($_GET['x'] == 'customer') {
                $page = "customer.php";
            } elseif ($_GET['x'] == 'report') {
                if ($_SESSION['level_kopisop'] == 1){
                    $page = "report.php";
                }else{
                    $page = "home.php";
                }
            } elseif ($_GET['x'] == 'login') {
                include "login.php";
                exit;
            } elseif ($_GET['x'] == 'logout') {
                include "proses/proses_logout.php";
                exit;
            } else {
                $page = "404.php";
            }

            include "main.php";
