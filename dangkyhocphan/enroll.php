<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['hocphan'])) {
    if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    
    foreach ($_POST['hocphan'] as $maHP) {
        if(!in_array($maHP, $_SESSION['cart'])) {
            $_SESSION['cart'][] = $maHP;
        }
    }
}
header('Location: view_enrollment.php');
exit();
?>
