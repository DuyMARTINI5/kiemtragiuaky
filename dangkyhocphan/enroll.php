<?php
session_start();
include 'includes/db_connect.php';

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['hocphan'])) {
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    foreach ($_POST['hocphan'] as $hp) {
        if (!in_array($hp, $_SESSION['cart'])) {
            $_SESSION['cart'][] = $hp;
        }
    }
}
header('Location: view_enrollment.php');
?>
