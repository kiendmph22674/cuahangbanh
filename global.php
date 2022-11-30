<?php
session_start();
function dd()
{
    echo "<pre>";
    $args = func_get_args();
    var_dump($args);
    die;
}



const BASE_URL = "http://localhost/Duan1/cuahangbanh/"; //trang chủ
const SITE_URL = BASE_URL . "site/index.php";
const ADMIN_BASE = BASE_URL . 'admin/dashboard/index.php'; //admin


function chuyenhuongtrangchu_neudadangnhap()
{
    if (isset($_SESSION['data_user'])) {
        header("location:" . SITE_URL);
    }
}
function chuyenhuongtrangchu()
{
    header("location:" . SITE_URL);
}
?>