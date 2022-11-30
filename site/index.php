<?php
require_once '../global.php';
require_once '../dao/pdo.php';

if (isset($_GET['chi-tiet'])) {
    $VIEW_NAME = 'chi-tiet.php';
} else {
    $VIEW_NAME = 'trang-chu.php';
}

include_once './layout.php';


?>