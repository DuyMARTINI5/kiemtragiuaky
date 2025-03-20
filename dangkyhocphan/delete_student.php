<?php
include 'includes/db_connect.php';

$MaSV = $_GET['id'];
mysqli_query($conn, "DELETE FROM SinhVien WHERE MaSV='$MaSV'");
header('Location: index.php');
?>
